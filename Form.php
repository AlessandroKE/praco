<?php 
/*
if($_SERVER["REQUEST_METHOD"] == "POST"){
var_dump($_POST);
}
*/
//For getting things such as search results use GET method.
// For sensitive data use POST method.

/*You can submit your form in the same page this allows user to 
orrect areas where they have made mistakes in filling the form.*/

?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<form method = POST action = process_form.php >
    <select name = "models">
        <optgroup label = Germany>
        <option value = BMW>BMW</option>
        <option value = MERCEDES>MERCEDES</option>
        </optgroup>
        <optgroup label = USA>
        <option value = FORD_RANGER selected>FORD RANGER</option>
        <option value = LAND_ROVER >LAND ROVER</option>
        </optgroup>
    </select>
<input type="text" name="username" placeholder="Enter your username" autofocus>
<input type="password" name="password" placeholder="Enter your password" required>
Content: <textarea name = content> PHP GURU ALESSANDRO </textarea>
<button value="Submit">Submit</button>
<div>
    <label><input type = "checkbox" name = "terms" value="yes" required>I agree to terms</label>
    <label><input type = "checkbox" name = "colours[]" value="Green">Green</label>
    <label><input type = "checkbox" name = "colours[]" value="red">Red</label>
    <label><input type = "checkbox" name = "colours[]" value="blue">Blue</label>


</div>

<div>
    <input type="radio" name = "colours" value="Green">Green<br>
    <input type="radio" name = "colours" value="Blue">Blue<br>
</div>

<!-- When we want to select only one option in the checkboxes we use radio buttons -->

<!-- Common form controls  available in HTML: Readonly, disabled and autofocus. They are used by adding.... example:
<input type="text" name="username" placeholder="Enter your username" readonly> --> 

<!-- Disabled option can be used to: Example: When you want to deny acess of certain services to some countries-->

</form>

</body>
</html> 
