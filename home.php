<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home : Realtime CVs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body class="inner">
    <header>
        <article>
            <div class="logo">
                <a href="#"><img src="assets/images/logo.svg" alt="Realtime CVs"></a>
            </div>
            <div class="avigation">
                <nav>
                    <ul>
                        <li class="fitstnav"><a href="#">My profile</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </nav>
            </div>
            <div class="clearfix"></div>
        </article>
    </header>

    <div class="container12 workbx">
        <article>
            <div class="row">
                <div class="col-lg-2">
                    <div class="sidebar">
                        <div class="sidenav">
                                <a href=""><div class="link"><i class="fa fa-tachometer"></i><br />Dashboard</div></a>
                        </div>
                        <div class="sidenav">
                                <a href=""><div class="link"><i class="fa fa-file-edit"></i><br />CV Content</div></a>
                        </div>
                        <div class="sidenav">
                                <a href=""><div class="link"><i class="fa fa-paint-brush"></i><br />Design</div></a>
                        </div>
                        <div class="sidenav">
                                <a href=""><div class="link"><i class="fas fa-eye"></i><br />view CVs</div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                   <div class="workarea">
                   <form class="contactForm" action="#" method="POST">
                       
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="cvtitle">CV Title <i class="italic">*Title of the resume that you are creating</i></label><br />
                                <input type="text" name="cvtitle" required />
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-lg-8">
                                <label for="fname">Full Name</label><br />
                                <input type="text" name="fname" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <label for="jtitle">Job Title</label><br />
                                <input type="text" name="jtitle" />
                            </div>
                        </div>
                        <h4>Contact Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="email">Email</label><br />
                                <input type="email" name="email" />
                            </div>
                            <div class="col-lg-6">
                                <label for="lname">Tel/Mobile</label><br />
                                <input type="tel" name="mobileno" placeholder="eg. +25407..." required />
                            </div>
                            <div class="col-lg-6">
                                <label for="address">Address</label><br />
                                <input type="text" name="address" />
                            </div>
                            <div class="col-lg-4">
                                <label for="postalcode">Postal Code</label><br />
                                <input type="number" name="postalcode" />
                            </div>
                        </div>
                        <div class="row">
                            <h4>Personal Information</h4>
                            <div class="col-lg-6">
                                <label for="dob">Date of Birth</label><br />
                                <input type="date" name="dob" />
                            </div>
                            <div class="col-lg-6">
                                <label for="gender">Gender/Pronoun</label><br />
                                <input type="text" name="gender">
                            </div>
                            <div class="col-lg-6">
                                <label for="nationality">Nationality</label><br />
                                <input type="text" name="nationality" required />
                            </div>  
                            
                            <div class="col-lg-6">
                                <label for="languages">Languages <i class="italic">*Separated with a comma(,)</i></label><br />
                                <input type="text" name="languages" />
                            </div>
                        </div>
                        <hr />
                        <div class="collapsible"><h4>Brief About Me</h4></div>
                        <div class="collcont">
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea name="aboutme" class="editor" cols="30" rows="3" maxlength="500"></textarea><br /><i class="italic">*Max 500 characters</i>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div class="collapsible"><h4>Education Background</h4></div>
                        <div class="collcont">
                            <div class="com-edu">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="work">Education Level</label><br />
                                        <select name="educationlevel[]" required>
                                            <option>...</option>
                                            <option value="Secondary">Secondary</option>
                                            <option value="Certificate">Certificate</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Bachelors">Bachelors</option>
                                            <option value="Post Graduate Diploma">Post Graduate Diploma</option>
                                            <option value="Masters">Masters</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Institution">School/Institution</label><br />
                                        <input type="text" name="institution[]" required />
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="comyearfrom">From</label><br />
                                        <input type="number" name="comyearfrom[]" min="1960" max="2099" step="1" required />
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="comyearto">To</label><br />
                                        <input type="number" name="comyearto[]" min="1960" max="2099" step="1" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="schoolcomment">Area of Study/Course</label><br />
                                        <textarea rowspan="3" class="editor" name="schoolcomment[]" ></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-2">
                                        <div class="addbtnbx moreschool"><i class="fa-solid fa-circle-plus"></i></div>
                                    </div>
                                </div>
                            </div> 
                            <hr />
                        </div>
                        <div class="collapsible"><h4>Work Experience</h4></div>
                        <div class="collcont">
                            <div class="com-work">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="work">Company/Organization</label><br />
                                        <input type="text" name="company[]" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="occupation">Position</label><br />
                                        <input type="text" name="occupation[]" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="workyearcorfrom">From</label><br />
                                        <input type="month" name="workyearfrom[]" placeholder="YYYY-MM" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="workyearto">To</label><br />
                                        <input type="month" name="workyearto[]" placeholder="YYYY-MM" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="workcomment">Key Responsibilities</label><br />
                                        <textarea rowspan="3" class="editor" name="workcomment[]" ></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-2 ">
                                        <div class="addbtnbx morework"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div>
                                    </div>
                                </div>
                            </div> 
                            <hr />
                        </div>
                        <div class="collapsible"><h4>Other Accreditations/Personal Achievements</h4></div>
                        <div class="collcont">
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea name="achievements" class="editor" cols="30" rows="3" maxlength="200"></textarea><br /><i class="italic">*Max 500 characters</i>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div class="collapsible"><h4>Skills Aquired</h4></div>
                        <div class="collcont">
                            <div class="skillbar">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="skilltitle">Skill Name</label><br />
                                        <input type="text" name="skill[] "/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="capacity">Proficiency</label><br />
                                        <input class="range" type="range" name="capacity[]" min="0" max="100" />
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="addbtnbx moreskills"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                        </div>

                        <div class="collapsible"><h4>Social Media</h4></div>
                        <div class="collcont">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="facebook">Facebook</label><br />
                                    <input type="url" name="facebook" placeholder="https://...." />
                                </div>
                                <div class="col-lg-4">
                                    <label for="twitter">Twitter</label><br />
                                    <input type="url" name="twitter" placeholder="https://...." />
                                </div>
                                <div class="col-lg-4">
                                    <label for="linkedin">Linkedin</label><br />
                                    <input type="url" name="linkedin" placeholder="https://...." />
                                </div>
                            </div>
                        
                            <hr />
                        </div>
                        <div class="collapsible"><h4>Interests</h4></div>
                        <div class="collcont">
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea name="interests" class="editor" cols="30" rows="3" maxlength="500"></textarea><br /><i class="italic">*Max 500 characters</i>
                                </div>
                            </div>

                            <hr />
                        </div>
                        <div class="collapsible"><h4>References</h4></div>
                        <div class="collcont">
                            <div class="refbar">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="refname">Referee Name</label><br />
                                        <input type="text" name="refname[]" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="orgcom">Organization/Company</label><br />
                                        <input type="text" name="orgcom[]" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="reftitle">Occupation Title</label><br />
                                        <input type="text" name="reftitle[]" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="refemail">Email</label><br />
                                        <input type="email" name="refemail[]" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="refnareftelme">Telephone</label><br />
                                        <input type="tel" name="reftel[]" />
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-2">
                                        <div class="addbtnbx moreref"><i class="fa-solid fa-circle-plus"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                        <input type="submit" class="submit" name="submit" value="Save CV" />
                    </form>

                   </div>
                </div>
                <div class="col-lg-4">
                    <div class="cvresized">
                        <?php include "manage/cv-views/default.php"; ?>
                    </div>
                </div>
            </div>
        </article>
    </div>
    
    <?php include "includes/footer.inc"; ?>
    <script src="manage/assets/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        
        $(document).ready(function() {
            mce();

			$(document).on('click', '.moreschool' ,function(){
				$('.com-edu').append('<div class="educont"> <hr /> <div class="row"> <div class="row"> <div class="col-lg-6"> <label for="work">Education Level</label><br /> <select name="educationlevel[]" required> <option>...</option> <option value="Secondary">Secondary</option> <option value="Certificate">Certificate</option> <option value="Diploma">Diploma</option> <option value="Bachelors">Bachelors</option> <option value="Post Graduate Diploma">Post Graduate Diploma</option> <option value="Masters">Masters</option> </select> </div> </div> <div class="row"> <div class="col-lg-6"> <label for="Institution">School/Institution</label><br /> <input type="text" name="institution[]" required /> </div> <div class="col-lg-2"> <label for="comyearfrom">From</label><br /> <input type="number" name="comyearfrom[]" min="1960" max="2099" step="1" required /> </div> <div class="col-lg-2"> <label for="comyearto">To</label><br /> <input type="number" name="comyearto[]" min="1960" max="2099" step="1" required /> </div> </div> <div class="row"> <div class="col-lg-10"> <label for="schoolcomment">Area of Study/Course</label><br /> <textarea rowspan="3" class="editor" name="schoolcomment[]" ></textarea> </div> <div class="col-lg-2"> <div class="addbtnbx moreschool"><i class="fa-solid fa-circle-plus"></i></div> <div class="delbtnbx deleteedu"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div>');
                mce();
 
			});
			$(document).on('click','.deleteedu', function(){
                if(confirm("Are you sure you want to delete this?") == true){
				    $(this).closest(".educont").remove();
                };
			});

            $(document).on('click', '.morework' ,function(){
				$('.com-work').append('<div class="workcont"> <hr /> <div class="row"> <div class="col-lg-6"> <label for="work">Company/Organization</label><br /> <input type="text" name="company[]" /> </div> </div> <div class="row"> <div class="col-lg-6"> <label for="occupation">Position</label><br /> <input type="text" name="occupation[]" /> </div> <div class="col-lg-2"> <label for="workyearcorfrom">From</label><br /> <input type="month" name="workyearfrom[]" placeholder ="YYYY-MM"/> </div> <div class="col-lg-2"> <label for="workyearto">To</label><br /> <input type="month" name="workyearto[]" placeholder ="YYYY-MM" /> </div> </div> <div class="row"> <div class="col-lg-10"> <label for="workcomment">Key Responsibilities</label><br /> <textarea rowspan="3" class="editor" name="workcomment[]" ></textarea> </div> <div class="col-lg-2"> <div class="addbtnbx morework"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div> <div class="delbtnbx deletework"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div>');
                mce();
			});
			$(document).on('click','.deletework', function(){
                if(confirm("Are you sure you want to delete this record?") == true){
				    $(this).closest(".workcont").remove();
                };
			});
            
            
            $(document).on('click', '.moreskills' ,function(){
				$('.skillbar').append('<div class="skillcont" ><div class="row"><div class="col-lg-4"><label for="skilltitle">Skill Name</label><br /><input type="text" name="skill[] "/></div><div class="col-lg-4"><label for="capacity">Capacity</label><br /><input class="range" type="range" name="capacity[]" min="0" max="100" /></div><div class="col-lg-4"><div class="addbtnbx moreskills"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div><div class="delbtnbx deleteskill"><i class="fa-solid fa-circle-minus"></i></div></div></div></div>');
			});
			$(document).on('click','.deleteskill', function(){
                if(confirm("Are you sure you want to delete this record?") == true){
                    $(this).closest(".skillcont").remove(); 
                };
				
			});

            $(document).on('click', '.moreref' ,function(){
				$('.refbar').append('<div class="refmore"> <hr /> <div class="row"> <div class="col-lg-8"> <label for="refname">Referee Name</label><br /> <input type="text" name="refname[]" /> </div> </div> <div class="row"> <div class="col-lg-4"> <label for="orgcom">Organization/Company</label><br /> <input type="text" name="orgcom[]" /> </div> <div class="col-lg-4"> <label for="reftitle">Occupation Title</label><br /> <input type="text" name="reftitle[]" /> </div> </div> <div class="row"> <div class="col-lg-4"> <label for="refemail">Email</label><br /> <input type="email" name="refemail[]" /> </div> <div class="col-lg-4"> <label for="refnareftelme">Telephone</label><br /> <input type="tel" name="reftel[]" /> </div> <div class="col-lg-4"> <div class="addbtnbx moreref"><i class="fa-solid fa-circle-plus"></i></div> <div class="delbtnbx deleteref"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div>');
			});
			$(document).on('click','.deleteref', function(){
                if(confirm("Are you sure you want to delete this record?") == true){
				    $(this).closest(".refmore").remove();
                };
			});

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


            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                content.style.display = "none";
                } else {
                content.style.display = "block";
                }
            });
            }
            
        });
    </script>
</body>
</html>