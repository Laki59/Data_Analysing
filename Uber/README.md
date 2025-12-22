# Uber
Uber ride dataset from Kaggle that I cleaned and used in Power Bi for clear analysis.
These charts communicate:
- total number of rides,with how many completed,cancelled or incomplete rides easily displayed by Cards and stacked bar chart
- Reason of cancelled rides for both Drivers and Customers
- Incomplete rides reasons as well
- Most popular Vehicle type by drivers
- Top drop and pickup locations
- Ride distance for each month and Quarter
- Completed rides time so we can see when people order rides the most
- Rating distribution for both drivers and customers

# Charts:
- Total number of rides,Completed/Incomlpeted,Cancelled number of rides presented with Card to see how cleary how many rides there are
- Stacked bar chart for to represent type of rides in the chart and where we can see difference in %
- Cancelled rides reasons by driver in pie chart
- Cancelled rides reasons by customer in Customer chart
- Incomplete rides reasons
<img width="1446" height="806" alt="image" src="https://github.com/user-attachments/assets/0e427e72-e736-46df-81f6-1cd0ea2979d3" />
From these charts we can see that completed rides are at around 70%, while drivers cancell way more rides than customers.
Nothing really sticks out for drivers reasons as all options are near 25%, where customers mostly complain about wrong address.
---

- Completed rides top pick up locations
- Completed rides top drop off locations
- Completed rides most used type of vehicle
- Sum of ride distance by quater and month (the dataset only contains 2024) to see which months had the most distance,where we can see February,by far, had the lowest ride distance
- Complete rides by Time also can represent when most of rides are happening which is around 11:30 pm and post work hours at around 6 pm
<img width="1435" height="805" alt="image" src="https://github.com/user-attachments/assets/5f6e1790-3c9c-4bac-acde-75368aac71c1" />
These charts shows us that most customers use Auto,but go mini is trailing close with difference of 7000. In the future it might over take Auto as go mini is more fuel-efficiant. Should keep a close eye for that.
We can see that February was also our weakest month by a large margin compared to other months,and also January has way more rides in the morning hours compared to other months.
Alot of people order rides past working hours,so past 6pm.

- Total rides with drivers ratings,we can see most drivers sit inbetween 4.0 and 4.5,and there's not many of them below 3.5
- Total rides with customer rating,similar to drivers,but way more customers with rating between 4.5 and 5,and the dropoff seems to be similar after 3.5,even more for customers
<img width="858" height="480" alt="image" src="https://github.com/user-attachments/assets/e0228030-80ce-4c41-b3c2-affa7a547233" />
These charts just show distribution of rating for customers and drivers.

# Note
I made a mistake and in booking status there's "no driver found",and for some reason they're counted as complpeted rides,should've made a DAX to add 1 to incompleted ride column for those rides.
