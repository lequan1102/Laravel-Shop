CKEDITOR.editorConfig = function( config ) {
	config.language = 'vi';
	config.entities_latin = false;
	config.entities = false;
	config.languague = 'vi';
	config.height = 400;
	config.extraPlugins = 'cloudservices';
	config.filebrowserBrowseUrl 		 = 'http://fondk.vtech/public/templates/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = 'http://fondk.vtech/public/templates/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 'http://fondk.vtech/public/templates/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl 		 = 'http://fondk.vtech/public/templates/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'http://fondk.vtech/public/templates/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'http://fondk.vtech/public/templates/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
