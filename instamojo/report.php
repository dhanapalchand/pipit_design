<?php
$conn=mysqli_connect("localhost","u398861621_pg","Amit@8255","u398861621_pg") or die("connection failed");
$sql="SELECT * FROM `transaction`";
$qry=mysqli_query($conn,$sql);


?>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="tg">
<thead>
  <tr>
    <th class="tg-0lax">id</th>
    <th class="tg-0lax">name</th>
    <th class="tg-0lax">phone</th>
    <th class="tg-0lax">amount</th>
    <th class="tg-0lax">url</th>
    <th class="tg-0lax">time</th>
  </tr>
</thead>
<tbody>
    <?php
    $total=0;
    while($res=mysqli_fetch_array($qry)){ 
    $total+=$res['amount'];
    ?>
  <tr>
      
    <td class="tg-0lax"><?php echo $res['id'];?></td>
    <td class="tg-0lax"><?php echo $res['name'];?></td>
    <td class="tg-0lax"><?php echo $res['phone'];?></td>
    <td class="tg-0lax"><?php echo $res['amount'];?></td>
    <td class="tg-0lax"><?php echo $res['sendurl'];?></td>
    <td class="tg-0lax"><?php echo $res['timeneeded'];?></td>
  </tr>
  
  <?php }; ?>
  
</tbody>
</table>

<h2><?php echo "Rs.".$total; ?></h2>