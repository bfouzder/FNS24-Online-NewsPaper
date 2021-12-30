<?php
include('number_converter.php');
$day = "01";



$year = strip_tags($_GET['year']);



$month = strip_tags($_GET['month']);

$firstDay = mktime(0,0,0,$month, 1, $year);
$title = strftime('%B', $firstDay);
$dayOfWeek = date('D', $firstDay);
$daysInMonth = cal_days_in_month(0, $month, $year);
/* Get the name of the week days */
$timestamp = strtotime('next Sunday');
$weekDays = array();
for ($i = 0; $i < 7; $i++) {
	$weekDays[] = strftime('%a', $timestamp);
	$timestamp = strtotime('+1 day', $timestamp);
}
$blank = date('w', strtotime("{$year}-{$month}-01"));





?>


<?php for($i = 0; $i < $blank; $i++): ?>
			<b>&nbsp;</b>
		<?php endfor; ?>
        
        <?php for($i = 1; $i <= $daysInMonth; $i++):
			$i=(strlen($i)<2)?'0'.$i:$i;
		?>
			<?php if($day == $i): ?>
				<a style="cursor:pointer" onclick="callArchieve('<?php echo $i ?>')" class="today"><?php echo converter($i); ?></a>
			<?php else: ?>
				<a style="cursor:pointer" onclick="callArchieve('<?php echo $i ?>')"><?php echo converter($i); ?></a>
			<?php endif; ?>
			<?php if(($i + $blank) % 7 == 0): ?>
				
			<?php endif; ?>
		<?php endfor; ?>
		<?php for($i = 0; ($i + $blank + $daysInMonth) % 7 != 0; $i++): ?>
			
		<?php endfor; ?>