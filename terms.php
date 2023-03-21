<?php 
    session_start();
    include "manage/_db/dbconf.php"; 
    $db = new DBconnect;
    $prefix = $db->prefix;
    $sql1 = "SELECT * FROM ".$prefix."subscription_plans";
    $result1 = $db->conn->query($sql1);
    $trws = mysqli_num_rows($result1);
    $rws = $result1->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Realtime CVs</title>

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
    <div class="container12 banner"> 
        <div style="background:url(assets/images/img6.jpg) no-repeat center; background-size:cover;" class="bannerimg"></div>
            <div class="caption">
                <h2>RealtimeCVs Terms & Conditions</h2>
            </div> 
        </div>
    </div>

    <div class="container12 about">
        <article>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                

                <p>These terms and conditions govern your use of the RealtimeCvs application (the "Application"). By using the Application, you agree to be bound by these terms and conditions. If you do not agree to these terms and conditions, do not use the Application.</p>

                <h4>Services</h4>
                <p>The Application provides templates for cover letters and resumes/CVs that are available in basic, pro, and premium versions. The templates are intended to assist you in creating your own cover letter and resume/CV. The Application does not guarantee that the templates will result in employment or job offers.</p>

                <h4>Payment</h4>
                <p>Payment for the use of the pro and premium templates is required. The pricing for each version is as follows:</p>

                <ul>
                <?php
                 $weeks="";
                if($trws==0){
                    echo "Oh oh! No plans found";
                }else if($rws['visible']!==0){
                    while($rws = $result1->fetch_array()){
                        
                        if($rws['weeks']==1){
                            $weeks =  $rws['weeks'] . " week access plan";
                        }
                        else if($rws['weeks']>1){
                            $days = $rws['weeks'] * 7;
                            $months = floor($days/30);
                            $weeks =  $months. " months access plan";
                        }
                        
                        $m ="<li>".$rws['subscription']." Plan: Kes. ".number_format($rws['cost'])." for ".$weeks."</li>";
                        echo $m;
                    }
                }
                ?>
                </ul>
                
                <p>Payments for the pro and premium templates are made on a monthly basis and will be charged to the credit card on file. You may cancel your subscription at any time.</p>

                <h4>Intellectual Property</h4>
                <p>All content within the Application, including but not limited to the templates, is owned by RealtimeCvs and protected by copyright and other intellectual property laws. You may use the templates only for your personal use and may not distribute or reproduce them for commercial purposes.</p>

                <h4>Privacy</h4>
                <p>Your personal information, including your name and contact information, may be collected and used by RealtimeCvs in accordance with our Privacy Policy.</p>

                <h4>Disclaimers</h4>
                <p>The Application is provided on an "as is" basis and RealtimeCvs makes no warranties or representations regarding its availability, accuracy, or functionality. RealtimeCvs disclaims all liability for any errors or omissions in the Application or any damages arising from the use of the Application.</p>

                <h4>Limitation of Liability</h4>
                <p>In no event shall RealtimeCvs be liable for any direct, indirect, incidental, special, or consequential damages arising from the use or inability to use the Application.</p>

                <h4>Changes to Terms and Conditions</h4>
                <p>RealtimeCvs reserves the right to modify these terms and conditions at any time. The latest version will always be available within the Application. Your continued use of the Application after any changes to the terms and conditions shall constitute your acceptance of the modified terms.</p>

                <h4>Governing Law</h4>
                <p>These terms and conditions shall be governed by and construed in accordance with the laws of the jurisdiction in which RealtimeCvs operates.</p>

                <h4>Contact Us</h4>
                <p>If you have any questions or concerns about these terms and conditions, please contact us at <b><a href="mailto:info@opentalentafrica.com">info@opentalentafrica.com<a></b></p>
                <br /><br />
                </div>
            </div>
        </article>
    </div>
    
    <?php include "includes/footer.inc"; ?> 
</body>
</html>