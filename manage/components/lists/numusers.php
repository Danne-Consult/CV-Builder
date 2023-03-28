<div class="numusers">
    <?php
     $sql="SELECT * FROM ".$prefix."users a LEFT JOIN ".$prefix."user_subscription b ON a.id=b.userid ORDER BY a.id DESC LIMIT 10";
     $result= $db->conn->query($sql);
     $trws = mysqli_num_rows($result);
     echo "<span class='smalltext'>Number of users</span><br />".$trws;
    ?>

</div>