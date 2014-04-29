This is the documentation for the central server code so far. 

1. Start with index.php in the app folder. This loads the main dashboard where user creates OR joins conference.

2. Here, upon load, list_conf.php is called via ajax to fill dropdown list of conferences existing. list_conf.php connects to db and pulls list of conference names ie. table names in database.

3. When user selects a conference using dropdown list(change in selection is the trigger), conferencedetails.php is called. This script pulls further details of table such as max capacity, users inside, number of devices each user has. SOme algortihm in script is used to calculate this.

NOTE: as of now, room name cannot be named with white space in between. This generates syntax problems when using php to connect to db. neither can we use apostrophes or anything that may confuse the syntax. so room names such as "dean's room", and "deans room" wll cause errors. "deansroom" is okay.

4. When user enters a conference name and clicks START to create new room, panel.php is loaded, room name and capacity is saved locally on browser using HTML5 WEB STORAGE. This information can be accessed in subsequent pages on the same browser. panel.php is where user will confirm room being created/joined and enter his name. 

5. If user navigates away from panel.php, warning is given that infomation will be lost, and local storage data is deleted. garbagecollector.php is called and this script checks the name of the conference being left against database. If table associated is empty ie member leaving is last member in conference, the table is dropped. 

6. That's it so far. Much more work to do with the server. 