<!--Listing-->	
<?php $edit=($db->get('doaction')=='add')?true:$edit;?> 
<div class="row" id="add_edit_block_list" <?=($edit)?' style="display:none"':' style="display:block"';?>>

	<div class="col-xs-12 col-sm-12 col-md-12">	           
            
    <div class="x_panel">
	  <div class="x_title">
		<h2><i class="fa fa-th-list"></i> Monthly Sales List </h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
             
<!--bof topBAR-->

<form class="form-inline" method="get">
<div class="table-responsive">	
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>  
            <!--bof search Panel-->
            <?php $sq=($q)?$q:"Search here";?>
            	<div class="form-group">
            		<div class="input-group">
            			<div class="input-group-addon">Month</div>
                    
                        <select name="month" class="form-control" id="month">
                             <option value="">Select month</option> 
                              <?=__getMonth($db->get_post('month'));?>
                        </select>

            			<div class="input-group-addon">Year</div>

                        <select name="year" class="form-control" id="year">
                             <option value="">Select Year</option> 
                              <?=__getYear($db->get_post('year'));?>
                        </select>

            		</div>
            		</div>
                   </th><th>
                    	<div class="form-group">
            	       	   <div class="input-group">
    		        		<select name="user_id" class="form-control" id="user_id" style="width: 200px;">
    						     <option value="">Filter by Client Name</option> 
    						      <?=__getUserId($db->get_post('user_id'));?>
    					  	</select>
    					  
    			  		</div>  
                          	<button type="submit" class="btn btn-primary">Go</button> 
			  		</div>   
			     </th>
            </tr>
        </thead>
    </table>
</div><!--table Responsive-->
    </form>
<div class="clear"></div>
<!--eof topBAR-->     
      
<!--bof Listing---------------------------->	
<form action="" method="post"  class="form-inline"  onsubmit="return check_action()">
 <input type="hidden" value="true" name="formSubmittedROWS"/>	 
  
 <div class="table-responsive">
 <table class="table table-bordered">
	<thead>
        <thead class="thead">
          <tr>
          	
          	<th>User Id</th>
            <th>Client name</th>
          	<th>PO OTC Amount</th>           
          	<th>PO MRC Amount</th>           
          	<th>PO YRC Amount</th>  
          	<th>PO Total Amount</th>  
             </tr>
        </thead>
        <tbody class="tbody">
        <?php if($rows): ?> 
        
        <?php
        
        $amount_total=array();
        
         foreach($rows as $key => $value):
            
            $class=(($i%2)==0)?'col':'col1'; 
            
            $amount_total['otc'][]=$value['po_otc_amount'];
            $amount_total['mrc'][]=$value['po_mrc_amount'];
            $amount_total['yrc'][]=$value['po_yrc_amount'];
            $amount_total['total'][]=$value['po_total_amount'];
       
        ?>
         <tr class="<?=$class;?>" >
                <td><?= $value['user_id']; ?></td>
                <td><?= $value['client_name']; ?></td>
                <td><?= displayPrice($value['po_otc_amount']); ?></td>
                <td><?= displayPrice($value['po_mrc_amount']); ?></td>
                <td><?= displayPrice($value['po_yrc_amount']); ?></td>
                <td><?= displayPrice($value['po_total_amount']); ?></td>
            </tr>
            
            
            <?php endforeach; ?>
            <tr>
            	<td style="font-size: 20px;" colspan="2" align="right"><b>Total Amount</b></td>
            	<td style="font-size: 20px;"><?=displayPrice(array_sum($amount_total['otc']))?></td>
            	<td style="font-size: 20px;"><?=displayPrice(array_sum($amount_total['mrc']))?></td>
            	<td style="font-size: 20px;"><?=displayPrice(array_sum($amount_total['yrc']))?></td>
            	<td style="font-size: 20px;"><?=displayPrice(array_sum($amount_total['total']))?></td>
            </tr>
            <?php else: ?>
            <tr class="col"><td colspan="8">No Result Found.</td></tr>
            <?php endif; ?>
          
        </tbody>  
        <tfoot class="tfoot">
  
         </tfoot>  
      </table>
</div><!--table Responsive-->
</form>
    
<?php include(TEMPLATE_STORE.'pagination_raw.php');?>
<!--/eof Listing---------------------------->
			</div><!--/end panel-body-->
	  </div>
	</div>
</div><!--/end row-->

<?php 
	function __getUserId($user_id){
		global $db;
		$users=$db->select("SELECT * FROM users WHERE user_role > 1");
		foreach($users as $u_info){
			$sel = ($u_info['user_id'] == $user_id)? 'selected="selected"':'';
			$option.='<option value="'.$u_info['user_id'].'"'.$sel.'>'.$u_info['link3_id'].' '.$u_info['user_fname'].' '.$u_info['user_role'].'</option>';
		}
		return $option;
	}

    function __getMonth($month_id){
        global $db;
        $month_array=array("1"=>"January", "2"=>"Februray", "3"=>"March", "4"=>"April", "5"=>"May", "6"=>"June", "7"=>"July", "8"=>"August", "9"=>"September", "10"=>"October", "11"=>"November", "12"=>"December");
        foreach($month_array as $key=>$value){
            $sel = ($key == $month_id)? 'selected="selected"':'';
            $option.='<option value="'.$key.'"'.$sel.'>'.$value.'</option>';
        }
        return $option;
    }

    function __getYear($year_id){
        global $db;
        $year_array=array("2017", "2018");
        foreach($year_array as $value){
            $sel = ($value == $year_id)? 'selected="selected"':'';
            $option.='<option value="'.$value.'"'.$sel.'>'.$value.'</option>';
        }
        return $option;
    }
?>