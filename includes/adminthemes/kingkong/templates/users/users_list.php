<?php 
    $get_action = $db->get('action');
	$user_id = $db->get('user_id');
	 if($db->post('formSubmitted'))   ////////////manage post data
	  {
	  	
	   $user_id = $db->post('user_id');
	   $post_action = $db->post('action');
	   
		
	  	if($user_id)
	  	{
	  		foreach($user_id as $value)
	  		{
	  		    switch($post_action)
	  	        {
			  		case 'approve':
			    	                $sql = "UPDATE users SET user_status = '1' WHERE user_id='$value'";
			  		                $db->edit($sql);
			  		                break;
			  	   	case 'disapprove':
			    	                $sql = "UPDATE users SET user_status = '0' WHERE user_id='$value'";
			  		                $db->edit($sql);
			  		                break;
			  		                case 'disapprove':
			    	                $sql = "UPDATE users SET user_status = '0' WHERE user_id='$value'";
			  		                $db->edit($sql);
			  		                break;
		            case 'delete':
                     if(state('AR_admin_level')!=2){
		            				$user_id=$value;
			    	                $user_info=getUserInfo($user_id);
										if($user_info){
										$sql = "DELETE FROM users WHERE user_id='$user_id'";
					  		             if($db->delete($sql)){
											//UPDATE AFFILIATE
					  		             //	$db->edit("UPDATE users SET `affiliate_by`='0' WHERE `affiliate_by` ='$user_id'");
			  		                	}
			  		                }
                               }//only admin     
			  		                break;
			  		                
                    case 'banned':
			    	                 $sql = "UPDATE users SET user_banned = '1' WHERE user_id='$value'";
			  		                 $db->edit($sql);
			  		                 break;
                  case 'unbanned':
			    	                 $sql = "UPDATE users SET user_banned = '0' WHERE user_id='$value'";
			  		                 $db->edit($sql);
			  		                 break;
                                     
                         case 'ResendActivationEmail':
			    	               $is_send=  ResendActivationEmail($user_id=$value);
		  		                 break;            


	  	         }	
	  		 }
	  	  }
		
      }
	
	
	
	
	
	
	if($get_action)
    {
	    switch($get_action)
	    {
	    	case 'approve':
	    	                $sql = "UPDATE users SET user_status = '1' WHERE user_id='$user_id'";
	  		                $db->edit($sql);
if(state('AD_admin_level')==2){
	redirect('siteadminpanel/manageUsers/?type=pending');
}
	  		                break;
	  	   	case 'disapprove':
	    	                $sql = "UPDATE users SET user_status = '0' WHERE user_id='$user_id'";
	  		                $db->edit($sql);
	  		                break;
            case 'unbanned':
	    	                 $sql = "UPDATE users SET user_banned = '0' WHERE user_id='$user_id'";
                             $db->edit($sql);
                             break;
                             
             case 'ResendActivationEmail':
			    	               $is_send=  ResendActivationEmail($user_id);
		  		                 break;
            case 'delete':
            
                     if(state('AR_admin_level')!=2){
                        $user_info=getUserInfo($user_id);
							if($user_info){
								$sql = "DELETE FROM users WHERE user_id='$user_id'";
			  		             if($db->delete($sql)){
									//UPDATE AFFILIATE
			  		             //	$db->edit("UPDATE users SET `affiliate_by`='0' WHERE `affiliate_by` ='$user_id'");
	  		                	}
	  		                }
                     }//only admin
	 						
	  		                break;	                 

	    }
	    redirect('siteadminpanel/manageUsers/');
    }
 
    
 
    $page = $db->get_post('page');
	$link ="siteadminpanel/manageUsers/?";
	
		                   
	$sql_query="SELECT * FROM `users` WHERE user_id !='' ";
	if($db->get_post('user')){
		$q=$db->get_post('user');
		if(is_numeric($q)){
			$sql_query .= "  AND user_id='$q' OR user_mobile ='$q' ";
		}elseif(is_string($q)){
			$ip=(count(explode('.',$q)) == 4)?true:false;

			if(strstr($q, '@')){
				$sql_query .= "  AND user_email='".$db->db_input($q)."'";
			}elseif($ip){
				$ip=IP_TO_LONG($q);
				$sql_query .= "  AND user_ip='".$db->db_input($ip)."'";
			}else{
				$sql_query .= "  AND user_name = '".$db->db_input($q)."' OR user_fname LIKE '%".$db->db_input($q)."%' OR user_lname LIKE '%".$db->db_input($q)."%'";
			}
		}

      $link .="user=$q&";
	}
    
     if($db->get_post('type')){
        $type=$db->get_post('type');
        $link .="type=$type&";
            
		if($type == 'pending'){
			$sql_query .= "  AND user_status='0' ";
		}elseif($type == 'banned'){
			$sql_query .= "  AND user_banned='1' ";
		}elseif($type == 'all'){
		   $show=$db->get_post('show');
		}else{
				$sql_query .= " AND user_type='$type'";
		}
	}

    if($db->get_post('theme')){
        $theme=$db->get_post('theme');
        $link .="theme=$theme&";            
		
		if($theme == 'default' || $theme == '' ){
			$sql_query .= "  AND theme='' OR  theme='default' ";
		}else{
			$sql_query .= "  AND theme='$theme' ";
		}
	}
	                         
	$pages = make_pagination($sql_query,$page,30);
	$sql_query .= " ORDER BY user_id DESC";
	$sql_query .= " LIMIT ".$pages['start_form'].",".$pages['per_page'];
	//echo $sql_query;
	$rows = $db->select($sql_query);
  //pre($rows);
