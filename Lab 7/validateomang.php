<!DOCTYPE html>
<html lang="en">

<body>
  <?php

    /**Author:Keletso Joy Ditlhotlhole
      StudentID:202002023
      CSI315 LAB 7
    **/

    //the variables for the OMANG Number
    //http://10.0.19.74/~dit02023/lab07/validateomang.php
    $ForenamesErr=$SurnameErr=$DateOfBirthErr=$PlaceOfBirthErr=$NationalityErr=$ColourOfEyesErr=$DateOfExpiryErr=$PlaceOfApplicationErr=$GenderErr=$IDNumberErr="";
    $Forenames=$Surname=$DateOfBirth=$PlaceOfBirth=$Nationality=$ColourOfEyes=$DateOfExpiry=$PlaceOfApplication=$Gender=$IDNumber="";

    //checking if the form details 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

    /**-VERIFY THAT THE USER DID NOT LEAVE ANY FIELD BLANK WHEN SUBMITTIING THE FORM. THE USER
     MUST BE PROMPTED TO ENTER THE MISSING DATA*/
     if (empty($_POST["Forenames"])) {
        $ForenamesErr = "Forenames are required";
      } else {
        $Forenames = test_input($_POST["Forenames"]);
      }

      if (empty($_POST["Surname"])) {
        $SurnameErr = "Surname is required";
      } else {
        $SurnameErr = test_input($_POST["Surname"]);
      }


      if (empty($_POST["DateOfBirth"])) {
        $DateOfBirthErr= "DateOfBirth is required";
      } else {
        $DateOfBirth = test_input($_POST["DateOfBirth"]);
      }

      if (empty($_POST["PlaceOfBirth"])) {
        $PlaceOfBirthErr = "PlaceOfBirth is required";
      } else {
        $PlaceOfBirth = test_input($_POST["PlaceOfBirth"]);
      }

      if (empty($_POST["Nationality"])) {
        $NationalityErr = "Nationality is required";
      } else {
        $Nationality = test_input($_POST["Nationality"]);
      }

      if (empty($_POST["ColourOfEyes"])) {
        $ColourOfEyesErr = "ColourOfEyes is required";
      } else {
        $ColourOfEyes = test_input($_POST["ColourOfEyes"]);
      }

      if (empty($_POST["DateOfExpiry"])) {
        $DateOfExpiryErr = "DateOfExpiry is required";
      } else {
        $DateOfExpiry = test_input($_POST["DateOfExpiry"]);
      }

      if (empty($_POST["PlaceOfApplication"])) {
        $PlaceOfApplicationErr = "PlaceOfApplication is required";
      } else {
        $PlaceOfApplication = test_input($_POST["PlaceOfApplication"]);
      }

      if (empty($_POST["Gender"])) {
        $GenderErr = "Gender is required";
      } else {
        $Gender = test_input($_POST["Gender"]);
      }

      if (empty($_POST["IDNumber"])) {
        $IDNumberErr = "IDNumber is required";
      } else {
        $IDNumber = test_input($_POST["IDNumber"]);
      }

    }

    //-VALIDATE AND SANITIZE ALL THE DATA RECIEVED
    
        //function for validating form data
        function test_input($data)
          {
            //Stripping unncessary characters(extra space,tab,newline) from the user  input data with trim() function
            $data=trim($data);

            //Removing backslashes(\) from the user input using the stripslahes() function
            $data=stripslashes($data);

            //passing all variables through PHPs htmlspecialchars() function for the code to be displayed
            $data=htmlspecialchars($data); 
            return $data;
         }

    //CHECK IF ID NUMBER IS COMPOSED OF EXACTLY 9 DIGITS AND STARTS WITH "0" FOR MALE AND "9" FOR FEMALE
       if (strlen($IDNumber) != 9 || ($Gender == "Male" && $IDNumber[0] != "0") || ($Gender == "Female" && $IDNumber[0] != "9")) 
        {
         echo "Please enter a valid ID number.";
        }


         // Display confirmation page with submitted data
  echo "Thank you for submitting the form. Here is your submitted data:<br>";
  echo "Forenames: " . $name . "<br>";
  echo "Surname: " . $surname . "<br>";
  echo "DateOfBirth: " . $DateOfBirth . "<br>";
  echo "PlaceOfBirth: " . $PlaceOfBirth . "<br>";
  echo "Nationality: " . $Nationality . "<br>";
  echo "ColourOfEyes: " . $ColourOfEyes . "<br>";
  echo "DateOfExpiry: " . $DateOfExpiry . "<br>";
  echo "PlaceOfApplication: " . $PlaceOfApplication . "<br>";
  echo "Gender: " . $Gender . "<br>";
  echo "IDNumber: " . $IDNumber . "<br>"; 

?>

      </body>
      </html>