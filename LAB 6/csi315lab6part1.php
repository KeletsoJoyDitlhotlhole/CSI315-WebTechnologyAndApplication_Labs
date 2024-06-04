<!--By:KELETSO JOY DITLHOTLHOLE
    Student ID: 202002023
    LAB CSI315 SESSION 1100-1300
    QUESTION 1-->

<!DOCTYPE html>
<html>

     <head>
            <title>CSI315 Lab 1</title>
            <meta charset="utf-8" >
     </head>

     <body>
          <?php
                /**1.	Write a function rollaDice() that returns true if the number generated is <4 and false if 
                 * the number generated is less than 7. Write code to generate a webpage that displays 
                “You have lost” or “You have won” using the function.
                **/

                //since it's a dice, it has to generate a random number
                $value=rand(1,6);

                function rolladice()
                {
                   if ($value < 4) //returns true if the value is less than 4
                     {
                      return true;
                      }
                   else             //anything else means it's less than
                      {
                       return false;
                       }
                 }
                 
               
                 echo "The dice number is:";
                 echo ($value);

                 //FUNCTION CALL
                 if (rolladice())
                   {
                    echo "You have won";//if the it is true
                    }
                 else
                    {
                     echo "You have lost"; //if it false
                     }
                 
           ?>
     </body>
</html>
