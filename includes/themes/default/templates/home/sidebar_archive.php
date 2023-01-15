<!------>
<h3 class="title-bar-black"><a href="<?=SCRIPT_URL?>archive/">আর্কাইভ</a></h3>
<div class="panel panel-default epaper">
	  <div class="panel-body">
<?php
$todayDate=($todayDate)?$todayDate:todayDate();
//echo 'today='.$todayDate;
/* Set the date */
$date = @strtotime($todayDate);

$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);
$firstDay = mktime(0,0,0,$month, 1, $year);
#$title = strftime('%B', $firstDay);
$dayOfWeek = date('D', $firstDay);
$daysInMonth = cal_days_in_month(0, $month, $year);
/* Get the name of the week days */
$timestamp = strtotime('next Sunday');
$weekDays = array();
for ($i = 0; $i < 7; $i++) {
#$weekDays[] = strftime('%a', $timestamp);
$weekDays[] = date('D', $timestamp);
$timestamp = strtotime('+1 day', $timestamp);
}
$blank = date('w', strtotime("{$year}-{$month}-01"));
$dateArray = explode("-",$todayDate);
?>
<style>
#day_names{background:#ccc; border: 1px solid #eee; color:#000;}
.calendar_modern .calendar {
  margin: auto;
  width: 100%;
  height: 270px;
}
.calendar_modern .calendar .nav {
  height: 0;
  position: relative;
}
.calendar_modern .calendar .nav i, .calendar_modern .calendar .nav b {
  display: block;
  font-style: normal;
  position: absolute;
  cursor: pointer;
  width: 45px;
  height: 40px;
  z-index: 100;
  top: 0;
}
.calendar_modern .calendar .nav i {
  left: 0;
  border-right: 1px solid #423a37;
  background: url(lft.png) no-repeat center center transparent;
}
.calendar_modern .calendar .nav b {
  right: 0;
  border-left: 1px solid #423a37;
  background: url(rgt.png) no-repeat center center transparent; 
}
.calendar_modern .calendar .month .header {
  height: 40px;
  position: relative;
 
  color: white;
  line-height: 40px;
  font-weight: bold;
  font-size: 1.4em;
  text-align: center;
  background: #372f2c;
  border-radius: 3px;
}
.calendar_modern .calendar .month .body {
  background: #e4e4e4;
}
.calendar_modern .calendar .month .body .day_names {
  height: 25px;
}
.calendar_modern .calendar .month .body .day_names i {
  display: block;
  height: 25px;
  line-height: 25px;
  text-align: center;
  font-style: normal;
  float: left;
  width: 34px;
}
.calendar_modern .calendar .month .body .days i, .calendar_modern .calendar .month .body .days b, .calendar_modern .calendar .month .body .days s, .calendar_modern .calendar .month .body .days a {
 
  display: block;
  float: left;
  width: 36px;
  height: 35px;
  color: #8d8d8d;
  font-size: 14px;
  font-weight: bold;
  line-height: 35px;
  text-align: center;
  font-style: normal;
  background: #e4e4e4;
  text-decoration: none;
  /* table like borders */
  border-right: 1px solid #aaaaaa;
  border-bottom: 1px solid #aaaaaa;
  /* table like borders */
}
.calendar_modern .calendar .month .body .days i.weekend, .calendar_modern .calendar .month .body .days b.weekend, .calendar_modern .calendar .month .body .days s.weekend, .calendar_modern .calendar .month .body .days a.weekend {
  color: #444;
  background: InactiveCaption;
}
.calendar_modern .calendar .month .body .days i:nth-child(7n + 1), .calendar_modern .calendar .month .body .days b:nth-child(7n + 1), .calendar_modern .calendar .month .body .days s:nth-child(7n + 1), .calendar_modern .calendar .month .body .days a:nth-child(7n + 1) {
  border-left: 1px solid #aaaaaa;
}
.calendar_modern .calendar .month .body .days i:nth-child(n+1):nth-child(-n+7), .calendar_modern .calendar .month .body .days b:nth-child(n+1):nth-child(-n+7), .calendar_modern .calendar .month .body .days s:nth-child(n+1):nth-child(-n+7), .calendar_modern .calendar .month .body .days a:nth-child(n+1):nth-child(-n+7) {
  border-top: 1px solid #aaaaaa;
}
.calendar_modern .calendar .month .body .days i:nth-child(n+1):nth-child(-n+7).empty, .calendar_modern .calendar .month .body .days b:nth-child(n+1):nth-child(-n+7).empty, .calendar_modern .calendar .month .body .days s:nth-child(n+1):nth-child(-n+7).empty, .calendar_modern .calendar .month .body .days a:nth-child(n+1):nth-child(-n+7).empty {
  border-top: 1px solid #d5d5d5;
  border-bottom: 1px solid #aaaaaa;
}
.calendar_modern .calendar .month .body .days s:nth-child(7n + 1) {
  border-left: 1px solid #d5d5d5;
}
.calendar_modern .calendar .month .body .days a {
  color: #372f2d;
  background: #d1d1d1;
  text-shadow: 1px 1px 0px white;
  background-image: -webkit-gradient(linear, 50% 100%, 50% 0%, color-stop(0%, #dadada), color-stop(100%, #cfcfcf));
  background-image: -webkit-linear-gradient(bottom, #dadada, #cfcfcf);
  background-image: -moz-linear-gradient(bottom, #dadada, #cfcfcf);
  background-image: -o-linear-gradient(bottom, #dadada, #cfcfcf);
  background-image: linear-gradient(bottom, #dadada, #cfcfcf);
}
.calendar_modern .calendar .month .body .days a.today {
  color: white;
  text-shadow: 1px 1px 2px #047d18;
  -webkit-box-shadow: 0 0 18px #047d18 inset;
  -moz-box-shadow: 0 0 18px #047d18 inset;
  box-shadow: 0 0 18px #047d18 inset;
}
.calendar_modern .calendar .month .body .days a.selected {
  color: white;
  text-shadow: 1px 1px 2px blue;
  -webkit-box-shadow: 0 0 18px #000066 inset;
  -moz-box-shadow: 0 0 18px #000066 inset;
  box-shadow: 0 0 18px #000066 inset;
}
.calendar_modern .calendar .month .body .days a:hover {
  color: white;
  -webkit-transition-property: text-shadow;
  -moz-transition-property: text-shadow;
  -o-transition-property: text-shadow;
  transition-property: text-shadow;
  -webkit-transition-property: box-shadow;
  -moz-transition-property: box-shadow;
  -o-transition-property: box-shadow;
  transition-property: box-shadow;
  -webkit-transition-duration: 0.2s;
  -moz-transition-duration: 0.2s;
  -o-transition-duration: 0.2s;
  transition-duration: 0.2s;
  text-shadow: 1px 1px 2px green;
  -webkit-box-shadow: 0 0 18px #006600 inset;
  -moz-box-shadow: 0 0 18px #006600 inset;
  box-shadow: 0 0 18px #006600 inset;
}
.calendar_modern .calendar .month .body .days b, .calendar_modern .calendar .month .body .days i, .calendar_modern .calendar .month .body .days s {
  color: #ccc;
}
.calendar_modern .calendar .month .body .days b, .calendar_modern .calendar .month .body .days s {
  background: #eee;
  border-color: #d5d5d5;
}
.calendar_modern .calendar .month .body .days b {
  border-top: 1px solid #d5d5d5 !important;
  border-bottom: 1px solid #aaaaaa !important;
}
.calendar_modern .calendar .month .body .days b:first-child {
  border-left: 1px solid #d5d5d5 !important;
}
.calendar_modern .calendar .month .body .days b:last-of-type{
  border-right: 1px solid #aaaaaa !important;
}

</style>


<script type="text/javascript">


function getDays()
{
var year = document.getElementById('year').value;

var month = document.getElementById('month').value;


var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	document.getElementById("days").innerHTML = xmlhttp.responseText;
}
};
var url = "<?=SCRIPT_URL?>ajax/getDaysbyYearMonth.php?year=" + year + "&month=" + month;
xmlhttp.open("GET", url, true);
xmlhttp.send();
}

function callArchieve(str)
{
var year = document.getElementById('year').value;

var month = document.getElementById('month').value;

var date = year+"-"+month+"-"+str;

window.location='<?=SCRIPT_URL?>archive/?date='+date;
}
</script>

<div id="calendar" class="calendar_modern" style="font-size:10px">
	<div class="calendar" style="display:block">

	<div><div style="float:left; text-align:left; width:50%;">
	<select class="form-control" name="year" id="year" onchange="getDays()">

	<?php
	for($y=$dateArray[0];$y>=2013;$y--)
	{

	?>

	<option value="<?php echo $y; ?>"><?php echo converter($y, $echo =true); ?></option>

	<?php 

	}
	?>

	</select></div>
	<div style="float:left; text-align:right; width:50%;">
	<select class="form-control" name="month" id="month" onchange="getDays()">

	<option value="01"<?=($dateArray[1] ==01)?' selected="selected"':''?>>জানুয়ারী</option>
	<option value="02"<?=($dateArray[1] ==02)?' selected="selected"':''?>>ফেব্রুয়ারী</option>
	<option value="03"<?=($dateArray[1] ==03)?' selected="selected"':''?>>মার্চ</option>
	<option value="04"<?=($dateArray[1] ==04)?' selected="selected"':''?>>এপ্রিল</option>
	<option value="05"<?=($dateArray[1] ==05)?' selected="selected"':''?>>মে</option>
	<option value="06"<?=($dateArray[1] =='06')?' selected="selected"':''?>>জুন</option>
	<option value="07"<?=($dateArray[1] =='07')?' selected="selected"':''?>>জুলাই</option>
	<option value="08"<?=($dateArray[1] =='08')?' selected="selected"':''?>>অগাস্ট</option>
	<option value="09"<?=($dateArray[1] =='09')?' selected="selected"':''?>>সেপ্টেম্বর</option>
	<option value="10"<?=($dateArray[1] ==10)?' selected="selected"':''?>>অক্টোবর</option>
	<option value="11"<?=($dateArray[1] ==11)?' selected="selected"':''?>>নভেম্বর</option>
	<option value="12"<?=($dateArray[1] ==12)?' selected="selected"':''?>>ডিসেম্বর</option></select> 
	</div>
	</div>

	<div class="months">
	<div class="month" data-date="2011.1">

	<div class="body">
	<div class="clearfix"></div>
	<div class="day_names" id="day_names">

	<?php foreach($weekDays as $key => $weekDay) : ?>
	<i><?php 
	if($weekDay=="Sat")
	{
	echo "শনি"; 
	}
	else if($weekDay=="Sun")
	{
	echo "রোব"; 	
	}
	else if($weekDay=="Mon")
	{
	echo "সোম"; 	
	}
	else if($weekDay=="Tue")
	{
	echo "মঙ্গল"; 	
	}
	else if($weekDay=="Wed")
	{
	echo "বুধ"; 	
	}
	else if($weekDay=="Thu")
	{
	echo "বৃহ"; 	
	}
	else if($weekDay=="Fri")
	{
	echo "শুক্র"; 	
	}
	?></i>
	<?php endforeach ?>


	</div>

	<div class="days" id="days">

	<?php for($i = 0; $i < $blank; $i++): ?>
	<b>&nbsp;</b>
	<?php endfor; ?>

	<?php for($i = 1; $i <= $daysInMonth; $i++):
$i=(strlen($i)<2)?'0'.$i:$i;
	?>
	<?php if($day == $i): ?>
	<a style="cursor:pointer" onclick="callArchieve('<?php echo $i ?>')" class="today"><?php echo converter($i, true); ?></a>
	<?php else: ?>
	<a style="cursor:pointer" onclick="callArchieve('<?php echo $i ?>')"><?php echo converter($i, true); ?></a>
	<?php endif; ?>
	<?php if(($i + $blank) % 7 == 0): ?>

	<?php endif; ?>
	<?php endfor; ?>
	<?php for($i = 0; ($i + $blank + $daysInMonth) % 7 != 0; $i++): ?>

	<?php endfor; ?>


	</div>

	</div>
	</div>
	</div>
	</div>
</div>
</div> 
</div>