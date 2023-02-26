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
    <title>Invoice <?php echo $invoiceid; ?> : Realtime CVs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/print.css" media="print">
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
                            <th>Cost (Kes.)</th>
                        </tr>
                        <tr>
                            <td><?php 
                            if($rws1['tpltype']!==""){
                                echo "<span style='text-transform: capitalize;'>".$rws1['tpltype'] ." </span>"; 
                                                           
                            }
                            if($rws1['paytype']!==""){
                                echo "<span style='text-transform: capitalize;'>". $rws1['paytype']." Plan</span>";} ?></td>
                            <td><b><?php echo number_format($rws1['tplcost']); ?></b></td>
                        </tr>
                    </table>

                    <div class="row">
                        <?php 

                        if(isset($_GET['error'])){
                             echo "<div class='error-red'>". $_GET['error'] ."</div>";
                        }
                        
                        ?>
                        <div class="col-lg-6">
                        <?php 
                            if(!isset($_GET['success'])){
                        ?>
                        <h3>Instant Payment</h3>
                           <br />
                            <form class="contactForm" action="controller/pesapalcheckout.php" method="POST">
                                <input name="email" type="hidden" value="<?php echo $rws1['email']; ?>" />
                                <input name="invoicenox" type="hidden" value="<?php echo $invoiceid; ?>" />
                                <input name="amountx" type="hidden" value="<?php echo $rws1['tplcost']; ?>" />
                                <input name="tpltype" type="hidden" value="<?php echo $rws1['tpltype']; ?>" />
                                <input name="period" type="hidden" value="<?php echo $rws1['period']; ?>" />
                                <input name="paytype" type="hidden" value="<?php echo $rws1['paytype']; ?>" />
                                <input type="submit" class="submit" name="submitnumber" value="Pay Invoice" /> 
                            </form>
                        <?php } ?>

                            <?php 
                            if(isset($_GET['c'])){
                                $requestid = $_GET['r'];
                                echo "<a class='rounded-white-btn' href='controller/comptrans.php?invoiceid=".$invoiceid."&r=".$requestid."'>Complete the transaction</a>";
                            }
                            

                            if(isset($_GET['success'])){
                                echo "<div class='success-green'>". $_GET['success'] ."</div>";
                                if($rws1['tpltype']=="coverletter"){
                                echo "<a class='rounded-white-btn' href='coverletter.php?fid=".$invoiceid."&cvtpl=".$rws1["templateid"]."&d=1'>Proceed to download</a>";
                                }
                                if($rws1['tpltype']=="resume"){
                                    echo "<a class='rounded-white-btn' href='cv.php?fid=".$invoiceid."&cvtpl=".$rws1["templateid"]."&d=1'>Proceed to download</a>";
                                }
                            }
                            ?>

                        </div>                
                    </div>

                   <div class="row">
                    <div class="col-lg-12 aligncenter">
                        <img style="width: 343px;" src="assets/images/pesapal.webp" />
                    </div>
                   </div>
                </div>
            </div>
        </article>
    </div>
    <?php include "includes/footer.inc"; ?>       
</body>
</html>