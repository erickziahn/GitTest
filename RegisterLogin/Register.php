<html>
    <head>
        <title>Registration Page</title>
    </head>
    <body>
	<link rel="stylesheet" type ="text/css"href="page.css"/>
	<div id="container">
	<h1>Staff Clinic KEMRI Welcome Trust</h1>
	<a href="index.php">Click here to go back</a><br/><br/>
	
        <h2>Registration Page</h2>
        <form action="register.php" method="POST">
           Enter Username: <input type="text" name="username" required="required" /> <br/><br/>
           Enter password: <input type="password" name="password" required="required" /> <br/><br/>
           <input type="submit" value="Register"/>
		   <h6> copyright &copy; 2015 Erick Tsuma</h6>
		   </div>
        </form>
    </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] =="POST"){
	$username=mysql_real_escape_string($_POST['username']);
	$password= mysql_real_escape_string($_POST['password']);
	$bool=true;
	
	mysql_connect("localhost","root","") or die(mysql_error());//connect to server
	mysql_select_db("first_db") or die("cannot connect to database");//connect to database
	$query=mysql_query("select * from users");//query the users table
	while($row=mysql_fetch_array($query))//display all rows from query 
	{	
		$table_users=$row['username'];//the first username row is passed on to $table_users,and so on until the query is finished
		if($username==$table_users)//checks if there are any matching fields
		
		{
			
			$bool=false;//sets boolto false
			print'<script>alert("username has been taken!");</script>';//prompts the user
			print'<script>window.location.assign("register.php");</script>';//redirect to register.php
		}
	
	}
	
	if($bool)//checks if bool is true
	{
		mysql_query("INSERT INTO users(username,password) VALUES('$username','$password')");//Insert the value to table users
		print'<script>alert("successfully Registered!");</script>';//prompts the user
		print'<script>window.location.assign("register.php");</script>';//redirect to register.php
		}
}
?>