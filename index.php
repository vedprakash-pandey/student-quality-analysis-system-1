<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/loginpage.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <div class="bgcolor">

        <div class="topnav">
            <img src="img/raitlogo.png" style="margin-left: 15px; margin-top: 10px;">
            <label style="font-weight:bold;color:black;font-size:30px"> Student Progress Monitoring System <br> in Academic Institution</label>
        </div>

        <div class="container">
            <div class="img">
                <img src="img/bg.svg">
            </div>
            <div class="login-content">
                <form action="validate.php" method="post">
                    <img src="img/avatar.svg">

                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5 style="color:gray;font-weight:bold">Username</h5>
                            <input type="text" class="input" name="user" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5 style="color:gray;font-weight:bold">Password</h5>
                            <input type="password" class="input" name="pass" autocomplete="off" required>
                        </div>
                    </div>
                    <a href="#" style="color:gray;">Forgot Password?</a>
                    <input type="submit" class="btn" value="Login">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>