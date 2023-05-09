<?php 
    session_start();

    include_once "_db/dbconf.php";

    if(!isset($_SESSION['admin'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments : RealtimeCVs</title>

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
                    <h3>Payments</h3>
                    <table class="sorttablesearch">
                    <thead>
                        <tr>
                            <th>Payment Ref</th>
                            <th>User's Name</th>
                            <th>Paid on</th>
                            <th>Sub Type</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            $db = new DBconnect;
                            $prefix = $db->prefix;
                            $sql="SELECT * FROM ".$prefix."invoices a LEFT JOIN ".$prefix."users b ON a.userid = b.usercode WHERE a.paystatus='paid' LIMIT 10";
                            $result= $db->conn->query($sql);
                            $tempbx="";
                            $temptype="";
                            while($rws = $result->fetch_array()){
                                $m = "<tr><td>".$rws['invoiceno']."</td>";
                                $m .= "<td>".$rws['fname']."&nbsp;".$rws['lname']."</td>";
                                $m .= "<td> ".$rws['paidon']."</td>";
                                $m .= "<td> ".$rws['paytype']."</td>";
                                $m .= "<td><a style='text-align:center; display:block' href='viewuser.php?u=".$rws['usercode']."'><i class='fa-solid fa-eye'></i></a></td>";
                                $m .= "</tr>";

                                echo $m;
                            }
                        ?>
                        
                    </tbody>
</table>
                </div>
            </div>
        </article>
    </div>
    <?php include "includes/nav/footer.inc"; ?>
    <?php include "includes/scripts.inc"; ?>
</body>
</html>