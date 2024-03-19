<!--By:KELETSO JOY DITLHOTLHOLE
    Student ID: 202002023
    LAB CSI315 SESSION 1100-1300
    QUESTION 2-->

<!DOCTYPE html>
<html>
     <head>
            <title>CSI315 Lab 1</title>
            <meta charset="utf-8">
     </head>

     <body>
          <?php
                
                  /** 2.	Write a function wordCount($str) that takes a string and finds the number of times 
                  *each word occurs. Hint: Create an associative array mapping word keys to the number 
                  *of times they occur. Write code to generate a webpage that displays the word count
                  */

                 function wordCount($str)
                 {
 
                  //diving the string and counting the words
                   $stringDivision=str_word_count($str,1);
                   
                   //the associative array mapping word keys to the number of times they occur
                   $stringCount=array(); 

                   //


                  }


                  $var= wordCount("Joy");

                  echo ($var[1]);

                 
           ?>
     </body>
</html>
