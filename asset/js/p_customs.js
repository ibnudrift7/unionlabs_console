$(function(){

    $('.wptwa-container .wptwa-handler').on('click', function(){
        var nbox_wa = $(this).parent().find('.wptwa-box');
        if( $(nbox_wa).hasClass("show") ){
            $(nbox_wa).removeClass('show');
        }else{
            $(nbox_wa).addClass('show');
        }
    });

    $('.wptwa-container .wptwa-box .wptwa-close').on('click', function(){
    	console.log("box close");
    	$('.wptwa-container .wptwa-box.show').removeClass('show');
	});    	

    $('.alert.alert-success.fade').removeClass('fade');

});