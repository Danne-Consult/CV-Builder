<?php include "controller/sessioncheck.php"; ?>
<?php include "manage/_db/dbconf.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile : Realtime CVs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body class="inner">
    <?php include "includes/nav/innerheader.inc"; ?>
    <div class="container12">
        <article>
            
            
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <?php
                            $db = new DBconnect;
                            $prefix = $db->prefix;
                            $user=$_SESSION['userid'];
                            $sql="SELECT * FROM ".$prefix."users WHERE usercode='$user'";
                            $result= $db->conn->query($sql);
                            $rws = $result->fetch_array();
                            $createddate = $db->convertdate($rws['createdon']);
                        ?>
                        <h3>User: <?php echo $rws['fname']." ".$rws['lname']; ?></h3>
                        <p><b>Email:</b> <?php echo $rws['email']; ?><br />
                        <b>User ID:</b> <?php echo $rws['usercode']; ?><br />
                        <b>Joined on:</b> <?php echo $createddate; ?></p>
                    </div>
                    <div class="col-md-5 minheight76">
                        <h3>Change Password</h3>
                        <?php
                        if(isset($_GET['error'])){
                            echo "<div class='error-red'>". $_GET['error'] ."</div>";
                        }
                        if(isset($_GET['success'])){
                            echo "<div class='success-green'>". $_GET['success'] ."</div>";
                        }
                        ?>
                        <form action="controller/passchange.php" class="contactForm" method="POST">
                            <input type="hidden" name="userrec" value="<?php echo $_SESSION['userid'] ?>">    
                            <label for="">Enter current password</label><br />
                            <input type="password" id="oldpass" name="oldpass" required /><i class="fa-solid fa-eye" id="togglePassword"></i><br />

                            <label for="">Enter new password</label><br />
                            <input type="password" id="newpass" name="newpass" required /><i class="fa-solid fa-eye" id="togglePassword1"></i><br />
                    
                            <label for="">re-type new password</label><br />
                            <input type="password" id="repass" name="retypepass" required /><i class="fa-solid fa-eye" id="togglePassword2"></i><br />
                            <br />
                            <input type="submit" name="passchange" class="submit" value="Change Password">
                        </form>
                    </div>
                </div>
            
        </article>
    </div>
    
    <?php include "includes/footer.inc"; ?>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const oldpass = document.querySelector("#oldpass");

        const togglePassword1 = document.querySelector("#togglePassword1");
        const newpass = document.querySelector("#newpass");

        const togglePassword2 = document.querySelector("#togglePassword2");
        const repass = document.querySelector("#repass");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = oldpass.getAttribute("type") === "password" ? "text" : "password";
            oldpass.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye-slash");
        });

        togglePassword1.addEventListener("click", function () {
            // toggle the type attribute
            const type = newpass.getAttribute("type") === "password" ? "text" : "password";
            newpass.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye-slash");
        });

        togglePassword2.addEventListener("click", function () {
            // toggle the type attribute
            const type = repass.getAttribute("type") === "password" ? "text" : "password";
            repass.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye-slash");
        });
      
    </script>
    
</body>
</html>