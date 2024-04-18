<?php 
ob_start(); 
require_once('config.php');
require_once("header.php");

$message = "";

if (isset($_SESSION['error'])) {
    $message = $_SESSION["error"];
    unset($_SESSION['error']);
}

?>

<?php if(!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>


<?php require_once("/footer.php"); ?>