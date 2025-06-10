Hello!

This is my first implementation of my project. I have not worked on the design of the application so there is a lot of room for improvement. 

The page has a filter with a drop down menu where you can choose between Candy, Referalls, Calls, Signature, and Misc. as the topic of the comments you want to look at. After making a selection you can press submit and all the comments that fit 
under that topic should populate underneath. 


In the database file, I connect to the database, run a query to gather all the information I need from the table that I called sweetwater_test. I created two function to call from the index page that gets the list of comments based on the input in the drop down and also 
to update the table to the correct dates that are listed in the comments. These are found by keeping the order id and the comment together as an associative array. I used regex to look for the MM/DD/YY format that is in the comments to grab the dates. 
I then covert it into a datetime object in the correct format to prperly match what the sql database is expecting and run the update query. 
