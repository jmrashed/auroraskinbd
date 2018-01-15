<?php
/*
 * This code was created by Halmagean Daniel ( halmageandaniel@yahoo.com )
 * This is ment to be free to be used by anyone, you can develop it further, you can sell it..etc.
 * If you will do, please add our link somewhere on your website in order to suport us by growing in google.
 * w3bdeveloper.com 
 * If you need this more customizable, feel free to contact me. :)
 * 
 *      Instructions
 * 
 * Please follow this url: http://www.w3bdeveloper.com/how-to/ckeditor-upload-images-plugin-free-download/
 */
?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

<script type="text/javascript" src="{{ URL::asset('backend_source/ckeditor/plugins/w3bdeveloper_uimages/uploader/jquery.uploadify.js') }}" ></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('backend_source/ckeditor/plugins/w3bdeveloper_uimages/uploader/uploadify.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('backend_source/ckeditor/plugins/w3bdeveloper_uimages/w3bdeveloper_style.css') }}">
<?php
#include config file
//require_once 'config.php';
 // determine protocol - needed if you run http and https

ini_set('display_errors', '0');
//$uploadDir = $root; # the link for the plugin,add slash after
$dbHost = 'localhost';
$dbName = 'boishakhi_newspaper';
$dbUser = 'root';
$dbPass = '';

$db = new PDO('mysql:host='.$dbHost.';dbname='.$dbName.';charset=utf8',$dbUser, $dbPass);

#get all images in order to be displayed
$mediaItems = $db->query("SELECT * FROM w3bdeveloper_media WHERE uid = '".$sid."' GROUP BY path ORDER BY id DESC");
$mediaItems = $mediaItems->fetchAll(PDO::FETCH_ASSOC);	
?>
<script>
	//making the tabs to function
	$(function(){
		$( "#tabs" ).tabs();
	});
	//instantite the uploader
	<?php $timestamp = time();?>
	$(function() {
		$('#file_upload').uploadify({
			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
			},
			'swf'      : '{{ URL::asset('backend_source/ckeditor/plugins/w3bdeveloper_uimages/uploader/uploadify.swf') }}',
			'uploader' : '{{ URL::asset('backend_source/ckeditor/plugins/w3bdeveloper_uimages/upload_ci.php?action=upload&sid=<?php echo $sid; ?>') }}',
			'auto'     :  false,
			'fileTypeExts': '*.*'
		});
	});
	// this function will insert the url of the picture in the inage handler
	function insert_url(url, funcNum)
	{
	   
	   //window.opener.CkEditorURLTransfer(url);
	   //window.close(); 
		window.opener.CKEDITOR.tools.callFunction(funcNum, url, '');
		//window.opener.CKEDITOR.tools.callFunction(2, url);
		//$('#cke_409_textInput').val(url);
	    window.close();
		
		// window.parent.CKEDITOR.tools.callFunction(1, url, '');
         //$('#cke_111_textInput').val(url);
		 
	}
	
	function CkEditorURLTransfer(url)
{
    window.parent.CKEDITOR.tools.callFunction(1, url, '');
    $('#cke_111_textInput').val(url);
	
	window.close(); 
	//createEditor();
	//createEditor_blog();
  
}
	//this will be triggered when a delete button will be clicked in order to delete an image
	function remove_media_file(file_id)
	{
	
	//alert(file_id);
		$.ajax({type:"POST",
		        url: '<?php echo base_url();?>masud/ckeditor/plugins/w3bdeveloper_uimages/upload.php?action=delete', 
		        data: {file_id : file_id}
		        })
	    .done(function(response)
	    {
			$("#media-item-"+file_id).fadeOut(300, function() {$(this).remove()}); 
		});															
	}
	
	
	// Newly Added 
	 function reload_uploaded_images()
	 {
		location.reload();
	 }
	
</script>



<div class="modal scrooled_div" id="media_modal" style="display: block;">
	<div id="tabs">
	  <ul>
	    <li><a href="#tabs-1" onclick="reload_uploaded_images()">Media Files</a></li>
	    <li><a href="#tabs-2">Upload</a></li>
	     <!--<li><a href="#tabs-3">Developers</a></li>-->
	  </ul>
	  <div id="tabs-1">
	  	<!--<a href="http://www.w3bdeveloper.com/"><img src="http://www.w3bdeveloper.com/resources/external_logos/w3bdev_logo.png" height="50"></a>-->
        
    	<?php 
   			if(!empty($mediaItems))
			{
				foreach($mediaItems as $k=>$v)
				{
					//echo $v['path'] ;
					
				 $funcNum = $_GET['CKEditorFuncNum'] ;
			      ?>
			      <div class="media-item" id="media-item-<?php echo $v['id']; ?>">
			      	<a href="#" onclick="insert_url('<?php echo base_url();?>masud/ckeditor/plugins/w3bdeveloper_uimages/<?php echo $v['path'] ?>', <?php echo $funcNum; ?>)" class="image_cke">
			      		<img src="<?php echo base_url();?>masud/ckeditor/plugins/w3bdeveloper_uimages/<?php echo $v['path'] ?>" border="0" class="media-item-image" />			      	</a>
			      	<a class="close_small_btn remove_media" id="media-<?php echo $v['id']; ?>" title="Delete Picture" onclick="remove_media_file(<?php echo $v['id']; ?>)"></a>			      </div>
        <?php
				}
			}
			else
			{
				echo '<p class="media-item" style="padding:10px 0px 10px 0px;">You have no images yet! Please Upload.</p>';
			}
		?>
	  </div>
	  <div id="tabs-2">
	   		<form>
				<div id="queue"></div>
				<input id="file_upload" name="file_upload" type="file" multiple="true">
				<input type="button" id="start_upload" name="start_upload" class="upload_btn hidden" value="Upload" onclick="$('#file_upload').uploadify('upload')">
			</form>
	  </div>
	  <!--<div id="tabs-3">
	  		<a href="http://www.w3bdeveloper.com/"><img src="http://www.w3bdeveloper.com/resources/external_logos/w3bdev_logo.png" height="80"></a>
	  		<br/>
	  		1) Halmagean Daniel (halmageandaniel@yahoo.com) feel free to contact me for further development
	  		<br/>
	  		<p>Visit us at: <a href="http://www.w3bdeveloper.com">http://www.w3bdeveloper.com</a></p>
	  </div>-->
	</div>
</div>
<?php
exit;
?>