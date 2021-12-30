<?php
function setPopupIpTime(){
    
    if(state('popup_ip')!=$_SERVER['REMOTE_ADDR']){
    state('popup_ip',$_SERVER['REMOTE_ADDR']);
    state('popup_time',time());
    state('popup_counter',0);
    return true;
    }
    return false;
}


function allowPopupInVisited($allow_pages=2){
    
   if(state('popup_pagevisit')!=$_SERVER['REQUEST_URI']){
        state('popup_pagevisit',$_SERVER['REQUEST_URI']);
      state('popup_counter',state('popup_counter')+1);
    }
    

     if(state('popup_counter') <= $allow_pages ){
        return true;
      }else{
        return false;
      }
}

function allowPopupInTime($allow_min=5){
    
  $min=(int)((time() - state('popup_time')) /60);
  if($min < $allow_min ){
    return true;
  }else{
    return false;
  }
 }
 
 
 function allowPopup(){
      setPopupIpTime();
      if(allowPopupInTime() &&  allowPopupInVisited() ){
        return true;
      }else{
        return false;
      }
 } 
?>	