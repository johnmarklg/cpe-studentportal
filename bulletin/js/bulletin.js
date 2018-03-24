
// CAROUSEL

/*#####################
Additional jQuery (required)
#####################*/
$(document).ready(function(){
    
	var clickEvent = false;
	$('#myCarousel').carousel({
		interval:   4000	
	}).on('click', '.list-group li', function() {
			clickEvent = true;
			$('.list-group li').removeClass('active');
			$(this).addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.list-group').children().length -1;
			var current = $('.list-group li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.list-group li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
	
	var boxheight = $('#myCarousel .carousel-inner').innerHeight();
    var itemlength = $('#myCarousel .item').length;
    var triggerheight = Math.round(boxheight/itemlength+1);
	$('#myCarousel .list-group-item').outerHeight(triggerheight);
})

$('.carousel').carousel({
  interval: 1000
})

//timer

setInterval(function(){
  var date = new Date();
  var format = [
      ("0" + date.getHours()).substr(-2)
    , ("0" + date.getMinutes()).substr(-2)
    
  ].join(":");
  document.getElementById("first").innerHTML = format;
}, 500);

//second timer
    var sec = 0;
    var min = 0;
    var hour = 0;
    //var p = document.getElementById("second");
    function clock() {
      sec++;
      //p.innerHTML = hour + ":" + min; 
      if (sec == 60) {
        sec = 0;
        min++;
      }
      if (min == 60) {
        min = 0;
        hour++; 
      }
    };
    window.setInterval(clock,1000);
