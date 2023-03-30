<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../vendor/autoload.php';

    if(isset($_POST['recoverx'])){ 
        
        $emailadd = $_POST['emailadd'];

        include_once "../manage/_db/dbconf.php";
        $db = new DBconnect;
        $prefix = $db->prefix;
        
        $sql1 = "SELECT * FROM ".$prefix."users WHERE email ='$emailadd'";
        $result1 = $db->conn->query($sql1);
        $trws1 = mysqli_num_rows($result1);

        if($trws1 == 1){

            
            function url(){
                return sprintf(
                  "%s://%s%s",
                  isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', 
                  $_SERVER['SERVER_NAME'],
                  $_SERVER['REQUEST_URI']
                );
              }

            $rws = $result1->fetch_array();
            $userid = $rws['usercode'];
            $fname = $rws['fname'];
            $lname = $rws['fname'];
            $serverurl = url();
            $emaillink = "<a style='padding: 15px 34px; background-color:#faa31d; color:#fff; border-radius: 200px; text-decoration:none;' href='".$serverurl."/passresset.php?u=".$userid."&res=1'>Reset Password</a>";

            $emailbody = "<div style='background-color:#efefef; padding:3em 0px;'><style>
                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
              .emailtable{font-family: 'Montserrat', sans-serif; font-size:14px; background-color:#fff;}
              .emailtable td{padding:20px;}
              .emailtable h3{font-size:25px;}
            </style>
              <table class='emailtable' border='0' cellpadding='2' style='width:600px; margin:0px auto;'>
              <tr>
                <td><img src='{$serverurl}/assets/emailbanner.jpg' style='width:100%' /></td>
              </tr>
                <tr>
                    <td>
                        <h3>Password Reset</h3>
                        <p>Hi {$fname},</p>
                        <p>You requested to reset your password. Use the link below to reset your password</p>
                        <br />
                        <p style='text-align:center'>{$emaillink}</p>
                        <br />
                        <p>Best regards,<br /><br /><b>RealtimeCVs Support</b></p>
                        <br />
                    </td>
                </tr>
              </table>
            </div>";

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'mail.danneconsult.com';                //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'support@danneconsult.com';             //SMTP username
                $mail->Password   = 'secret';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('support@danneconsult.com', 'Mailer');
                $mail->addAddress($emailadd, $fname.' '.$lname );     //Add a recipient
            
                //Content
                $mail->isHTML(true);                              //Set email format to HTML
                $mail->Subject = 'RealtimeCVs Password Reset';
                $mail->Body    = $emailbody;
                
            
                $mail->send();
                
                header('location:../passrecover_sent.php');
            } catch (Exception $e) {
                header('location:../passrecover.php?error=Message could not be sent. Mailer Error: '.$mail->ErrorInfo);
            }

        }else{
            header('location:../passrecover.php?error=No record found for this email!');
            exit();
        }
       
    }
    
