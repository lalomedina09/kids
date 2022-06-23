require('flexslider');

/*
 |--------------------------------------------------------------------------
 | Document Ready Function
 |--------------------------------------------------------------------------
 */

$(function() {

    var $window = $(window)
    flexslider = { vars:{} };

    function getGridSize() {
    	return (window.innerWidth < 768) ? 1 : 3
    }

    $window.on('load', function() {
    	$('.flexslider').each(function() {
		    $(this).flexslider({
                animation: "slide",
		    	animationSpeed: 400,
		    	animationLoop: false,
		    	controlsContainer: $(this).find(".slider-item__bullets"),
	    		customDirectionNav: $(this).find(".slider-item a"),
                initDelay: $(this).find(".slider-item__bullets").attr('data-delay'),
		    	itemWidth: 210,
		    	itemMargin: 30,
		    	minItems: getGridSize(),
		    	maxItems: getGridSize(),
		    	start: function(slider){
		        	flexslider = slider;
		    	}
		    });
	    });
    });

    $window.resize(function() {
    	var gridSize = getGridSize();

        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;
    });
}());
