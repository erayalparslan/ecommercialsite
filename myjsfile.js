  
       $(document).ready(function() {

	$left    =0;
	$divCount=4;
	$margin  =20;
	$height  =144;
	function parameter($div=6,$mar=20,$heigh=144) {
		$divCount=$div;
		$margin  =$mar;
		$height  =$heigh;
	}
	

parameter($divCount,$margin,$height);
	// carousel controller creator
	$divLength			=$('.promoted_item').length;
	$mathLength 		=Math.floor($divLength/$divCount);

// slider buttons creator
	if($divLength%$divCount==0){
		for (var i =0;i<$mathLength; i++) {
			$('.controller').append('<div class="controll" id="controll'+(i+1)+'"></div>');
		}
	}else{
		for (var i =0;i<=$mathLength; i++) {
			$('.controller').append('<div class="controll" id="controll'+(i+1)+'"></div>');
		}
	}
	$('.controll').removeClass('active');
	$('.controll:first-child').addClass('active');
	
//slider buttons hide and show
	if($(window).width()>'576'){
		$('.right,.left,.fa-chevron-right,.fa-chevron-left').css('visibility','hidden');
		$('.controller').css('visibility','visible');
	}else{
		$('.right,.left,.fa-chevron-right,.fa-chevron-left').css('visibility','visible');
		$('.controller').css('visibility','hidden');
	}
	
	$(window).resize(function() {
		if($(window).width()<'576'){
			$('.right,.left,.fa-chevron-right,.fa-chevron-left').css('visibility','visible');
			$('.controller').css('visibility','hidden');
		}
		else {
			$('.right,.left,.fa-chevron-right,.fa-chevron-left').css('visibility','hidden');
			$('.controller').css('visibility','visible');
		}
	});

// slider move 
	$('.controll').click(function() {
		$lastControll	=$('.controll').length;
		$id 			=$(this).attr('id');
		$('.controll').removeClass('active');
		$(this).addClass('active');
		if ($(window).width()>'576') {
			if ($id!='controll1'&&$id!='controll'+$lastControll+'') {
				$a=$id.charAt($id.length-1)-1;
				$x=($divCount*($('.promoted_item').width()+$margin));
				$left=(0-($a*$x));
				$('.carousel_move').css('margin-left', $left);
			}
		}
	});

	$('.controll:last-child').click(function() {
		
			$left=((-$('.carousel_move').width())+($divCount*($('.promoted_item').width()+$margin)));
			$('.carousel_move').css('margin-left', $left);
			return $left;
	});
	$('.controll:first-child').click(function() {
		$left=0;
		$('.carousel_move').css('margin-left', 0);
		return $left;

	});
	$('.right').click(function() {
		if ($left>-($('.carousel_move').width()-2*$('.promoted_item').width()+$margin)) {
			$left=$left-($('.promoted_item').width()+$margin);
			$('.carousel_move').css('margin-left', $left);
			return $left;
		};
	});
	$('.left').click(function() {
		if ($left<=-$('.promoted_item').width()) {
			$left=$left+($('.promoted_item').width()+$margin);
			$('.carousel_move').css('margin-left', $left);
			return $left;
		};
	});


// carousel resize
	$('.promoted_item').css({
		'marginRight':$margin+"px",
		'height':$height
		});
	$('.promoted_item:last-child').css('marginRight',0);
  $('.over').css('height',$height);
	if ($(window).width()<'576') {
			$('.promoted_item').width($('.carousel_main').width());
		}else {
			$('.promoted_item').width(($('.carousel_main').width()-($divCount-1)*$margin)/$divCount);
		}
		$('.carousel_move').width(($('.promoted_item').width()+$margin)*$divLength);

		$(window).resize(function() {
			if ($(window).width()<'576') {
			$('.promoted_item').width($('.carousel_main').width());
			}else {
			$('.promoted_item').width(($('.carousel_main').width()-($divCount-1)*$margin)/$divCount);
			}
			$('.carousel_move').width(($('.promoted_item').width()+$margin)*$divLength);
			$('.carousel_move').css('margin-left', 0);
			$('.controll').removeClass('active');
			$('.controll:first-child').addClass('active');
			$left=0;
});

});
