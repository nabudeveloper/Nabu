/*
 Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
(function(){CKEDITOR.plugins.add("uploadimage",{requires:"uploadwidget",onLoad:function(){CKEDITOR.addCss(".cke_upload_uploading img{opacity: 0.3}")},init:function(d){if(CKEDITOR.plugins.clipboard.isFileApiSupported){var f=CKEDITOR.fileTools,h=f.getUploadUrl(d.config,"image");h?(f.addUploadWidget(d,"uploadimage",{supportedTypes:/image\/(jpeg|png|gif|bmp)/,uploadUrl:h,fileToElement:function(){var a=new CKEDITOR.dom.element("img");a.setAttribute("src",i);return a},parts:{img:"img"},onUploading:function(a){this.parts.img.setAttribute("src",
a.data)},onUploaded:function(a){this.replaceWith('<img src="'+a.url+'" width="'+this.parts.img.$.naturalWidth+'" height="'+this.parts.img.$.naturalHeight+'">')}}),d.on("paste",function(a){if(a.data.dataValue.match(/<img[\s\S]+data:/i)){var a=a.data,c=document.implementation.createHTMLDocument(""),c=new CKEDITOR.dom.element(c.body),j,b,g;c.data("cke-editable",1);c.appendHtml(a.dataValue);j=c.find("img");for(g=0;g<j.count();g++){b=j.getItem(g);var e=b.getAttribute("src")&&"data:"==b.getAttribute("src").substring(0,
5),i=null===b.data("cke-realelement");e&&(i&&!b.data("cke-upload-id")&&!b.isReadOnly(1))&&(e=d.uploadRepository.create(b.getAttribute("src")),e.upload(h),f.markElement(b,"uploadimage",e.id),f.bindNotifications(d,e))}a.dataValue=c.getHtml()}})):window.console&&window.console.log("Error: Upload URL for the Upload Image feature was not defined. For more information see: http://docs.ckeditor.com/#!/guide/dev_file_upload")}}});var i="data:image/gif;base64,R0lGODlhDgAOAIAAAAAAAP///yH5BAAAAAAALAAAAAAOAA4AAAIMhI+py+0Po5y02qsKADs="})();