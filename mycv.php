<?php

    include "manage/_db/dbconf.php";
    $db = new DBconnect;
    $prefix = $db->prefix;
    $user = $_GET['u'];

    $sql = "SELECT * FROM ".$prefix."user_resume a LEFT JOIN ".$prefix."resume_templates b ON a.cvtemp = b.id LEFT JOIN ".$prefix."users c ON c.usercode = a.userid WHERE a.userid='$user'";
    $result= $db->conn->query($sql);
    $rws = $result->fetch_array();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CV: <?php echo $rws['fname']." ".$rws['lname']; ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>

<?php echo $rws['tempcode']; ?>


<script>
window.addEventListener('load', function(){
    
    const cfname = document.getElementById("cfname");
    const ctitle = document.getElementById("ctitle");
    const cgender = document.getElementById("cgender");
    const cdob = document.getElementById("cdob");
    const cnationality = document.getElementById("cnationality");
    const clang = document.getElementById("clang");
    const cemail = document.getElementById("cemail");
    const cmobile = document.getElementById("cmobile");
    const cpostaladdress = document.getElementById("cpostaladdress");
    const caboutme = document.getElementById("caboutme");


    const cskillset = document.getElementById("cskillset");
    const cskillsetcircle = document.getElementById("cskillsetcircle");

    const cinterests = document.getElementById("cinterests");
    const ceducation = document.getElementById("ceducation");
    const cwork = document.getElementById("cwork");
    const caccredits = document.getElementById("caccredits");

    const socfb = document.getElementById("socfb");
    const soctw = document.getElementById("soctw");
    const socin = document.getElementById("socin");

    const crefs = document.getElementById("crefs");

    
    cfname.innerHTML = '<?php echo $rws['fname']." ".$rws['lname']; ?>';
    ctitle.innerHTML = '<?php echo $rws['jobtitle']; ?>';
    cgender.innerHTML = '<?php echo $rws['gender']; ?>';
    cdob.innerHTML = '<?php echo $rws['dob']; ?>';
    cnationality.innerHTML = '<?php echo $rws['nationality']; ?>';
    cemail.innerHTML = '<?php echo $rws['email']; ?>';
    cmobile.innerHTML = '<?php echo $rws['phone']; ?>';
    cpostaladdress.innerHTML = '<?php echo $rws['address']."-".$rws['postalcode']; ?>';


    if("<?php echo $rws['brief']; ?>"!==""){
    caboutme.innerHTML =  "<h4>About Me</h4> <?php echo $rws['brief']; ?>";
    }
    if("<?php echo $rws['languages']; ?>"!=""){
    clang.innerHTML = "<h4>Languages</h4> <?php echo $rws['languages']; ?>";
    }

    if("<?php echo $rws['linkedin']; ?>" !==""){
        socin.innerHTML = '<a href="<?php echo $rws['linkedin']; ?>" target="_new"><i class="fa-brands fa-linkedin"></i></a>&nbsp;';
    }
    if("<?php echo $rws['facebook']; ?>" !=""){
        socfb.innerHTML = '<a href="<?php echo $rws['facebook']; ?>" target="_new"><i class="fa-brands fa-facebook"></i></a>&nbsp;';
    }
    if("<?php echo $rws['twitter']; ?>" !=""){
        soctw.innerHTML = '<a href="<?php echo $rws['twitter']; ?>" target="_new"><i class="fa-brands fa-twitter"></i></a>&nbsp;';
    }
    if("<?php echo $rws['achievements']; ?>" !=""){
    caccredits.innerHTML = '<h4>Other Accreditations/Personal Achievements</h4><?php echo $rws['achievements']; ?>';
    }

    if("<?php echo $rws['interests']; ?>"!==""){
        cinterests.innerHTML = '<h4>Interests</h4><?php echo $rws['interests']; ?>';
    }
    

});

</script>
    
</body>
</html>