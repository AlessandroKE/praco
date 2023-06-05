<?

session_start();
// Session are stored in super global variables $_SESSION.
if (isset($_SESSION['count'])) {

    $_SESSION['count']++;

} else {

    $_SESSION['count'] = 1;

}

var_dump($_SESSION['count']);

?>

