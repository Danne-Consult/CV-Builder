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
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
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
                    <?php 
                        if(isset($_GET['error'])){
                            echo "<div class='error-red'>". $_GET['error'] ."</div>";
                        }
                    ?>
                    <div class="cap">
                        <h1>Showcase your skills and talents</h1>
                        <p>Create, update, format and align cover letters and curriculum vitae to new opportunities</p>
                    </div>
                    <img src="assets/images/typing-bro.png" class="introimg" alt="">
                </div>
            </div>
           
        </article>
    </div>
    <?php 
        include "manage/_db/dbconf.php";
        $db = new DBconnect;
        $prefix = $db->prefix;
        $user=$_SESSION['userid'];
        $sql="SELECT * FROM ".$prefix."user_coverletter WHERE userid='$user'";
        $result= $db->conn->query($sql);
        $trws = mysqli_num_rows($result);
        $rws = $result->fetch_array();
        $covers="";
        $resumes="";
        if($trws==1){
            $covers = '<div class="mybxs">My Cover Letter - Created on <span>'.$db->convertdate($rws["createdon"]).'</span></div>';
            $covers .='<p class="alignright"><a class="rounded-white-btn" href="coverletter.php?clt='.$rws["covertemp"] .'">View Letter</a></p>';
        }else{
            $covers = '<div class="mybxs">No Letters Created.</div>';
            $covers .='<p class="alignright"><a class="rounded-white-btn" href="covertemplates.php">Create Letter</a></p>';
        }

        $sql2="SELECT * FROM ".$prefix."user_resume WHERE userid='$user'";
        $result2= $db->conn->query($sql2);
        $trws2 = mysqli_num_rows($result2);
        $rws2 = $result2->fetch_array();
        if($trws2==1){
            $resumes = '<div class="mybxs">My Resume - Created on '.$db->convertdate($rws2["createdon"]).'</div>';
            $resumes .='<p class="alignright"><a class="rounded-white-btn" href="cv.php?cvtpl='.$rws2["cvtemp"].'">View Resume</a></p>';
        }else{
            $resumes = '<div class="mybxs">No Resume Created.</div>';
            $resumes .='<p class="alignright"><a class="rounded-white-btn" href="resumetemplates.php">Create Resume</a></p>';
        }
        
    ?>


    <div class="container12 dash">
        <article>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <h3>My CVs</h3>
                    <?php echo $resumes; ?>
                </div>
                <div class="col-lg-5 offset-1">
                    <h3>My Cover Letters</h3>
                    <?php echo $covers; ?>
                </div>
            </div>
        </article>
    </div>

    <div class="container12 tempbx">
        <article>
            <h2 class="aligncenter">featured CV Templates</h2>
            <?php  include "includes/cvtemplates_list.php"; ?>
        </article>
    </div>

    <div class="container12 tempbx">
        <article>
            <h2 class="aligncenter">featured Cover Letter Templates</h2>
            <?php  include "includes/covertemplates_list.php"; ?>
        </article>
    </div>
    
    <?php include "includes/footer.inc"; ?>
    <script src="assets/js/slick.js"></script>
    <script>
        $('.slidex').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
</body>
</html>