<?php
	function getUserTypeTitle($userType){
		
		if($userType == 1){
			return "Admin";
		}else if($userType == 2){
			return "Moderator";
		}else if($userType == 3){
			return "Correspondent";
		}else{
			return "Member";
		}
	}
	
	function mailUser($user_id,$mail_subject,$mail_content){
		
			global $db;
			$user_info = $db->getRowArray('users',array('user_id'=>$user_id),array('user_name','email'));
		
			$subject = $mail_subject;
			$msg = "$mail_content\n
					Thanks,
					\n\n". getSettings('EMAIL_SIGNATURE');
				
			// setting the mailer
		    $mailer['to_name']= $user_info['user_name'];
	        $mailer['to_email']= $user_info['email'];
		    $mailer['subject']= $subject;
	        $mailer['message']= nl2br($msg);
	        $mailer['mailtype']= "html";
			
			send_emailer($mailer);
		
	}
	
	function sendEmail($user_id,$mail_subject,$mail_addressing,$mail_content,$mail_signeture){
		
			global $db;
			$user_info = $db->getRowArray('users',array('user_id'=>$user_id),array('user_name','email'));
		
			$subject = $mail_subject;
			$msg = "$mail_addressing\n\n$mail_content\n\n$mail_signeture";
				
			// setting the mailer
		    $mailer['to_name']= $user_info['user_name'];
	        $mailer['to_email']= $user_info['email'];
		    $mailer['subject']= $subject;
	        $mailer['message']= nl2br($msg);
	        $mailer['mailtype']= "html";
			
			send_emailer($mailer);
		
	}
	
	function newAddition($type,$id)
	{		
		global $db;
		
		if($type == 'places')
		{
			$content_info = $db->querySingle("*" , $type , "place_id='".$id."'");
			$place_type =  $content_info['place_type'];
			$mail_subject = "New ".$place_type." added";
			$mail_content = "Here is the body...";
		}
		else if($type == 'beers')
		{
			$content_info = $db->querySingle("*" , $type , "beer_id='".$id."'");
			
			$mail_subject = "New ".$place_type." added";
			$mail_content = "Here is the body...";
		}
		else if($type == 'fun')
		{
			$content_info = $db->querySingle("*" , $type , "fun_id='".$id."'");			
			$fun_type =  $content_info['fun_type'];
			
			$mail_subject = "New ".$place_type." added";
			$mail_content = "Here is the body...";
		}
		
		$modarator_list = $db->dbQuery("user_id" , "users" , "user_type='2'");
		if($modarator_list)
		{
			foreach($modarator_list as $key=>$value)
			{
				mailUser($value['user_id'] , $mail_subject , $mail_content);
			}
		}
		
	}
?>