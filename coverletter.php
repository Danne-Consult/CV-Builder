<?php include "controller/sessioncheck.php"; ?>
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
    <link rel="stylesheet" href="assets/css/style.css">
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
                        <form class="contactForm">
                        <div class="sectionholder">
                                <div class="section secshow" id="section1">
                                    <h4>Personal Details</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="fname">Full Name</label><br />
                                            <input type="text" name="fname" id="fname" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="occupation">Occupation</label><br />
                                            <input type="text" name="occupation " id="occupation" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">Email Address</label><br />
                                            <input type="text" name="email" id="email" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">Telephone/Mobile</label><br />
                                            <input type="tel" name="tel" id="tel" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="city">Address</label><br />
                                            <input type="text" name="address" id="address" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="postalcode">Postal Code</label><br />
                                            <input type="text" name="postalcode" id="postalcode" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="city">City</label><br />
                                            <input type="text" name="city" id="city" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="city">Country</label><br />
                                            <input type="text" name="country" id="country" />
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
                                            <input type="url" name="website" id="website" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="facebook">facebook <i class="italic">*optional</i></label><br />
                                            <input type="text" name="facebook " id="facebook" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="occupattwitterion">Twitter <i class="italic">*optional</i></label><br />
                                            <input type="text" name="twitter " id="twitter" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="linkedin">linkedin <i class="italic">*optional</i></label><br />
                                            <input type="text" name="linkedin " id="linkedin" />
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
                                            <input type="date" name="letterdate" id="letterdate"  />
                                        </div>
                                    </div>
                                    <h4>Recipient Details</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="recipient">Name of recipient/department <i class="italic">*optional</i></label><br />
                                            <input type="text" name="recipient" id="recipient" />
                                        </div>
                                        <div class="col-md-12">
                                            <label for="company">Company Name <i class="italic">*optional</i></label><br />
                                            <input type="text" name="company" id="company" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="companyaddress">Address <i class="italic">*optional</i></label><br />
                                            <input type="text" name="companyaddress" id="companyaddress" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="companycity">City <i class="italic">*optional</i></label><br />
                                            <input type="text" name="companycity" id="companycity" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="companycountry">Country <i class="italic">*optional</i></label><br />
                                            <input type="text" name="companycountry" id="companycountry" />
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
                                            <input type="text" name="ref" id="ref" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4>Letter Body</h4>
                                            <textarea rowspan="3" class="editor" name="coverbody" id="coverbody" >
                                                <p>Dear , </p><p><br></p><p></p><p>Sincerely,</p>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="javascript:void(0)" onclick="gettemp(this)" rec="default">Default Template</a>&nbsp;&nbsp;
                                <a href="javascript:void(0)" onclick="gettemp(this)" rec="classic">Classic Template</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="cvresized" id="clbx">
                        <?php include "manage/cover_views/default.php"; ?>
                    </div>
                    
                </div>
            </div>
        </article>
    </div>
    <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <div class="modal-content"></div>
    </div>
    
    <?php include "includes/footer.inc"; ?>
    <script src="manage/assets/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    
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
                toolbar: 'insertfile a11ycheck undo redo | bold italic | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image'
                });   
            };
            
            $(".next-prev").click(function(){
                var section = $(this).attr("data-next-prev");
                $(".section").removeClass("secshow");
                $("#"+section).addClass("secshow");
             });
        });
    </script>
    <script src="assets/js/cover.js" referrerpolicy="origin"></script>
</body>
</html>