?>

<script language="javascript" type="text/javascript">
function poptastic(url){

		var newwindow;
		newwindow=window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=600,height=400,screenX=150,screenY=150,top=80,left=30');
		if (window.focus) {newwindow.focus()}
	}
function __checkAll( row, check_id ){
	var ar_checked=document.getElementById(check_id).checked;
	if(row) {
		 for( var i=0; i<row; i++ ){
				var single = 'checksingle'+i;
				document.getElementById(single).checked = ar_checked;
		 }
	}
}      
function check_action()
{
	var action = document.getElementById('p_action').value;
   
    if(action =='')
     {
     	alert("Please Select An Action");
     	return false;
     }
    else if(action =='delete')
    {
     
	 var x = confirm('Are You Sure You Want to Delete?');
	 if(!x)
	  return false;
    }
	return true;
}
function checkSearch(form){
    
    if(form.user.value=="" || form.user.value=="Enter username, email or id here" ){
        return false;
    }
    	return true;
}
</script>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Manage Public Authors (Total : <?=$pages['total_data']?>)</h3>
			</div>
			<div class="panel-body">

  
<!--	<a href="<?=SCRIPT_URL?>auth/registration" class="fancybox fancybox.iframe btn btn-danger pull-right"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> ADD AN AUTOHOR</button> </a>
  -->
      
<div class="clear"></div>
	  
<table class="table table-bordered">
<thead>
<th>
<!--bof search Panel-->	  
<form class="form-inline" method="get" onsubmit="return checkSearch(this)">
	<div class="form-group">
		<label class="sr-only" for="exampleInputAmount">Search</label>
		<div class="input-group">
			<div class="input-group-addon">Search</div>
			<input type="text" name="user" class="form-control" id="exampleInputAmount" placeholder="Search by name and email and email" width="80%">
		</div>
	</div>
	<button type="submit" class="btn btn-info">GO</button>
</form>
<!--eof search Panel-->	 
</th>
<th>
	<a href="<?=ADMIN_URL.'manageUsers/'?>" ><button type="button" class="btn btn-default"><i class="fa fa-refresh" aria-hidden="true"></i></button></a>
</th> 
</tr>
</thead>
</table>
<br style="clear:both">

      <div class="clear"></div>
