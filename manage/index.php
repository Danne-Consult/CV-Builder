<?php 
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
    <title>Manage : RealtimeCVs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
    <?php include "includes/nav/header.inc"; ?>
    <div class="container12">
        <article>
            <h3>Dashboard</h3>
            <div class="row">
                <div class="col-lg-12">
                    <h4>Recent Users</h4>
                    <table id="sorttable">
                        <thead>
                            <tr>
                                <th>User's Names</th>
                                <th>E-mail</th>
                                <th>Joined On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql="SELECT * FROM ".$prefix."users LIMIT 10";
                            $result= $db->conn->query($sql);
                            $tempbx="";
                            $temptype="";
                            while($rws = $result->fetch_array()){
                                $m = "<td>".$rws['fname']."&nbsp;".$rws['fname']."</td>";
                                $m .= "<td>".$rws['email']."</td>";
                                $m .= "<td> ".$rws['createdon']."</td>";

                                echo $m;
                            }
                            ?>
                        </tbody>
                    </table>
                    <p><a class="rounded-white-btn" href="allusers.php">See All Users</a></p>
                </div>
            </div>
        </article>
    </div>
    <div class="container12">
        <article>
            <hr />
        </article>
    </div>
    <div class="container12">
        <article>
            <div class="row">
                <div class="col-md-6">
                    <h4>Latest Transactions</h4>
                </div>
                <div class="col-md-6">
                    <h4>Mpesa Transactions</h4>
                </div>
            </div>
        </article>
    </div>
    <?php include "includes/nav/footer.inc"; ?>
    <?php include "includes/scripts.inc"; ?>
</body>
</html>