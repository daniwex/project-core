<?php   
  include('./model/auth_project.php');
  include('./partials/header.php');
  $query = "SELECT * FROM timeslot";
  $statement = $db->prepare($query);
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
                    <li><a class="active" href=""><i class='fas fa-project-diagram pr'></i> Register project</a></li>
                    <li><a href="./available-seats.php"><i class="fas fa-info-circle pr"></i> More information</a></li>
                    <li><a href="./members.php"><i class="fas fa-user-friends pr"></i> Members</a></li>
                    <li><a href=""><i class="fas fa-bug pr"></i> Audit</a></li>
                    <li><a href=""><i class="fas fa-comments pr"></i>  Message</a></li>
                    <li><a href=""><i class="fas fa-wrench pr"></i>Settings</a></li>
                    <li><a href="../logout.php"><i class="fas fa-sign-out-alt pr"></i>log out</a></li>
                </ul>
        </div>
        <div class="column column2">
            <div class="project-container">
                <form action="./model/auth_register.php" method="POST">
                    <div class="form-control d-flex">
                        <div class="item-custom">
                            <label for="title">Project title</label>
                            <input class="mt" required type="text" name="title" id="">
                        </div>
                        <div class="item-custom">
                            <label for="slot">Select available slot</label>
                            <select required class="mt" name="slot" id="">
                                <?php foreach($result as $slot) : ?>
                                    <option <?php if( $slot['value'] == '0') echo 'disabled' ?> value="<?php echo $slot['id'] ?>"><?php echo $slot['time'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-control mt">
                        <label for="description">Project description</label>
                        <textarea class="mt" name="desctiption" id=""></textarea>
                    </div>
                    <input type="submit" value="Register">
                </form>
            </div>
        </div>

    </div>
  
</body>
</html>