<form action="" method="post"  class="form-inline"  onsubmit="return check_action()">	  
 	  
 <table class="table table-bordered">
	<thead>
        <thead class="thead">
          <tr>
          	<th width="5%"><input type="checkbox" id="check_uncheck_top" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_top')" /></th>
          	<th>Author Info</th>
            <th>Status</th>
            <th>Create Date <br/> Last Login</th>
	        <th width="160"></th>
          </tr>
        </thead>
        <tbody class="tbody">
          <?php 
		if($rows){
		  
          $i=0;
		  foreach($rows as $key => $value){
		     // pre($value);
		    $user_id=$value['user_id'];
            $user_name=$value['user_name'];
            $user_fullname=$value['user_fname'].' '.$value['user_lname'];
            
		    $class=(($i%2)==0)?'col':'col1';

$theme=($value['theme']=="" || $value['theme']=='default' )?'orange':$value['theme'];
		 ?>
		  <tr class="<?=$class;?>" >
		  	<td>
			  <input type="checkbox" name="user_id[]" id="checksingle<?php echo $key; ?>" value="<?= $value['user_id'] ?>" />
            </td>
                   
            <td><h2><?=$user_fullname;?></h2>
			<ul style="line-height: 20px; padding-bottom: 20px; font-size: 13px;color:#6b9b70;">				
					<li><strong>UserName:</strong> <?=$value['user_name'];?></li>
					<li><strong>Email:</strong> <?=$value['user_email'];?></li>
					<li><strong>Phone:</strong> <?=$value['user_mobile'];?></li>
					<li><strong>Author ID:</strong> <?=$user_id?></li>	
				</ul>
            <a href="<?= SCRIPT_URL ?>siteadminpanel/manageTempNews/?filterBy=AuthorID&author=<?=$value['user_id']?>&user_name=<?=$value['user_name']?>" title="Show News" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Show News</a>	
			</td>
			
           
			<td><?php if( $value['user_status'] == 1){ ?>
			<a href="<?= SCRIPT_URL ?>siteadminpanel/manageUsers/?action=disapprove&user_id=<?= $value['user_id'] ?>" title="Disapprove User" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
			<?php }else{ ?>
			<a href="<?= SCRIPT_URL ?>siteadminpanel/manageUsers/?action=approve&user_id=<?= $value['user_id'] ?>" title="Approve User"  class="label label-warning"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>
			<?php } ?>
            </td>
            <td><?=date_time($value['user_created'])?> <br /> <?=($value['user_lastlogin'])?date_time($value['user_lastlogin']):'';?></td>
            <td>
            	<table border="0" cellpadding="2" cellspacing="2">
		            	 <tr>
							<td><a href="<?= SCRIPT_URL ?>siteadminpanel/edituser/?user_id=<?=$value['user_id']?>&user_name=<?=$value['user_name']?>" title="Edit" class="fancybox fancybox.iframe"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>
							<td>	
<!--					           
							   <?php if( $value['user_banned'] == 0){ ?>&nbsp;
								<a href="javascript:poptastic('<?= SCRIPT_URL ?>admin/banned.php?id=<?=$value['user_id']?>')" class="label label-default"> Banned</a>
							    <?php }else{ ?>&nbsp; 
								<a href="<?= SCRIPT_URL ?>siteadminpanel/manageUsers/?action=unbanned&user_id=<?= $value['user_id'] ?>"><img src="<?= ADMIN_URL ?>templates/css/images/unbanned.gif"  alt="Unbanned" class="label label-danger" /></a> &nbsp;
								<a href="javascript:poptastic('<?= SCRIPT_URL ?>admin/banned.php?id=<?=$value['user_id']?>&history=1')"><b> Ban History</b> <?php } ?>
						-->		
								
						 	&nbsp;</td>
							<td>&nbsp;<a href="<?=SCRIPT_URL ?>siteadminpanel/manageUsers/?action=delete&user_id=<?= $value['user_id'] ?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')"  class="label label-danger"><i class="fa fa-times" aria-hidden="true"></i> Del</a></td>
						 <td>&nbsp;&nbsp;<a href="mailto:<?= $value['user_email'] ?>" title="Send email" class="label label-default"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> &nbsp;</td>	
							
						 </tr>
				 </table>	
			</td>
          </tr>
          <?php
				$i++;					  
				}   /// end foreach
			}else{
		  ?>
		  <tr class="col" >
            <td colspan="8">No Result Found.</td>
          </tr>
          <?php
          }
		  ?>
        <tr>
		     <th align="left"><input type="checkbox" id="check_uncheck_bottom" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_bottom')" /></td>
         	
			 <td colspan="10" align="left">
					<div class="form-group">
						 <select name="action" class="select form-control" style="width:150px" id="p_action">
						<option value="" selected="selected">Select Action</option>
						<option value="banned"  <?php if($db->post('action')=='suspend'){ ?> selected="selected" <?php } ?>>Banned</option>
						<option value="unbanned" <?php if($db->post('action')=='allow'){ ?> selected="selected" <?php } ?> >Unbanned</option>
						<option value="approve" <?php if($db->post('action')=='approve'){ ?> selected="selected" <?php } ?>>Approve</option>
						<option value="disapprove" <?php if($db->post('action')=='disapprove'){ ?> selected="selected" <?php } ?>>disapprove</option>
						<option value="ResendActivationEmail" <?php if($db->post('action')=='ResendActivationEmail'){ ?> selected="selected" <?php } ?>>Resend Activation Email</option>
						<option value="delete" <?php if($db->post('action')=='delete'){ ?> selected="selected" <?php } ?>>Delete</option>
					  </select>
					</div>
					<input type="submit" value="Submit" name="" class="btn btn-success"  style="margin-top:2px;"/>
					
            <input type="hidden" value="true" name="formSubmittedROWS"/>
           </td>
          </tr>
    	</tbody>
      </table>
    </form>
	
  <?php 
 // echo ADMIN_TEMPLATE_STORE.'pagination_all.php';
  require(ADMIN_TEMPLATE_STORE.'pagination_raw.php');	?> 
			</div><!--panel-body-->
	  </div>
	</div>
