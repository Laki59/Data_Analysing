# Uber Rides Data Analysis

This project analyzes an Uber rides dataset from Kaggle.  
The data was cleaned and transformed, then visualized in **Power BI** to uncover trends in ride completion, cancellations, vehicle usage, locations, timing, and ratings.

---

## Dashboard Overview

The dashboard communicates the following insights:

- Total number of rides, broken down into **Completed**, **Cancelled**, and **Incomplete** rides using KPI cards and stacked bar charts
- Reasons for ride cancellations by **Drivers** and **Customers**
- Reasons for **Incomplete rides**
- Most popular **vehicle types** used by drivers
- **Top pickup and drop-off locations**
- **Ride distance trends** by month and quarter (2024 only)
- **Ride timing patterns** to identify peak usage hours
- **Rating distributions** for both drivers and customers

---

## Ride Status & Cancellations

- Total rides are displayed using KPI cards for quick comparison
- A stacked bar chart shows the percentage distribution of ride statuses
- Cancellation reasons are split by:
  - Drivers (pie chart)
  - Customers (pie chart)
- Incomplete ride reasons are also visualized

![Ride Status & Cancellations](https://github.com/user-attachments/assets/0e427e72-e736-46df-81f6-1cd0ea2979d3)

### Key Insights:
- Approximately **70% of rides are completed**
- **Drivers cancel significantly more rides than customers**
- Driver cancellation reasons are fairly evenly distributed (around 25% each)
- Customer cancellations are most commonly due to **wrong address issues**

---

## Usage Patterns & Distance Analysis

This section focuses on completed rides only:

- Top pickup locations
- Top drop-off locations
- Most frequently used vehicle types
- Total ride distance by **month and quarter**
- Ride volume by **time of day**

![Usage & Distance Trends](https://github.com/user-attachments/assets/5f6e1790-3c9c-4bac-acde-75368aac71c1)

### Key Insights:
- **Auto** is the most used vehicle type, with **Go Mini** closely trailing (difference of ~7,000 rides)
- Go Mini may overtake Auto in the future due to better fuel efficiency
- **February** had the lowest total ride distance by a large margin
- Ride demand peaks **after working hours (post-6 PM)** and again around **11:30 AM**
- January shows higher morning ride activity compared to other months

---

## Ratings Analysis

- Distribution of driver ratings
- Distribution of customer ratings

![Ratings Distribution](https://github.com/user-attachments/assets/e0228030-80ce-4c41-b3c2-affa7a547233)

### Key Insights:
- Most drivers are rated between **4.0 and 4.5**
- Very few drivers fall below a **3.5 rating**
- Customers tend to have **higher ratings overall**, with a large concentration between **4.5 and 5**
- Rating drop-offs below 3.5 are similar for both drivers and customers

---

## Note on Data Quality

There is a known issue in the dataset:
- Rides with booking status **"No Driver Found"** were incorrectly counted as **Completed**
- These rides should have been classified as **Incomplete**
- A DAX measure should have been created to increment the Incomplete Rides column for these cases

This issue is acknowledged and documented for transparency.

---

## Tools Used
- Power BI
- Excel (data cleaning)
- DAX (basic measures)

---

## Conclusion

This analysis highlights operational inefficiencies, ride demand patterns, and behavioral differences between drivers and customers.  
It also demonstrates how visual analytics can be used to identify peak demand periods, cancellation drivers, and service quality indicators.
