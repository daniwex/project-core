<?php   
  include('../database.php');
  include('./model/auth_project.php');
  include('./partials/header.php');
  $query = "SELECT * FROM timeslot JOIN (SELECT * FROM register_for_project) AS student on student.time_slot=timeslot.id WHERE student.umid='$current'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll()[0];

  $category = $result['time_slot'];
  $query2 = "SELECT * FROM register_for_project AS project JOIN (SELECT * FROM register_students) AS students ON project.umid=students.umid WHERE project.time_slot='$category' ORDER BY students.first_name DESC";
  $statement2 = $db->prepare($query2);
  $statement2->execute();
  $result2 = $statement2->fetchAll();

  $query3 = "SELECT * FROM timeslot";
  $statement3 = $db->prepare($query3);
  $statement3->execute();
  $result3 = $statement3->fetchAll();

  ?>


<!DOCTYPE html>
<html lang="en">
<body>
    <div class="dashboard-container">
        <div class="column column1">
                <ul class="items-list">
                    <li><a href="./dashboard.php"><i class="fas fa-home pr"></i> Overview</a></li>
                    <li><a class="active" href=""><i class='fas fa-edit pr'></i>project details</a></li>
                    <li><a href="./available-seats.php"><i class="fas fa-info-circle pr"></i> More information</a></li>
                    <li><a href="./members.php"><i class="fas fa-user-friends pr"></i> Members</a></li>
                    <li><a href=""><i class="fas fa-bug pr"></i> Audit</a></li>
                    <li><a href=""><i class="fas fa-comments pr"></i>  Message</a></li>
                    <li><a href=""><i class="fas fa-wrench pr"></i>Settings</a></li>
                    <li><a href="../logout.php"><i class="fas fa-sign-out-alt pr"></i>log out</a></li>
                </ul>
        </div>
        <div class="column column2">
            <div class="projects-container">
                <div class="project-view">
                    <div class="d-flex justify-content-between">
                        Current Project
                        <select name="update-choice" id="">
                            <option value="Leave">Dark mode</option>
                            <option value="Leave">Light mode</option>
                        </select>
                    </div>
                    <div class="project-contain">
                         <form action="./model/handle_action.php" style="margin-top:10px" method="POST">
                            <div class="form-control">
                                <label for="title"></label>
                                <input type="text" name="title" value="<?php echo $result['project_title'] ?>">
                            </div>
                            <div class="form-control mt">
                                <select name="slot" id="">
                                    <?php foreach($result3 as $slot) : ?>
                                        <option <?php if($slot['value'] == 0 ) echo 'disabled' ?> <?php if($result['time'] == $slot['time']) echo "selected" ?> value="<?php echo $slot['id'] ?>"><?php echo $slot['time'] ?></option>
                                    <?php endforeach ?>                                 
                                </select>
                            </div>
                            <input id="submit" type="submit" value="Update" name="update">
                            <input type="submit" value="Delete" name="delete">
                         </form>
                    </div>
                </div>
                <div class="members-view">
                    <h3>Members</h3>
                            <?php foreach ($result2 as $members) : ?>
                                <?php  
                                    $name = $members['first_name'] .' '.$members['last_name'];
                                ?>
                                <div class="members-container-custom">
                                    <span><?php if($current == $members['umid']) echo 'You'; else echo $name ?></span>
                                   <div> <?php echo $members['project_title'] ?></div>
                               </div>
                            <?php endforeach ?>
                </div>
            </div>
            <div class="d-flex" style="margin-top:10px">
                        <div class="inner-columns-1">
                            <div>
                                <span>Total Projects</span>
                                <br>
                                <span><?php echo rand(1000,5000).'k'  ?></span>
                                <span>ongoing</span>
                            </div>
                            <div>
                                <span>Completed Projects</span>
                                <br>
                                <span><?php echo rand(1000,1200).'k'  ?></span>
                                <span>new</span>
                            </div>
                        </div>
                        <div class="inner-columns-2">
                                <span><?php echo rand(200,500). 'k'  ?> views</span>
                        </div>
            </div>
        </div>

    </div>

<script>
    let input = document.getElementsByTagName('select')[1];
    let input1 = document.getElementsByTagName('input')[0];
    let submit = document.getElementById('submit');
    input.addEventListener('change',()=>{
        submit.classList.remove('hidden');
    })
    input1.addEventListener('change',()=>{
        submit.classList.remove('hidden');
    })
</script>
</body>
</html>