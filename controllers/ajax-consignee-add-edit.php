<?php
include('../includes/db-connect.php');
if($_POST['pid']){
$id=$_POST['pid'];
if($id==0){
	echo '<label>Consignee Type:<span class="text-danger">*</span></label>
           <input type="text" class="form-control" placeholder="consignee" name="consignee-type">';
}else{
	$sel = mysqli_query($conn,"SELECT * FROM consignee WHERE id='$id'");
	while($row = mysqli_fetch_array($sel)){
		echo '<label>Consignee Type:<span class="text-danger">*</span></label>
           <input type="text" class="form-control" placeholder="consignee" name="consignee-type" value="'.$row['entry_type'].'" readonly>';
		}
	}
}
?>
