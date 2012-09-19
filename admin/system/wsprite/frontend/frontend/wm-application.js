/*
 * @requires jQuery($), jQuery UI & sortable/draggable UI modules & jQuery COOKIE plugin
 */
 
var widgetMaster = {
    
    jQuery : $,
    
    settings : {
        columns : '#widgetHolder',
        widgetSelector: '.widgetItem',
        handleSelector: '.upDownArrows',
		counter: 0,
		myId: 0,
        
        widgetIndividual : {}
    },

    initEveryPage : function () {
		this.wmCheckIt();
    },
    
	initWidgetPage : function () {
		this.settings.myId = $('#jqWidgetId').html();
        this.addWidgetControls();
        this.makeSortable();
		this.management();
		this.updateWidgetData();
	},
	
    addWidgetControls : function () {
        var widgetMaster = this,
            $ = this.jQuery,
            settings = this.settings;
            
		$('.closeWidget').click(function () {
			if(confirm('This widget will be removed, ok?')) {
				
				var closeId = $(this).parent().parent().attr('id');
			
				$('#widget-list input#' + closeId).attr('checked', function () {
					return false;
				});
				
				
				$(this).parents(settings.widgetSelector).fadeOut(function () {
					$(this).slideUp(function () {
						var deleteId = closeId.split('wi');
						
						$.ajax({
							type: "POST",
							url: wgConfig.define.webroot + "ajax/delete.php",
							data: 'id=' + deleteId[1],
							dataType: "html",
							beforeSend: function(){ 
								$('#actualWidgetList').fadeTo("fast", 0.33);
								$('#actualWidget').prepend('<div id="widget-loading">Loading...</div>');
							},
							success: function(data){
								widgetMaster.ajaxSuccess();
							}
						});
						$(this).remove();
					});
				});
			}
			return false;
		});
		
     },
	 
	management : function () {
		var widgetMaster = this,
            $ = this.jQuery,
            settings = this.settings,
			widgetType = '';
		
		$('#manageBtn').hover(
			function(){
				$('ul', this).fadeIn('fast');
			},
			function(){
				$('ul', this).fadeOut('fast');
			}
		);
        
		$('#manageBtn a').click(function() {
			widgetType = $(this).attr('href');
			widgetType = widgetType.split('#');
			var newWidgetType = widgetType[1];
			
			$.ajax({
				type: "POST",
				url: wgConfig.define.webroot + "ajax/addNew.php",
				data: 'type=' + newWidgetType + '&id=' + settings.myId,
				dataType: "html",
				beforeSend: function(){ 
					$('#actualWidgetList').fadeTo("fast", 0.33);
					$('#actualWidget').prepend('<div id="widget-loading">Loading...</div>');
				},
				success: function(data){
					
					var newId = "wi" + data;
					$('#' + newWidgetType).clone(true).attr('id',newId).appendTo('#widgetHolder');
					$('input[type=hidden]','#' + newId).attr('value',data);
					$(settings.columns).sortable('destroy')
					widgetMaster.makeSortable();
					widgetMaster.updateWidgetData();
					widgetMaster.ajaxSuccess();
				}
			});

			return false;
		})
	},
	
	ajaxSuccess : function () {
		var settings = this.settings,
			cacheBuster = new Date().getTime();
		$('#jsWidgetSprite').load(wgConfig.define.webroot + 'ajax/preview-sprite.php?id=' + settings.myId + '&ts=22&cb=' + cacheBuster);
		$('#actualWidgetList').fadeTo("fast", 1.0);
		$('#widget-loading').remove();
	},
    
    makeSortable : function () {
		
        var widgetMaster = this,
            $ = this.jQuery,
            settings = this.settings,
            $sortableItems =  $('> li', settings.columns);

        $sortableItems.find(settings.handleSelector).css({
            cursor: 'move'
        }).mousedown(function (e) {
            $sortableItems.css({width:''});
            $(this).parent().css({
                width: $(this).parent().width() + 'px'
            });
        }).mouseup(function () {
            if(!$(this).parent().hasClass('dragging')) {
                $(this).parent().css({width:''});
            } else {
                $(settings.columns).sortable('disable');
            }
        });

        $(settings.columns).sortable({
            items: $sortableItems,
            connectWith: $(settings.columns),
            handle: settings.handleSelector,
            placeholder: 'widget-placeholder',
            forcePlaceholderSize: true,
            revert: 300,
            delay: 100,
            opacity: 0.8,
            containment: 'document',
            start: function (e,ui) {
                $(ui.helper).addClass('dragging');
            },
            stop: function (e,ui) {
                $(ui.item).css({width:''}).removeClass('dragging');
                $(settings.columns).sortable('enable');
                /* Save prefs to cookie: */
                widgetMaster.savePreferences();
            }
        });
    },
	
	updateWidgetData : function () {
		var settings = this.settings;
			
		$("form", "#widgetHolder").each(function() {   
			$(this).validate({
			 
				submitHandler: function(form) { 
					
					jQuery(form).ajaxSubmit({
					
						type: "POST",
						dataType:  'json',
						url:	wgConfig.define.webroot + "ajax/update.php",

						beforeSubmit: function(){
							$('input[type=submit]', form).attr('disabled', true);
							$('#actualWidgetList').fadeTo("fast", 0.33);
							$('#actualWidget').prepend('<div id="widget-loading">Loading...</div>');
						},
						
						success: function(json){
							$('input[type=submit]', form).attr('disabled', false);
							widgetMaster.ajaxSuccess();
							//alert(data);
							if(json.resp == 0) {
								alert('An error occured.  Please try again');
							}
							if(json.file != '') {
								$('.fileUpdate', form).html(json.file);
							}
						}
					});

					return false;
				}
			});
		}); 
		
	},
	
    savePreferences : function () {
        var widgetMaster = this,
            $ = this.jQuery,
            settings = this.settings,
            cookieString = '',
			postValue = '';
            
        /* Assemble the cookie string */
		$(settings.widgetSelector,settings.columns).each(function(i){
			
			postValue += (i===0) ? '' : '&';
			
			postValue += $(this).attr('id') + '=' +$('legend:eq(0)',this).text().replace(/\|/g,'[-PIPE-]').replace(/,/g,'[-COMMA-]');
			
		});
		
		$.ajax({
			type: "POST",
			url: wgConfig.define.webroot + "ajax/move.php",
			data: postValue,
			dataType: "html",
			beforeSend: function(){ 
				$('#actualWidgetList').fadeTo("fast", 0.33);
				$('#actualWidget').prepend('<div id="widget-loading">Loading...</div>');
			},
			success: function(data){
				widgetMaster.ajaxSuccess();
			}
		});

    },
	
	wmCheckIt: function() {
		$('input[type="checkbox"]').each(function(){
			var $this = $(this);
			$this.css({'position' : 'absolute', 'left' : '-1000em', 'border' : '0px', 'background' : 'none'}).before('<span class="pseudoCheck"></span>');
			/**/
			if($this.attr('checked')){
				$this.prev('span').addClass('checkOn');
			}else{
				$this.prev('span').removeClass('checkOn');
			}
		});
		$('.pseudoCheck').click(function(){
			if($(this).hasClass('checkOn')){
				$(this).removeClass('checkOn').next('input[type="checkbox"]').removeAttr('checked','checked');
			} else {
				$(this).addClass('checkOn').next('input[type="checkbox"]').attr('checked','checked');
			}
		});	
	}
};

$(document).ready(function() {
	widgetMaster.initEveryPage();
	
	$('.closeAlert').click(function () {
		$(this).parent().parent().fadeOut('slow');
	});
});
