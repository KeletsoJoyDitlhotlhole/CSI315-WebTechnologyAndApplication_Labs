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

                  //the string to be used to test
                  $string="Database Systems and Operating Systems";

                 function wordCount($str)
                 {
 
                  //diving the string and counting the words
                   $stringDivision=str_word_count($str,1);
                   
                   //the associative array mapping word keys to the number of times they occur
                   $stringCount=array(); 

                   //foreach loop to count and map the word keys to the number of times they occur
                   foreach($stringDivision as $word){

                    strtolower($word); //lowercase the word
                    
                    if(isset($stringCount[$word])){
                        $stringCount[$word]++; // Incrementing the word count if the word is already a key in the array
                    }
    
                    else{
                        $stringCount[$word] = 1; // Add the word to the array with a count of 1 if it's not already present
                    }
                }
                return $stringCount;
    
                
            }

            $output = wordCount($string); //function call for the string
    
            
            foreach($output as $word => $count) { //The word counts are printed
                echo "The word $word  appears  $count times <br>";
            }
            ?>
     </body>
</html>
