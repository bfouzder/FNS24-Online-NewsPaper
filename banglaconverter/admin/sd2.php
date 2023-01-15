<?php
include_once('dbconnection.php');




$id=trim($_POST['product_id_new']);

$idn=strlen($id);

for($lk=0;$lk<=$idn;$lk++)
{
if($id[$lk]=='=')
{
$rty++;	
}

if($rty==1)
{
	$rkk++;
	if($rkk>1)
	{
$idvalue="$idvalue$id[$lk]";
	}	
}
	
}



$product_id_new=$idvalue;








$ser=trim($_POST['ser']);

$s=trim($_POST['s']);


$dat1=trim($_POST['dat1']);
$mon1=trim($_POST['mon1']);
$yer1=trim($_POST['yer1']);




$dat2=trim($_POST['dat2']);
$mon2=trim($_POST['mon2']);
$yer2=trim($_POST['yer2']);



$dat=trim($_POST['dat']);
$mon=trim($_POST['mon']);
$yer=trim($_POST['yer']);






$mdate="$yer1$mon1$dat1";

$ndate="$yer$mon$dat";







if($ser=="")
{


$bbb=time(); 

$d=date("m/d/y",$bbb); 

$mon="$d[0]$d[1]";
$dat="$d[3]$d[4]";
$yer="20$d[6]$d[7]";

$dat1=$dat;
$mon1=$mon;
$yer1=$yer;


$dat2=$dat;
$mon2=$mon;
$yer2=$yer;


$mdate="$yer1$mon1$dat1";

$ndate="$yer2$mon2$dat2";




}





$ar='"';




print"

<html>

<head>
<title> Product Stock </title>
";
?>



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
  
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    var availableTags = [


<?php
	

	
$result = mysql_query("SELECT * FROM `product_name`  ORDER BY `user_id` ASC  LIMIT 0 , 100000");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
print" ${ar}$a_row[2]=$a_row[0]$ar, ";
	}
?>

      "Testing"

    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>





<?php


include_once('style.php');


print"
</head>


<body>
";


include_once('header.php');


print"
<table align='center' width='1200' cellpadding='0' cellspacing='1' height='800' bgcolor='gray'>
<tr bgcolor='white'> 
";

include_once('report_left.php');












print"
<td align='center' valign='top' width='980'> 


<br>


<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F7D3F2'>
<tr> <td align='center' height='40'> <font face='arial' size='2'> Product Store View  </font> </td> </tr>
<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>


















<table align='center' width='1000' cellpadding='0' cellspacing='0' bgcolor='F3F3F3'>



<tr> 

<form action='sd2.php' method='POST'>

<td align='center' height='40'> 
";















print"
<font face='arial' size='2'> Product: 
</font>


<label for='tags'> </label>
<input type='text' id='tags' name='product_id_new' size='20'>
















<select name='dat'>

<option>$dat</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>


<select name='mon'>
<option>$mon</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>

</select>



<select name='yer'>
<option>$yer</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>


To




<select name='dat1'>

<option>$dat1</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>


<select name='mon1'>
<option>$mon1</option>
<option>01</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>

</select>



<select name='yer1'>
<option>$yer1</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>




<input type='hidden' name='ser' value='7'>

<input type='submit' value='Search'>

</td> 


</form>

</tr>


<tr> <td align='center' height='1' bgcolor='F9F4D8'> </td> </tr>
</table>












<table align='center' width='900' cellpadding='5' cellspacing='1' bgcolor='black'>

<tr bgcolor='F677F2'>


 
<td align='center' height='30' width='100'>  <font face='arial' size='2' color=''> Product Name </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Quantity    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Price value    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Total    </font> </td> 



<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Sale_Quantity   </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Price value    </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Total    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Stock   </font> </td> 





<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Stock Money </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> Profit  </font> </td> 




</tr>
";










$q=0;
$w=0;


$result = mysql_query("SELECT * FROM product_sub_category");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
	$kr++;
	$sub_id[$kr]=$a_row[0];
	
}






if($product_id_new=="")
{
	
//for($i=1;$i<=$kr;$i++)

//{	
	
$result = mysql_query("SELECT * FROM product_name ORDER BY `user_id`");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];


