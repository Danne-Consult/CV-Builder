<?php
    $sql1 = "SELECT * FROM ".$prefix."subscription_plans";
    $result1 = $db->conn->query($sql1);
    $trws = mysqli_num_rows($result1);
    $rws = $result1->fetch_array();


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
                    <div class="planbx aligncenter" style="color:#fff; background-color:<?php echo $rws['bgcolor']; ?>;">
                        <h3><?php echo $rws['subscription']; ?> <br />Plan</h3>
                        <p><span>
                            <?php
                                if($rws['weeks']==1){
                                    echo $rws['weeks'] . " week access plan";
                                }
                                else if($rws['weeks']>1){
                                    $days = $rws['weeks'] * 7;
                                    $months = floor($days/30);
                                    echo $months. " months access plan";
                                }
                            ?>


                        </span></p>
                        <div class="cost" style="color:<?php echo $rws['bgcolor']; ?>; background-color:#fff;">Kes. <?php echo number_format($rws['cost']); ?></div>
                        <p>Number of downloads<br /><span><?php echo $rws['downlimit']; ?> unique <?php echo $protemp; ?> CVs</span><br /><span><?php echo $rws['downlimit']; ?> unique <?php echo $protemp; ?> cover letter</span></p>
                        <p>Unlimited Access<br /><span>Yes</span></p>
                        <p>Share link for your CV/resume &nbsp;<i class="fa-solid fa-check"></i></p><br />
                        <p><a href="controller/subscription.php?t=<?php echo $rws['subscription']; ?>&w=<?php echo $rws['weeks']; ?>&cost=<?php echo $rws['cost']; ?>" class="rounded-white-btn" style="box-shadow: #19181894 1px 1px 6px;">Select Plan</a></p>
                    </div>
                </div>
            <?php
        }
    }
?>