<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>

<body>
 	<p><h3>  &nbsp;&nbsp;รายงานจำนวนผู้ป่วยแยกตามภูมิภาค / จังหวัด</h3></p>

		  <!-- <p><h2>  &nbsp;&nbsp;รายงานจำนวนผู้ป่วยแยกตามภูมิภาค / จังหวัด</h2></p> -->
	
<?
			include'DBConn.php'; 
// $geo_id=1;
	 $geo_id=$_GET[geo_id];
     if($geo_id=='1'){
		 $geo_name='ภาคเหนือ';
	 }else if($geo_id=='2'){
			$geo_name='ภาคกลาง';
	 }else if($geo_id=='3'){
			$geo_name='ภาคตะวันออกเฉียงเหนือ';
	 }else if($geo_id=='4'){
			$geo_name='ภาคตะวันตก';
	 }else if($geo_id=='5'){
			$geo_name='ภาคตะวันออก';
	 }else if($geo_id=='6'){
			$geo_name='ภาคใต้';
	 }else{
		 $geo_id=='';
	 }
			
			if($geo_id!=''){
 		 	$strQuery = "select   p.PROVINCE_NAME  ,count(t.pt_id) as count_pt_id from  pt  t ,province p where  t.chwpart=p.PROVINCE_CODE
			and GEO_ID='$geo_id' group by   p.PROVINCE_CODE ";
				//Iterate through each factory
				$result2 = mysql_query($strQuery) or die(mysql_error()); 
			  if ($result2) {
					  while($ors2 = mysql_fetch_array($result2)){
						$name.= "'$ors2[PROVINCE_NAME]'".',';
						$countnum.= "$ors2[count_pt_id]".',';
				   } 
					} 
			}else{
 		 	$strQuery = "select   p.GEO_ID  ,count(t.pt_id) as count_pt_id from  pt  t ,province p where  t.chwpart=p.PROVINCE_CODE
			  group by   p.GEO_ID order by p.GEO_ID ";
			//Iterate through each factory
				$result2 = mysql_query($strQuery) or die(mysql_error()); 
			  if ($result2) {
					  while($ors2 = mysql_fetch_array($result2)){

						       if($ors2[GEO_ID]==1){
									 $geo_name='ภาคเหนือ';
								 }else if($ors2[GEO_ID]==2){
										$geo_name='ภาคกลาง';
								 }else if($ors2[GEO_ID]==3){
										$geo_name='ภาคตะวันออกเฉียงเหนือ';
								 }else if($ors2[GEO_ID]==4){
										$geo_name='ภาคตะวันตก';
								 }else if($ors2[GEO_ID]==5){
										$geo_name='ภาคตะวันออก';
								 }else if($ors2[GEO_ID]==6){
										$geo_name='ภาคใต้';
								 }else{
										$geo_name='';
								 }


									$name.= "'$geo_name'".',';
									$countnum.= $ors2[count_pt_id].',';
				   } 
					} 
				}//end else
			 
			 
			


	//ค่าที่นำไปใส่ในกราฟแกน X     $name; 
	//ค่าที่นำไปใส่ในกราฟแกน Y     $count;
  
?>


<!-- 		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 -->		<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'bar'
            },
            title: {
                text: '<? if($geo_id!=''){echo 'จำนวนผู้ป่วยใน'. $geo_name;}else{echo 'จำนวนผู้ป่วยในภูมิภาคตามภูมิลำเนาของผู้ป่วย';}?>'
            },
            subtitle: {
                text: '<? if($geo_id!=''){echo 'จำแนกตามจังหวัด';}else{echo 'จำแนกตามภูมิภาค';}?>'
            },
            xAxis: {
                categories: [<? echo $name ?>],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'จำนวนผู้ป่วย (คน)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.series.name +': '+ this.y +' คน';
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -100,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'จำนวนผู้ป่วย',
                data: [<?echo $countnum ?>]
            
            }]
        });
    });
    
});
		</script> 
	</head>

 
<script src="chart/highcharts.js"></script>
<script src="chart/exporting.js"></script>

<div id="container" style="width: 85%; height: 100%; margin: 0 auto"></div>
<form name="form" id="form" action='index.php'>
                <select name="geo_id" id="jumpMenu" class='required' data-mini="true" data-native-menu="true" onchange="MM_jumpMenu('parent',this,0)"  data-theme='c' />
				<?php include("DBConn.php"); 
				$sql=mysql_query("select * from geography ");
 				echo "<option value='index.php?geo_id=' $sel>ดูรายงานจำนวนผู้ป่วยแยกตามภูมิภาค</option>";
				echo "<option value='index.php?geo_id=' $>ดูทั้งหมด</option>";
				 while($rs=mysql_fetch_assoc($sql)){
 					
				 if($geo_id == $rs['geo_id']){$sel = 'selected';}else{$sel = '';} 
					echo "<option value='index.php?geo_id=$rs[geo_id]'  $sel   >$rs[geo_name]</option>";
					}
				?>
                </select> 
</form>
 
	</body>
</html>
