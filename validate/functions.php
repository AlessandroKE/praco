<?php
//we can also pass arguments inside the brackets.They are separated by commas.

//When an argument is passed you need to pass the values inside the brackets.
//Functions can be named in any style in php, in our case we have used the Camel Case naming style.
//In OOP there is a standard for naming functions in PHP.
function getMessage($image){
if($image){
    return "image inserted successfully";
} else{
    return "image not found";
}

}
//Variables decalred within a function are not acessed outside of the function, we need a return statement followed by the value we want to return..
$message = getMessage(true);
echo "$message";
?>

