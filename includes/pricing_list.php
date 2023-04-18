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
                    <div class="col-lg-4">
                    <div class="planbx">
                        <div class="top" style="position:relative; color:#fff; background:url(manage/assets/images/<?php echo $rws['bgimg']; ?>) center no-repeat; background-color:<?php echo $rws['bgcolor']; ?>; background-size:cover;     background-blend-mode: multiply;">

                            <h3><?php echo $rws['subscription']; ?> Plan</h3>
                            <p><span>
                                <?php
                                    if($rws['weeks']<=3){
                                        echo $rws['weeks'] . " week access plan";
                                    }
                                    else if($rws['weeks']>4){
                                        $days = $rws['weeks'] * 7;
                                        $months = floor($days/30);
                                        echo $months. " months access plan";
                                    }
                                ?>


                            </span></p>
                            <div class="cost">Kes. <?php echo number_format($rws['cost']); ?></div>
                        </div>
                        <div class="cont">
                            <p>Pay and download a maximum of<br /><span><?php echo $rws['downlimit']; ?> unique <?php echo $protemp; ?> CVs</span><br /><span><?php echo $rws['downlimit']; ?> unique <?php echo $protemp; ?> Cover Letter</span><br />Unlimited Access: <span>Yes</span><br />Share link for your CV/resume &nbsp;<i class="fa-solid fa-check"></i></p><br />
                            <p><a href="controller/subscription.php?t=<?php echo $rws['subscription']; ?>&w=<?php echo $rws['weeks']; ?>&cost=<?php echo $rws['cost']; ?>" class="rounded-white-btn" >Select Plan</a></p>
                        </div>
                        
                    </div>
                </div>
            <?php
        }
    }
?>