<?php @session_start(); ?>
<?php  if(empty($_SESSION['user_id'])){echo "<meta http-equiv='refresh' content='0;url=index.php'/>";exit();} ?>
<?php  include'jquery.php';?>
<?php  include'header.php';?>
<meta charset="utf-8"> 
<?PHP include'connect.php';?>
<?PHP
 echo "<br><br><br><br>";
 
      $name=$_POST[name];	 	  	 
    
 	  
	if($_POST[method]=='update'){
		$hospital=$_POST[hospital];
                $m_name=$_POST[m_name]; 
                function removespecialchars($raw) {
    return preg_replace('#[^a-zA-Z0-9.-]#u', '', $raw);
}
        if (trim($_FILES["image"]["name"] != "")) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], "logo/" . removespecialchars(date("d-m-Y/") . "1" . $_FILES["image"]["name"]))) {
        $file1 = date("d-m-Y/") . "1" . $_FILES["image"]["name"];
        $image = removespecialchars($file1);
    }
}  else {
    $image ='';
}
if($image !=''){
		$sqlUpdate=mysql_query("update hospital SET name='$name',manager='$m_name',logo='$image'   
		where hospital='$hospital' "); 	
                }else{
                $sqlUpdate=mysql_query("update hospital SET name='$name',manager='$m_name'   
		where hospital='$hospital' ");
                }
	
 							if($sqlUpdate==false){
											 echo "<p>";
											 echo "Update not complete".mysql_error();
											 echo "<br />";
											 echo "<br />";

											 echo "	<span class='glyphicon glyphicon-remove'></span>";
											 echo "<a href='frmHospital.php' >กลับ</a>";
		
								}else{
								    echo	 "<p>&nbsp;</p>	";
								    echo	 "<p>&nbsp;</p>	";
									echo " <div class='bs-example'>
									              <div class='progress progress-striped active'>
									                <div class='progress-bar' style='width: 100%'></div>
									              </div>";
										echo "<div class='alert alert-info alert-dismissable'>
								              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								               <a class='alert-link' target='_blank' href='#'><center>แก้ไขข้อมูลเรียบร้อย</center></a> 
								            </div>";								
							 		 	 echo" <META HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php'>";
								}
   
   }//-----------------------------------------end update
    
	    mysql_close($con); ?>
 
	
	
 
