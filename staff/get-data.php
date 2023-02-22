
<?php include('../includes/config.php') ?>

<?php
//print_r($_POST);

$id_C = $_POST['Component'];

$query = mysqli_query($conn,"SELECT * FROM l4npd WHERE Component = '$id_C' ")or die(mysqli_error());
$desc = mysqli_fetch_array($query);

echo $desc['ComponentDesc'];

?>