//}


}


}
else
{
	
$result = mysql_query("SELECT * FROM `product_name` where user_id='$product_id_new' ");	


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$w++;
$p_id[$w]=$a_row[0];
$p_n[$w]=$a_row[2];
$p[$w]=$a_row[4];


}


}





$ma[1]=20160101;
$ma[2]=20160102;
$ma[3]=20160103;
$ma[4]=20160104;
$ma[5]=20160105;
$ma[6]=20160106;
$ma[7]=20160107;
$ma[8]=20160108;
$ma[9]=20160109;
$ma[10]=20160110;
$ma[11]=20160111;
$ma[12]=20160112;
$ma[13]=20160113;
$ma[14]=20160114;
$ma[15]=20160115;
$ma[16]=20160116;
$ma[17]=20160117;
$ma[18]=20160118;
$ma[19]=20160119;
$ma[20]=20160120;
$ma[21]=20160121;
$ma[22]=20160122;
$ma[23]=20160123;
$ma[24]=20160124;
$ma[25]=20160125;
$ma[26]=20160126;
$ma[27]=20160127;
$ma[28]=20160128;
$ma[29]=20160129;
$ma[30]=20160130;
$ma[31]=20160131;








$ma[32]=20160201;
$ma[33]=20160202;
$ma[34]=20160203;
$ma[35]=20160204;
$ma[36]=20160205;
$ma[37]=20160206;
$ma[38]=20160207;
$ma[39]=20160208;
$ma[40]=20160209;
$ma[41]=20160210;
$ma[42]=20160211;
$ma[43]=20160212;
$ma[44]=20160213;
$ma[45]=20160214;
$ma[46]=20160215;
$ma[47]=20160216;
$ma[48]=20160217;
$ma[49]=20160218;
$ma[50]=20160219;
$ma[51]=20160220;
$ma[52]=20160221;
$ma[53]=20160222;
$ma[54]=20160223;
$ma[55]=20160224;
$ma[56]=20160225;
$ma[57]=20160226;
$ma[58]=20160227;
$ma[59]=20160228;
$ma[60]=20160229;
$ma[61]=20160230;
$ma[62]=20160231;



$ma[63]=20160301;
$ma[64]=20160302;
$ma[65]=20160303;
$ma[66]=20160304;
$ma[67]=20160305;
$ma[68]=20160306;
$ma[69]=20160307;
$ma[70]=20160308;
$ma[71]=20160309;
$ma[72]=20160310;
$ma[73]=20160311;
$ma[74]=20160312;
$ma[75]=20160313;
$ma[76]=20160314;
$ma[77]=20160315;
$ma[78]=20160316;
$ma[79]=20160317;
$ma[80]=20160318;
$ma[81]=20160319;
$ma[82]=20160320;
$ma[83]=20160321;
$ma[84]=20160322;
$ma[85]=20160323;
$ma[86]=20160324;
$ma[87]=20160325;
$ma[88]=20160326;
$ma[89]=20160327;
$ma[90]=20160328;
$ma[91]=20160329;
$ma[92]=20160330;
$ma[93]=20160331;




$ma[94]=20160401;
$ma[95]=20160402;
$ma[96]=20160403;
$ma[97]=20160404;
$ma[98]=20160405;
$ma[99]=20160406;
$ma[100]=20160407;
$ma[101]=20160408;
$ma[102]=20160409;
$ma[103]=20160410;
$ma[104]=20160411;
$ma[105]=20160412;
$ma[106]=20160413;
$ma[107]=20160414;
$ma[108]=20160415;
$ma[109]=20160416;
$ma[110]=20160417;
$ma[111]=20160418;
$ma[112]=20160419;
$ma[113]=20160420;
$ma[114]=20160421;
$ma[115]=20160422;
$ma[116]=20160423;
$ma[117]=20160424;
$ma[118]=20160425;
$ma[119]=20160426;
$ma[120]=20160427;
$ma[121]=20160428;
$ma[122]=20160429;
$ma[123]=20160430;
$ma[124]=20160431;




