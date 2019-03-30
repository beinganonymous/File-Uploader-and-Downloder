 
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

 	$query_upload="INSERT into images_tbl(images_path,submission_date) VALUES ('".$target_path."','".date("Y-m-d")."')";
	mysqli_query($conn,$query_upload) or die("error in $query_upload == ----> ".mysqli_error($conn));  
	
}else{

   exit("Error While uploading image on the server");
} 

}

$select_query = "SELECT images_path FROM images_tbl ORDER by images_id DESC";
$sql = mysqli_query($conn,$select_query) or die(mysqli_error($conn));	
while($row = mysqli_fetch_array($sql,MYSQLI_BOTH)){

?>

<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<tbody><tr>
<td>
<embed src="<?php echo $row["images_path"]; ?>" width="800px" height="2100px" />

<!--img src="<?php echo $row["images_path"]; ?>" alt="Image" width="200" height="200"-->


</td>
</tr>
</tbody></table>

<?php
}
?>

