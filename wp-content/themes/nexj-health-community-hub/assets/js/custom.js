/* 
 * Custom JS
 */

(function($){
	$(document).ready(function(){
		/* On Click */
		$('.mobile-menu-button').click(function(e){
			if(!$(this).hasClass('open')) {
				$(this).addClass('open');
				$('#site-navigation').addClass('open-nav');
				$('#navbar-block').addClass('show');
				$('body').css('overflow', 'hidden');
			} else {
				$(this).removeClass('open');
				$('#site-navigation').removeClass('open-nav');
				$('#navbar-block').removeClass('show');
				$('body').removeAttr('style');

			}
		});

		$('#navbar-block').click(function(e){
			$('.mobile-menu-button').removeClass('open');
			$('#site-navigation').removeClass('open-nav');
			$('#navbar-block').removeClass('show');
			$('body').removeAttr('style');
		});

		function _line_numbers(obj, display)
		{
			for (var i = 0; i < obj.childNodes.length; i++) {
			    if (obj.childNodes[i].className == "line-numbers-rows") {
			      obj.childNodes[i].style.display = display;
			      break;
			    }        
			}
		}

		/* This function copies text from pre defined divs */
		$('.copy-button').click(function(e){
			e.preventDefault();
			if (document.selection) { 
			    var range = document.body.createTextRange(),
			    	value = document.getElementById( $(this).data('item') );

			    range.moveToElementText(value);
			    range.select().createTextRange();
			    document.execCommand("copy");

			} else if (window.getSelection) { // not ie
			    var range = document.createRange(), // create new range
			    	selection = window.getSelection(), // get selection
			    	value = document.getElementById( $(this).data('item') ); 

			    _line_numbers(value, 'none');
				range.selectNode(value);
				selection.removeAllRanges(); // clear ranges
				selection.addRange(range); // add range to selection
			    document.execCommand("copy");
			    _line_numbers(value, 'block');
			}
			
		});

		/* This function deals with the navigation for users on the right */

		$('.user-menu-button').on('click', function(e) {
		    e.preventDefault();
		    e.stopPropagation();

		    $menu = $('.navbar-user-container');

		    if ($menu.data('menu') == 'closed') {
				$menu.show();
				$menu.data('menu', 'open');
		    } else {
				$menu.hide();
				$menu.data('menu', 'closed');
		    }

		    $(document).one('click', function closeMenu (e){
		        if($('#menu').has(e.target).length === 0){
		    		$('.navbar-user-container').hide();
		        } else {
		            $(document).one('click', closeMenu);
		        }
		    });
		});

		/* Document Ready */
	    $('.stick').theiaStickySidebar({
	      // Settings
	      additionalMarginTop: 80,
	      additionalMarginBottom: 30
	    });
	});
})(jQuery)