$ma[125]=20160501;
$ma[126]=20160502;
$ma[127]=20160503;
$ma[128]=20160504;
$ma[129]=20160505;
$ma[130]=20160506;
$ma[131]=20160507;
$ma[132]=20160508;
$ma[133]=20160509;
$ma[134]=20160510;
$ma[135]=20160511;
$ma[136]=20160512;
$ma[137]=20160513;
$ma[138]=20160514;
$ma[139]=20160515;
$ma[140]=20160516;
$ma[141]=20160517;
$ma[142]=20160518;
$ma[143]=20160519;
$ma[144]=20160520;
$ma[145]=20160521;
$ma[146]=20160522;
$ma[147]=20160523;
$ma[148]=20160524;
$ma[149]=20160525;
$ma[150]=20160526;
$ma[151]=20160527;
$ma[152]=20160528;
$ma[153]=20160529;
$ma[154]=20160530;
$ma[155]=20160531;




$ma[156]=20160601;
$ma[157]=20160602;
$ma[158]=20160603;
$ma[159]=20160604;
$ma[160]=20160605;
$ma[161]=20160606;
$ma[162]=20160607;
$ma[163]=20160608;
$ma[164]=20160609;
$ma[165]=20160610;
$ma[166]=20160611;
$ma[167]=20160612;
$ma[168]=20160613;
$ma[169]=20160614;
$ma[170]=20160615;
$ma[171]=20160616;
$ma[172]=20160617;
$ma[173]=20160618;
$ma[174]=20160619;
$ma[175]=20160620;
$ma[176]=20160621;
$ma[177]=20160622;
$ma[178]=20160623;
$ma[179]=20160624;
$ma[180]=20160625;
$ma[181]=20160626;
$ma[182]=20160627;
$ma[183]=20160628;
$ma[184]=20160629;
$ma[185]=20160630;
$ma[186]=20160631;




$ma[187]=20160701;
$ma[188]=20160702;
$ma[189]=20160703;
$ma[190]=20160704;
$ma[191]=20160705;
$ma[192]=20160706;
$ma[193]=20160707;
$ma[194]=20160708;
$ma[195]=20160709;
$ma[196]=20160710;
$ma[197]=20160711;
$ma[198]=20160712;
$ma[199]=20160713;
$ma[200]=20160714;
$ma[201]=20160715;
$ma[202]=20160716;
$ma[203]=20160717;
$ma[204]=20160718;
$ma[205]=20160719;
$ma[206]=20160720;
$ma[207]=20160721;
$ma[208]=20160722;
$ma[209]=20160723;
$ma[210]=20160724;
$ma[211]=20160725;
$ma[212]=20160726;
$ma[213]=20160727;
$ma[214]=20160728;
$ma[215]=20160729;
$ma[216]=20160730;
$ma[217]=20160731;




$ma[218]=20160801;
$ma[219]=20160802;
$ma[220]=20160803;
$ma[221]=20160804;
$ma[222]=20160805;
$ma[223]=20160806;
$ma[224]=20160807;
$ma[225]=20160808;
$ma[226]=20160809;
$ma[227]=20160810;
$ma[228]=20160811;
$ma[229]=20160812;
$ma[230]=20160813;
$ma[231]=20160814;
$ma[232]=20160815;
$ma[233]=20160816;
$ma[234]=20160817;
$ma[235]=20160818;
$ma[236]=20160819;
$ma[237]=20160820;
$ma[238]=20160821;
$ma[239]=20160822;
$ma[240]=20160823;
$ma[241]=20160824;
$ma[242]=20160825;
$ma[243]=20160826;
$ma[244]=20160827;
$ma[245]=20160828;
$ma[246]=20160829;
$ma[247]=20160830;
$ma[248]=20160831;






$ma[249]=20160901;
$ma[250]=20160902;
$ma[251]=20160903;
$ma[252]=20160904;
$ma[253]=20160905;
$ma[254]=20160906;
$ma[255]=20160907;
$ma[256]=20160908;
$ma[257]=20160909;
$ma[258]=20160910;
$ma[259]=20160911;
$ma[260]=20160912;
$ma[261]=20160913;
$ma[262]=20160914;
$ma[263]=20160915;
$ma[264]=20160916;
$ma[265]=20160917;
$ma[266]=20160918;
$ma[267]=20160919;
$ma[268]=20160920;
$ma[269]=20160921;
$ma[270]=20160922;
$ma[271]=20160923;
$ma[272]=20160924;
$ma[273]=20160925;
$ma[274]=20160926;
$ma[275]=20160927;
$ma[276]=20160928;
$ma[277]=20160929;
$ma[278]=20160930;
$ma[279]=20160931;




