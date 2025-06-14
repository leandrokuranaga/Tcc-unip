# __To test the application, some requirements must be met__

***

* [Install Visual Studio Code](https://code.visualstudio.com/download)  
* [Install Node.js](https://nodejs.org/en/download/)  
* [Install Android Studio](https://developer.android.com/studio/install)  
* [Install Java](https://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html)  
* [Install Git](https://git-scm.com/downloads)  

***

## __Useful Commands__

To check your Java version:  
* ___java -version___  

To check your Node version:  
* ___node -v___  

To check your npm version:  
* ___npm -v___  

***

## **Add Environment Variables**

1. Press **Windows + E**, right-click on **This PC** on the left panel.  
2. Click on **Advanced System Settings**.  
3. Click on **Environment Variables**.  

***

## **Java**

To add the `JAVA_HOME` variable to the path:  
Copy the JDK 8 installation path (usually something like `C:/Program Files/Java/...`)  
In the **System Variables**, create a new variable:  
- Name: `JAVA_HOME`  
- Value: *(paste the path here)*  

***

## **Android**

To find the SDK path, open **Android Studio**, go to **Settings > SDK Manager**, and look at the **Android SDK Location** at the top.

In **User Variables**, create a new variable:  
- Name: `ANDROID_HOME`  
- Value: *(paste the SDK path)*

Then, add the following paths to your system’s `Path` variable:

* %ANDROID_HOME%\emulator  
* %ANDROID_HOME%\tools  
* %ANDROID_HOME%\tools\bin  
* %ANDROID_HOME%\platform-tools  

**To verify it’s working, run the following commands in CMD:**

* ***adb --version*** → Validates %ANDROID_HOME%  
* ***emulator -version*** → Validates %ANDROID_HOME%\emulator  

Then, accept licenses by running:  
* ***sdkmanager --licenses*** (Press `Y` to accept each one)

***

## **Using Emulator via CLI (Use CMD Only)**

* ***emulator -list-avds*** → Lists available emulators  
* ***emulator -no-snapshot -avd "DeviceName"*** → Launches the selected emulator  

Install React Native CLI globally:  
* ***npm i -g react-native-cli***  

Create a new folder:  
* ***mkdir "folder-name"***  

Initialize your project:  
* ***react-native init "project-name"***  

Navigate into the project:  
* ***cd "project-name"***  

Run the app:  
* ***react-native run-android***  

Open the project in VS Code:  
* ***code .***  
Edit the file `App.js` to start coding.

***

## **Using Physical Device with Expo**

Download [Expo for Android](https://play.google.com/store/apps/details?id=host.exp.exponent)

Install Expo CLI globally:  
* ***npm i -g create-react-native-app***  

Create the app:  
* ***create-react-native-app "AppName"***  

Navigate into the folder:  
* ***cd "AppName"***  
* ***code .***  

Start the development server:  
* ***npm start*** → A QR code will open in your browser. Scan it with your phone using Expo.

Edit the `App.js` file to start coding.

***

## **Using Physical Device Without Expo**

Install the CLI globally:  
* ***npm i -g create-react-native-app***  

Create the app:  
* ***create-react-native-app "AppName"***  

Navigate into the folder:  
* ***cd "AppName"***  
* ***code .***  

Plug in your device via USB.  
Then run:  
* ***react-native run-android*** → Installs the app on your device.

Edit the `App.js` file to start coding.

***

## **Running the Project**

* Clone the project:  
  ***git clone "project.git"***

* Navigate into the folder:  
  ***cd "project-folder"***

* Open in VS Code:  
  ***code .***

* Install dependencies:  
  ***npm install***

* Run the application:  
  ***npm run android***

***

## **Fixing Development Server Issues**

* Delete the `node_modules` folder  
* Run:  
  ***npm install***

* Then start the app:  
  ***npm run android***
