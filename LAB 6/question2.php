<!DOCTYPE html>
<!-- NATASHA CHANDA
202105802
LAB 6 QUESTION 2-->
<html lang="en">
   <head>
   <title>WordCount</title>

     </head>
      
     <body>
        <h2>WordCount</h2>
        
        <?php
         // Function to count occurrences of each word in a given string
        function WordCount($str){
            
            $sentwords = str_word_count($str, 1);// divide the the string into words and count

            $count = array();//associative array

            foreach($sentwords as $word){
                // Convert word to lowercase
                strtolower($word); 
                
                if(isset($count[$word])){
                    $count[$word]++; // Incrementing the word count if the word is already a key in the array
                }

                else{
                    $count[$word] = 1; // Add the word to the array with a count of 1 if it's not already present
                }
            }
            return $count;

            
        }
        //Example of the sentences to count the words from
        $example = "She knew she had made her best friend happy, and she couldn't help but feel happy herself.She and her brother are always happy";
        // Get word counts using the WordCount function
        $result = wordCount($example);

        
        foreach($result as $word => $count) { //The word counts are printed
            echo "[$word] => $count<br>";
        }
        ?>
     </body>


    </html>
