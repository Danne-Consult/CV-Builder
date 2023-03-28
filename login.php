<?php 
    session_start();
    if(isset($_SESSION['userid'])){
        header('location:home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Realtime CVs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body class="login">
    <div class="logobx">
        <a href="index.php"><img src="assets/images/logo.svg" alt="Realtime CVs"></a>
    </div>
    <div class="container12 loginflex">
            <div class="loginbx">
                <div class="logform">
                    <h3 class="aligncenter">login</h3><br />
                    <?php
                        if(isset($_GET['error'])){
                            echo "<div class='error-red'>". $_GET['error'] ."</div>";
                        }
                    ?>
                    <form action="controller/login.php" method="POST" class="contactForm loginform">
                        <input type="hidden" name="location" value="<?php if(isset($_GET['location'])){ echo htmlspecialchars($_GET['location']);} ?>">
                        <label for="username">Email:</label><br />
                        <input type="email" name="username" id="username" required /><br />
                        <label for="password">Password:</label><br />
                        <input type="password" name="passx" id="passx" required /><i class="fa-solid fa-eye" id="togglePassword"></i><br />
                        <input type="submit" class="submit" name="loginx" value="Login" />
                    </form>
                    <p><a href="passrecover.php">Forgot password</a></p>
                    <p><a href="signup.php">Create an account</a></p>
                </div>
                <?php include "includes/footer.inc"; ?>
            </div>
    </div>

</body>
<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#passx");


    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("fa-eye-slash");
    });
</script>
</html>