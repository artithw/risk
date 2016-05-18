﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>ทำปฏิทิน Datepicker ไทยแบบปีพุทธศักราช (พ.ศ.) (พัฒนาโดย Anassirk.Com)</title>
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
		<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


		    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

		    $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

		    $("#datepicker-th-2").datepicker({ changeMonth: true, changeYear: true,dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay,dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

     		    $("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});

		    $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });


			});
		</script>
		<style type="text/css">

			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
		</style>	
	</head>
	<body>

	  <center><h1>ทำปฏิทิน Datepicker ไทยแบบปีพุทธศักราช (พ.ศ.) (พัฒนาโดย Anassirk.Com)</h1></center>

    <!-- Datepicker -->
    <h2 class="demoHeaders">ตัวอย่างการทำงาน</h2>

   <!-- จะให้ Textbox ไหนที่มีปฏิทินให้เลือก ก็ใส่ id="..." ลงไปน่ะครับ หลักการมีแค่นี้เอง -->

    แบบปี พ.ศ. ไม่สามารถเลือกเดือน/ปีได้ : <input type="text" size="10" id="datepicker-th" name="date0" /><br>
    แบบปี พ.ศ. สามารถเลือกเดือน/ปีได้ : <input type="text" size="10" id="datepicker-th-2" name="date1" /><br>
    แบบปี ค.ศ. : <input type="text" size="10" id="datepicker-en" name="date2" /><br>
    แบบปี ค.ศ. Inline : <div id="inline"></div><br><br>

    <h2>วิธีการใช้งาน</h2>
    <p>
      plugin นี้ base on Datepicker ใน jQuery UI v1.8.10 ซึ่งต้องการ jQuery 1.4+ ครับ<br />
      การใช้งานเหมือน <a href="http://jqueryui.com/demos/datepicker/">Datepicker ปกติ</a> ของ jQuery แต่มี option เพิ่มขึ้นมา 1 อันคือ <strong>"isBuddhist" </strong>           
    </p>
    <p>กรณี พ.ศ. ให้ใช้แบบนี้: <br />
    $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay });
    </p>
    <ul>
      <li>isBuddhist ให้ใส่ true</li>
      <li>ใน version นี้ <strong>ต้องใส่</strong> defaultDate ใน format วันที่พ.ศ.ด้วย ไม่เช่นนั้นปฏิทินจะแสดงผลผิดไปเป็น ค.ศ.</li>
    </ul>
    <p>กรณี ค.ศ. ให้ใช้แบบปกติเลย: <br />
    $("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});
    </p>
    <ul>
      <li>isBuddhist ให้ใส่ false หรือไม่ต้องใส่ก็ได้</li>
      <li>defaultDate ไม่ต้องใส่ก็ได้ หรือถ้าใส่ให้ใส่วันที่เป็นค.ศ. (ถ้าไม่ใส่ ปฏิทินจะแสดงวันที่ของวันนี้ในรูปแบบค.ศ.)</li>
      <li>ใช้แบบ inline ได้ตามปกติ</li>
    </ul>
    <p>อนึ่ง อันนี้ผมทำใช้เอง จึง test ตามที่ผมใช้เท่านั้น ที่ทำขึ้นมาเพราะ google แล้วไม่เจอ (เจอแต่คนถามหา) หากมี bug หรือข้อแนะนำใดๆเชิญ email: kriss@anassirk.com</p>
	</body>
</html>


