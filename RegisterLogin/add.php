<?php
    session_start();
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $details = mysql_real_escape_string($_POST['details']);
       $time = strftime("%X"); //time
       $date = strftime("%B %d, %Y"); //date
       $decision = "no";
   
       mysql_connect("localhost","root","") or die(mysql_error()); //Connect to server
       mysql_select_db("first_db") or die("Cannot connect to database"); //Conect to database
       foreach($_POST['public'] as $each_check) //gets the data from the checkbox
       {
          if($each_check != null){ //checks if checkbox is checked
             $decision = "yes"; // sets the value
          }
       }

       mysql_query("INSERT INTO list(details, date_posted, time_posted, public) VALUES ('$details','$date','$time','$decision')"); //SQL query
       header("location:home.php");
    }
    else
    {
       header("location:home.php");
    }
?>