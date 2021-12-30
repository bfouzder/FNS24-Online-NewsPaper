<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>//tinymce.init({  selector: '#description' /* selector:'textarea'*/ });
tinymce.init({
  selector: '#description',
  height: 400,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools','image'
  ],
  menubar: "false" , 
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
</script>
<?php /* ?>
<!-- Load TinyMCE -->
<script type="text/javascript" src="<?=SCRIPT_URL?>includes/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
	$().ready(function() {
		$('textarea.tinymce').tinymce({
			// Location of TinyMCE script			
			script_url : '<?=SCRIPT_URL?>includes/tiny_mce/tiny_mce.js',

			// General options
			theme : "advanced",
			plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,			
		});
	});
</script>
<!-- /TinyMCE -->

<?php */ ?>
<?php /* ?>
    <div>
			<textarea id="description" name="description" rows="15" cols="80" style="width: 80%" class="tinymce">
				&lt;p&gt;
					This is some example text that you can edit inside the &lt;strong&gt;TinyMCE editor&lt;/strong&gt;.
				&lt;/p&gt;
				&lt;p&gt;
				Nam nisi elit, cursus in rhoncus sit amet, pulvinar laoreet leo. Nam sed lectus quam, ut sagittis tellus. Quisque dignissim mauris a augue rutrum tempor. Donec vitae purus nec massa vestibulum ornare sit amet id tellus. Nunc quam mauris, fermentum nec lacinia eget, sollicitudin nec ante. Aliquam molestie volutpat dapibus. Nunc interdum viverra sodales. Morbi laoreet pulvinar gravida. Quisque ut turpis sagittis nunc accumsan vehicula. Duis elementum congue ultrices. Cras faucibus feugiat arcu quis lacinia. In hac habitasse platea dictumst. Pellentesque fermentum magna sit amet tellus varius ullamcorper. Vestibulum at urna augue, eget varius neque. Fusce facilisis venenatis dapibus. Integer non sem at arcu euismod tempor nec sed nisl. Morbi ultricies, mauris ut ultricies adipiscing, felis odio condimentum massa, et luctus est nunc nec eros.
				&lt;/p&gt;
			</textarea>
		</div>

		<!-- Some integration calls -->
		<a href="javascript:;" onmousedown="$('#description').tinymce().show();">[Show]</a>
		<a href="javascript:;" onmousedown="$('#description').tinymce().hide();">[Hide]</a>
		<a href="javascript:;" onmousedown="$('#description').tinymce().execCommand('Bold');">[Bold]</a>
		<a href="javascript:;" onmousedown="alert($('#description').html());">[Get contents]</a>
		<a href="javascript:;" onmousedown="alert($('#description').tinymce().selection.getContent());">[Get selected HTML]</a>
		<a href="javascript:;" onmousedown="alert($('#description').tinymce().selection.getContent({format : 'text'}));">[Get selected text]</a>
		<a href="javascript:;" onmousedown="alert($('#description').tinymce().selection.getNode().nodeName);">[Get selected element]</a>
		<a href="javascript:;" onmousedown="$('#description').tinymce().execCommand('mceInsertContent',false,'<b>Hello world!!</b>');">[Insert HTML]</a>
		<a href="javascript:;" onmousedown="$('#description').tinymce().execCommand('mceReplaceContent',false,'<b>{$selection}</b>');">[Replace selection]</a>

<?php */ ?>