$ma[280]=20161001;
$ma[281]=20161002;
$ma[282]=20161003;
$ma[283]=20161004;
$ma[284]=20161005;
$ma[285]=20161006;
$ma[286]=20161007;
$ma[287]=20161008;
$ma[288]=20161009;
$ma[289]=20161010;
$ma[290]=20161011;
$ma[291]=20161012;
$ma[292]=20161013;
$ma[293]=20161014;
$ma[294]=20161015;
$ma[295]=20161016;
$ma[296]=20161017;
$ma[297]=20161018;
$ma[298]=20161019;
$ma[299]=20161020;
$ma[300]=20161021;
$ma[301]=20161022;
$ma[302]=20161023;
$ma[303]=20161024;
$ma[304]=20161025;
$ma[305]=20161026;
$ma[306]=20161027;
$ma[307]=20161028;
$ma[308]=20161029;
$ma[309]=20161030;
$ma[310]=20161031;



$ma[311]=20161101;
$ma[312]=20161102;
$ma[313]=20161103;
$ma[314]=20161104;
$ma[315]=20161105;
$ma[316]=20161106;
$ma[317]=20161107;
$ma[318]=20161108;
$ma[319]=20161109;
$ma[320]=20161110;
$ma[321]=20161111;
$ma[322]=20161112;
$ma[323]=20161113;
$ma[324]=20161114;
$ma[325]=20161115;
$ma[326]=20161116;
$ma[327]=20161117;
$ma[328]=20161118;
$ma[329]=20161119;
$ma[330]=20161120;
$ma[331]=20161121;
$ma[332]=20161122;
$ma[333]=20161123;
$ma[334]=20161124;
$ma[335]=20161125;
$ma[336]=20161126;
$ma[337]=20161127;
$ma[338]=20161128;
$ma[339]=20161129;
$ma[340]=20161130;
$ma[341]=20161131;







$ma[342]=20161201;
$ma[343]=20161202;
$ma[344]=20161203;
$ma[345]=20161204;
$ma[346]=20161205;
$ma[347]=20161206;
$ma[348]=20161207;
$ma[349]=20161208;
$ma[350]=20161209;
$ma[351]=20161210;
$ma[352]=20161211;
$ma[353]=20161212;
$ma[354]=20161213;
$ma[355]=20161214;
$ma[356]=20161215;
$ma[357]=20161216;
$ma[358]=20161217;
$ma[359]=20161218;
$ma[360]=20161219;
$ma[361]=20161220;
$ma[362]=20161221;
$ma[363]=20161222;
$ma[364]=20161223;
$ma[365]=20161224;
$ma[366]=20161225;
$ma[367]=20161226;
$ma[368]=20161227;
$ma[369]=20161228;
$ma[370]=20161229;
$ma[371]=20161230;
$ma[372]=20161231;




















$mdatee=$mdate;





for($i_new=367;$i_new<=372;$i_new++)

