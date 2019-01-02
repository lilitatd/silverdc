$( document ).ready(function() {
    $(".mobile-menu").click(function(event) {
    	if($("#sidr-main").hasClass('sidr-vsb')){
    		$("#sidr-main").removeClass('sidr-vsb').css("display: block;");
    		// $(".header-left").css('display','none');
    		$("body").addClass('sidr-open sidr-main-open body-trns-nav');
    	}else{
    		$("#sidr-main").addClass('sidr-vsb').css("display: none;");
    		$("body").removeClass('body-trns-nav sidr-open sidr-main-open');
    		// $("#sidr-main").addClass('margin-left: -200px;');
    		// $(".header-left").css('display:-webkit-box; display:-ms-flexbox; display:flex;');
    	}
    });

    $(".sidr-class-nav-link").click(function(event) {
    	if($(this).parent().hasClass('open-menu')){
    		$(this).parent().removeClass('open-menu');
    	}else{
    		$(this).parent().addClass('open-menu');
    	}
    	
    });
});