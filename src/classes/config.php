<?php
    define("DBHOST", "mysql-server");
    define("DBUSER", "root");
    define("DBPASS", "secret");
    define("DBNAME", "store");

    if(!isset($_SESSION['login']))
    {
        $_SESSION['login']='yes';
    }
    if (!isset($_SESSION['show']) )
    {
        $_SESSION['show']='none';
    }
  
?>