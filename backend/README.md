# **APPLICATION BACKEND**

***

## **To run the BACKEND of the application, a few steps are required**

* [Install PostgreSQL](https://www.postgresql.org/download/)
* In the `Knexfile.js` file, set your **PostgreSQL username, password, and database name (you must create the database as well).**
* Edit the `common.js` file by adding your local IP to the React Native app inside the App folder
* Run ***npm install*** in the command line to install all dependencies
* Run ***Knex migrate:latest*** in the command line to apply migrations
* Run ***npm start*** to start the BACKEND

***

## **If you experience issues with Nodemon, try the following commands**

* ***npm install -g nodemon***
* ***npm install --save-dev nodemon***
* ***npm config get prefix***
* ___set PATH=%PATH%;C:\Users\"YourUserName"\AppData\Roaming\npm;___

***

## **Useful PostgreSQL Commands**
To access PostgreSQL via CMD:

* ___psql -U postgres___

To access your database:

* ___\c "YourDatabaseName"___

To check user records:

* ___select * from users;___

***

## **How to find your IP address**

Open CMD and run the command ***ipconfig***

Your **IP address** will be shown under the ***Ethernet Adapter*** or ***Wireless LAN Adapter*** section as:  
___IPv4 Address: 192.168.xx.xx___

***

## **If the psql command doesn't work**

You may need to set up your environment variables:

1. Press **Windows+E**, right-click on "This PC" or "My Computer"
2. Click on **Advanced system settings** on the left panel
3. Click **Environment Variables**
4. Find the **Path** variable and click **Edit**
5. Add a new entry, for example:  
   ***"C:\Program Files\PostgreSQL\9.0\bin"***
6. Restart Windows if the command still isn't recognized  
   _(Note: if you had CMD open before completing the steps, close it and open a new one)_

***