{
$k_new++;

if($ser==7)
{
if($ma[$i_new]<=$mdatee)

{

$trei=0;
$mdate=$ma[$i_new];
$ndate=$ma[$i_new];


$ptyy=0;
$profit=0;

$total_price_sale=0;
$tp20=0;

$qs=0;
$tax1=0;
$t1=0;
$profit1=0;
$q10=0;

$rqo=0;

$ew=0;

$tp=0;

$stock_qq=0;
$stock_pp=0;

$total_price=0;
$profit_total=0;
$profit_t=0;

$total_q=0;

$total_t=0;

$tpyy=0;


$stock_q=0;;

$stock_p=0;



$q=0;

$total_price_sale=0;
$preo=0;





for($i=1;$i<=$w;$i++)

{
	
$total_price_sale=0;


$result = mysql_query("SELECT * FROM `saleproduct` where adat>='$ndate' && adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");



//$result = mysql_query("SELECT * FROM `saleproduct` where adat<='$mdate'  && product_id='$p_id[$i]' ORDER BY `adat` ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$tq++;

$q=$q+$a_row[6];

$tax=$tax+$a_row[15];


$aui=$a_row[8]/$a_row[6];

$aui = number_format($aui, 3);
$aui=str_replace(",","","$aui");




$pty=$aui-$a_row[14];


//$pty=$a_row[7]-$a_row[14];


$pty=$pty*$a_row[6];




$ptyy=$ptyy+$pty;



$profit=$profit+$a_row[16];

$ppp=$a_row[7];

$mtt=$a_row[17];
$ptt=$a_row[19];

$preo=$a_row[8]-$a_row[25];



/*

if($a_row[4]==114)
{

$typ=$a_row[7]*$a_row[6];
print" Date: $a_row[9]-$a_row[10] -$a_row[11]  -- $a_row[6] - $a_row[7] = $typ  - $a_row[25] <br>";

$pk=$a_row[8]+$a_row[25];

$try=$try+$a_row[8];

print"
<tr bgcolor='white'> 

<td> $a_row[9]-$a_row[10] -$a_row[11] - $a_row[1] </td>

<td> $a_row[3] </td>

<td> $a_row[6] </td>

<td> $a_row[7] </td>

<td> $a_row[8] </td>

<td> $a_row[25] </td>

<td> $pk  -   $try </td>



</tr>
";
}

*/


//$total_price_sale=$total_price_sale+$a_row[8];



$total_price_sale=$total_price_sale+$a_row[8];


}


$tp20=$tp20+$total_price_sale;
$t=$ppp*$q;







$qs++;
$q_sale[$qs]=$q;
$q_price[$qs]=$total_price_sale;

$prrp[$qs]=$ptyy;



$tax1=$tax1+$tax;
$t1=$t1+$t;
$profit1=$profit1+$profit;
$q10=$q10+$q;


$q=0;
$t=0;

$tax=0;
$profit=0;
$ptyy=0;
$pty=0;




}






if($k_new==1)
{

$sql="TRUNCATE TABLE create_new";
mysql_query($sql);


$sql="TRUNCATE TABLE find_stock";
mysql_query($sql);

}






$result = mysql_query("SELECT * FROM `create_new`");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}
   $rqo++;
   $stp[$rqo]=$a_row[2];
   $stp_price[$rqo]=$a_row[3];


}





















$q=0;
$t=0;
$q1=0;

/*
$result = mysql_query("SELECT * FROM `buyproduct` where  adat<='$mdate'  && product_id='$p_id[$i]' ");
*/



for($i=1;$i<=$w;$i++)

{

$total_price=0;


$result = mysql_query("SELECT * FROM `buyproduct` where   adat>=$ndate &&  adat<='$mdate'  && product_id='$p_id[$i]' ");


//$result = mysql_query("SELECT * FROM `buyproduct` where  adat<='$mdate'  && product_id='$p_id[$i]' ");


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


$q=$q+$a_row[6];

$aaa=$a_row[14];
$bbb=$a_row[16];
$ppp=$a_row[7];

$total_price=$total_price+$a_row[8];

}


$ew++;


$total_price=$total_price+$stp_price[$ew];

$q=$q+$stp[$ew];





///

$tp=$tp+$total_price;
$t=$ppp*$q;


if($total_price>0)
{
$single=$total_price/$q;	
}
else
{
$single=0;	
}










//$ppp=$ppp+$stp_price[$ew];



$stock_q=$q-$q_sale[$ew];

$stock_p=$stock_q*$single;





$stock_qq=$stock_qq+$stock_q;
$stock_pp=$stock_pp+$stock_p;



$stock_qq = number_format($stock_qq, 3);
$stock_qq=str_replace(",","","$stock_qq");



$stock_pp = number_format($stock_pp, 3);
$stock_pp=str_replace(",","","$stock_pp");



$per_product=$total_price/$q;

$per_product = number_format($per_product, 3);
$per_product=str_replace(",","","$per_product");

$tqw=$per_product*$q_sale[$ew];
$tqw = number_format($tqw, 3);
$tqw=str_replace(",","","$tqw");



$stock_p_new=$total_price-$tqw;

$stock_p_new = number_format($stock_p_new, 3);
$stock_p_new=str_replace(",","","$stock_p_new");




