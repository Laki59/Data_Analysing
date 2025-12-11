use RetailAnalytics

--Checking for nulls in customers
SELECT *
FROM customers
WHERE email IS NULL
   OR customer_name IS NULL;

--Checking for nulls in products
select *
from products
where product_name IS NULL
OR category IS NULL
OR price IS NULL

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
--Top 10 customers by revenue
select TOP 10 c.customer_name,SUM(total_price) as Total_spent
from customers c join orders o on c.customer_id=o.customer_id
join order_items r on o.order_id=r.order_id
group by c.customer_name
order by Total_spent desc

--Year/Month revenue
select YEAR(o.order_date) as year,MONTH(o.order_date) as month,SUM(r.total_price) as Total_revenue
from orders o join order_items r on o.order_id=r.order_id
group by YEAR(o.order_date),MONTH(o.order_date)
order by YEAR(o.order_date) asc,MONTH(o.order_date) asc

--Which products bring the most revenue
SELECT p.product_name,SUM(r.total_price) as Total_revenue
FROM products p JOIN order_items r on p.product_id=r.product_id
group by p.product_name
order by Total_revenue desc

--Most sold product(add TOP 1 for most sold one)
select p.product_name,SUM(r.quantity) as total_sold
from products p JOIN order_items r on p.product_id=r.product_id
group by p.product_name
order by total_sold desc

--New customers,Repeat customers with more orders and no order customers
WITH CustomerOrders AS (
    SELECT
        c.customer_id,
        COUNT(o.order_id) AS total_orders
    FROM Customers c
    LEFT JOIN Orders o ON c.customer_id = o.customer_id
    GROUP BY c.customer_id
)
SELECT
    CASE 
        WHEN total_orders = 0 THEN 'No Orders'
        WHEN total_orders = 1 THEN 'New Customer'
        ELSE 'Repeat Customer'
    END AS Customer_Type,
    COUNT(*) AS Num_Customers
FROM CustomerOrders
GROUP BY 
    CASE 
        WHEN total_orders = 0 THEN 'No Orders'
        WHEN total_orders = 1 THEN 'New Customer'
        ELSE 'Repeat Customer'
    END;

--Average spent on orders
SELECT 
    c.customer_name,
    AVG(r.total_price) AS Average_Order_Value
FROM Customers c
JOIN Orders o ON c.customer_id = o.customer_id
JOIN Order_Items r ON o.order_id = r.order_id
GROUP BY c.customer_name
ORDER BY Average_Order_Value DESC;

--Revenue per category
SELECT 
    p.category,
    SUM(r.total_price) AS Category_Revenue
FROM Products p
JOIN Order_Items r ON p.product_id = r.product_id
GROUP BY p.category
ORDER BY Category_Revenue DESC;

--Monthly revenue trend as cumulative total
SELECT 
    YEAR(o.order_date) AS year,
    MONTH(o.order_date) AS month,
    SUM(r.total_price) AS Monthly_Revenue,
    SUM(SUM(r.total_price)) OVER(ORDER BY YEAR(o.order_date), MONTH(o.order_date)) AS Cumulative_Revenue
FROM Orders o
JOIN Order_Items r ON o.order_id = r.order_id
GROUP BY YEAR(o.order_date), MONTH(o.order_date)
ORDER BY year, month;

--Top customer per month
SELECT 
    YEAR(o.order_date) AS year,
    MONTH(o.order_date) AS month,
    c.customer_name,
    SUM(r.total_price) AS Revenue
FROM Orders o
JOIN Order_Items r ON o.order_id = r.order_id
JOIN Customers c ON o.customer_id = c.customer_id
GROUP BY YEAR(o.order_date), MONTH(o.order_date), c.customer_name
ORDER BY year, month, Revenue DESC;

--Product performance over time
SELECT 
    p.product_name,
    YEAR(o.order_date) AS year,
    MONTH(o.order_date) AS month,
    SUM(oi.quantity) AS Quantity_Sold,
    SUM(oi.total_price) AS Revenue
FROM Products p
JOIN Order_Items oi ON p.product_id = oi.product_id
JOIN Orders o ON o.order_id = oi.order_id
GROUP BY p.product_name, YEAR(o.order_date), MONTH(o.order_date)
ORDER BY p.product_name, year, month;

--Customer overview
SELECT
    c.customer_id,
    c.customer_name,
    COUNT(o.order_id) AS total_orders,
    SUM(oi.total_price) AS total_spent,
    SUM(oi.total_price) / COUNT(o.order_id) AS avg_order_value
FROM Customers c
JOIN Orders o ON c.customer_id = o.customer_id
JOIN Order_Items oi ON o.order_id = oi.order_id
GROUP BY c.customer_id, c.customer_name
order by total_spent desc