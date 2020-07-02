# School or work tips

## 1. Connect to remote SSH with Visual studio code
- Download Visual Studio Code 
https://code.visualstudio.com/
- After download, open Visual Studio Code
- Click extension on the left side bar<br>
![Screenshot](Image/extension.png)
- download Remote Development<br>
![Screenshot](Image/SSH.png)
- Open terminal in the visual studio and try to login if your remote ssh is working. 
- After sucess to login and download, click open remote window that placed bottom left<br>
![Screenshot](Image/remotewindow.png)
- If you click the remote window, you can search your ssh address. <br> ex) username@yourcompanyorschool.server
- after find it, it will open new window for the ssh remote server.
- you can add your server to the Remote Explorer. 

## 2. Create virtual Environment 
- Open Terminal and mkdir to save only your virtual Environment projects and cd to Environments dir. 
>$ mkdir Environments 
>$ cd Environments
- install Virtual Environment
>$ pip install virtualenv 
- make first virtual Environment
>$ virtualenv project1
- activate the virtual Environment project1 
>$ source project1/bin/activate 
- now you are in new python environment
