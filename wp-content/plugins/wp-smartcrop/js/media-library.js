(function( $ ) {
	var position_image_overlay = function( $image, $overlay ) {
		var image_pos = $image.position();
		var image_margin_left = $image.css('margin-left');
		var image_margin_right = $image.css('margin-right');
		$overlay.css({
			'position'    : 'absolute',
			'opacity'     : '0.4',
			'top'         : image_pos.top,
			'left'        : image_pos.left,
			'width'       : $image.width()+'px',
			'height'      : $image.height()+'px',
			'margin-left' : image_margin_left,
			'margin-right': image_margin_right
		});

		var gnomon_width  = parseInt( $('.wpsmartcrop_image_focus_left').val() ) + '%';
		var gnomon_height = parseInt( $('.wpsmartcrop_image_focus_top').val() ) + '%';
		$overlay.find('.wpsmartcrop_image_gnomon_left').width( gnomon_width  );
		$overlay.find('.wpsmartcrop_image_gnomon_top' ).height( gnomon_height );

		if( !$('.wpsmartcrop_enabled').is(':checked') ) {
			$overlay.hide();
			$image.parent().removeClass('wpsmartcrop_strip_pseudos');
		} else {
			$overlay.show();
			$image.parent().addClass('wpsmartcrop_strip_pseudos');
		}
	};

	var load_overlay = function( $image ) {
		var $gnomon_left = $('<div></div>').addClass('wpsmartcrop_image_gnomon_left').width(0).height('100%').css({
			'position'      : 'absolute',
			'top'           : 0,
			'left'          : 0,
			'margin'        : 0,
			'padding'       : 0,
			'box-sizing'    : 'border-box',
			'border-right'  : '2px solid #070',
			'box-shadow'    : 'inset -2px 0 0 0 #FFF, 2px 0 0 0 #FFF'
		});
		var $gnomon_top  = $('<div></div>').addClass('wpsmartcrop_image_gnomon_top').width('100%').height(0).css({
			'position'      : 'absolute',
			'top'           : 0,
			'left'          : 0,
			'margin'        : 0,
			'padding'       : 0,
			'box-sizing'    : 'border-box',
			'border-bottom' : '2px solid #070',
			'box-shadow'    : 'inset 0 -2px 0 0 #FFF, 0 2px 0 0 #FFF'
		});
		$('.wpsmartcrop_image_overlay').remove();
		var $overlay = $('<div></div>').addClass('wpsmartcrop_image_overlay').append( $gnomon_left , $gnomon_top ).insertAfter($image);
		$overlay.css({
			cursor: 'pointer'
		});
		$(window).resize(function() {
			clearTimeout( window.wpsmartcrop_image_overlay_resize_timeout );
			window.wpsmartcrop_image_overlay_resize_timeout = setTimeout( function() {
				position_image_overlay( $image, $overlay );
			}, 50 );
		});
		position_image_overlay( $image, $overlay );

		$('body').on('click', '.wpsmartcrop_image_overlay', function(e) {
			var $this = $(this);
			var offset = $this.offset();
			var pos_x = e.pageX - offset.left;
			var pos_y = e.pageY - offset.top;
			var left  = pos_x / $this.width() * 100;
			var top   = pos_y / $this.height() * 100;
			$('.wpsmartcrop_image_focus_left').val( left ).change();
			$('.wpsmartcrop_image_focus_top' ).val( top  ).change();
			position_image_overlay( $image, $overlay );
		});

		$('.wpsmartcrop_enabled').change(function() {
			position_image_overlay( $image, $overlay );
		});
	};

	var $image = $('.media-frame-content .attachment-details .thumbnail img');
	if( ( !$image || !$image.length ) && $('body').hasClass('post-type-attachment') ) {
		$image = $('.wp_attachment_holder .wp_attachment_image img.thumbnail');
	}
	console.log($image);
	if( $image.prop('complete') ) {
		load_overlay( $image );
	} else {
		$image.load(function() {
			load_overlay( $image );
		});
	}

})( jQuery );
