<?php
include('../includes/db-connect.php');
if($_POST['pid']){
$id=$_POST['pid'];

if($id==0){
	echo '<input type="hidden" class="form-control" placeholder="consignee" name="consignee-type">';
}else{
	$sel = mysqli_query($conn,"SELECT * FROM consignee WHERE id='$id'");
	while($row = mysqli_fetch_array($sel)){
		echo '<input type="hidden" class="form-control" placeholder="consignee" name="consignee-type" value="'.$row['entry_type'].'" readonly>';
		}
	}
}


?>
