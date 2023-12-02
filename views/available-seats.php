<?php   
  include('../database.php');
  include('./model/auth_project.php');
  include('./partials/header.php');
  $sql = 'SELECT * FROM timeslot';
  $statement = $db->prepare($sql);
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
                    <li><a class="active" href="./available-seats.php"><i class="fas fa-info-circle pr"></i> More information</a></li>
                    <li><a href="./members.php"><i class="fas fa-user-friends pr"></i> Members</a></li>
                    <li><a href=""><i class="fas fa-bug pr"></i> Audit</a></li>
                    <li><a href=""><i class="fas fa-comments pr"></i>  Message</a></li>
                    <li><a href=""><i class="fas fa-wrench pr"></i>Settings</a></li>
                    <li><a href="../logout.php"><i class="fas fa-sign-out-alt pr"></i>log out</a></li>
                </ul>
        </div>
        <div class="column column2">
            <div class="course-container">
                    <h2>Available seats</h2>
            </div>
            <table class="available">
                <tbody>
                    <?php foreach ($result as $item) : ?>
                        <tr>
                            <td><?php echo $item['time'] ?></td>
                            <td><?php echo $item['value'] ?></td>
                            <td><?php if($item['value'] !== 0) print"<span style='color:green'>Open</span>"; else print "<span style='color:red'>Closed</span>"?> </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
  
</body>
</html>