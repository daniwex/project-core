<?php
include('auth_user.php');
include('../../database.php');
$current = $_SESSION['user'];
$message = '';

if($_POST["delete"]) {

    $sql = "SELECT * FROM register_for_project WHERE umid='$current'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll()[0];
    $statement->closeCursor();
    
    $id = (int)$result['time_slot'];
    
    $query = "DELETE FROM register_for_project WHERE umid='$current'";
    $statement1 = $db->prepare($query);
    $statement1->execute();
    $statement1->closeCursor();
    
    $query2 = "UPDATE timeslot SET value=value+1 WHERE id = $id ";
    $statement2 = $db->prepare($query2);
    $statement2->execute();
    $statement2->closeCursor();
    $message = 'project successfully deleted';
    $_SESSION['message'] = $message;
    header('location:../dashboard.php');
}
if($_POST["update"]) {

    $query = "SELECT * FROM timeslot JOIN (SELECT * FROM register_for_project) AS project ON timeslot.id=project.time_slot  WHERE umid='$current'" ;
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll()[0];
    $statement->closeCursor();
    
    $project_title = filter_input(INPUT_POST, 'title');
    $slot = filter_input(INPUT_POST, 'slot');

    if($project_title != $result['project_title']){
        $query2 = "UPDATE register_for_project SET project_title='$project_title' WHERE  umid='$current'";
        $statement2 = $db->prepare($query2);
        $statement2->execute();
        $statement2->closeCursor();
    }
    if($slot != $result['id']){
        $query2 = "UPDATE register_for_project SET time_slot='$slot' WHERE  umid='$current'";
        $statement2 = $db->prepare($query2);
        $statement2->execute();
        $statement2->closeCursor();
        $id = (int)$result['id'];

        $query3 = "UPDATE timeslot SET value=value+1 WHERE id=$id";
        $statement3 = $db->prepare($query3);
        $statement3->execute();
        $statement3->closeCursor();

        $query4 = "UPDATE timeslot SET value=value-1 WHERE id=$slot";
        $statement4 = $db->prepare($query4);
        $statement4->execute();
        $statement4->closeCursor();
    }
    $message = 'project successfully updated';
    $_SESSION['message'] = $message;
    header('location:../dashboard.php');
}




?>