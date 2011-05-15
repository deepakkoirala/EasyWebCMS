/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */



CKEDITOR.editorConfig = function( config )
{
	config.toolbar = 'deepak';	
	config.enterMode=CKEDITOR.ENTER_BR;
	config.shiftEnterMode=CKEDITOR.ENTER_P;
	config.height = 280;
	config.toolbarCanCollapse = true;
	//config.skin = 'kama';
	
	config.toolbar_deepak =
	[
		
		{ name: 'clipboard', items : ['Source','-','Cut','Copy','Paste','PasteText','PasteFromWord' ] }, { name: 'links', items : [ 'Link','Unlink','Anchor' ] }, 
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv']},
		      
		{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },  
		{ name: 'colors', items : [ 'TextColor','BGColor' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Subscript','Superscript','Strike','-','RemoveFormat' ] },  
		
		{ name: 'paragraph', items: ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
		
		{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'
                 ,'Iframe' ] }, // '/',
        
		
		{ name: 'tools', items : [ 'Maximize' ] }
	];
	
	/* config.filebrowserBrowseUrl = './kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = './kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = './kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = './kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = './kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = './kcfinder/upload.php?type=flash';
   */
};

CKFinder.setupCKEditor( null, '../ckeditor/ckfinder/' ) ;
