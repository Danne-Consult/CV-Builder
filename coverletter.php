<?php include "controller/sessioncheck.php"; ?>
<?php 
    include "manage/_db/dbconf.php"; 
    $db = new DBconnect;
    $prefix = $db->prefix;
    $user=$_SESSION['userid'];
    $sqlx="SELECT * FROM ".$prefix."user_coverletter WHERE userid='$user'";
    $resultx= $db->conn->query($sqlx);
    $rwsx = $resultx->fetch_array();                    
    $coverid = "";

    if($rwsx["covertemp"]=="" && $_GET['clt']==""){
        header("location:covertemplates.php");
    }

    if(isset($_GET['clt'])){
        $coverid =$_GET['clt'];
    }else{
        $coverid = $rwsx["covertemp"];
    }

    $sql="SELECT * FROM ".$prefix."coverletter_templates WHERE id='$coverid'";
    $result= $db->conn->query($sql);
    $rws = $result->fetch_array();

    $sampletexts = "SELECT * FROM ".$prefix."coverletter_formats";
    $resultst= $db->conn->query($sampletexts);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cover Letter : Realtime CVs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/print.css" media="print">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body class="inner">
    <?php include "includes/nav/innerheader.inc"; ?>

    <div class="container12 workbx">
        <article>
            <div class="row">
                <div class="col-lg-1">
                    <?php include "includes/nav/sidenav.inc"; ?>
                </div>
                <div class="col-lg-6">
                    <div class="workarea scrollwork">
                        <h3>Cover Letter</h3>
                        <?php
                        if(isset($_GET['error'])){
                            echo "<div class='error-red'>". $_GET['error'] ."</div>";
                        }
                        if(isset($_GET['success'])){
                            echo "<div class='success-green'>". $_GET['success'] ."</div>";
                        }
                        ?>
                        
                        
                        <form class="contactForm" method="POST" action="controller/coversubmit.php">
                        <div class="sectionholder">
                                <div class="section secshow" id="section1">
                                    <h4>Personal Details</h4>
                                    <input type="hidden" name="covertpl" value="<?php echo $coverid; ?>" />
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="fname">Full Name</label><br />
                                            <input type="text" name="fname" id="fname" value="<?php if(!$rwsx['fullnames']==""){echo $rwsx['fullnames'];} ?>" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="occupation">Occupation</label><br />
                                            <input type="text" name="occupation" id="occupation" value="<?php if(!$rwsx['occupation']==""){echo $rwsx['occupation'];} ?>" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">Email Address</label><br />
                                            <input type="text" name="email" id="email" value="<?php if(!$rwsx['email']!==""){echo $rwsx['email'];} ?>" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">Telephone/Mobile</label><br />
                                            <input type="tel" name="tel" id="tel" value="<?php if(!$rwsx['tel']==""){echo $rwsx['tel'];} ?>" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="city">Address</label><br />
                                            <input type="text" name="address" id="address" value="<?php if(!$rwsx['address']==""){echo $rwsx['address'];} ?>" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="postalcode">Postal Code</label><br />
                                            <input type="text" name="postalcode" id="postalcode" value="<?php if(!$rwsx['postalcode']==""){echo $rwsx['postalcode'];} ?>" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="city">City</label><br />
                                            <input type="text" name="city" id="city" value="<?php if(!$rwsx['city']==""){echo $rwsx['city'];} ?>" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="city">Country</label><br />
                                            <input type="text" name="country" id="country" value="<?php if(!$rwsx['country']==""){echo $rwsx['country'];} ?>" />
                                        </div>
                                    
                                    </div>
                                    <hr /><br />
                                    <button type="button" class="btn btn-primary next-prev" data-next-prev="section2">Next</button>
                                </div>
                                <div class="section" id="section2">
                                    <h4>Links</h4>
                                
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="website">Website <i class="italic">*optional</i></label><br />
                                            <input type="text" name="website" id="website" value="<?php if(!$rwsx['website']==""){echo $rwsx['website'];} ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="facebook">facebook <i class="italic">*optional</i></label><br />
                                            <input type="text" name="facebook" id="facebook" value="<?php if(!$rwsx['facebook']==""){echo $rwsx['facebook'];} ?>" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="occupattwitterion">Twitter <i class="italic">*optional</i></label><br />
                                            <input type="text" name="twitter" id="twitter" value="<?php if(!$rwsx['twitter']==""){echo $rwsx['twitter'];} ?>" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="linkedin">linkedin <i class="italic">*optional</i></label><br />
                                            <input type="text" name="linkedin" id="linkedin" value="<?php if(!$rwsx['linkedin']==""){echo $rwsx['linkedin'];} ?>" />
                                        </div>
                                    </div>
                                    <hr /><br />
                                    <button type="button" class="btn btn-primary next-prev" data-next-prev="section1">Prev</button>
                                    <button type="button" class="btn btn-primary next-prev" data-next-prev="section3">Next</button>
                                </div>
                                <div class="section" id="section3">
                                    <h4>Date</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="letterdate">Letter Date</label><br />
                                            <input type="date" name="letterdate" id="letterdate" value="<?php if(!$rwsx['letterdate']==""){echo $rwsx['letterdate'];} ?>"  />
                                        </div>
                                    </div>
                                    <h4>Recipient Details</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="recipient">Name of recipient/department <i class="italic">*optional</i></label><br />
                                            <input type="text" name="recipient" id="recipient" value="<?php if(!$rwsx['recipient']==""){echo $rwsx['recipient'];} ?>" />
                                        </div>
                                        <div class="col-md-12">
                                            <label for="company">Company Name <i class="italic">*optional</i></label><br />
                                            <input type="text" name="company" id="company" value="<?php if(!$rwsx['company']==""){echo $rwsx['company'];} ?>" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="companyaddress">Address <i class="italic">*optional</i></label><br />
                                            <input type="text" name="companyaddress" id="companyaddress" value="<?php if(!$rwsx['comaddress']==""){echo $rwsx['comaddress'];} ?>" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="companycity">City <i class="italic">*optional</i></label><br />
                                            <input type="text" name="companycity" id="companycity" value="<?php if(!$rwsx['comcity']==""){echo $rwsx['comcity'];} ?>" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="companycountry">Country <i class="italic">*optional</i></label><br />
                                            <input type="text" name="companycountry" id="companycountry" value="<?php if(!$rwsx['comcountry']==""){echo $rwsx['comcountry'];} ?>" />
                                        </div>
                                    </div>
                                    <hr /><br />
                                    <button type="button" class="btn btn-primary next-prev" data-next-prev="section2">Prev</button>
                                    <button type="button" class="btn btn-primary next-prev" data-next-prev="section4">Next</button>
                                </div>
                                <div class="section" id="section4">
                                    <h4>Letter Reference</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="ref"><i class="italic">*optional</i></label><br />
                                            <input type="text" name="ref" id="ref" value="<?php if(!$rwsx['reference']==""){echo $rwsx['reference'];} ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4>Letter Body</h4>

                                            <p>Sample Letters <i class="italic">*You can select a sample text from the list below.</i></p>
                                            <select id="samplewords">
                                                <option>...</option>
                                                <?php 
                                                    while($rwlist = $resultst->fetch_array()){
                                                        echo "<option value='".$rwlist['id']."'>".$rwlist['desc']."</option>";
                                                    }
                                                ?>
                                            </select>
                                            <textarea rowspan="3" class="editor" name="coverbody" id="coverbody" >
                                                <?php 
                                                if(!$rwsx['coverletter']==""){
                                                    echo $rwsx['coverletter'];
                                                    }else{ 
                                                        echo '<p>Dear , </p><p><br></p><p></p><p>Sincerely,</p>';
                                                    } 
                                                ?>
                                            </textarea>
                                        </div>
                                    </div>
                                    <br /><br />
                                    <button type="button" class="btn btn-primary next-prev" data-next-prev="section3">Prev</button>
                                    <input type="submit" name="submitcov" class="submit" value="Save" />
                                    <button type="button" class="rounded-white-btn small-btn" id="myBtn">View Cover Letter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 viewbox" style="position:relative;">
                    <a href="priceselect.php?tplid=<?php echo $coverid; ?>&temptype=coverletter&sub=<?php echo $rws['probasic'] ?>&u=<?php echo $user ?>" title="Download" id="downloadrec" class="rounded-white-btn floataboveright"><i class="fa-solid fa-download"></i></a>
                    <div class="cvresized" id="clbx">
                        <?php echo $rws['tempcode']; ?>
                    </div>
                    
                    <p style="position: absolute;top: 21em; text-align: center; width: 89%;"><button id="downnow" class="rounded-white-btn" style="display:none">Download Now</button></p>
                </div>
            </div>
        </article>
    </div>

    <div class="container12 tempbx">
    <div class="moretpl">More Templates</div>
        <article class="" id="hidebx">
            <?php  include "includes/covertemplates_list.php"; ?>
        </article>
    </div>

    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <div id="modal-content"></div>
    </div>
    
    <?php include "includes/footer.inc"; ?>
    <script src="manage/assets/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="assets/js/slick.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" referrerpolicy="origin"></script>
    <script>
        
        $(document).ready(function() {
            mce();

            function mce(){
                tinymce.init({
                selector: 'textarea.editor',
                menubar: false, 
                height : "250",
                add_form_submit_trigger : true,
                plugins: 'lists advlist',
                toolbar: 'insertfile a11ycheck undo redo | bold italic | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
                config:{
                    forced_root_block_attrs : { style: 'text-align: justify;' }
                    }
                });   
            };
            
            $(".next-prev").click(function(){
                var section = $(this).attr("data-next-prev");
                $(".section").removeClass("secshow");
                $("#"+section).addClass("secshow");
             });

             $('.slidex').slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    }
                ]
                });


             $(".moretpl").click(function(){
                var hiddentpls = $("#hidebx");
                hiddentpls.toggle(function(){
                    hiddentpls.removeClass("hidebx");
                });
            })   

            $("#downloadrec").click(function(){
            var reccont = document.getElementById("mycover");
            topdf(reccont);
            })
            function topdf(reccont) {
                // Generate the PDF

                html2pdf().from(reccont).set({
                margin: [5, 2, 15, 5],
                filename: 'mycover.pdf',
                html2canvas:  { scale:2.5, letterRendering: true, width: 1080},
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
                //pagebreak: { mode: ['css']}
                }).save();
            }

            $("#samplewords").change(function(){
                $id = $(this).val();
                $.post("controller/getsamples.php?recid="+$id, function(data, status){
                    if(data){
                        tinymce.get("coverbody").setContent(data);
                    }
                });
            });
        });
    </script>
    <script src="assets/js/cover.js" referrerpolicy="origin"></script>
</body>
</html>