</div>
<?php 
function ResendActivationEmail($user_id){
    global $db;
    
$user_info=getUserInfo($user_id);
if($user_info){
    if($user_info['user_status'] == 0){
        
        $user_full_name=$user_info['user_fname'].' '.$user_info['user_lname'];
        $user_name=$user_info['user_name'];
        $user_email=$user_info['user_email'];
        $user_rawpass=$user_info['user_rawpass'];
        
        $validate_code = create_random_value(4);
        $validate_link1=SCRIPT_URL ."auth/verification/".$user_name."/".$validate_code;
        $validate_link2=SCRIPT_URL ."auth/verification/".$user_name;
        			    	
        
$subject = "PeuMind.com Account Activation Email";
$activation_msg = "<p><strong>Dear $user_full_name</strong>,
Thank you for join with us, <a href=\"". $validate_link1 ."\" title='click here to activate'>Click here to activate your account</a>
<b>PeuMind Login Info</b>
<strong>UserName:</strong> $user_name
<strong>Password:</strong> $user_rawpass</p>
<em>kind regards,
<strong>Administrator, PeuMind.com</strong></em>";
        $mailer=array();
        /// setting the mailer
        $mailer['to_name']= $user_name;
        $mailer['to_email']= $user_email;
        $mailer['subject']= $subject;
        $mailer['message']= $activation_msg;
        $mailer['mailtype']= "html";
        //pre($mailer);
        if(send_emailer($mailer)){
        $upd_sql = "UPDATE users SET validate_code ='$validate_code', user_status ='0' WHERE user_id ='$user_id'"; //set user_status to not validated
        $db->edit($upd_sql);
        return true;  
        }
        
        }//if status o   
    }
return false;
}
?>

	 