<?php 
    include_once "controller/sessioncheck.php";
    include_once "controller/subcheck.php";
    include_once "manage/_db/dbconf.php"; 
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
    <?php include_once "includes/nav/innerheader.inc"; ?>
    <div class="container12 whybar">
    <h2 class="aligncenter">Payment Plans</h2>
        <article>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php 

                    if(isset($_GET["temptype"]) && isset($_GET["temptype"]) && isset($_GET["sub"]) && isset($_GET["u"]) ){

                        $temptype = $_GET["temptype"];
                        $tplid = $_GET["tplid"];
                        $tempsub = $_GET["sub"];
                        $userid = $_GET["u"];

                        checkbasicpro($temptype,$userid,$tplid,$tempsub);
                    }
                    ?>
                
                <?php
                        if(isset($_GET['error'])){
                            echo "<div class='error-red'>". $_GET['error'] ."</div>";
                        }  
                ?>
                </div>
            </div>  
        </article>
    </div>
    <div class="container12 whybar">
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
                    <?php include_once "includes/pricing_list.php"; ?>
                </div>
            </div>
           </div>
        </article>
    </div>
    
    <?php include_once "includes/footer.inc"; ?> 
</body>
</html>