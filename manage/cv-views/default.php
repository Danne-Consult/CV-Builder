<style>
    /*-- Default CV --*/
    :root{
        --white: #fff;
        --black: #171717;
        --gray: #85888C;
        --orange: #faa31d;
        --navyblue:#114356;
        --navyblur-light:#256179;
        --light-orange: #f9ba5d;
        --success-green:#e1ecd4;
        --error-red:#ecd4d4;

    }
    .cvpage{ width: 900px; min-height: 1250px; background-color: #fff; padding: 4em; margin: 0px auto;}
    .cvpage .thintext{font-size:14.5px; padding: 3em 20px; background-color: #fafafa;}
    .cvpage .thintext .bio{line-height: 2.5;}
    .cvpage h1{font-weight: 300; margin-bottom: 24px; font-size: 61px;}
    .cvpage .socials{font-size:20px;}
    .cvpage .socials a{padding:0px .5em;}

    .cvpage .skillset{width:100%;}
    .cvpage .skillset .skillbx{width: 100%; float: left; margin: 19px 0px;}
    .cvpage .skillset .skillbx .skilldesc{width: 42%; float: left;}
    .cvpage .skillset .skillbx .progbar{width: 50%; background-color: #e0e0e0; float: left; height: 11px; border-radius: 200px; margin-top: 6px;}
    .cvpage .skillset .skillbx .progbar .range{width: 100%; height: 11px; background-color: #164966; border-radius: 200px;}

    .cvpage .fullcont{ padding-left: 30px;}
    .cvpage .fullcont h5{font-weight: 700; font-size: 17px;}
    .cvpage .fullcont h5 span{color: #898989; }
    .cvpage .refbx{margin-bottom:30px;}
</style>
<div class="cvpage">
    <div class="row">
        <div class="col-lg-3 shortcont thintext">
            <h4>Bio</h4>
            <p class="bio"> 
                Gender: <?php echo $rws['gender'];?><br />
                Date of Birth: <?php echo date('D d-M-Y', strtotime($rws['dateofbirth'])) ?><br />
                Email: <?php echo $rws['email'];?><br />
                Mobile: <?php echo $rws['mobile'];?><br />
                Nationality: <?php echo $rws['nationality'];?><br />
                Postal Address: <?php echo $rws['address'];?>-<?php echo $rws['postalcode'];?><br />
            </p>
            <hr /><br />
            <h4>Skills</h4>

            <div class="skillset">
            <?php 
                $skilllist= explode("||", $rws['skills']);
                $skilllist= array_filter($skilllist);
                
                $arrayskillcount = count($skilllist);
                $list = "";
                foreach($skilllist as $key => $value)
                    {
                        $eachlist = explode("/~",$value);	
        
                        $list= '<div class="skillbx"><div class="skilldesc">'.$eachlist[1].'</div><div class="progbar"><div class="range" style="width:'. $eachlist[2] .'%;"></div></div></div>';
                        echo $list;
                    }
            ?>
            <div class="clearfix"></div>
            </div>
            
            <hr /><br />
            <h4>Languages</h4>
            <p><?php echo $rws['languages'];?></p>
            
        </div>
        <div class="col-lg-9 fullcont">
            <h1><?php echo $rws['firstname'];?>&nbsp;<?php echo $rws['lastname'];?></h1>
            <div class="socials">
                <a href="<?php echo $rws['facebook'];?>" target="_new"><i class="fa-brands fa-facebook"></i></a>&nbsp;
                <a href="<?php echo $rws['twitter'];?>" target="_new"><i class="fa-brands fa-twitter"></i></a> &nbsp;
                <a href="<?php echo $rws['linkedin'];?>" target="_new"><i class="fa-brands fa-linkedin"></i></a>
            </div>
            
            <br /><br />
            <h4>About Me</h4>
            <?php echo $rws['aboutme'];?>
            <hr /><br />               
            <h4>Interests</h4>
            <?php echo $rws['interests'];?>
            <hr /><br />            


            <h4>Education Background</h4>
            <?php 
                $edulist= explode("||", $rws['educationlevel']);
                $edulist= array_filter($edulist);
                
                $edulistcount = count($edulist);
                $edu = "";
                foreach($edulist as $key => $value)
                    {
                        $edulist = explode("/~",$value);	
        
                        $edu= '<div class="edubx"><h5>'.$edulist[1].'<br /><span>'. $edulist[2] .' : '.$edulist[3] .'</span></h5><p>'.$edulist[4] .'</p></div>';
                        echo $edu;
                    }
            ?>

            <hr /><br />             
            <h4>Work Experience</h4>
            <?php 
                $wklist= explode("||", $rws['experience']);
                $wklist= array_filter($wklist);
                
                $workcount = count($wklist);
                $edu = "";
                foreach($wklist as $key => $value)
                    {
                        $wklist = explode("/~",$value);	
                        $monthz = explode("~",$wklist[3]);
        
                        $works= '<div class="edubx"><h5>'.$wklist[1].'<br /><span>'. $wklist[2] .' : '. date('M-Y', strtotime($monthz[0])) .' to '. date('M-Y', strtotime($monthz[1])) .' </span></h5><p>'.$wklist[4] .'</p></div>';
                        echo $works;
                    }
            ?>
            <hr /><br />            
            <h4>Other Accreditations/Personal Achievements</h4>
            <?php echo $rws['achievements'];?>
            <hr /><br />            
            <h4>References</h4>
            <div class="row">
            <?php 
                $refs= explode("||", $rws['referencesx']);
                $refs= array_filter($refs);
                
                $refcount = count($refs);
                $reference = "";
                foreach($refs as $key => $value)
                    {
                        $reflist = explode("/~",$value);	
        
                        $reference= '<div class="col-lg-4 refbx">'.$reflist[1].'<br />'. $reflist[2] .'<br />'. $reflist[3] .'<br /><i class="fas fa-at"></i> '.$reflist[4] .'<br /><i class="fas fa-phone"></i> '.$reflist[5] .'</div>';
                        echo $reference;
                    }
            ?>
            </div>
        </div>
    </div>
</div>
