<?php
    if($trws==0){
        echo "Oh oh! No plans found";
    }else if($rws['visible']!==0){
        $protemp = "";
        while($rws = $result1->fetch_array()){

            if($rws['subscription']=="Basic"){
                $protemp = "Basic";
            }else{
                $protemp = "";
            }
            ?>
                    <div class="col-lg-3">
                    <div class="planbx aligncenter" style="border-top:10px solid <?php echo $rws['bgcolor']; ?>;">
                        <h3 style="color:<?php echo $rws['bgcolor']; ?>;"><?php echo $rws['subscription']; ?> <br />Plan</h3>
                        <p><span><?php echo $rws['weeks']; ?> week access plan</span></p>
                        <div class="cost" style="background-color:<?php echo $rws['bgcolor']; ?>;">Kes. <?php echo number_format($rws['cost']); ?></div>
                        <p>Number of downloads<br /><span><?php echo $rws['downlimit']; ?> unique <?php echo $protemp; ?> CVs</span><br /><span><?php echo $rws['downlimit']; ?> unique <?php echo $protemp; ?> coverletter</span></p>
                        <p>Unlimited Access<br /><span>Yes</span></p>
                        <p>Share link for your CV/resume &nbsp;<i class="fa-solid fa-check"></i></p><br />
                        <p><a href="controller/subscription.php?t=<?php echo $rws['subscription']; ?>&w=<?php echo $rws['weeks']; ?>&cost=<?php echo $rws['cost']; ?>" class="rounded-white-btn">Select Plan</a></p>
                    </div>
                </div>
            <?php
        }
    }
?>