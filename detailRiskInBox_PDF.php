<?php @session_start(); ?>
<?php include 'connect.php'; ?>
<?php if(empty($_SESSION['user_id'])){echo "<meta http-equiv='refresh' content='0;url=index.php'/>";exit();} ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>ระบบบริหารความเสี่ยงโรงพยาบาล</title>
        <LINK REL="SHORTCUT ICON" HREF="./images/logo.png">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Add custom CSS here -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <!-- Page Specific CSS -->
        <link rel="stylesheet" href="css/morris-0.4.3.min.css">
        <link rel="stylesheet" href="css/stylelist.css">
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/excellentexport.js"></script>

        <!-- InstanceBeginEditable name="head" -->
        <script language="javascript" src="chart/FusionCharts/FusionCharts.js"></script>
    </head>
    <body>

<?php include 'jquery.php';
$status_process=$_REQUEST['status_process']; ?>
<script type="text/javascript">
function nextbox(e, id) {
    var keycode = e.which || e.keyCode;
    if (keycode == 13) {
        document.getElementById(id).focus();
        return false;
    }
}
</script>
<!-- ฟังก์ชั่นปริ้นท์ -->
 <script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php
$user_edit=$_SESSION['user_id'];
$takerisk_id=$_GET[takerisk_id];
include 'connect.php';
$sql=mysql_query("select concat(u1.user_fname,' ',u1.user_lname) as user_write_name,t1.*,d1.name as department_name ,p1.name as place_name  ,c1.name as category_name ,s1.name as subcategory_name,t1.detail_recycle,t1.recycle 
,t1.move_status,t1.receive_date,
(select concat(u1.user_fname,' ',u1.user_lname) from takerisk t1 LEFT OUTER JOIN user u1 ON u1.user_id=t1.receiver where t1.takerisk_id='$takerisk_id') user_receiver,
(select concat(u1.user_fname,' ',u1.user_lname) from takerisk t1 LEFT OUTER JOIN user u1 ON u1.user_id=t1.return_user where t1.takerisk_id='$takerisk_id') return_user    
from takerisk t1
LEFT OUTER JOIN department d1 ON d1.dep_id=t1.res_dep
LEFT OUTER JOIN place p1 ON p1.place=t1.take_place
LEFT OUTER JOIN category c1 ON c1.category=t1.category
LEFT OUTER JOIN user u1 ON u1.user_id=t1.user_id
LEFT OUTER JOIN subcategory s1 ON s1.subcategory=t1.subcategory
where t1.takerisk_id='$takerisk_id' " );
$result=mysql_fetch_assoc($sql);
echo mysql_error();
								include_once ('funcDateThai.php');
								$take_date= "$result[take_date]";
								DateThai1($take_date); //-----แปลงวันที่เป็นภาษาไทย
?>
        <?php
require_once('MPDF54/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ*/
?>
    <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-envelope"></span> รายละเอียด</h3>
              </div>
              <div class="panel-body">
              <table width='100%'>
              <thead>
              <tr><th width='35%' align="right" valign="top">HN : </th><td  width='80%'><?php echo $result[hn];?></td></tr>    
              <tr><th align="right" valign="top">AN : </th> <td><?php echo $result[an];?></td></tr>
              <tr><th align="right" valign="top">บุคลากรที่ประสบเหตุการณ์ : </th> <td><?php echo $result[take_other];?></td></tr>  
              <tr><th align="right" valign="top">วันที่เกิดเหตุ : </th> <td><?php echo DateThai1($take_date);?></td></tr> 
               <tr><th align="right" valign="top">เวลา : </th> <td><?php echo $result[take_time];?></td></tr>
               <tr><th align="right" valign="top">วันที่บันทึกความเสี่ยง : </th> <td><?php echo DateThai1($result[take_rec_date]);?></td></tr>
               <tr><th align="right" valign="top">สถานที่เกิดเหตุ : </th> <td><?php echo $result[place_name];?></td></tr> 
               <tr><th align="right" valign="top">หน่วยงานที่เกี่ยวข้อง : </th> <td><?php echo $result[department_name]; $take_dep=$result[res_dep];?></td></tr> 
               <tr><th align="right" valign="top">หมวดความเสี่ยง : </th> <td><?php echo $result[category_name];?></td></tr>
               <tr><th align="right" valign="top">รายการความเสี่ยง : </th> <td><?php echo $result[subcategory_name];?></td></tr>
               <tr><th align="right" valign="top">ระดับ : </th> <td><?php echo $level_risk=$result[level_risk];?></td></tr>  
               <tr><th align="right" valign="top">รายละเอียดเหตุการณ์ความเสี่ยง : </th> <td><?php echo $result[take_detail];?></td></tr> 
	       <tr><th align="right" valign="top">การแก้ไขเบื้องต้น : </th> <td><?php echo $result[take_first];?></td></tr> 
               <tr><th align="right" valign="top">ข้อเสนอแนะ : </th> <td><?php echo $result[take_counsel];?></td></tr>
               <tr><th align="right" valign="top">เหตุผลที่ย้ายลงถังขยะ : </th> <td><?php echo $result[detail_recycle];?></td></tr>
              </thead>

               <?php 
               $takerisk=$result[takerisk_id];
               $sqlCheckMove=mysql_query("select mng_status from mngrisk where takerisk_id='$takerisk' ");
               $resultCheckMove=mysql_fetch_assoc($sqlCheckMove);
               ?>
              </table>
            	  		</div>
             		 </div>
              <div class="row">
          <div class="col-lg-12">

<?php								
             	if($result[recycle]=='N'){
             	if($result[rca]=='Y'){
				include'rcaForm.php';
				}else{
 				 include'normalForm.php';		 
				}//end else Level F-I ---------------------------  
				
                }
			?>
               
             		 
            	  </div>
              </div><br><br>
              *** เอกสารสำหรับคณะกรรมการความเสี่ยง ห้ามเผยแพร่ ***
          </div>
    </div>
<?php
$time_re=  date('Y_m_d');
$reg_date=$work[reg_date];
$html = ob_get_contents();
ob_clean();
$pdf = new mPDF('th', 'A4', '10', 'THSaraban');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("MyPDF/risk_$takerisk_id.pdf");
echo "<meta http-equiv='refresh' content='0;url=MyPDF/risk_$takerisk_id.pdf' />";
?>

 
 <?php include 'footer.php';?>
