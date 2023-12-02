<?php   
  include('../database.php');  
  include('./model/auth_project.php');
  include('./partials/header.php');
  $quey = 'SELECT * FROM timeslot join (select * from register_for_project) as projects on projects.time_slot=timeslot.id join (SELECT * FROM register_students) as students on students.umid=projects.umid ';
  $statement = $db->prepare($quey);
  $statement->execute();
  $result = $statement->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<body>
    <div class="dashboard-container">
        <div class="column column1">
             <ul class="items-list">
                    <li><a href="./dashboard.php"><i class="fas fa-home pr"></i> Overview</a></li>
                    <?php if($to_register) print "<li><a href=./register_project.php><i class='fas fa-project-diagram pr'></i>Register project</a></li>"; else print" <li><a href=./project.php><i class='fas fa-edit pr'></i>project details</a></li>"  ?>
                    <li><a href="./available-seats.php"><i class="fas fa-info-circle pr"></i> More information</a></li>
                    <li><a class="active"><i class="fas fa-user-friends pr"></i> Members</a></li>
                    <li><a href=""><i class="fas fa-bug pr"></i> Audit</a></li>
                    <li><a href=""><i class="fas fa-comments pr"></i> Message</a></li>
                    <li><a href=""><i class="fas fa-wrench pr"></i>Settings</a></li>
                    <li><a href="../logout.php"><i class="fas fa-sign-out-alt pr"></i>log out</a></li>
            </ul>
        </div>
        <div class="column column2">
        <div class="course-container">
                <h2>Members</h2>
                 <table class="members-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Time slot</th>
                                <th>UMID</th>
                                <th>Project title</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                            </tr>
                            </thead
                            <tbody>
                            <?php foreach($result as $count => $members) : ?>
                                <?php  
                                    $name = $members['first_name'] .' '.$members['last_name'];
                                ?>
                                <tr <?php if($current == $members['umid']) print "style='background-color:#00274c;color:white'"?>>
                                    <td><?php echo $count+1 ?></td>
                                    <td><?php echo $name?></td>
                                    <td><?php echo $members['time'] ?></td>
                                    <td><?php echo $members['umid'] ?></td>
                                    <td><?php echo $members['project_title'] ?></td>
                                    <td><?php echo $members['phone'] ?></td>
                                    <td><?php echo $members['email'] ?></td>
                                </tr>
                            <?php endforeach?>    
                            </tbody>                
                    </table> 
        </div>
    </div>
</body>
</html>