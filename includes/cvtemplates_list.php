<div class="slidex row">
    <?php
        $sql3="SELECT * FROM ".$prefix."resume_templates";
        $result3= $db->conn->query($sql3);
        $tempbx="";
        $temptype="";
        while($rws3 = $result3->fetch_array()){
            
            $tempbx = "<div class='col-lg-3'>";
            $tempbx .= "<div class='tempimg' style='background:url(manage/cv-views/".$rws3['tempimg'].") no-repeat center; background-size:cover'>";
            $tempbx .= "<div class='cont aligncenter'><h5 class='aligncenter'>".$rws3['tempname']."</h5><br /><p><a class='small-round-btn' href='cv.php?cvtpl=".$rws3['id']."'>Use Template</a></p></div><div class='probasic ".$rws3['probasic']."'>".$rws3['probasic']."</div>";
            $tempbx .= "</div></div>";

            echo $tempbx;
        }
    ?>
</div>