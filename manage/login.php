<?php
    session_start();
    include_once "controller/user.php";
    
    if(isset($_POST['loginx'])){
        
        $username = addslashes($_POST['adminname']);
        $password = addslashes($_POST['passwd']);

        $userlogin = new Userinfo;
        if($userlogin->checkuser($username,$password)){
            header('location:login.php?error='.$userlogin->checkuser($username,$password));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login : RealtimeCVs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body class="login">
    <div class="logobx">
        <a href="index.php"><img src="assets/images/logo.svg" alt="Realtime CVs"></a>
    </div>
    <div class="container12">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="loginbx">
                    <h3 class="aligncenter">Admin Login</h3>
                    <?php
                        if(isset($_GET['error'])){
                            echo "<div class='error-red'>". $_GET['error'] ."</div>";
                        }
                        if(isset($_GET['success'])){
                            echo "<div class='success-green'>". $_GET['success'] ."</div>";
                        }
                    ?>
                    <form action="" class="contactForm" method="POST">
                        <label for="adminname">Username:</label><br />
                        <input type="text" name="adminname" id="adminname" required /><br />
                        <label for="passwd">Password:</label><br />
                        <input type="password" name="passwd" id="passwd" required /><i class="fa-solid fa-eye" id="togglePassword"></i><br />
                        <input type="submit" class="submit" name="loginx" value="Login" />
                    </form>
                    <footer> 
                        <article>
                            <div class="copy">&copy;2022 Open Talent Africa | Developed by <a heref="danneconsult.com" target="_new">Danne Consult Ltd</a></div>
                        </article>
                    </footer> 
                </div>
            </div>
        </div>
    </div>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#passwd");
        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye-slash");
        });
    </script>
</body>
</html>