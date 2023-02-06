<?php 
    include "../manage/_db/dbconf.php";
    include "OAuth.php";

    $db = new DBconnect;
    $prefix = $db->prefix;

    $sql = "SELECT * FROM ".$prefix."marchant_keys WHERE marchant_name = 'pesapal'";
    $result = $db->conn->query($sql);
    $rws = $result->fetch_array();

    $useremail  = $_POST['email'];
    $sql2 = "SELECT * FROM ".$prefix."users WHERE email = '$useremail'";
    $result2 = $db->conn->query($sql2);
    $rws2 = $result2->fetch_array();


    //pesapal params
    $token = $params = NULL;
   
    $consumer_key = 'qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW'; //$rws['securitykey'];
    $consumer_secret = 'osGQ364R49cXKeOYSpaOnT++rHs=';//$rws['securitysecret'];
    $signature_method = new OAuthSignatureMethod_HMAC_SHA1();
    $iframelink = 'https://demo.pesapal.com/api/PostPesapalDirectOrderV4'; //'https://www.pesapal.com/API/PostPesapalDirectOrderV4'

    $callback_url = 'http://www.yourdomain.com/redirect.php'; //redirect url, the page that will handle the response from pesapal.

    $first_name = $rws2['fname'];
    $last_name = $rws2['lname'];
    
    $invoiceid  = $_POST['invoicenox'];
    $amount  = number_format($_POST['amountx'], 2);
    $tpltype  = $_POST['tpltype'];
    $period  = $_POST['period'];
    $paytype  = $_POST['paytype'];
    $type = "MARCHANT";
    $phonenumber = "";

    if($tpltype!==""){
    $desc = $paytype." Plan";
    }else{
        $desc = $tpltype." Template";
    }
    

    
    $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"https://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"https://www.w3.org/2001/XMLSchema\" Amount=\"".$amount."\" Description=\"".$desc."\" Type=\"".$type."\" Reference=\"".$invoiceid."\" FirstName=\"".$first_name."\" LastName=\"".$last_name."\" Email=\"".$useremail."\" PhoneNumber=\"".$phonenumber."\" xmlns=\"https://www.pesapal.com\" />";

    $post_xml = htmlentities($post_xml);
    $consumer = new OAuthConsumer($consumer_key, $consumer_secret);

    
    //post transaction to pesapal
    $iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
    $iframe_src->set_parameter("oauth_callback", $callback_url);
    $iframe_src->set_parameter("pesapal_request_data", $post_xml);
    $iframe_src->sign_request($signature_method, $consumer, $token);

    $iframe_src;

    //display pesapal - iframe and pass iframe_src
    ?>
    <iframe src="<?php echo $iframe_src;?>" width="100%" height="700px"  scrolling="no" frameBorder="0">
        <p>Browser unable to load iFrame</p>
    </iframe>
    