// noneditable,
//entity_encoding : "raw",
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	editor_selector : "editor",
	convert_fonts_to_spans : true,
	fix_table_elements : true,
	doctype : "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">",
	fix_list_elements : true,
	inline_styles : true,
    relative_urls : false,
	language : "en",
	plugins : "loremipsum,layer,table,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,visualchars,nonbreaking,xhtmlxtras,iwimg,youtube,advcode,attributes",
	theme_advanced_buttons1_add_before : "",
	theme_advanced_buttons1_add : "",
	theme_advanced_buttons2_add : "separator,insertdate,inserttime",
	theme_advanced_buttons2_add_before: "pasteword,separator,search,replace",
	theme_advanced_buttons3_add_before : "",
	theme_advanced_buttons3_add : "insertlayer,moveforward,movebackward,absolute,styleprops,cite,abbr,acronym,del,ins,nonbreaking",
	theme_advanced_buttons4 : "loremipsum,advcode,tablecontrols,fullscreen,print,emotions,media",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	content_css : "example_full.css",
	plugin_insertdate_dateFormat : "%d.%m. %Y",
	plugin_insertdate_timeFormat : "%H:%M:%S",
	extended_valid_elements : "hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
	external_link_list_url : "example_link_list.js",
	external_image_list_url : "example_image_list.js",
	flash_external_list_url : "example_flash_list.js",
	media_external_list_url : "example_media_list.js",
	file_browser_callback : "tinyupload",//tinyBrowser
	theme_advanced_resize_horizontal : false,
	theme_advanced_resizing : true,
	nonbreaking_force_tab : true,
	apply_source_formatting : true,
	valid_elements : ""
	+"a[accesskey|charset|class|coords|dir<ltr?rtl|href|hreflang|id|lang|name"
	  +"|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup"
	  +"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|rel|rev"
	  +"|shape<circle?default?poly?rect|style|tabindex|title|target|type],"
	+"abbr[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"acronym[class|dir<ltr?rtl|id|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"address[class|align|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown"
	  +"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover"
	  +"|onmouseup|style|title],"
	+"applet[align<bottom?left?middle?right?top|alt|archive|class|code|codebase"
	  +"|height|hspace|id|name|object|style|title|vspace|width],"
	+"area[accesskey|alt|class|coords|dir<ltr?rtl|href|id|lang|nohref<nohref"
	  +"|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup"
	  +"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup"
	  +"|shape<circle?default?poly?rect|style|tabindex|title|target],"
	+"base[href|target],"
	+"basefont[color|face|id|size],"
	+"bdo[class|dir<ltr?rtl|id|lang|style|title],"
	+"big[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"blockquote[dir|style|cite|class|dir<ltr?rtl|id|lang|onclick|ondblclick"
	  +"|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout"
	  +"|onmouseover|onmouseup|style|title],"
	+"body[alink|background|bgcolor|class|dir<ltr?rtl|id|lang|link|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onload|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|onunload|style|title|text|vlink],"
	+"br[class|clear<all?left?none?right|id|style|title],"
	+"button[accesskey|class|dir<ltr?rtl|disabled<disabled|id|lang|name|onblur"
	  +"|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup|onmousedown"
	  +"|onmousemove|onmouseout|onmouseover|onmouseup|style|tabindex|title|type"
	  +"|value],"
	+"caption[align<bottom?left?right?top|class|dir<ltr?rtl|id|lang|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|style|title],"
	+"center[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"cite[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"code[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"col[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl|id"
	  +"|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown"
	  +"|onmousemove|onmouseout|onmouseover|onmouseup|span|style|title"
	  +"|valign<baseline?bottom?middle?top|width],"
	+"colgroup[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl"
	  +"|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown"
	  +"|onmousemove|onmouseout|onmouseover|onmouseup|span|style|title"
	  +"|valign<baseline?bottom?middle?top|width],"
	+"dd[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup"
	  +"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],"
	+"del[cite|class|datetime|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown"
	  +"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover"
	  +"|onmouseup|style|title],"
	+"dfn[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"dir[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown"
	  +"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover"
	  +"|onmouseup|style|title],"
	+"div[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|style|title],"
	+"dl[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown"
	  +"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover"
	  +"|onmouseup|style|title],"
	+"dt[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup"
	  +"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],"
	+"em/i[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"fieldset[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"font[class|color|dir<ltr?rtl|face|id|lang|size|style|title],"
	+"form[accept|accept-charset|action|class|dir<ltr?rtl|enctype|id|lang"
	  +"|method<get?post|name|onclick|ondblclick|onkeydown|onkeypress|onkeyup"
	  +"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|onreset|onsubmit"
	  +"|style|title|target],"
	+"frame[class|frameborder|id|longdesc|marginheight|marginwidth|name"
	  +"|noresize<noresize|scrolling<auto?no?yes|src|style|title],"
	+"frameset[class|cols|id|onload|onunload|rows|style|title],"
	+"h1[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|style|title],"
	+"h2[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|style|title],"
	+"h3[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|style|title],"
	+"h4[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|style|title],"
	+"h5[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|style|title],"
	+"h6[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|style|title],"
	+"head[dir<ltr?rtl|lang|profile],"
	+"hr[align<center?left?right|class|dir<ltr?rtl|id|lang|noshade<noshade|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|size|style|title|width],"
	+"html[dir<ltr?rtl|lang|version],"
	+"iframe[align<bottom?left?middle?right?top|class|frameborder|height|id"
	  +"|longdesc|marginheight|marginwidth|name|scrolling<auto?no?yes|src|style"
	  +"|title|width],"
	+"img[align<bottom?left?middle?right?top|alt|border|class|dir<ltr?rtl"
	  +"|hspace|id|ismap<ismap|lang|longdesc|name|onclick|ondblclick|onkeydown"
	  +"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover"
	  +"|onmouseup|src|style|title|usemap|vspace],"
	+"input[accept|accesskey|align<bottom?left?middle?right?top|alt"
	  +"|checked<checked|class|dir<ltr?rtl|disabled<disabled|id|ismap<ismap|lang"
	  +"|maxlength|name|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|onselect"
	  +"|readonly<readonly|size|src|style|tabindex|title"
	  +"|type<button?checkbox?file?hidden?image?password?radio?reset?submit?text"
	  +"|usemap|value],"
	+"ins[cite|class|datetime|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown"
	  +"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover"
	  +"|onmouseup|style|title],"
	+"isindex[class|dir<ltr?rtl|id|lang|prompt|style|title],"
	+"kbd[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"label[accesskey|class|dir<ltr?rtl|for|id|lang|onblur|onclick|ondblclick"
	  +"|onfocus|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout"
	  +"|onmouseover|onmouseup|style|title],"
	+"legend[align<bottom?left?right?top|accesskey|class|dir<ltr?rtl|id|lang"
	  +"|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|style|title],"
	+"li[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup"
	  +"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title|type"
	  +"|value],"
	+"link[charset|class|dir<ltr?rtl|href|hreflang|id|lang|media|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|rel|rev|style|title|target|type],"
	+"map[class|dir<ltr?rtl|id|lang|name|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"menu[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown"
	  +"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover"
	  +"|onmouseup|style|title],"
	+"meta[content|dir<ltr?rtl|http-equiv|lang|name|scheme],"
	+"noframes[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"noscript[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"object[align<bottom?left?middle?right?top|archive|border|class|classid"
	  +"|codebase|codetype|data|declare|dir<ltr?rtl|height|hspace|id|lang|name"
	  +"|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|standby|style|tabindex|title|type|usemap"
	  +"|vspace|width],"
	+"ol[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown"
	  +"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover"
	  +"|onmouseup|start|style|title|type],"
	+"optgroup[class|dir<ltr?rtl|disabled<disabled|id|label|lang|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|style|title],"
	+"option[class|dir<ltr?rtl|disabled<disabled|id|label|lang|onclick|ondblclick"
	  +"|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout"
	  +"|onmouseover|onmouseup|selected<selected|style|title|value],"
	+"p[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|style|title],"
	+"param[id|name|type|value|valuetype<DATA?OBJECT?REF],"
	+"pre/listing/plaintext/xmp[align|class|dir<ltr?rtl|id|lang|onclick|ondblclick"
	  +"|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout"
	  +"|onmouseover|onmouseup|style|title|width],"
	+"q[cite|class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"s[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup"
	  +"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],"
	+"samp[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"script[charset|defer|language|src|type],"
	+"select[class|dir<ltr?rtl|disabled<disabled|id|lang|multiple<multiple|name"
	  +"|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup"
	  +"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|size|style"
	  +"|tabindex|title],"
	+"small[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"span[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown"
	  +"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover"
	  +"|onmouseup|style|title],"
	+"strike[class|class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown"
	  +"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover"
	  +"|onmouseup|style|title],"
	+"strong/b[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"style[dir<ltr?rtl|lang|media|title|type],"
	+"sub[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"sup[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title],"
	+"table[align<center?left?right|bgcolor|border|cellpadding|cellspacing|class"
	  +"|dir<ltr?rtl|frame|height|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|rules"
	  +"|style|summary|title|width],"
	+"tbody[align<center?char?justify?left?right|char|class|charoff|dir<ltr?rtl|id"
	  +"|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown"
	  +"|onmousemove|onmouseout|onmouseover|onmouseup|style|title"
	  +"|valign<baseline?bottom?middle?top],"
	+"td[abbr|align<center?char?justify?left?right|axis|bgcolor|char|charoff|class"
	  +"|colspan|dir<ltr?rtl|headers|height|id|lang|nowrap<nowrap|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|rowspan|scope<col?colgroup?row?rowgroup"
	  +"|style|title|valign<baseline?bottom?middle?top|width],"
	+"textarea[accesskey|class|cols|dir<ltr?rtl|disabled<disabled|id|lang|name"
	  +"|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup"
	  +"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|onselect"
	  +"|readonly<readonly|rows|style|tabindex|title],"
	+"tfoot[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl|id"
	  +"|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown"
	  +"|onmousemove|onmouseout|onmouseover|onmouseup|style|title"
	  +"|valign<baseline?bottom?middle?top],"
	+"th[abbr|align<center?char?justify?left?right|axis|bgcolor|char|charoff|class"
	  +"|colspan|dir<ltr?rtl|headers|height|id|lang|nowrap<nowrap|onclick"
	  +"|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove"
	  +"|onmouseout|onmouseover|onmouseup|rowspan|scope<col?colgroup?row?rowgroup"
	  +"|style|title|valign<baseline?bottom?middle?top|width],"
	+"thead[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl|id"
	  +"|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown"
	  +"|onmousemove|onmouseout|onmouseover|onmouseup|style|title"
	  +"|valign<baseline?bottom?middle?top],"
	+"title[dir<ltr?rtl|lang],"
	+"tr[abbr|align<center?char?justify?left?right|bgcolor|char|charoff|class"
	  +"|rowspan|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title|valign<baseline?bottom?middle?top],"
	+"tt[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup"
	  +"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],"
	+"u[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup"
	  +"|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],"
	+"ul[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown"
	  +"|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover"
	  +"|onmouseup|style|title|type],"
	+"var[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress"
	  +"|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style"
	  +"|title]"
});

function tinyBrowser (field_name, url, type, win) {
   /* If you work with sessions in PHP and your client doesn't accept cookies you might need to carry
      the session name and session ID in the request string (can look like this: "?PHPSESSID=88p0n70s9dsknra96qhuk6etm5").
      These lines of code extract the necessary parameters and add them back to the filebrowser URL again. */
   var cmsURL = "./thirdparty/tiny_mce/plugins/tinybrowser/tinybrowser.php";    // script URL - use an absolute path!
   if (cmsURL.indexOf("?") < 0) {
       //add the type as the only query parameter
       cmsURL = cmsURL + "?type=" + type;
   }
   else {
       //add the type as an additional query parameter
       // (PHP session ID is now included if there is one at all)
       cmsURL = cmsURL + "&type=" + type;
   }
   tinyMCE.activeEditor.windowManager.open({
       file : cmsURL,
       title : 'File Browser',
       width : 650, 
       height : 440,
       resizable : "yes",
       scrollbars : "yes",
       inline : "yes",  // This parameter only has an effect if you use the inlinepopups plugin!
       close_previous : "no"
   }, {
       window : win,
       input : field_name
   });
   return false;
}

function fileBrowserCallBack(field_name, url, type, win) {
	// This is where you insert your custom filebrowser logic
	//alert("Example of filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);

	// Insert new URL, this would normaly be done in a popup
	//win.document.forms[0].elements[field_name].value = "someurl.htm";
}