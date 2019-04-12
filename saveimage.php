 
 
 
<?php
include("mysqlconnect.php");

    function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'file/cpp': return '.cpp';
           case 'file/c': return '.c';
           case 'file/txt': return '.txt';
           case 'file/docx': return '.docx';
           default: return false;
       }
     }
	 
	 
	 
if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=$_FILES["uploadedimage"]["name"];
	$target_path = "images/".$imagename;
	

if(move_uploaded_file($temp_name, $target_path)) {

 	$query_upload="INSERT into images_tbl(image_name,images_path,submission_date) VALUES ('".$imagename."','".$target_path."','".date("Y-m-d")."')";
	mysqli_query($conn,$query_upload) or die("error in $query_upload == ----> ".mysqli_error($conn));  
	
}else{

   exit("Error While uploading image on the server");
} 

}

//$select_query = "SELECT images_path FROM images_tbl ORDER by images_id DESC";
$select_name = "SELECT image_name FROM images_tbl ORDER by images_id DESC";
//$sql = mysqli_query($conn,$select_query) or die(mysqli_error($conn));	
$file_name = mysqli_query($conn,$select_name) or die(mysqli_error($conn));
//$rs = mysql_fetch_array($file_name);
while($row = mysqli_fetch_array($file_name,MYSQLI_BOTH)){

?>
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/styles.css">
<link rel="stylesheet" href="style/table.css">
<div class="start" align="center">
	<div class="floatleft">
	<div class="tablebox">
	<table>
	  <tr>
	    <td><a href="display_file.php"><?php echo $row["image_name"]; ?></a></td>
	</table>

<?php
}
?>

