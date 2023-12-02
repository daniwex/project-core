<?php
include('auth_user.php');
include('../database.php');
$current = $_SESSION['user'];
$query = "SELECT students.umid FROM register_students AS students JOIN (SELECT * FROM register_for_project) AS project ON project.umid=students.umid JOIN (SELECT * FROM timeslot) AS slot ON project.time_slot=slot.id WHERE students.umid='$current'";
$statement = $db->prepare($query);
$statement->execute();
$rows = $statement->rowCount();
$to_register = true;
if($rows > 0){
    $to_register = false;
}
?>