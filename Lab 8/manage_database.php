<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns= "http://www.w3.org/1999/xhtml">
    <head>
      <title>CSI315 Lab 8</title>
    </head>

    <body>
 

        <form action="register.php" method="post">
        <label> id:<input type="text" name="id"><br></label><br>

        <label>name:<input type="text" name="name"></label><br>
        
        <input type="submit" value="Submit">
        </form>


        <?php

           //database connection
           $servername="10.0.19.74";
           $username="dit02023";
           $password="dit02023";
           $dbname="db_dit02023";

           $conn=new mysqli($servername,$username,$password,$dbname);

           if($conn->connect_error)
           {
             die("Connection failed:" .$conn->connect_error);
           }

           echo "Connected sucessfully"<br/><br/>;

           $conn->close();

           

            //POPULATE THE TABLE TEST

           /** $sql="INSERT INTO test (id,name) VALUES(11,'Botlhe Botlhe')";

           * if($conn->query($sql)===TRUE)
           *{
           *   echo "New record created successfully";
           * }else{
           *     echo "Error:" .$sql."<br>".$conn->error; 
           *}**/

           //preparing and binding
           $stmt=$conn->prepare("INSERT INTO test (id,name) VALUES(?,?)");

           $stmt->bind_param("ss",$id,$name);

           //set parameters and execute
           $id=$my_id;
           $name=$my_name;

           if($stmt->execute())
           {
            echo("record inserted");
           }
           else{
                 echo "Error inserting record:". $stmt->error;
           }


           
            //UPDATE THE TABLE TEST
            $sql="UPDATE test SET name='Updated' WHERE id=4";

            if($conn->query($sql)===TRUE)
            {
                echo "Record updated successfully";
            }
            else{
                echo "Error updating record:".$conn->error;
            }

            $conn->close();




            //DELETE FROM THE TABLE TEST
            $sql="DELETE FROM test where id=2";

            if($conn->query($sql)===TRUE)
            {
                echo "Record deleted successfully";
            }
            else{
                echo "Error deleting record:".$conn->error;
            }

            $conn->close();




            //RETRIEVE RECORDS FROM THE TABLE 
            $search="Botlhe";

            $search=$conn->prepare("SELECT id,name FROM test where name=?");

            $name=$search;
            $result->execute();

            $result->bind_result($col1, $col2);

             while($result->fetch())
             {
                printf("%s %s\n",$col1,$col2);
             }
              
              $result->close(); //close the resultset



        ?>
    </body>
</html>