<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['username'] == 'admin' && $_POST['password'] =='sandro') {

        $_SESSION['is_logged_in']= true;

       header("Location:index.php");

}else{
   die("Please enter correct credentials.");
}
}
?>


<h2>Login</h2>
<form method = post>
    <div>
        <label for = "username" >Username</label>
        <input type="text" name="username" id = "username" placeholder="Username">
    </div>
    <div>
        <label for = "password" >Password</label>
        <input type="password" name="password" id = "password" placeholder= "Enter passsword">
    </div>
    <button type="submit" name="login">Login</button>

</form>
<?php require 'includes/footer.php'; ?>