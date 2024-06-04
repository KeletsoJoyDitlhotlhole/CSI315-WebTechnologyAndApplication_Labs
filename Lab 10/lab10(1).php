<!DOCTYPE html>
  <head>
    <title>CSI315 Lab 10</title>
    <meta charset="utf-8" author="Keletso Joy Ditlhotlhole-202002023" content="PHP Login System with Sessions">
  </head>

  <body>

               
        <!--ALLOW USERS TO LOGIN IF THEY ARE ALREADY REGISTERED USING USERNAME AND PASSWORD-->
        <h1>LOGIN SYSTEM</h1>
        <legend>LOGIN:</legend>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <label>Username:</label><br>
            <input type="text" name="username">
            <br><br>

            
            <label>Password:</label><br>
            <input type="password" name="password">
            <br><br>

            <input type="Submit" value="Login">
        </form>
        <hr>


        <!--ALLOW USERS TO REGISTER IF THE DON'T HAVE AN ACCOUNT-->
        <p>If you don't have an account, please register:</p>
        <h2>REGISTER:</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <legend>REGISTRATION:</legend>

            <label>Username:</label><br>
            <input type="text" name="Rusername">
            <br><br>

            
            <label>Password:</label><br>
            <input type="password" name="Rpassword">
            <br><br>

            <input type="Submit" value="Register">
        </form>

         <?php

            $servername="10.0.19.74";
            $username="dit02023";
            $password="dit02023";
            $dbname="db_dit02023";

            $conn=new mysqli($servername,$username,$password,$dbname);

            if($conn->connect_error)
            {
              die("Connection failed:" .$conn->connect_error);
            }




             //ALLOW USERS TO REGISTER IF THE DON'T HAVE AN ACCOUNT
            if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["Rusername"]))
            {
              $username=$_POST["Rusername"];
              $password=$_POST["Rpassword"];

              $stmt=$conn->prepare("INSERT INTO Login(username,_password) VALUES(?,?)");

              if($stmt)
              {
                $stmt->bind_param("ss",$username,$password);

                if($stmt->execute())
                {
                  echo "You have successfully registered"."" .$username;
                }
                else{
                   echo "Error-Couldn't register:" .$stmt->error;
                }
              }
              else{
                echo "Error:" .$conn->error;
              }
            }


            //ALLOW USERS TO LOGIN IF THEY ARE ALREADY REGISTERED USING USERNAME AND PASSWORD
            if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["username"]) && !empty($_POST["password"]))
            {
               $username=$_POST["username"];
               $password=$_POST["password"];

                $stmt=$conn->prepare("SELECT * FROM Login WHERE username=? AND _password=?");
                $stmt->bind_param("ss",$username,$password);
                $stmt->execute();
                 
                $result=$stmt->get_result();

                $num_rows=$result->num_rows;

                //echo $num_rows;

                if ($num_rows == 1) {
                  header("Location: http://10.0.19.74/~dit02023/lab08/manage_database.php");
                  exit;
              } else {

                  echo "<br><br>INVALID LOGIN DETAILS!!!!!";
              }              
                $stmt->close();
            }

        ?>

       

        <!--MANAGE USER LOGIN STATE WITH SESSIONS-->


        <!--LOGOUT TO TERMINATE THE SESSION-->


      </body>
<html>