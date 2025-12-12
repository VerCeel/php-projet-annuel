To launch this project you gotta :
-place your IDE at the right folder
-write git clone https://github.com/VerCeel/php-projet-annuel in its terminal
-launch docker-compose up -d --build (remind lauching docker desktop before it)
-create a file at this path /projet/config/config.php and set your parameters inside : 
<?php
// db
define('DB_HOST', 'db');
define('DB_NAME', 'php_projet_final');
define('DB_USER', 'user');
define('DB_PASSWORD', 'secret');
define('DB_CHARSET', 'utf8mb4');
define('BASE_URL', 'http://localhost:8090');
// php mailer
define('EMAIL_OWNER', 'xxx');
define('PSW_APP', 'xxx');
-create a new database writing http://localhost:8085/ in the uri
-import the php_projet-final.sql file in this db.

enjoy
