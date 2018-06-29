<?php
function connexion()
{

    $dsn = "pgsql:"
        . "host=ec2-54-247-89-189.eu-west-1.compute.amazonaws.com;"
        . "dbname=d1l6omh6s3t8pm;"
        . "user=fvfslbtvmndeav;"
        . "port=5432;"
        . "sslmode=require;"
        . "password=0b8f6c570f12c9567f1ecae01840880661d15a67cabaa4b0b2ddd2bf0ef46eab";


    /*$db = parse_url(getenv("DATABASE_URL"));


    $dsn = new PDO("pgsql:" . sprintf(
            "host=%s;user=%s;port=%s;sslmode=%s;password=%s;dbname=%s",
            $db["hostname"],
            $db["login"],
            $db["port"],
            $db["sslmode"],
            $db["pass"],
            ltrim($db["database"], "/")
        ));*/

    /*$dsn = "pgsql:"
        . "host=".$_ENV['hostname'].";"
        . "dbname=".$_ENV['database'].";"
        . "user=".$_ENV['login'].";"
        . "port=".$_ENV['port'].";"
        . "sslmode=".$_ENV['sslmode'].";"
        . "password=".$_ENV['password']."";*/
    try{
        $db = new PDO($dsn);
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    return($db);
}
?>