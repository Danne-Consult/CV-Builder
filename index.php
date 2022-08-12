<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime CVs</title>

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
<body class="home">
    <?php include "includes/nav/header.inc"; ?>
    <div class="container12 banner">
        <div class="flexslider">
            <ul class="slides">
                <li>
                <div style="background:url(assets/images/img1.jpg) no-repeat center; background-size:cover;" class="bannerimg"></div>
                    <div class="caption">
                        <h1>We have got you sorted</h1>
                        <p>Having trouble creating a professional resume? <br />We can help!</p>
                        <br />
                        <p><a href="signup.php" class="rounded-white-btn">Register Now</a></p>
                    </div>
                </li>
                <li>
                <div style="background:url(assets/images/img2.jpg) no-repeat center; background-size:cover;" class="bannerimg"></div>
                    <div class="caption">
                        <h1>Get your professional CV now!</h1>
                        <p>We know the hustle for creating professional CVs. <br />Realtime CVs is here to help!</p>
                        <br />
                        <p><a href="signup.php" class="rounded-white-btn">Get yours!</a></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="container12">
        <article>
            <div class="row justify-content-center">
                <div class="col-lg-10 aligncenter">
                    
                </div>
            </div>
        </article>
    </div>
    <div class="container12 howto">
        <article>
            <h2 class="aligncenter">How Create Your Personalized Resume</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="cont">
                        <div class="iconbx"><i class="fa-regular fa-file"></i></div>
                        <h4>Select a template</h4>
                        <p>Choose from a selection of layout designs that fits your job type<p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cont">
                        <div class="iconbx"><i class="fa-regular fa-pen-to-square"></i></div>
                        <h4>Optimize Your Content</h4>
                        <p>And adding or removing a specific section based on your needs is no problem and you get layout and content suggestions so that your resume looks perfect<p>
                    </div>  
                </div>
                <div class="col-lg-4">
                    <div class="cont">
                        <div class="iconbx"><i class="fa fa-download"></i></div>
                        <h4>Publish or Download your  CV</h4>
                        <p>Once your content is finished, you can publish link or dowwnload. Your latest version is saved and you can always go back to make edits.<p>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="container12 whyus" style="background:url(assets/images/img4.jpg) no-repeat fixed center; background-size:cover;">
        <h2 class="aligncenter">Why Choose Realtime CV</h2>
        <article>
            <div class="row">
                <div class="col-lg-5">
                    <div class="whybx">
                        <div class="whyicn">
                        <i class="fa fa-user-plus"></i>
                        </div>
                        <div class="whycont">
                            <h5>Easy Resume Creator</h5>
                            <p>With our tested templates you stand a 45% chance of getting shortlist and interviews.</p>
                        </div>
                    </div>
                    <div class="whybx">
                        <div class="whyicn">
                            <i class="fa fa-pen"></i>
                        </div>
                        <div class="whycont">
                            <h5>Easy to update</h5>
                            <p>Create your professional resume using our online builder and download it in real- time averagely 30 minutes</p>
                        </div>
                    </div>
                    <div class="whybx">
                        <div class="whyicn">
                            <i class="fa fa-file-shield"></i>
                        </div>
                        <div class="whycont">
                            <h5>Safe and Secure</h5>
                            <p>We guarantee security for your information.</p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-6 offset-lg-1 cont">
                    <p>We understand the predicament that many job seekers and professionals face while trying to timely create, update, format and align cover letters and curriculum vitae to new opportunities while ensuring that they conform to professional and ATS requirements.</p>
                    <p>We have created an online platform that offers you real time, user friendly, 24/7 access and ATS compliant cover page/ curriculum vitae builder to enable you to conveniently create, update, format, download, directly tailor make your documents using more than fifteen of our professionally designed templates that also allow you to directly apply for jobs from our platform.</p>
                    <p>We are undertaking continuous product development and rolling out new features of our platform as we strive to enhance our client experience and generating stunning and professional cover letters and CVs within a couple of minutes.</p>
                </div>
            </div>
        </article>  
    </div>
    <?php include "includes/footer.inc"; ?>
    <script src="assets/js/jquery.flexslider-min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script>
        $(document).ready(function(){

            $('.flexslider').flexslider({
                animation: "fade"
            });
        });
    </script>   
</body>
</html>