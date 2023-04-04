<?php 
    session_start();
    include "manage/_db/dbconf.php"; 
    $db = new DBconnect;
    $prefix = $db->prefix;
?>

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
    
    <?php 
    if(!isset($_SESSION['userid'])){
        include "includes/nav/header.inc";
    }else{
         include "includes/nav/innerheader.inc";
    }
    ?>
    <div class="container12 whybar">
    <h2 class="aligncenter">Payment Plans</h2>
        <article>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                <p class="aligncenter">Quickly create and download your resume and coverletter directly from our platform that offers you real time, user friendly, 24/7 access and ATS compliant cover page/ curriculum vitae builder to enable you to apply for that needed job conveniently.</p>
                </div>
            </div>  
        </article>
    </div>
    <div class="container12 planboxes">
        <article>
           <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="row justify-content-center">
                    <?php include "includes/pricing_list.php"; ?>
                </div>
            </div>
           </div>
        </article>
    </div>
    
    <?php include "includes/footer.inc"; ?> 
</body>
</html>