$sql = "INSERT INTO `find_stock` (`user_id`, `dat`, `mon`, `yer`, `adat`, `product_id`, `buy`) VALUES ('','$dat','$mon','$yer','$mdate','$p_id[$i]','$per_product')";
mysql_query($sql);




$sql= "UPDATE  `saleproduct` SET `buy`='$per_product' WHERE `product_id`='$p_id[$i]' &&  adat<='$mdate' && adat>=$ndate";
mysql_query($sql);






if($k_new==1)
{
$sql = "INSERT INTO `create_new` (`user_id`, `product_id`, `stock`, `value`, `date`) VALUES ('','$p_id[$i]','$stock_qq','$stock_pp','$mdate')";
mysql_query($sql);

}



$trei++;

$sql= "UPDATE  `create_new` SET `product_id`='$p_id[$i]' WHERE `user_id`='$trei' ";
mysql_query($sql);

$sql= "UPDATE  `create_new` SET `stock`='$stock_q' WHERE `user_id`='$trei' ";
mysql_query($sql);

$sql= "UPDATE  `create_new` SET `value`='$stock_p_new' WHERE `user_id`='$trei'";
mysql_query($sql);

$sql= "UPDATE  `create_new` SET `date`='$mdate' WHERE `user_id`='$trei'";
mysql_query($sql);




$per_sale_product= $q_price[$ew]/$q_sale[$ew];

$per_sale_product = number_format($per_sale_product, 3);
$per_sale_product=str_replace(",","","$per_sale_product");


$prot=$per_sale_product-$per_product;



$profit_t=$q_sale[$ew]*$prot;



/*
$sql= "UPDATE  `saleproduct` SET `profit`='$profit_t' WHERE `product_id`='$p_id[$i]' &&  adat<='$mdate' && adat>=$ndate";
mysql_query($sql);


*/


//$profit_t = number_format($profit_t, 3);
//$profit_t=str_replace(",","","$profit_t");




$profit_total=$profit_total+$profit_t;


/*
print"
<tr bgcolor='white'> 
<td align='left' height='30' width='600'>  <font face='arial' size='2' color=''>  $p_n[$i]  - $bbb   </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $q  - $q   </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $per_product -    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> 


 $total_price  </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>
 $q_sale[$ew]   </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $per_sale_product    </font> </td> 



<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>
 $q_price[$ew]  </font> </td> 




<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_q  </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_p -  $stock_p_new  </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>   $prrp[$ew] - $profit_t  </font> </td> 
 
</tr>
";

*/


$total_q=$total_q+$q;
$total_t=$total_t+$t;

$tpyy=$tpyy+$prrp[$ew];



$q=0;
$t=0;






}




/*

print"



<tr bgcolor='white'> 
<td align='center' height='30' width='200'>  <font face='arial' size='2' color=''>    </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $total_q   </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>     </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $tp  </font> </td>
 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $q10 </font>
 </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>     </font> </td> 
";



print"

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $tp20    </font> </td> 
<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_qq </font> </td> 


<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''> $stock_pp </font> </td> 

<td align='center' height='30' width='180'>  <font face='arial' size='2' color=''>  $tpyy - $profit_total </font> </td> 
 

</tr>
";



print"

<tr> <td bgcolor='white'> $i_new </td></tr>
";
*/

}

}


}




/*
print"

</table>
";

*/




$sal=0;


$result = mysql_query("SELECT * FROM `costing_entry` where  adat>='$ndate' && adat<='$mdate' && sub_id='26' ORDER BY `user_id` ASC  LIMIT 0 , 60000");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$sal=$sal+$a_row[5];




}










//$mdate



	
$less=0;
$less2=0;
$less3=0;

if($supplier=="")
{
$result = mysql_query("SELECT * FROM `customer_laser` where  adat>=$ndate &&  adat<='$mdate'    ");
}

//else
//{
//$result = mysql_query("SELECT * FROM `customer_laser` where bank_name='$supplier' && adat>='$mdate' && adat<='$ndate'  //");	
//}

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}


if($a_row[14]>0)
{


if($a_row[15]==1)
{

	$less1=$less1+$a_row[13];
        $less2=$less2+$a_row[14];
       // print"$a_row[14] <br>";
}
else
{
$less3=$less3+$a_row[14];
}


}


	
}






