<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header('location:login.php');
    }

    include "_db/dbconf.php";
    $db = new DBconnect;
    $prefix = $db->prefix;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cover-Letter Sample Texts : RealtimeCVs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
    <?php include "includes/nav/header.inc"; ?>
    <div class="container12 workbx">
        <article>
            <div class="row">
                <div class="col-lg-1">
                    <?php include "includes/nav/sidenav.inc"; ?>
                </div>
                <div class="col-lg-11">
                    <h3>Resume Templates</h3>
                    <div class="slidex row">
                    <?php
                        $sql3="SELECT * FROM ".$prefix."resume_templates ORDER BY FIELD(probasic, 'Basic', 'Pro', 'Premium')";
                        $result3= $db->conn->query($sql3);
                        $tempbx="";
                        $temptype="";
                        while($rws3 = $result3->fetch_array()){
                            
                            $tempbx = "<div class='col-lg-3'>";
                            $tempbx .= "<div class='tempimg' style='background:url(cv-views/".$rws3['tempimg'].") no-repeat top; background-size:cover'>";
                            $tempbx .= "<div class='cont aligncenter'><h5 class='aligncenter'>".$rws3['tempname']."</h5><br /><p><a class='small-round-btn' href='editcv.php?cvtpl=".$rws3['id']."'>Edit</a></p></div><div class='probasic ".$rws3['probasic']."'>".$rws3['probasic']."</div>";
                            $tempbx .= "</div></div>";

                            echo $tempbx;
                        }
                    ?>
                </div>
            </div>
        </article>
    </div>
    <?php include "includes/nav/footer.inc"; ?>
</body>
</html>