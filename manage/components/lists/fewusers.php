<h4>Recently Added Users</h4>
<table class="sorttable">
    <thead>
        <tr>
            <th>User's Name</th>
            <th>E-mail</th>
            <th>Joined On</th>
            <th>Sub type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
            $sql="SELECT * FROM ".$prefix."users a LEFT JOIN ".$prefix."user_subscription b ON a.id=b.userid ORDER BY a.id DESC LIMIT 10";
            $result= $db->conn->query($sql);
            $tempbx="";
            $temptype="";
            while($rws = $result->fetch_array()){
                $m = "<tr><td>".$rws['fname']."&nbsp;".$rws['lname']."</td>";
                $m .= "<td>".$rws['email']."</td>";
                $m .= "<td> ".$rws['createdon']."</td>";
                $m .= "<td> ".$rws['subtype']."</td>";
                $m .= "<td><a style='text-align:center; display:block' href='viewuser.php?u=".$rws['usercode']."'><i class='fa-solid fa-eye'></i></a></td>";
                $m .= "</tr>";

                echo $m;
            }
        ?>
        
    </tbody>
</table>
<p><a class="rounded-white-btn" href="allusers.php">See All Users</a></p>