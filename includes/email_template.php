<?php
//Email greethings (this EMAIL_SIGNATURE auto includes for every email)
define('EMAIL_SIGNATURE','
Administrator,
EWU
');

/**********bof EMAIL TEMPLETE FOR ACCOUNT INFORMATION**************/

/**Email for VALIDATE_REGISTRATION*/
define('MAIL_SUB_VALIDATE_REGISTRATION', 'Registration Confirmation');
define('MAIL_BODY_VALIDATE_REGISTRATION', 'Dear %1$s,
You have successfuly registered with us.
Click the link bellow to verify your account:
<a href="%2$s" target="_blank">Confirm Now</a>
or vistis the link bellow
%3$s and put this code: %4$s');
/*
							
Dear <!-- user_name -->,
You have successfuly registered with us.
Click the link bellow to verify your account:
<!-- confirm_now -->
or vistis the link bellow
<!-- confirm_link -->

and put this code: <!-- confirm_code --> 

*/

/**Email for VALIDATE_REGISTRATION_RESEND*/
define('MAIL_SUB_VALIDATE_REGISTRATION_RESEND', 'Resend Verification Code');
define('MAIL_BODY_VALIDATE_REGISTRATION_RESEND', 'Dear %1$s,
You have successfuly registered with us.
Click the link bellow to verify your account:
<a href="%2$s" >Confirm Now</a>
or vistis the link bellow 
%3$s and put this code: %4$s');


/**Email for CHANGE_PASSWORD*/
define('MAIL_SUB_CHANGE_PASSWORD', 'Password Change Success');
define('MAIL_BODY_CHANGE_PASSWORD', 'Dear %1$s,
You have successfuly changed your pasword.
New Password : %2$s Visit the link for login %3$s');


/**Email for FORGOT_PASSWORD*/
define('MAIL_SUB_FORGOT_PASSWORD', 'Password Reset');
define('MAIL_BODY_FORGOT_PASSWORD', 'Dear %1$s,
Your Password has been reset.
New Password: %2$s Visit the link for login %3$s');	
?>