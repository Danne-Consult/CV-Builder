<?php include "controller/sessioncheck.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home : Realtime CVs</title>

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
    <div class="container12 intro">
        <article>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="cap">
                        <h1>Showcase your skills and talents</h1>
                        <p>Create, update, format and align cover letters and curriculum vitae to new opportunities</p>
                    </div>
                    <img src="assets/images/typing-bro.png" class="introimg" alt="">
                </div>
            </div>
           
        </article>
    </div>
    <div class="container12 dash">
        <article>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <h3>My CVs</h3>
                    <div class="mybxs">CV - Created on 12 june 2022</div>
                    <p class="alignright"><a class="rounded-white-btn" href="cv.php">Create CV</a></p>
                </div>
                <div class="col-lg-5 offset-1">
                    <h3>My Cover Letters</h3>
                    <div class="mybxs">Cover Letter - Created on 12 june 2022</div>
                    <p class="alignright"><a class="rounded-white-btn" href="coverletter.php">Create Cover Letter</a></p>
                </div>
            </div>
        </article>
    </div>
    
    <?php include "includes/footer.inc"; ?>
    
</body>
</html>