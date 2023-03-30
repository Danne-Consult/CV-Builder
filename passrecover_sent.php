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
    <title>Recover Password - Realtime CVs</title>

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
                <div class="logform" style="min-height:300px">
                    <h3 class="aligncenter">Recover Password</h3><br />
                    <p>Check your email and click on the link to change your password.</p>
                </div>
                <?php include "includes/footer.inc"; ?>
            </div>
    </div>

</body>
</html>