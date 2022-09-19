<?php include "controller/sessioncheck.php"; ?>
<?php
    if(!isset($_GET['invoiceid'])){
        header('location:home.php?error=There was a problem generating your invoice');
    }

    include "manage/_db/dbconf.php";
    $db = new DBconnect;
    $prefix = $db->prefix;
    $invoiceid = $_GET['invoiceid'];
    $sql1="SELECT * FROM ".$prefix."invoices a LEFT JOIN ".$prefix."users b ON a.userid = b.usercode WHERE a.invoiceno='$invoiceid'";
    $result1 = $db->conn->query($sql1);
    $rws1 = $result1->fetch_array();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice $invoiceid : Realtime CVs</title>

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
    <div class="container12">
        <article>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="aligncenter">Invoice: <?php echo $invoiceid; ?></h2>
                    <div class="adrressbar">
                        <p><b>Date:</b> <?php echo $rws1['invoicedate']; ?></p>
                        <p><b>Invoice to:</b> <?php echo $rws1['fname']." ".$rws1['lname']; ?><br />
                        <b>Email:</b> <?php echo $rws1['email']; ?>
                    </p>
                    </div>
                    
                    <table>
                        <tr>
                            <th>Item</th>
                            <th>Cost</th>
                        </tr>
                        <tr>
                            <td><?php echo $rws1['tpltype']; ?></td>
                            <td><b><?php echo $rws1['tplcost']; ?></b></td>
                        </tr>
                    </table>

                    <h3>How to pay</h3>
                    <h4>Using MPESA</h4>
                    <p>Go to the M-pesa Menu<br />
                    Select Pay Bill<br />
                    Enter Business No: <b>4096713</b><br />
                    Enter Account No: <b><?php echo $invoiceid; ?></b><br />
                    Enter the Amount: <b><?php echo $rws1['tplcost']; ?></b><br />
                    Enter your M-Pesa PIN then send</p>
                </div>
            </div>
        </article>
    </div>
    <?php include "includes/footer.inc"; ?>       
</body>
</html>