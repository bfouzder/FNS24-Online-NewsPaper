<div class="row" id="add_edit_block"  style="display:block">
<?php
$panel_title="Update Quote";
?> 
 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
		<h2><?=$panel_title?></h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
		<br />
             <?php require(ADMIN_TEMPLATE_STORE.'displaymessage.php'); ?>
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" >
		 <input type="hidden" name="formSubmitted" value="1" >
		 <input type="hidden" name="<?=$primary_key?>" value="<?=$edit[$primary_key]?>" >

			

    
     <div class="row">	
         <div class="col-md-8 col-sm-9 col-xs-12">	
         
         <div class="panel panel-default2">
        	
        	<div class="panel-body">
      		
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Text:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">

                <textarea id="message" required class="form-control" name="quote_text"><?=isset($edit['quote_text'])?$edit['quote_text']:$db->post('quote_text');?></textarea>
            </div>
		</div>
        
     <div class="control-group">
        <label class="control-label col-md-2 col-sm-3 col-xs-12">Keywords:</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input id="tags_1" type="text" name="keywords" class="tags form-control" value="<?= $edit['keywords'] ?>" placeholder="coma(,) seperated keywords"/>
          <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
        </div>
      </div>
        
        
         <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Author Type</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
				<select name="author_type" class="form-control" required="required">
					<option value="person" <? if($edit['author_type'] =='person'){?>  selected="selected" <? } ?>>Person</option>
					<option value="proverb" <? if($edit['author_type'] =='proverb'){?>  selected="selected" <? } ?>>Proverb</option>
					<option value="movie" <? if($edit['author_type'] =='movie'){?>  selected="selected" <? } ?>>Movie</option>
				</select>
            </div>
          </div>	
         <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Author</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" name="author" value="<?= $edit['author'] ?>" id="autocomplete-author" class="form-control col-md-10"/>
            </div>
          </div>		  

        <div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Books:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="books" value="<?= $edit['books'] ?>" id="autocomplete-book"  class="form-control col-md-7 col-xs-12">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Occassions:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <input type="text" name="occassions" value="<?= $edit['occassions'] ?>" id="autocomplete-occassion" class="form-control col-md-7 col-xs-12">
			</div>
		</div>
        
        
		<div class="form-group">
			<label for="FirstName" class="col-xs-12 col-sm-2 control-label">Template:</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<select  name="quote_template" class="form-control">
					<option value="">Choose Template</option>
					<option value="black" <? if($edit['quote_template'] =='black'){?>  selected="selected" <? } ?>>Black</option>
					<option value="red" <? if($edit['quote_template'] =='red'){?>  selected="selected" <? } ?>>Red</option>
					<option value="green" <? if($edit['quote_template'] =='green'){?>  selected="selected" <? } ?>>Green</option>
					<option value="blue" <? if($edit['quote_template'] =='blue'){?>  selected="selected" <? } ?>>Blue</option>
					<option value="violet" <? if($edit['quote_template'] =='violet'){?>  selected="selected" <? } ?>>Violet</option>
					<option value="orange" <? if($edit['quote_template'] =='orange'){?>  selected="selected" <? } ?>>Orange</option>
					<option value="pink"<? if($edit['quote_template'] =='pink'){?>  selected="selected" <? } ?>>Pink</option>
				</select>
			</div>
		</div>
          </div><!--/panel-body-->
            </div><!--/panel-->	      
        </div>	
        <div class="col-md-4 col-sm-9 col-xs-12">
        <div class="panel panel-success">
        	<div class="panel-heading">
        	  <h3 class="panel-title">Topics</h3>
        	</div>
        	<div class="panel-body">
        
                <div id="categories" class="clearfix"  style="height:250px; overflow:auto;">
                <ul>
                <?php 
                $topics=getTopics($parent_id=0);
                if($topics){
                    $edit_topic_ids=@explode(",", $edit['topic_ids']);
                    foreach($topics as $k=>$topic_info){
                        $checked =in_array($topic_info['topic_id'], $edit_topic_ids)?' checked="checked"':''; 
                        echo '<li><div class="checkbox"><label>
                            <input  type="checkbox" name="topicids[]" value="'.$topic_info['topic_id'].'"'.$checked.'/>'.$topic_info['topic_name'] .'
                            </label></div></li>'."\n";
                    }
                }
                ?>	
                </ul>
                </div>        
        
           	    </div><!--/panel-body-->
            </div><!--/panel-->	       
        </div><!--/col3-->	
        </div><!--/row-->
	  
		  <div class="form-group submit_sec">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			    <button type="submit" name="submit" class="btn btn-success">Update</button>
				  <button type="reset" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=$redirect_url?>">Cancel</a>
			</div>
		  </div>
		</form>
        
        </div> <!--x_content-->
        
	  </div>
	</div>
  </div>
  
   
    <!-- jQuery Tags Input -->
    <script src="<?php echo ADMIN_GET_TEMPLATE_DIRECTORY_URI; ?>/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    
   <!-- jQuery Tags Input -->
    <script>
      function onAddTag(tag) {
        alert("Added a tag: " + tag);
      }

      function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
      }

      function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
      }

      $(document).ready(function() {
        $('#tags_1').tagsInput({
          width: 'auto'
        });
      });
    </script>
    <!-- /jQuery Tags Input -->
    
   <!-- jQuery autocomplete -->
    <script src="<?php echo ADMIN_GET_TEMPLATE_DIRECTORY_URI; ?>/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
     <!-- jQuery autocomplete -->
     
 <?php 
 function getAutoCompleteArray($table_name='authors'){
    global $db;
    $rows_k_v=array();
    if($table_name =='authors'){
         $rows=$db->select("select *from authors order by title");
         if($rows){
            foreach($rows as $k=>$a_info){
               $rows_k_v[]=$a_info['author_name'].':'.'"'.$a_info['title'].'"'; 
            }
         }
    }elseif($table_name =='books'){
         $rows=$db->select("select *from books order by title");
         if($rows){
            foreach($rows as $k=>$a_info){
               $rows_k_v[]='"'.$a_info['title'].'"'.':'.'"'.$a_info['title'].'"'; 
            }
         }
    }elseif($table_name =='occassions'){
         $rows=$db->select("select *from occassions order by title");
         if($rows){
            foreach($rows as $k=>$a_info){
               $rows_k_v[]='"'.$a_info['title'].'"'.':'.'"'.$a_info['title'].'"'; 
            }
         }
    }
    
    return implode(",",$rows_k_v);
    
 }
 ?>    
     
    <script>
      $(document).ready(function() {
        //var authors = { AD:"Andorra",A2:"Andorra Test",AE:"United Arab Emirates",AF:"Afghanistan",AG:"Antigua and Barbuda",AI:"Anguilla",AL:"Albania",AM:"Armenia",AN:"Netherlands Antilles",AO:"Angola",AQ:"Antarctica",AR:"Argentina",AS:"American Samoa",AT:"Austria",AU:"Australia",AW:"Aruba",AX:"Åland Islands",AZ:"Azerbaijan",BA:"Bosnia and Herzegovina",BB:"Barbados",BD:"Bangladesh",BE:"Belgium",BF:"Burkina Faso",BG:"Bulgaria",BH:"Bahrain",BI:"Burundi",BJ:"Benin",BL:"Saint Barthélemy",BM:"Bermuda",BN:"Brunei",BO:"Bolivia",BQ:"British Antarctic Territory",BR:"Brazil",BS:"Bahamas",BT:"Bhutan",BV:"Bouvet Island",BW:"Botswana",BY:"Belarus",BZ:"Belize",CA:"Canada",CC:"Cocos [Keeling] Islands",CD:"Congo - Kinshasa",CF:"Central African Republic",CG:"Congo - Brazzaville",CH:"Switzerland",CI:"Côte d’Ivoire",CK:"Cook Islands",CL:"Chile",CM:"Cameroon",CN:"China",CO:"Colombia",CR:"Costa Rica",CS:"Serbia and Montenegro",CT:"Canton and Enderbury Islands",CU:"Cuba",CV:"Cape Verde",CX:"Christmas Island",CY:"Cyprus",CZ:"Czech Republic",DD:"East Germany",DE:"Germany",DJ:"Djibouti",DK:"Denmark",DM:"Dominica",DO:"Dominican Republic",DZ:"Algeria",EC:"Ecuador",EE:"Estonia",EG:"Egypt",EH:"Western Sahara",ER:"Eritrea",ES:"Spain",ET:"Ethiopia",FI:"Finland",FJ:"Fiji",FK:"Falkland Islands",FM:"Micronesia",FO:"Faroe Islands",FQ:"French Southern and Antarctic Territories",FR:"France",FX:"Metropolitan France",GA:"Gabon",GB:"United Kingdom",GD:"Grenada",GE:"Georgia",GF:"French Guiana",GG:"Guernsey",GH:"Ghana",GI:"Gibraltar",GL:"Greenland",GM:"Gambia",GN:"Guinea",GP:"Guadeloupe",GQ:"Equatorial Guinea",GR:"Greece",GS:"South Georgia and the South Sandwich Islands",GT:"Guatemala",GU:"Guam",GW:"Guinea-Bissau",GY:"Guyana",HK:"Hong Kong SAR China",HM:"Heard Island and McDonald Islands",HN:"Honduras",HR:"Croatia",HT:"Haiti",HU:"Hungary",ID:"Indonesia",IE:"Ireland",IL:"Israel",IM:"Isle of Man",IN:"India",IO:"British Indian Ocean Territory",IQ:"Iraq",IR:"Iran",IS:"Iceland",IT:"Italy",JE:"Jersey",JM:"Jamaica",JO:"Jordan",JP:"Japan",JT:"Johnston Island",KE:"Kenya",KG:"Kyrgyzstan",KH:"Cambodia",KI:"Kiribati",KM:"Comoros",KN:"Saint Kitts and Nevis",KP:"North Korea",KR:"South Korea",KW:"Kuwait",KY:"Cayman Islands",KZ:"Kazakhstan",LA:"Laos",LB:"Lebanon",LC:"Saint Lucia",LI:"Liechtenstein",LK:"Sri Lanka",LR:"Liberia",LS:"Lesotho",LT:"Lithuania",LU:"Luxembourg",LV:"Latvia",LY:"Libya",MA:"Morocco",MC:"Monaco",MD:"Moldova",ME:"Montenegro",MF:"Saint Martin",MG:"Madagascar",MH:"Marshall Islands",MI:"Midway Islands",MK:"Macedonia",ML:"Mali",MM:"Myanmar [Burma]",MN:"Mongolia",MO:"Macau SAR China",MP:"Northern Mariana Islands",MQ:"Martinique",MR:"Mauritania",MS:"Montserrat",MT:"Malta",MU:"Mauritius",MV:"Maldives",MW:"Malawi",MX:"Mexico",MY:"Malaysia",MZ:"Mozambique",NA:"Namibia",NC:"New Caledonia",NE:"Niger",NF:"Norfolk Island",NG:"Nigeria",NI:"Nicaragua",NL:"Netherlands",NO:"Norway",NP:"Nepal",NQ:"Dronning Maud Land",NR:"Nauru",NT:"Neutral Zone",NU:"Niue",NZ:"New Zealand",OM:"Oman",PA:"Panama",PC:"Pacific Islands Trust Territory",PE:"Peru",PF:"French Polynesia",PG:"Papua New Guinea",PH:"Philippines",PK:"Pakistan",PL:"Poland",PM:"Saint Pierre and Miquelon",PN:"Pitcairn Islands",PR:"Puerto Rico",PS:"Palestinian Territories",PT:"Portugal",PU:"U.S. Miscellaneous Pacific Islands",PW:"Palau",PY:"Paraguay",PZ:"Panama Canal Zone",QA:"Qatar",RE:"Réunion",RO:"Romania",RS:"Serbia",RU:"Russia",RW:"Rwanda",SA:"Saudi Arabia",SB:"Solomon Islands",SC:"Seychelles",SD:"Sudan",SE:"Sweden",SG:"Singapore",SH:"Saint Helena",SI:"Slovenia",SJ:"Svalbard and Jan Mayen",SK:"Slovakia",SL:"Sierra Leone",SM:"San Marino",SN:"Senegal",SO:"Somalia",SR:"Suriname",ST:"São Tomé and Príncipe",SU:"Union of Soviet Socialist Republics",SV:"El Salvador",SY:"Syria",SZ:"Swaziland",TC:"Turks and Caicos Islands",TD:"Chad",TF:"French Southern Territories",TG:"Togo",TH:"Thailand",TJ:"Tajikistan",TK:"Tokelau",TL:"Timor-Leste",TM:"Turkmenistan",TN:"Tunisia",TO:"Tonga",TR:"Turkey",TT:"Trinidad and Tobago",TV:"Tuvalu",TW:"Taiwan",TZ:"Tanzania",UA:"Ukraine",UG:"Uganda",UM:"U.S. Minor Outlying Islands",US:"United States",UY:"Uruguay",UZ:"Uzbekistan",VA:"Vatican City",VC:"Saint Vincent and the Grenadines",VD:"North Vietnam",VE:"Venezuela",VG:"British Virgin Islands",VI:"U.S. Virgin Islands",VN:"Vietnam",VU:"Vanuatu",WF:"Wallis and Futuna",WK:"Wake Island",WS:"Samoa",YD:"People's Democratic Republic of Yemen",YE:"Yemen",YT:"Mayotte",ZA:"South Africa",ZM:"Zambia",ZW:"Zimbabwe",ZZ:"Unknown or Invalid Region" };
       //Authors
        var authors = {<?=getAutoCompleteArray($table_name='authors')?>};
        var authorsArray = $.map(authors, function(value, key) {
          return {
            value: value,
            data: key
          };
        });
        // initialize autocomplete with custom appendTo
        $('#autocomplete-author').autocomplete({
          lookup: authorsArray
        });
        
        //Authors
        var books = {<?=getAutoCompleteArray($table_name='books')?>};
        var booksArray = $.map(books, function(value, key) {
          return {
            value: value,
            data: key
          };
        });
        
        $('#autocomplete-book').autocomplete({
          lookup: booksArray
        });
        
         //Authors
        var occassions = {<?=getAutoCompleteArray($table_name='occassions')?>};
        var occassionsArray = $.map(occassions, function(value, key) {
          return {
            value: value,
            data: key
          };
        });
                
        
        $('#autocomplete-occassion').autocomplete({
          lookup: occassionsArray
        });
        
      });
    </script>
    <!-- /jQuery autocomplete -->