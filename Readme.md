# Running Project
```
docker-compose build  
docker-compose up -d  
docker-compose up -d --build  
127.0.0.1  
127.0.0.1:8080  
127.0.0.1:3306  
docker exec -it php-apache /bin/bash
docker exec -it mysql /bin/bash
docker exec -it phpmyadmin /bin/bash
composer install  
composer dumpautoload
bash permissions.sh  
```



# Setup XDebug on PHP Storm

On PHP Storm, go to **"File > Settings"** to open the Settings menu.  

- Open **"PHP"**;
    - On **"PHP language level"** select **"8.1"**;
    - On **"CLI interpreter"** click on **"..."** on the right and a window to manage the CLI interpreters will open;
      - On that windows click on the **"+"** button in the top left corner, and select **"From Docker ..."**;
      - A windows to configure the remote PHP interpreter will open;
        - Select **"Docker Composer"**;
        - On **"Server"** click on **"New"**;
          - Select **"Unix Socket"** and click **"OK"**;
        - On **"Configuration files"** select **"./docker-compose.yml"**;
        - On **"Service"** select **"php-apache"**;

![PHP Image](%23DOCs/images/phpstorm-xdebug/1-0-PHP.png)
![PHP Image](%23DOCs/images/phpstorm-xdebug/1-1-Cli-Interpreter.png)
![PHP Image](%23DOCs/images/phpstorm-xdebug/1-2-Remote-PHP-Interpreter.png)
![PHP Image](%23DOCs/images/phpstorm-xdebug/1-3-Server.png)
![PHP Image](%23DOCs/images/phpstorm-xdebug/1-4-PHP-Final.png)



- Open **"PHP > Debug"**, and go to the **"XDebug"** panel;
  - On the field **"Debug Port"** put the value **"10000"**.

![PHP Image](%23DOCs/images/phpstorm-xdebug/2-0-Debug.png)



- Open **"PHP > Server"**, and click on the **"Add"** button;
  - On the field **"Name"** put the value **"127.0.0.1"**;
  - On the field **"Host"** put the value **"127.0.0.1"**;
  - On the field **"Port"** put the value **"80"**;
  - On the field **"Debugger:"** select **"Xdebug"**;
  - Mark the checkbox **"Use path mappings"**;
    - On the files lists that opened:
      - Map the folder **"Project files/.../src/"** to **"/var/www/html"**;
      - Map the folder **"Project files/.../src/public/"** to **"/var/www/html/public"**;

![PHP Image](%23DOCs/images/phpstorm-xdebug/3-0-Server.png)
