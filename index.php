 <?php 
include './database.php';
session_start();
if( isset($_SESSION['message'])){
    $message = $_SESSION['message'];
}
function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $umid = test_input($_POST['umid']);
    $password = test_input($_POST['password']);
    $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
    $query = "SELECT * FROM register_students AS students WHERE students.umid='$umid'";
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->rowCount();
    $passRecord = $statement->fetch(PDO::FETCH_ASSOC);
    if($rows > 0){
        if(password_verify($password,$passRecord['password'])){
            session_start();
            $_SESSION['auth'] = 'true';
            $_SESSION['user'] = $umid;
            header('location:./views/dashboard.php');
        }
        else{
            $error = "Invalid umid or password, please try again";
        }
    }
    else{
        $error = "Invalid umid or password, please try again";
    }

}
unset($_SESSION['message']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="./style.css"> 
    <link rel="stylesheet" href="./styles/screen.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>uom project-core</title>
</head>
<body>
    <div class="container">
        <h1>
            <img src="./assets/project.png" alt="">
            <span>Uom</span>
            Project-core
        </h1>
    </div>
    <div class="login-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <?php if(isset($message)) print "<div class='success'> $message <button class=btn><i class='fas close-btn fa-times'></i></button></div>"?>
        <span class="error"><?php if(isset($error)) echo $error ?></span>
            <div class="input-control">
                <label for="umid">UMID</label>
                <input type="text" name="umid" id="" required>
            </div>
            <div class="input-control">
                <label for="name">Password</label>
                <input type="password" name="password" id="" required>
            </div>
            <button type="submit">Log in</button>
            <span style="font-size:smaller">do not have an account? <a href="./register.php">register here</a</span>
        </form>
    </div>
<script>
let btnContainer = document.querySelector('.success');
let closeBtn = document.querySelector('.close-btn');
closeBtn.addEventListener('click',()=>{
    btnContainer.style.display = 'none';
})
</script>
</body>
</html>
