<link rel="stylesheet" href="style.css" />
<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
    <div id="drag_upload_file">
        <p>Drop file(s) here</p>
        <p>or</p>
        <p><input type="button" value="Select File(s)" onclick="file_explorer();" /></p>
        <input type="file" id="selectfile" multiple />
    </div>
</div>
 
<script src="custom.js"></script>