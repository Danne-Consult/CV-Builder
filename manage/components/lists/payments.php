<h4>Completed Transactions</h4>
<table class="sorttable">
    <thead>
        <tr>
            <th>Payment Ref</th>
            <th>User's Name</th>
            <th>Paid on</th>
            <th>Sub Type</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
            $sql="SELECT * FROM ".$prefix."invoices a LEFT JOIN ".$prefix."users b ON a.userid = b.usercode WHERE a.paystatus='paid' LIMIT 10";
            $result= $db->conn->query($sql);
            $tempbx="";
            $temptype="";
            while($rws = $result->fetch_array()){
                $m = "<tr><td>".$rws['invoiceno']."</td>";
                $m .= "<td>".$rws['fname']."&nbsp;".$rws['lname']."</td>";
                $m .= "<td> ".$rws['paidon']."</td>";
                $m .= "<td> ".$rws['paytype']."</td>";
                $m .= "<td><a style='text-align:center; display:block' href='viewuser.php?u=".$rws['usercode']."'><i class='fa-solid fa-eye'></i></a></td>";
                $m .= "</tr>";

                echo $m;
            }
        ?>
        
    </tbody>
</table>
<p><a class="rounded-white-btn" href="transactions.php">See Transactions</a></p>