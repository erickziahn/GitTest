<html>
    <head>
    <title>Index Page</title>
    </head>
    <body>
	<link rel="stylesheet" type ="text/css"href="page.css"/>
	<div id="container">
	<h1>Staff Clinic KEMRI Welcome Trust</h1>
        <?php
            echo "<p>WELCOME ALL!</p>";
        ?>
		<a href="login.php"> Click here to login</a><br/><br/>
        <a href="register.php"> Click here to register</a>
    </body>
	<br/>
	<h2 align="center">Staffs regular clinic</h2>
		<table border="1px" width="100%">
			<tr>
				<th>Id</th>
				<th>Details</th>
				<th>Post Time</th>
				<th>Edit Time</th>
				</tr>
			<?php
				@mysql_connect("localhost", "root","") or die(@mysql_error()); //Connect to server
				@mysql_select_db("first_db") or die("Cannot connect to database"); //connect to database
				$query = @mysql_query("Select * from list"); // SQL Query
				while($row = @mysql_fetch_array($query))
				{
					Print "<tr>";
						Print '<td align="center">'. $row['id'] . "</td>";
						Print '<td align="center">'. $row['details'] . "</td>";
						Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
						Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
					Print "</tr>";
				}
			?>
			</table>
		<h6> copyright &copy; 2015 Erick Tsuma</h6>
		   </div>
</html>