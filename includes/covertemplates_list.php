<div class="slidex row">
    <?php
        $sql4="SELECT * FROM ".$prefix."coverletter_templates ORDER BY FIELD(probasic, 'Basic', 'Pro', 'Premium')";
        $result4= $db->conn->query($sql4);
        $tempbx1="";
        $temptype="";
        while($rws4 = $result4->fetch_array()){
            
            $tempbx1 = "<div class='col-lg-3'>";
            $tempbx1 .= "<div class='tempimg' style='background:url(manage/cover-views/".$rws4['tempimg'].") no-repeat center; background-size:cover'>";
            $tempbx1 .= "<div class='cont aligncenter'><h5 class='aligncenter'>".$rws4['tempname']."</h5><br /><p><a class='small-round-btn' href='coverletter.php?clt=".$rws4['id']."'>Use Template</a></p></div><div class='probasic ".$rws4['probasic']."'>".$rws4['probasic']."</div>";
            $tempbx1 .= "</div></div>";

            echo $tempbx1;
        }
    ?>
</div>