$less=$less2+$less3+$sal;


$less10=$less;







print"Sales man comission: $sal <br> ";

print"Sales comission: $less2 <br>";

print"Discount comission: $less3 <br>";

print" Total comission: $less <br>";


//print"$less + $sal = $less10 <br>";


$less=$less10;
//$less=$less1+$less2;


$profit_total1=$tpyy-$less;









print"
<br>


Total Product's profit : $tpyy 

";

/*
<br>

Total comission: $less




<br>

$tpyy-$less
<br>

 Profit on product:  $profit_total1
*/

print"



<form action='stock_report_print.php' method='POST' target='a_blank'>

&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='hidden' name='dat1' value='$dat1'>
<input type='hidden' name='mon1' value='$mon1'>
<input type='hidden' name='yer1' value='$yer1'>


<input type='hidden' name='ser' value='1'>


<input type='hidden' name='dat2' value='$dat2'>
<input type='hidden' name='mon2' value='$mon2'>
<input type='hidden' name='yer2' value='$yer2'>
<input type='hidden' name='product_id_new' value='$product_id_new'>
<input type='submit' value='Print'>



</form>

 </td>


</tr>
</table>
";










$h=0;
$r=0;
$total=0;
$hh=0;



/////////////////////////////////////////////////////////////////////



$t=0;

$result = mysql_query("SELECT * FROM expendature_head");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$h++;
$head_name[$h]=$a_row[1];
$head_id[$h]=$a_row[0];

}


$total=0;

if($cost_name=="")
{



for($i=1;$i<=$h;$i++)
{

$total=0;



//if($mdate<=20160131)

//{

$result = mysql_query("SELECT * FROM `costing_entry` where expenduter_name='$head_id[$i]' && adat>='$ndate' && adat<='$mdate' && sub_id!='41' && sub_id!='40' && sub_id!='30' && sub_id!='34' && sub_id!='35' && sub_id!='48' && sub_id!='26' ORDER BY `user_id` ASC  LIMIT 0 , 60000");

//}

//else
//{
/*
$result = mysql_query("SELECT * FROM `costing_entry` where expenduter_name='$head_id[$i]' && adat>='$ndate' && adat<='$mdate' && sub_id!='41' && sub_id!='40'  && sub_id!='34' && sub_id!='35' && sub_id!='26' ORDER BY `user_id` ASC  LIMIT 0 , 60000");
*/

//}


while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;

$total=$total+$a_row[5];


}




 $head_name[$i];
  $total; 



$t=$t+$total;


}


  $t;




}



/*

//$result = mysql_query("SELECT * FROM expenduter_sub");



$result = mysql_query("SELECT * FROM `expendature_sub` where  category='$cost_name'  ORDER BY `user_id` ASC  LIMIT 0 , 6000");

while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$hh++;
$sub_name[$hh]=$a_row[2];
$sub_id[$hh]=$a_row[0];

}







if($cost_name!="")
{



$t=0;


for($j=1;$j<=$hh;$j++)
{


$total=0;

$result = mysql_query("SELECT * FROM `costing_entry` where  expenduter_name='$cost_name' && sub_id='$sub_id[$j]' &&  adat>='$ndate' &&  adat<='$mdate'   ORDER BY `user_id` ASC  LIMIT 0 , 6000");



while ($a_row = mysql_fetch_row($result)) {

	foreach ($a_row as $field) {
		
	}

$r++;



$total=$total+$a_row[5];

}


  $j; 
  $sub_name[$j];  
  $total;

$t=$t+$total;

}


  
   $t;




}


*/



//print"$t";


if($mdate<=20160131)
{
$t=$t-1150+60;
}



$total_cost=$less+$t;


print"
<h1>

Total comission: $less <br>
Total cost     : $t  <br>


Total Net cost : $total_cost  <br>

";


$ne=$tpyy-$total_cost;


print"


Net profit: $tpyy - $total_cost = $ne <br>

</h1>
";



/*

$final_profit=$profit_total1-$t;




$tre=$less+$t;


print"  <h1>   $profit_total1 - $t           ...        [  $tre ]  </h1>";




print"  <h1>  Net profit: $final_profit  </h1>";



*/

















print"



</body>

</html>


";


?>