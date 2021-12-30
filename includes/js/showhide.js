function ar_showhide(sid,hid){
    //alert(sid); alert(hid);
    $('#'+sid).show();
    $('#'+hid).hide();
}
function showhide(id1) {
	if(document.getElementById(id1).style.display=='none'){
		//document.getElementById(id1).style.display='block';
         $('#'+id1).show('slow');
        $("#top_"+id1).removeClass('home-title-right-span1').addClass('home-title-right-span2');
	} else {
		//document.getElementById(id1).style.display='none';
          $('#'+id1).hide('slow');
           $("#top_"+id1).removeClass('home-title-right-span2').addClass('home-title-right-span1');
	}
}

function showdiv(id1) {
	if(document.getElementById(id1))
	document.getElementById(id1).style.display='block';
}

function hidediv(id1) {
	if(document.getElementById(id1))
	document.getElementById(id1).style.display='none';
}

function ShowHideSelectDeps(field_id) {
  var elem = "field_"+field_id;
  var show = document.getElementById(elem).options[document.getElementById(elem).options.selectedIndex].value;
  var possible_options = document.getElementById(elem).options.length-1;
  for(x=0; x<possible_options; x++) {
    if(x != show | show == "") {
      hidediv(elem+"_option"+x);
    } else {
      showdiv(elem+"_option"+x);
    }
  }
}

function ShowHideRadioDeps(field_id, show, dep_field, total_options) {
  var elem = "field_"+field_id;
  for(x=0; x<total_options; x++) {
    if(x != show) {
      hidediv(elem+"_radio"+x);
    } else {
      showdiv(elem+"_radio"+x);
      if(document.getElementById(dep_field)) {
        document.getElementById(dep_field).focus()
	document.getElementById(dep_field).value = document.getElementById(dep_field).value;
      }
    }
  }
}
/*bof Profile related js*/

var MY_AJAX_URL='http://www.cinehub24.com/ajax/ajax_action.php';
function doLike(type,item_id,count_id){
           jQuery.post(MY_AJAX_URL,{action:'do_like',type: type,item_id:item_id },
            function (data){
                var noofdata=parseInt(data);
                // alert("doUnLike('"+type+"','"+item_id+"','"+count_id+"')");
                 jQuery("#"+count_id).attr('onclick',"doUnLike('"+type+"','"+item_id+"','"+count_id+"')");
                 if(type =='profile'){
                     jQuery("#"+count_id).html(' Like '+noofdata+ ' <i><u>Unlike it</u></i>');   
                 }else{
                  jQuery("#"+count_id).html(' Like '+noofdata+ ' <i><u>Unlike it</u></i>');  
                 }
                 
                
            return false;  
        }); 
    return false;    
}

function doUnLike(type,item_id,count_id){
  
        jQuery.post(MY_AJAX_URL,{action:'do_unlike',type: type,item_id:item_id },
            function (data){
                  //alert("doLike('"+type+"','"+item_id+"','"+count_id+"')");
                    var noofdata=parseInt(data);
                    jQuery("#"+count_id).attr('onclick',"doLike('"+type+"','"+item_id+"','"+count_id+"')");   
                 jQuery("#"+count_id).html(' Like '+noofdata);
               
            return false;  
        }); 
    return false;    
}

function doDelete(item_id,count_id,pp){
    
        jQuery.post(MY_AJAX_URL,{action:'do_delete_wallfiles',item_id:item_id },
            function (data){
                  //alert(data);
                  var noofdata=parseInt(data);
                 if(noofdata){
                     jQuery("#"+count_id).hide('slow');   
                 }
            return false;  
        }); 
    return false;    
}