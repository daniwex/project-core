<?php
include('auth_user.php');
include('../../database.php');
$current = $_SESSION['user'];
$project_title = filter_input(INPUT_POST, 'title');
$slot = filter_input(INPUT_POST, 'slot');

$query = "INSERT INTO register_for_project VALUES(:umid,:project_title,:slot)";
$query1 = "UPDATE timeslot SET value=value-1 WHERE id=$slot";

$statement = $db->prepare($query);
$statement->bindValue(':umid', $current);
$statement->bindValue(':project_title', $project_title);
$statement->bindValue(':slot', $slot);
$statement->execute();
$statement->closeCursor();

$statement1 = $db->prepare($query1);
$statement1->execute();
$statement1->closeCursor();
session_start();
$_SESSION['message'] = "Project created successfully";
header('location:../dashboard.php');


?>