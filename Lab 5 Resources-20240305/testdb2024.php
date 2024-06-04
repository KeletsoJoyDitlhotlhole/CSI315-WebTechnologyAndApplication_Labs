<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
   <head>
      <title>My PHP and MySQL Test Page </title>
   </head>

   <body>

<?php 
	echo "Date and Time: ". date("l dS \of F Y h:i:s A")."<br /><br />";
	
	$dbhost = '10.0.19.74';
	$dbuser = 'xxx02024';
	$dbpass = 'xxx02024';
	$dbname = 'db_xxx02024';
	
    //create connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		
	// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Database connection successful <br / ><br />";
 

	$query = "SELECT * FROM test";
        echo "fields selected <br / ><br />";
        
        $result = $conn->query($query);
        $num_rows = mysqli_num_rows($result);
         
	echo "You have ". $num_rows . "students in your database <br /><br />";
	echo "<ol>";
	while ($row = mysqli_fetch_array($result))
	{
		echo "ID: " .$row["id"]. " - Name: " .$row["name"]. "<br>";
                 
	}
	mysql_close($conn);
	echo "</ol>";
?>
   </body>
</html>

