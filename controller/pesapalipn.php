<?php 
    session_start();
    $userrec = $_SESSION['userid'];
    include_once "../manage/_db/dbconf.php";
    date_default_timezone_set("Africa/Nairobi");
    header("Content-Type:application/json");
    $currdatetime= date("y-m-d h:i:s");
    
    $trackingid = $_GET['OrderTrackingId'];
    $invoiceid = $_GET['OrderMerchantReference'];
    
    
    $db = new DBconnect;
    $prefix = $db->prefix;
    
    $sql = "SELECT * FROM ".$prefix."marchant_keys WHERE marchant_name = 'pesapal'";
    $result = $db->conn->query($sql);
    $rws = $result->fetch_array();
    
    
    $consumer_key = $rws['securitykey']; //'qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW';
    $consumer_secret = $rws['securitysecret'];//'osGQ364R49cXKeOYSpaOnT++rHs=';
    

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://pay.pesapal.com/v3/api/Auth/RequestToken',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
      "consumer_key": "'.$consumer_key.'",
      "consumer_secret": "'.$consumer_secret.'"
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    $token = json_decode($response)->token;
    curl_close($curl);

    $curl2 = curl_init();
    
    curl_setopt_array($curl2, array(
      CURLOPT_URL => 'https://pay.pesapal.com/v3/api/Transactions/GetTransactionStatus?orderTrackingId='.$trackingid,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Accept: application/json',
        'Content-Type: application/json',
        'Authorization:Bearer '.$token
      ),
    ));

    $response2 = curl_exec($curl2);
    
    curl_close($curl2);
    
    $res= json_decode($response2);

    file_put_contents('pesalog.txt', $response2, FILE_APPEND);


    $paymentmethod = $res->payment_method;
    $amount = $res->amount;
    $created_date  = $res->created_date;
    $confirmation_code = $res->confirmation_code;
    $invoiceid = $res->merchant_reference;
    $status = $res->payment_status_description;
    $description = $res->description;
    $payment_account = $res->payment_account;
    
    $db = new DBconnect;
    $prefix = $db->prefix;
    
    $sqlcheckinvoice = "SELECT * FROM ".$prefix."invoices WHERE invoiceno='$invoiceid'";

    $rrequest = $db->conn->query($sqlcheckinvoice);
    $rtrows = mysqli_num_rows($rrequest);
    $rws1 = $rrequest->fetch_array();
    $subtype = $rws1['paytype'];
    $period = $rws1['period'];
    

    if($rtrows!==0){
      if($status=="Completed"){
            
         if($subtype=="basic" || $subtype=="pro" || $subtype=="premium"){
            $datereg  = date_create($created_date);
            
            $enddate = date('Y-m-d H:i:s', strtotime($datereg. ' + '.$rws1['period'].' weeks'));
            
                
            $sqlupdateinvoice  = "UPDATE ".$prefix."invoices SET paystatus='Paid', paidon='$created_date' WHERE invoiceno='$invoiceid'";
            $db->conn->query($sqlupdateinvoice);
           
            $subscription = "INSERT INTO ".$prefix."user_subscription (userid, subtype, startdate, expirydate) VALUES ('$userrec','$subtype','$created_date','$enddate')";
            $db->conn->query($subscription);
            
            $pesapalpayments = "UPDATE ".$prefix."pesapalpayments SET payment_method='$paymentmethod', paidon='$created_date', paymentstatus='$status', payment_account='$payment_account', confirmation_code='$confirmation_code' WHERE tracking_id='$trackingid'";
            $db->conn->query($pesapalpayments);
    
           header("location:../invoice.php?invoiceid=".$invoiceid."&success=Payment was successful");
    
        }elseif($subtype=="One time"){
            $sqlupdateinvoice  = "UPDATE ".$prefix."invoices SET paystatus='Paid', paidon='$created_date' WHERE invoiceno='$invoiceid'";
            $db->conn->query($sqlupdateinvoice);
            header("location:../invoice.php?invoiceid=".$invoiceid."&success=Payment was successful");
            
            $onedaydate = date('Y-m-d H:i:s', strtotime($datereg. ' + '.$rws1['period'].' days'));

            $subscription1 = "INSERT INTO ".$prefix."user_subscription (userid, subtype, startdate, expirydate) VALUES ('$userrec','$subtype','$created_date','$onedaydate')";
            $db->conn->query($subscription1);
            
            $pesapalpayments1 = "UPDATE ".$prefix."pesapalpayments SET payment_method='$paymentmethod', paidon='$created_date', paymentstatus='$status', payment_account='$payment_account', confirmation_code='$confirmation_code' WHERE tracking_id='$trackingid'";
            $db->conn->query($pesapalpayments1);
        }
          
      }else{
            header("location:../invoice.php?invoiceid=".$invoiceid."&error=".$description);
        }
        
    }else{
        header("location:../invoice.php?error=There was no matching invoice found. Please contact the Administrator");
    }

