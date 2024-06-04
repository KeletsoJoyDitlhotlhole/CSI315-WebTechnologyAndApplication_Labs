<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CSI315 LAB 8</title>
        <meta charset="utf-8" author="Keletso Joy Ditlhotlhole-202002023" content="PHP and MySQL Lab">
        <link rel="stylesheet" href="manage_database.css">
        <h1>CSI315 LAB 8 </h1>
    </head>

    <body>

        <p>ENTER YOUR DATA HERE IF YOU WANT TO INSERT</p>
        <!--FORM TO INSERT DATA-->
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
             <label>ID:</label><br>
             <input type="text" name="ID">
             <br><br>

             <label>Name:</label><br>
             <input type="text" name="testname">
             <br><br>

             <input type="submit" value="Insert">
             <br><br><hr>
         </form>

         <p>ENTER THE ID YOU WANT TO UPDATE</p>
        <!--FORM TO UPDATE DATA-->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
             <label>ID:</label><br>
             <input type="text" name="UpdateID">
             <br><br>

             
             <label>Name:</label><br>
             <input type="text" name="Updatetestname">
             <br><br>


             <input type="submit" value="Update">
             <br><br><hr>
         </form>

         <p>ENTER THE ID YOU WANT TO DELETE</p>
        <!--FORM TO DELETE DATA-->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
             <label>ID:</label><br>
             <input type="text" name="DeleteID">
             <br><br>

             <input type="submit" value="Delete">
             <br><br><hr>
         </form>
         
         




<?php
// Create the connection to the database
$servername = "10.0.19.74";
$username = "dit02023";
$password = "dit02023";
$dbname = "db_dit02023";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection successful!!";

// Insert data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["ID"])) {
    $id = $_POST["ID"];
    $testname = $_POST["testname"];

    $stmt = $conn->prepare("INSERT INTO Test2 (ID ,testname) VALUES(?,?)");
    $stmt->bind_param("ss", $id, $testname);
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}

// Prepare and execute the update statement
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["UpdateID"])) {
    $id = $_POST["UpdateID"];
    $testname = $_POST["Updatetestname"];

    $stmt = $conn->prepare("UPDATE Test2 SET testname=? WHERE id=?");
    if ($stmt) {
        $stmt->bind_param("ss", $testname, $id);
        if ($stmt->execute()) {
            echo "Record successfully updated";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing update statement: " . $conn->error;
    }
}

// Prepare and execute the delete statement
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["DeleteID"])) {
    $id = $_POST["DeleteID"];

    $stmt = $conn->prepare("DELETE FROM Test2 WHERE ID=?");
    if ($stmt) {
        $stmt->bind_param("s", $id);
        if ($stmt->execute()) {
            echo "Record successfully deleted";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing delete statement: " . $conn->error;
    }
}



  $query="SELECT * FROM Test2";

  $result=$conn->query($query);
  $num_rows=mysqli_num_rows($result);

  echo $num_rows . "<br>";
  while($row=mysqli_fetch_array($result))
  {
    echo "ID:" .$row["ID"]. "Name:" .$row["testname"]. "<br>";
  }
   
// Close the database connection
$conn->close();
?>

</body>
</html>