<?php include('../includes/config.php');$qSQL="SELECT DistrictID, DistrictNameBN FROM bas_district WHERE DivisionID=".$_REQUEST["DivisionID"];$resultDistrict=$db->select($qSQL); ?>
<select id="nttl" name="nttl">
<option value="0">জেলা</option>
<?php if($resultDistrict){	foreach($resultDistrict as $k=>$rsDistrict){ ?>	<option value="<?php echo $rsDistrict["DistrictID"]; ?>"><?php echo $rsDistrict["DistrictNameBN"]; ?></option><?php }} ?></select>