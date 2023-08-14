<?php
    session_start();
    require "libs/Uri.php";// nhun file Uri trong thu muc libs vao trang chu
    require "libs/Controller.php";//nhun file controller trong libs vao trang chu
    require "libs/View.php";//nhun file view trong libs vao trang chu
    require "libs/Database.php";//nhun file view trong libs vao trang chu
    require "libs/Model.php";//nhun file view trong libs vao trang chu
    require "libs/Pagination.php";
    require "libs/File.php";
   
   
    require "config/config.php";//nhun file config trong config vao trang chu
    require "config/database.php";//nhun file config trong config vao trang chu


    $uri = new Uri();//tao doi tuong cua class Uri


?>