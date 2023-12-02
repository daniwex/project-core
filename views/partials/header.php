

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../../styles/screen.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="mobile">
        <div class="icon">
            <img src="../assets/banner.png" alt="fdf">
        </div>
        <div>
            <button class="open-btn"><i class="fas fa-bars"></i></button>
        </div>
    </nav>
    <div class="mobile-nav-container">
                <ul class="items-list">
                    <li><a href="./dashboard.php"><i class="fas fa-home pr"></i> Overview</a></li>
                    <?php if($to_register) print "<li><a href=./register_project.php><i class='fas fa-project-diagram pr'></i>Register project</a></li>"; else print" <li><a href=./project.php><i class='fas fa-edit pr'></i>project details</a></li>"  ?>
                    <li><a href="./available-seats.php"><i class="fas fa-info-circle pr"></i> More information</a></li>
                    <li><a href="./members.php"><i class="fas fa-user-friends pr"></i> Members</a></li>
                    <li><a href=""><i class="fas fa-bug pr"></i> Audit</a></li>
                    <li><a href=""><i class="fas fa-comments pr"></i>  Message</a></li>
                    <li><a href=""><i class="fas fa-wrench pr"></i>Settings</a></li>
                    <li><a href="../logout.php"><i class="fas fa-sign-out-alt pr"></i>log out</a></li>
                </ul>
        </div>


</body>
</html>