<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
    header("location: index.php");
}
if(isset($_REQUEST['submit'])){
    extract($_REQUEST);
    $login = $user->check_login($useremail,$password);
    if($login){
        header("location: index.php");
    }else{
        ?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHqTFOYb9KwpgvXgh+2XtOeV9fXRo7zhSg1mUFIhHNCi0F4JPCITDV4mjgyERXyLq9cn/tRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="brand-block">
    <h2>Basura</h2>
</div>
<body class="login-body">
<div id="login-block">
    <h3> Login</h3>
    <form method="POST" action="" name="login">
    <div>
        <input type="email" class="input" required name="useremail" placeholder="Valid E-mail"/>
    </div>
    <div>
        <input type="password" class="input" required name="password" placeholder="Password"/>
    </div>
    <div>
        <input type="submit" name="submit" value="Submit"/>
    </div>
    <p class="a">Don't have an account? <a class="a" href="registration.php">Sign up</a></p>
    </form>
    <div class="social-login">
        <button class="twitter-button">
            <i class="fab fa-twitter"></i> Sign in with Twitter
        </button>
    </div>
</div>

</body>

<script>
window.addEventListener('DOMContentLoaded', (event) => {
    const errorNotif = document.getElementById('error_notif');
    if(errorNotif) {
        setTimeout(() => {
            errorNotif.style.display = 'none';
        }, 1000); 
    }
});
</script>

<style>
/* Add some basic styling for the Twitter button */
.twitter-button {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #1DA1F2;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    width: 80%;
}
.twitter-button i {
    margin-right: 10px;
}
.twitter-button:hover {
    background-color: #0d8ddb;
}
</style>

</html>
