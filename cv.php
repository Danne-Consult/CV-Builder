<?php include "controller/sessioncheck.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume/CV : Realtime CVs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
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
                   <div class="workarea">
                    <h3>My CV</h3>
                    <?php
                        if(isset($_GET['error'])){
                            echo "<div class='error-red'>". $_GET['error'] ."</div>";
                        }
                        if(isset($_GET['success'])){
                            echo "<div class='success-green'>". $_GET['success'] ."</div>";
                        }
                    ?>

                    <?php 
                        include "manage/_db/dbconf.php";
                        $db = new DBconnect;
                        $prefix = $db->prefix;
                        $userid = $_SESSION['userid'];
                        $sqlresume = "SELECT * FROM ".$prefix."user_resume a RIGHT JOIN ".$prefix."users b ON a.userid = b.usercode WHERE b.usercode = '$userid'";
                        $resultres = $db->conn->query($sqlresume);
                        $rwres = $resultres->fetch_array();

                        if($rwres["cvtemp"]=="" && $_GET['cvtpl']==""){
                            header("location:resumetemplates.php");
                        }

                        if(isset($_GET['cvtpl'])){
                            $cvtpl = $_GET['cvtpl'];
                        }else{
                            $cvtpl = $rwres["cvtemp"];
                        }
                       
                    
                        $sqlres="SELECT * FROM ".$prefix."resume_templates WHERE id='$cvtpl'";
                        $resultres= $db->conn->query($sqlres);
                        $rwresume = $resultres->fetch_array();
                    ?>
                   <form class="contactForm" action="controller/resumesubmit.php" method="POST">
                    <input type="hidden" value="<?php echo $cvtpl; ?>" name="cvtpl" />
                    <div class="sectionholder">
                        <div class="section secshow" id="section1">
                            <h4>Personal Details</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="fname">Full Name</label><br />
                                    <input type="text" name="fname" id="fname" value="<?php if(!$rwres["fullnames"]==""){echo $rwres['fullnames'];}else{echo $rwres['fname']." ".$rwres['lname'];} ?>" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="jtitle">Job Title</label><br />
                                    <input type="text" name="jtitle" id="jtitle" value="<?php if(!$rwres['jobtitle']==""){echo $rwres['jobtitle'];} ?>" />
                                </div>
                                <div class="col-lg-6">
                                    <label for="dob">Date of Birth</label><br />
                                    <input type="date" name="dob" id="dob" value="<?php if(!$rwres['dob']==""){echo $rwres['dob'];} ?>" required />
                                </div>
                                <div class="col-lg-6">
                                    <label for="gender">Gender/Pronoun</label><br />
                                    <input type="text" name="gender" id="gender" value="<?php if(!$rwres['gender']==""){echo $rwres['gender'];} ?>" />
                                </div>
                                <div class="col-lg-6">
                                    <label for="nationality">Nationality</label><br />
                                    <input type="text" name="nationality" id="nationality" value="<?php if(!$rwres['nationality']==""){echo $rwres['nationality'];} ?>" required />
                                </div>  
                                
                                <div class="col-lg-12">
                                    <label for="languages">Languages <i class="italic">*Separated with a comma(,)</i></label><br />
                                    <input type="text" name="languages" id="lang" value="<?php if(!$rwres['languages']==""){echo $rwres['languages'];} ?>" />
                                </div>
                            </div>
                            <br /><hr /> 
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section2">Next</button>
                        </div>

                        <div class="section" id="section2">
                            <h4>Contact Details</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="email">Email</label><br />
                                    <input type="email" name="email" id="email" value="<?php if(!$rwres['resemail']==""){echo $rwres['resemail'];}else{echo $rwres['email'];} ?>" />
                                </div>
                                <div class="col-lg-6">
                                    <label for="lname">Tel/Mobile</label><br />
                                    <input type="tel" name="mobileno" id="tel" placeholder="eg. +25407..." value="<?php if(!$rwres['phone']==""){echo $rwres['phone'];} ?>" required />
                                </div>
                                <div class="col-lg-6">
                                    <label for="address">Address</label><br />
                                    <input type="text" name="address" id="address" value="<?php if(!$rwres['address']==""){echo $rwres['address'];} ?>" required  />
                                </div>
                                <div class="col-lg-4">
                                    <label for="postalcode">Postal Code</label><br />
                                    <input type="number" name="postalcode" id="postcode" value="<?php if(!$rwres['postalcode']==""){echo $rwres['postalcode'];} ?>" />
                                </div>
                            </div>
                            <br /><hr /> 
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section1">Prev</button>
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section3">Next</button>
                        </div>

                        <div class="section" id="section3">
                            <h4>Brief About Me</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea name="aboutme" class="editor" id="brief" cols="30" rows="3" maxlength="500"><?php if(!$rwres['brief']==""){echo $rwres['brief'];} ?></textarea><br /><i class="italic">*Max 500 characters</i>
                                </div>
                            </div>
                            <br /><hr /> 
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section2">Prev</button>
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section4">Next</button>
                        </div>

                        <div class="section" id="section4">
                            <h4>Education Background</h4>
                            <div class="com-edu">
                                <?php if(!$rwres['education']==""){

                                    $edulist= explode("||", $rwres['education']);
                                    $edulist= array_filter($edulist);

                                    $edulistcount = count($edulist);
                                    $edu = "";
                                    foreach($edulist as $key => $value)
                                        {
                                            $edulist = explode("/~",$value);
                                            
                                            $year=explode("-",$edulist[3]);

                                            $edu= '<div class="educont"> <hr /> <div class="row"> <div class="col-lg-6"> <label for="work">Education Level</label><br /> <select name="educationlevel[]" class="educ" required> <option value="'.$edulist[1].'" selected>'.$edulist[1].'</option><option>...</option> <option value="Secondary">Secondary</option> <option value="Certificate">Certificate</option> <option value="Diploma">Diploma</option> <option value="Bachelors">Bachelors</option> <option value="Post Graduate Diploma">Post Graduate Diploma</option> <option value="Masters">Masters</option> </select> </div> <div class="col-lg-6"> <label for="Institution">School/Institution</label><br /> <input type="text" class="inst" name="institution[]" value="'.$edulist[2].'" required /> </div> </div> <div class="row"> <div class="col-lg-4"> <label for="comyearfrom">From</label><br /> <input type="number" class="edufrom" name="comyearfrom[]" min="1960" max="2099" step="1" value="'.$year[0].'" required /> </div> <div class="col-lg-4"> <label for="comyearto">To</label><br /> <input type="number" class="eduto" name="comyearto[]" min="1960" max="2099" step="1" value="'.$year[1].'" required /> </div> </div> <div class="row"> <div class="col-lg-12"> <label for="schoolcomment">Area of Study/Course</label><br /> <textarea rowspan="3" class="editor eduach" name="schoolcomment[]">'.$edulist[4].'</textarea> </div> </div> <div class="row justify-content-end"> <div class="col-lg-4"> <div class="addbtnbx moreschool"><i class="fa-solid fa-circle-plus"></i></div> <div class="delbtnbx deleteedu"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div><br />';
                                            echo $edu;
                                        }

                                }else{?>
                                <div class="educont"> 
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="work">Education Level</label><br />
                                            <select name="educationlevel[]" class="educ" >
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
                                            <input type="text" name="institution[]" class="inst" />
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="comyearfrom">From</label><br />
                                            <input type="number" name="comyearfrom[]" class="edufrom" min="1960" max="2099" step="1" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="comyearto">To</label><br />
                                            <input type="number" name="comyearto[]" class="eduto" min="1960" max="2099" step="1" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="schoolcomment">Area of Study/Course</label><br />
                                            <textarea rowspan="3" class="editor eduach" name="schoolcomment[]" ></textarea>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-lg-2">
                                            <div class="addbtnbx moreschool"><i class="fa-solid fa-circle-plus"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div> 
                            <br /><hr /> 
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section3">Prev</button>
                            <button type="button" id="edusub" class="btn btn-primary next-prev" data-next-prev="section5">Next</button>
                        </div>

                        <div class="section" id="section5">
                            <h4>Work Experience</h4>
                            <div class="com-work">
                            <?php if(!$rwres['work']==""){
                                $wklist= explode("||", $rwres['work']);
                                $wklist= array_filter($wklist);
                                
                                $workcount = count($wklist);
                                $edu = "";
                                foreach($wklist as $key => $value)
                                    {
                                        $wklist = explode("/~",$value);	
                                        $yearx = explode("~",$wklist[3]);

                                        $works= '<div class="workcont"> <hr /> <div class="row"> <div class="col-lg-6"> <label for="work">Company/Organization</label><br /> <input type="text" class="company" name="company[]" value="'.$wklist[1].'" /> </div> <div class="col-lg-6"> <label for="occupation">Position</label><br /> <input type="text" class="pos" name="occupation[]" value="'.$wklist[2].'" /> </div> </div> <div class="row"> <div class="col-lg-4"> <label for="workyearcorfrom">From</label><br /> <input type="month" class="comfrom" name="workyearfrom[]" placeholder="YYYY-MM" value="'.$yearx[0].'" /> </div> <div class="col-lg-4"> <label for="workyearto">To</label><br /> <input type="month" class="comto" name="workyearto[]" placeholder="YYYY-MM" value="'.$yearx[1].'" /> </div> </div> <div class="row"> <div class="col-lg-12"> <label for="workcomment">Key Responsibilities</label><br /> <textarea rowspan="3" class="editor comach" name="workcomment[]" >'.$wklist[4].'</textarea> </div> </div> <div class="row justify-content-end"> <div class="col-lg-4"> <div class="addbtnbx morework"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div> <div class="delbtnbx deletework"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div><br />';


                                        echo $works;
                                    }
                            }else{?>
                                <div class="workcont">
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="work">Company/Organization</label><br />
                                            <input type="text" class="company" name="company[]" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="occupation">Position</label><br />
                                            <input type="text" class="pos"  name="occupation[]" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="workyearcorfrom">From</label><br />
                                            <input type="month" class="comfrom"  name="workyearfrom[]" placeholder="YYYY-MM" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="workyearto">To</label><br />
                                            <input type="month" class="comto"  name="workyearto[]" placeholder="YYYY-MM" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="workcomment">Key Responsibilities</label><br />
                                            <textarea rowspan="3" class="editor comach" name="workcomment[]" ></textarea>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-lg-2 ">
                                            <div class="addbtnbx morework"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <br /><hr /> 
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section4">Prev</button>
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section6" id="worksub">Next</button>
                        </div>

                        <div class="section" id="section6">
                            <h4>Other Accreditations/Personal Achievements</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea name="achievements" id="accredits" class="editor" cols="30" rows="3" maxlength="200"><?php if(!$rwres['achievements']==""){echo $rwres['achievements'];} ?></textarea><br /><i class="italic">*Max 500 characters</i>
                                </div>
                            </div>
                            <br /><hr /> 
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section5">Prev</button>
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section7">Next</button>
                        </div>

                        <div class="section" id="section7">
                            <h4>Skills Acquired</h4>
                            <div class="skillbar">
                            <?php if(!$rwres['skills']==""){
                                $skilllist= explode("||", $rwres['skills']);
                                $skilllist= array_filter($skilllist);
                                
                                $arrayskillcount = count($skilllist);
                                $list = "";
                                foreach($skilllist as $key => $value)
                                    {
                                        $eachlist = explode("/~",$value);	
                        
                                        $list= '<div class="skillcont" ><div class="row"><div class="col-lg-4"><label for="skilltitle">Skill Name</label><br /><input type="text" class="skillname" name="skill[]" value="'.$eachlist[1].'"/></div><div class="col-lg-4"><label for="capacity">Capacity</label><br /><input class="range skillrange" type="range" name="capacity[]" min="0" max="100" value="'.$eachlist[2].'" /></div><div class="col-lg-4"><div class="addbtnbx moreskills"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div><div class="delbtnbx deleteskill"><i class="fa-solid fa-circle-minus"></i></div></div></div></div>';
                
                                        echo $list;
                                    }
                            }else{?>
                                <div class="skillcont" >
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="skilltitle">Skill Name</label><br />
                                            <input type="text" class="skillname" name="skill[] "/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="capacity">Proficiency</label><br />
                                            <input class="range skillrange" type="range" name="capacity[]" min="0" max="100" />
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="addbtnbx moreskills"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                            <br /><hr /> 
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section6">Prev</button>
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section8" id="skillsub">Next</button>
                        </div>


                        <div class="section" id="section8">
                            <h4>Social Media</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="facebook">Facebook</label><br />
                                    <input type="url" name="facebook" id="fb" placeholder="https://...." value="<?php if(!$rwres['facebook']==""){echo $rwres['facebook'];} ?>" />
                                </div>
                                <div class="col-lg-4">
                                    <label for="twitter">Twitter</label><br />
                                    <input type="url" name="twitter" id="tw" placeholder="https://...." value="<?php if(!$rwres['twitter']==""){echo $rwres['twitter'];} ?>" />
                                </div>
                                <div class="col-lg-4">
                                    <label for="linkedin">Linkedin</label><br />
                                    <input type="url" name="linkedin" id="linkedin" placeholder="https://...." value="<?php if(!$rwres['linkedin']==""){echo $rwres['linkedin'];} ?>" />
                                </div>
                            </div>
                            <br /><hr /> 
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section7">Prev</button>
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section9">Next</button>
                        </div>

                        <div class="section" id="section9">
                            <h4>Interests</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea name="interests" id="interests" class="editor" cols="30" rows="3" maxlength="500"><?php if(!$rwres['interests']==""){echo $rwres['interests'];} ?></textarea><br /><i class="italic">*Max 500 characters</i>
                                </div>
                            </div>
                            <br /><hr /> 
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section8">Prev</button>
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section10">Next</button>
                        </div>


                        <div class="section" id="section10">
                            <h4>References</h4>
                            <div class="refbar">
                            <?php if(!$rwres['referees']==""){
                                $refs= explode("||", $rwres['referees']);
                                $refs= array_filter($refs);
                                
                                $reflist = "";
                                foreach($refs as $key => $value)
                                    {
                                        $refsent = explode("/~",$value);	

                                        $reflist= '<div class="refmore"> <hr /> <div class="row"> <div class="col-lg-12"> <label for="refname">Referee Name</label><br /> <input type="text" class="refname" name="refname[]" value="'.$refsent[1].'" /> </div> </div> <div class="row"> <div class="col-lg-6"> <label for="orgcom">Organization/Company</label><br /> <input type="text" class="reforg" name="orgcom[]" value="'.$refsent[3].'" /> </div> <div class="col-lg-6"> <label for="reftitle">Occupation Title</label><br /> <input type="text" class="refpos" name="reftitle[]" value="'.$refsent[2].'"  /> </div> </div> <div class="row"> <div class="col-lg-6"> <label for="refemail">Email</label><br /> <input type="email" class="refemail" name="refemail[]" value="'.$refsent[4].'" /> </div> <div class="col-lg-6"> <label for="refnareftelme">Telephone</label><br /> <input type="tel" class="reftel" name="reftel[]" value="'.$refsent[5].'" /> </div> </div> <div class="row justify-content-end"> <div class="col-lg-4"> <div class="addbtnbx moreref"><i class="fa-solid fa-circle-plus"></i></div> <div class="delbtnbx deleteref"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div>';
                
                                        echo $reflist;
                                    }   
                            }else{?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="refname">Referee Name</label><br />
                                        <input type="text" class="refname" name="refname[]" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="orgcom">Organization/Company</label><br />
                                        <input type="text" class="reforg"  name="orgcom[]" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="reftitle">Occupation Title</label><br />
                                        <input type="text" class="refpos"  name="reftitle[]" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="refemail">Email</label><br />
                                        <input type="email" class="refemail"  name="refemail[]" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="refnareftelme">Telephone</label><br />
                                        <input type="tel" class="reftel"  name="reftel[]" />
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-2">
                                        <div class="addbtnbx moreref"><i class="fa-solid fa-circle-plus"></i></div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                            <br /><hr /> 
                            <button type="button" class="btn btn-primary next-prev" data-next-prev="section9">Prev</button>
                            <input type="submit" class="submit" name="saveresume" value="Save Resume" />
                            <button type="button" class="rounded-white-btn small-btn" id="myBtn">View Resume</button>
                        </div>   
                    </div>
                    </form>

                   </div>
                </div>
                <div class="col-lg-5" style="position:relative;">
                    <a href="controller/checktemp.php?tplid=<?php echo $cvtpl; ?>&temptype=resume" title="Download" id="downloadrec" class="rounded-white-btn floataboveright"><i class="fa-solid fa-download"></i></a>
                    <div class="cvresized" id="resumebx">
                        <?php echo $rwresume['tempcode']; ?>
                    </div>

                    <p style="position: absolute;top: 21em;left: 7em;z-index: 10;"><button id="downnow" class="rounded-white-btn" style="display:none">Download Now</button></p>
                </div>
            </div>
        </article>
    </div>
    <div class="container12 tempbx">
        <div class="moretpl">More Templates</div>
        <article class="" id="">
            <div class="slidex row">
                <?php
                if(!$rwres["cvtemp"]==""){
                    $sql="SELECT * FROM ".$prefix."resume_templates";
                    $result= $db->conn->query($sql);
                    $tempbx="";
                    $temptype="";
                    while($rws = $result->fetch_array()){
                        if($rws['type']=="free"){
                            $temptype = "<i>Free</i>";
                        }else{
                            $temptype = "<b>Cost:</b> Kes.".$rws['tempcost'];
                        }

                        $tempbx = "<div class='col-lg-3'>";
                        $tempbx .= "<div class='tempimg' style='background:url(manage/cover-views/".$rws['tempimg'].") no-repeat center; background-size:cover'></div>";
                        $tempbx .= "<div class='cont aligncenter'><h5 class='aligncenter'>".$rws['tempname']."</h5><p>".$temptype."</p><p><a class='small-round-btn' href='cv.php?cvtpl=".$rws['id']."'>Use Template</a></p></div>";
                        $tempbx .= "</div>";

                        echo $tempbx;
                    }
                } 
                ?>
            </div>
        </article>
    </div>

    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content"></div>
    </div>
    
    <?php include "includes/footer.inc"; ?>

    <script src="manage/assets/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="assets/js/slick.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        
        $(document).ready(function() {
            mce();

			$(document).on('click', '.moreschool' ,function(){
				$('.com-edu').append('<div class="educont"> <hr /> <div class="row"> <div class="col-lg-6"> <label for="work">Education Level</label><br /> <select name="educationlevel[]" class="educ" required> <option>...</option> <option value="Secondary">Secondary</option> <option value="Certificate">Certificate</option> <option value="Diploma">Diploma</option> <option value="Bachelors">Bachelors</option> <option value="Post Graduate Diploma">Post Graduate Diploma</option> <option value="Masters">Masters</option> </select> </div> <div class="col-lg-6"> <label for="Institution">School/Institution</label><br /> <input type="text" class="inst" name="institution[]" required /> </div> </div> <div class="row"> <div class="col-lg-4"> <label for="comyearfrom">From</label><br /> <input type="number" name="comyearfrom[]" class="edufrom" min="1960" max="2099" step="1" required /> </div> <div class="col-lg-4"> <label for="comyearto">To</label><br /> <input type="number" name="comyearto[]" class="eduto" min="1960" max="2099" step="1" required /> </div> </div> <div class="row"> <div class="col-lg-12"> <label for="schoolcomment">Area of Study/Course</label><br /> <textarea rowspan="3" class="editor eduach" name="schoolcomment[]"></textarea> </div> </div> <div class="row justify-content-end"> <div class="col-lg-4"> <div class="addbtnbx moreschool"><i class="fa-solid fa-circle-plus"></i></div> <div class="delbtnbx deleteedu"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div>');
                mce();
 
			});
			$(document).on('click','.deleteedu', function(){
                if(confirm("Are you sure you want to delete this?") == true){
				    $(this).closest(".educont").remove();
                };
			});

            $(document).on('click', '.morework' ,function(){
				$('.com-work').append('<div class="workcont"> <hr /> <div class="row"> <div class="col-lg-6"> <label for="work">Company/Organization</label><br /> <input type="text" class="company" name="company[]" /> </div> <div class="col-lg-6"> <label for="occupation">Position</label><br /> <input type="text" class="pos" name="occupation[]" /> </div> </div> <div class="row"> <div class="col-lg-4"> <label for="workyearcorfrom">From</label><br /> <input type="month" class="comfrom"  name="workyearfrom[]" placeholder="YYYY-MM" /> </div> <div class="col-lg-4"> <label for="workyearto">To</label><br /> <input type="month"  class="comto"  name="workyearto[]" placeholder="YYYY-MM" /> </div> </div> <div class="row"> <div class="col-lg-12"> <label for="workcomment">Key Responsibilities</label><br /> <textarea rowspan="3" class="editor comach" name="workcomment[]" ></textarea> </div> </div> <div class="row justify-content-end"> <div class="col-lg-4"> <div class="addbtnbx morework"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div> <div class="delbtnbx deletework"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div>');
                mce();
			});
			$(document).on('click','.deletework', function(){
                if(confirm("Are you sure you want to delete this record?") == true){
				    $(this).closest(".workcont").remove();
                };
			});
            
            
            $(document).on('click', '.moreskills' ,function(){
				$('.skillbar').append('<div class="skillcont" ><div class="row"><div class="col-lg-4"><label for="skilltitle">Skill Name</label><br /><input type="text" class="skillname" name="skill[] "/></div><div class="col-lg-4"><label for="capacity">Capacity</label><br /><input class="range skillrange" type="range" name="capacity[]" min="0" max="100" /></div><div class="col-lg-4"><div class="addbtnbx moreskills"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div><div class="delbtnbx deleteskill"><i class="fa-solid fa-circle-minus"></i></div></div></div></div>');
			});
			$(document).on('click','.deleteskill', function(){
                if(confirm("Are you sure you want to delete this record?") == true){
                    $(this).closest(".skillcont").remove(); 
                };
				
			});

            $(document).on('click', '.moreref' ,function(){
				$('.refbar').append('<div class="refmore"> <hr /> <div class="row"> <div class="col-lg-12"> <label for="refname">Referee Name</label><br /> <input type="text" name="refname[]" /> </div> </div> <div class="row"> <div class="col-lg-6"> <label for="orgcom">Organization/Company</label><br /> <input type="text" name="orgcom[]" /> </div> <div class="col-lg-6"> <label for="reftitle">Occupation Title</label><br /> <input type="text" name="reftitle[]" /> </div> </div> <div class="row"> <div class="col-lg-6"> <label for="refemail">Email</label><br /> <input type="email" name="refemail[]" /> </div> <div class="col-lg-6"> <label for="refnareftelme">Telephone</label><br /> <input type="tel" name="reftel[]" /> </div> </div> <div class="row justify-content-end"> <div class="col-lg-4"> <div class="addbtnbx moreref"><i class="fa-solid fa-circle-plus"></i></div> <div class="delbtnbx deleteref"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div>');
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
            
            
        });
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js"></script>
    <script src="assets/js/cv.js" referrerpolicy="origin"></script>

</body>
</html>