<?php include "manage/_db/dbconf.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Plans: Realtime CVs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/flexslider.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body class="inner">
    <?php include "includes/nav/header.inc"; ?>
    <div class="container12 whybar">
    <h2 class="aligncenter">Payment Plans</h2>
        <article>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                <p class="aligncenter">Quickly create and download your resume and coverletter directly from our platform that offers you real time, user friendly, 24/7 access and ATS compliant cover page/ curriculum vitae builder to enable you to apply for that needed job conveniently.</p>
                </div>
            </div>  
        </article>
    </div>
    <div class="container12 planboxes">
        <article>
           <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <div class="planbx lightblue aligncenter">
                            <h3>One-Time Pay</h3>
                            <p><span>On need basis</span></p>
                            
                            <p>Number of downloads<br /><span>1 CV/Resume/Coverletter</span></p>
                            <p>Unlimited Access<br /><span>No</span></p>
                            <p>Share link for your CV/resume&nbsp;<i class="fa-solid fa-check"></i></p><br />
                            
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="planbx blue aligncenter">
                            <h3>Basic <br />Plan</h3>
                            <p><span>1 week access plan</span></p>
                            <div class="cost">Kes. 1,500</div>
                            <p>Number of downloads<br /><span>1 CV/Resume</span><br /><span>1 coverletter</span></p>
                            <p>Unlimited Access<br /><span>Yes</span></p>
                            <p>Share link for your CV/resume &nbsp;<i class="fa-solid fa-check"></i></p><br />
                            <p><a href="controller/subscription.php?t=basic&w=1&cost=1500" class="rounded-white-btn">Select Plan</a></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="planbx green aligncenter">
                            <h3>Pro <br />Plan</h3>
                            <p><span>3 Months Access Plan</span></p>
                            <div class="cost">Kes. 2,000</div>
                            
                            <p>Number of downloads<br /><span>3 CV/Resume</span><br /><span>3 coverletter</span></p>
                            <p>Unlimited Access<br /><span>Yes</span></p>
                            <p>Share link for your CV/resume&nbsp;<i class="fa-solid fa-check"></i></p><br />
                            <p><a href="controller/subscription.php?t=pro&w=12&cost=2000" class="rounded-white-btn">Select Plan</a></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="planbx gold aligncenter">
                            <h3>Premium <br />Plan</h3>
                            <p><span>6 Months Access Plan</span></p>
                            <div class="cost">Kes. 3,500</div>
                            <p>Number of downloads<br /><span>Unlimited CV/Resume</span><br /><span>Unlimited coverletter</span></p>
                            <p>Unlimited Access<br /><span>Yes</span></p>
                            <p>Share link for your CV/resume&nbsp;<i class="fa-solid fa-check"></i></p><br />
                            <p><a href="controller/subscription.php?t=premium&w=6&cost=3000" class="rounded-white-btn">Select Plan</a></p>
                        </div>
                    </div>
                </div>
            </div>
           </div>
        </article>
    </div>
    
    <?php include "includes/footer.inc"; ?> 
</body>
</html>