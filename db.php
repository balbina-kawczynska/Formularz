<?php
function db() 
{

//------------------------------------------------------------------------------
    // łączenie z bazą
    $connect = mysql_connect('localhost', 'root', 'sztuka');

    if (!$connect) 
    {
        die('Could not connect: '. mysql_error());
    }

//------------------------------------------------------------------------------
    // tworzenie bazy danych
    $new_db = "CREATE DATABASE IF NOT EXISTS my_db";

    if (mysql_query($new_db, $connect))
    {
        echo "<span style=\"color: #008000;\">Database created successfully.</span><br>";
    }
    else 
    {
        echo "<span style=\"color: #cc0000;\">Database creating failed. Error: </span>".mysql_error()."<br>";
    }

    // tworzenie tabeli
    mysql_select_db("my_db", $connect);

    $new_table = "CREATE TABLE IF NOT EXISTS formularz 
        (
            name VARCHAR(30) NOT NULL,
            email VARCHAR(40) NOT NULL,
            age SMALLINT NOT NULL,
            message TEXT NOT NULL
        )";

    if(mysql_query($new_table, $connect))
    {
        echo "<span style=\"color: #008000;\">Table created successfully.<br></span>";
    }
    else 
    {
        echo"<span style=\"color: #cc0000;\">Cannot create table. Error: </span>".mysql_error()."<br>";
    }

//------------------------------------------------------------------------------
    // czy trzeba dodac jakis kod? (w zwiazku z sql injection) 
    // dodawanie danych do bazy danych
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $message = $_POST['message'];

    $add_to_table = "INSERT INTO `formularz` 
    VALUES('$name','$email','$age','$message')";

    if(mysql_query($add_to_table))
    {
        echo "<span style=\"color: #008000;\">Data uploaded successfully.<br></span>";
    }
    else 
    {
        echo"<span style=\"color: #cc0000;\">Cannot upload data. Error: </span>".mysql_error()."<br>";
    }
//------------------------------------------------------------------------------

    mysql_close($connect);
}
?>