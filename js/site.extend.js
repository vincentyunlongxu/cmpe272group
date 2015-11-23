/* JavaScript Document */

jQuery.setNavPath = function(primary, secendary) {
		if(primary) primary = parseInt(primary);
		else var primary = 0;
		if(secendary) secendary = parseInt(secendary);
		else var secendary = 0;
		$('#nav'+String(primary)).addClass('active');
		$('#nav'+String(primary)+'_panel').addClass('in').find('a:eq('+secendary+')').addClass('active');
		alert('[$.setNavPath]\r\nThis method is replaced by "set_nav_path"\r\nPlease modify your code to ensure the new version.');
};

/* jQuery fn extends
*
*/
(function ($) {
	/* pageMessage : show/close a div message in document dom.
	*  @options	   : 'success' - green message;
	* 			   : 'alert' - red message;
	* 			   : 'close' - close first message block;
	* 			   : 'closeAll' - close all message block(s);	
	*  @msg		   : string that appears in message block.
	*/
	$.fn.pageMessage = function (options, msg) {
		var self = $(this);
		if(!options) throw 'Parameter "options" is exprcted';
		msg = String(msg || '');
		if( options === 'close') {
			var objs = self.next('div.alert[role="alert"]').first();
			objs.slideUp(500, function () { $(this).remove(); });
			return;
		}
		if( options === 'closeAll') {
			var objs = self.nextAll('div.alert[role="alert"]');
			objs.slideUp(500, function () { $(this).remove(); });
			return;
		}
		//generate id string
		var id, idtag, i = 0;
		while(++i) {
			id = 'msg_block_' + String(i);
			idtag = '#' + id;
			if($('#' + id).length == 0) break;
		}
		var str = $('<div id="' + id + '" class="alert" style="display:none;" role="alert"> \
<button id="'+ id + '_close" type="button" class="close"><span aria-hidden="true">&times;</span></button><p>' + msg + '</p></div>');
		if(options === 'success') {
			str.addClass('alert-success');
		}
		else if (options === 'alert') {
			str.addClass('alert-danger');
		}
		//append and reg close event
		//str.insertAfter(self);
		var divs = self.nextAll('div.alert[role="alert"]');
		if(divs.length > 0) {
			divs.last().after(str);
		}
		else{
			self.after(str);
		}
		str.fadeIn(300);
		$(idtag + '_close').click(function () {
			$(idtag).slideUp(500, function() { $(this).remove();} );
		});
		return this;
	};

	/* uploadify init extends
	*
	*/
	$.fn.loadUploadify = function (options) {
		if(!options) throw 'Parameter "options" is exprcted';
		var data = {
		'buttonText' : '文件上传',
		'removeTimeout' : 0.1,
		'swf' : '/css/uploadify.swf',
		'uploader' : '/serv/upload-file',
		'method' : 'post' };
		for(var k in options) {
			data[k] = options[k];
		}
		$(this).uploadify(data);
		return this;
	};
})(jQuery);

/* set_nav_path : set current menu item to active
*  the menu item should be named to '#nav'
*  Notice : DO NOT CHANGE THE MENU STRUCTURE.
*/
function set_nav_path (primary, secendary) {
	if(primary) primary = parseInt(primary);
		else var primary = 0;
		if(secendary) secendary = parseInt(secendary);
		else var secendary = 0;
		$('#nav'+String(primary)).addClass('active');
		$('#nav'+String(primary)+'_panel').addClass('in').find('a:eq('+secendary+')').addClass('active');
};

/* format_day_string : format date string to day string
*  @val		: a string of date is exprcted.
*  @format  : using 'yyyy' for year
			  using 'MM' for month
			  using 'dd' for days
*/
function format_day_string (val, format) {
	var d = new Date(val);
	format = format.replace('yyyy', d.getFullYear());
	format = format.replace('MM', d.getMonth() + 1);
	format = format.replace('dd', d.getDate());
	return format;
};

