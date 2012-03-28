<?php

	function reservations_calendar_shortcode($atts) {
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'easyreservations_send_calendar' );
	
		if(isset($atts['room'])) $room = $atts['room']; else $room = 0;
		if(isset($atts['offer'])) $offer = $atts['offer']; else $offer = 0;
		if(isset($atts['width'])) $width = $atts['width']; else $width = '';
		if(isset($atts['heigth'])) $heigth = $atts['heigth']; else $heigth = '';
		if(isset($atts['price'])) $price = $atts['price']; else $price = 0;
		if(isset($atts['style'])) $style = $atts['style']; else $style = 1;
		if(empty($width)) $width = 300;
		wp_enqueue_style('easy-cal-'.$style);

		$return = '<form name="CalendarFormular" id="CalendarFormular">';
			$return .= '<input type="hidden" name="room" onChange="easyreservations_send_calendar(\'shortcode\')" value="'.$room.'">';
			$return .= '<input type="hidden" name="offer" onChange="easyreservations_send_calendar(\'shortcode\')" value="'.$offer.'">';
			$return .= '<input type="hidden" name="date" onChange="easyreservations_send_calendar(\'shortcode\')" value="0">';
			$return .= '<input type="hidden" name="size" value="'.$width.','.$heigth.','.$price.'">';
			$return .= '<input type="hidden" name="calendarnonce" value="'.wp_create_nonce( 'easy-calendar' ).'">';
		$return .= '</form><!-- Provided by easyReservations free Wordpress Plugin http://www.feryaz.de -->';
		$return .= '<div id="showCalender" style="margin-right:auto;margin-left:auto;vertical-align:middle;padding:0;width:'.$width.'px"></div>';

		add_action('wp_print_footer_scripts', 'easyreservtions_send_cal_script');
		return $return;
	}

	function easyreservtions_send_cal_script(){
		echo '<script>easyreservations_send_calendar("shortcode");</script>';
	}
	function easyreservtions_send_cal_script_widget(){
		//echo '<script>easyreservations_send_calendar("widget");</script>';
	}
?>