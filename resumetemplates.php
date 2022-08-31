<?php include "controller/sessioncheck.php"; ?>
<?php include "manage/_db/dbconf.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Templates : Realtime CVs</title>

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

    <div class="container12 workbx">
        <article>
            <h3>Resume Templates</h3>
            <p>Select a template</p>
            <div class="row">
                <?php
                    $db = new DBconnect;
                    $prefix = $db->prefix;
                    $user=$_SESSION['userid'];
                    $sql="SELECT * FROM ".$prefix."resume_templates";
                    $result= $db->conn->query($sql);
                    $tempbx="";
                    $temptype="";
                    while($rws = $result->fetch_array()){
                        if($rws['type']=="free"){
                            $temptype = "<i>Free</i>";
                        }else{
                            $temptype = "<b>Cost:</b> Kes.".$rws['tempcost'];
                        }

                        $tempbx = "<div class='col-lg-3'>";
                        $tempbx .= "<div class='tempimg' style='background:url(manage/cover-views/".$rws['tempimg'].") no-repeat center; background-size:cover'></div>";
                        $tempbx .= "<div class='cont aligncenter'><h5 class='aligncenter'>".$rws['tempname']."</h5><p>".$temptype."</p><p><a class='small-round-btn' href='cv.php?cvtpl=".$rws['id']."'>Use Template</a></p></div>";
                        $tempbx .= "</div>";

                        echo $tempbx;
                    }
                ?>
            </div>
           
        </article>
    </div>
    
    <?php include "includes/footer.inc"; ?>   
</body>
</html>