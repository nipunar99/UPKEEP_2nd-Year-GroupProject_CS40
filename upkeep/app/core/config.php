<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {

    // database config
    define('DBNAME', 'upkeep');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define('ROOT', 'http://localhost/upkeep/upkeep/public');
} elseif ($_SERVER['SERVER_NAME'] == '192.168.8.100') {
    define('DBNAME', 'upkeep');
    define('DBHOST', 'http://192.168.8.100');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define('ROOT', 'http://192.168.8.100/upkeep/upkeep/public');
} elseif ($_SERVER['SERVER_NAME'] == '192.168.8.1') {
    define('DBNAME', 'upkeep');
    define('DBHOST', 'http://192.168.8.1');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define('ROOT', 'http://192.168.8.1/upkeep/upkeep/public');
} elseif ($_SERVER['SERVER_NAME'] == 'upkeep.com') {

    define('DBNAME', 'upkeep');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define('ROOT', 'httpS://www.yourwebsite.com');
} else {
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define('ROOT', 'httpS://www.yourwebsite.com');
}
