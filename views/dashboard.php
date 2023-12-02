<?php  
include('./model/auth_project.php');
include('./partials/header.php');
if( isset($_SESSION['message'])){
    $message = $_SESSION['message'];
}
unset($_SESSION['message']);
?>


<!DOCTYPE html>
<html lang="en">
<body> 
    <div class="dashboard-container">
        <div class="column column1">
                <ul class="items-list">
                    <li><a class="active" href=""><i class="fas fa-home pr"></i> Overview</a></li>
                    <?php if($to_register) print "<li><a href=./register_project.php><i class='fas fa-project-diagram pr'></i>Register project</a></li>"; else print" <li><a href=./project.php><i class='fas fa-edit pr'></i>project details</a></li>"  ?>
                    <li><a href="./available-seats.php"><i class="fas fa-info-circle pr"></i> More information</a></li>
                    <li><a href="./members.php"><i class="fas fa-user-friends pr"></i> Members</a></li>
                    <li><a href=""><i class="fas fa-bug pr"></i> Audit</a></li>
                    <li><a href=""><i class="fas fa-comments pr"></i> Message</a></li>
                    <li><a href=""><i class="fas fa-wrench pr"></i>Settings</a></li>
                    <li><a href="../logout.php"><i class="fas fa-sign-out-alt pr"></i>log out</a></li>
                </ul>

        </div>
        <div class="column column2">
            <div class="course-container">
                <?php if(isset($message)) print "<div class='success'>$message <button class=btn><i class='fas close-btn fa-times'></i></button></div>" ?>
                    <h2>CIS 525</h2>
            </div>
            <div class="project-overview">
                <span>Project 3</span>
                <p>
                There are approximately 36 students in the web technology class. The students will demonstrate
                their projects at six different one-hour long time slots. Up to 6 students can give their
                demonstrations in a given time slot. The professor decides to have a registration webpage to
                allow students to sign up for one of the time slots. A student visiting the page should be able to
                submit his/her UMID, first name, last name, project title, email address, phone number, and book
                a seat in one of the available time slots. A student is uniquely identified by his/her UMID.
                The submitted data should be stored in a MySQL or MariaDB database which is maintained on a
                server. The webpage and the server should interact with each other at every step of the
                registration process.</p><br>
                <p style="padding-top:10px"> The page should show how many free seats are available in each time slot,
                announcing and blocking all fully booked time slots. After a student makes a data submission, it
                should check whether the student has been already registered. If not, the data is stored on the
                server and the student is notified about her registration. Otherwise, if already registered, the
                student should be prompted to ensure that she wants to change her registration to the new section
                (and removed from the current one she is registered for). For example, the time slots may look
                like the following list:
                1. 12/5/23, 6:00 PM – 7:00 PM, 6 seats remaining
                2. 12/5/23, 7:00 PM – 8:00 PM, 5 seats remaining
                3. 12/5/23, 8:00 PM – 9:00 PM, 3 seats remaining
                4. 12/6/23, 6:00 PM – 7:00 PM, 2 seats remaining
                5. 12/6/23, 7:00 PM – 8:00 PM, 4 seats remaining
                6. 12/6/23, 8:00 PM – 9:00 PM, 0 seats remaining
                In addition, you need to write a separate webpage that will display the list of students (including
                their UMIDs, names, project titles, email addresses, phone numbers, and time slots) who are
                registered, after querying the database.
                </p>
            </div>
        </div>
     </div>

<script>
let btnContainer = document.querySelector('.success');
let closeBtn = document.querySelector('.close-btn');
console.log(btnContainer,closeBtn)
closeBtn.addEventListener('click',(e)=>{
    btnContainer.style.display = 'none';
})
</script>
</body>
</html>