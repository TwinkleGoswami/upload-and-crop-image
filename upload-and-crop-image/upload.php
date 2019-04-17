<?php
$connect = mysqli_connect("localhost","root","","ajax_crud");
if(isset($_POST["image"]))
{
	$data = $_POST["image"];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);
	$imageName = time() . '.png';
    $sql="INSERT INTO `crop_file`(`image`) VALUES ('$imageName')";
    mysqli_query($connect,$sql);
	file_put_contents("uploads/".$imageName, $data);
	echo '<img src="uploads/'.$imageName.'" class="img-thumbnail" />';
}
?>