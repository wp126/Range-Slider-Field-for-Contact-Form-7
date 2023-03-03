<?php
function RSFFCF7_add_form_tag_rangeslider() {
	wpcf7_add_form_tag( array( 'rangeslider', 'rangeslider*' ),'RSFFCF7_rangeslider_form_tag_handler', array('name-attr' => true) );
        }
function  RSFFCF7_rangeslider_form_tag_handler( $tag ) {
	if ( empty( $tag->name ) ) {
       return '';
     }
    $validation_error = wpcf7_get_validation_error( $tag->name );
	$class = wpcf7_form_controls_class( $tag->type );
	$class .= ' wpcf7-validates-as-rangeslider';
    $atts = array();
	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();
	$atts['readonly'] = 'readonly';
	if ( $tag->has_option( 'readonly' ) ) {
	$atts['readonly'] = 'readonly';
	}
	$value =(string) reset( $tag->values );   	
	if ( $tag->has_option( 'placeholder' ) or $tag->has_option( 'watermark' ) ) {
		$atts['placeholder'] = $value;
		$value = '';
	}
	$value = $tag->get_default_option( $value );


	$value = wpcf7_get_hangover( $tag->name, $value );

	$atts['class'] .= " rsffcf-slider";

	if(!empty($tag->get_option( 'min' )[0])){

		$atts['value'] =$tag->get_option( 'min' )[0];
	}else{
		$atts['value'] =1;
	}

	$atts['type'] = 'hidden';

	$atts['name'] = $tag->name;

	if(!empty($tag->get_option( 'step' )[0])){

		$atts['step'] = $tag->get_option( 'step' )[0];
	}else{
		$atts['step'] = 2;
	}

	if(!empty($tag->get_option( 'min' )[0])){

		$atts['min'] = $tag->get_option( 'min' )[0];

	}else{
		$atts['min'] =1;
	}

	if(!empty($tag->get_option( 'max' )[0])){

	 	$atts['max'] = $tag->get_option( 'max' )[0];
	}else{
		$atts['max'] =20;
	}

	if(!empty($tag->get_option( 'Prefix' )[0])){
    	$atts['Prefix'] = $tag->get_option( 'Prefix' )[0];
	}else{
		$atts['Prefix'] = '$';
    }
    if(!empty($tag->get_option( 'prefixpos' )[0])){

    	$atts['prefixpos'] = $tag->get_option( 'calslider' )[0];
    }else{
    	$atts['prefixpos'] ="left";
    }

    if(!empty($tag->get_option( 'slidershow' )[0])){

    	$atts['slidershow'] = $tag->get_option( 'slidershow' )[0];

    }else{

    	$atts['slidershow'] ="single";

    }
	
    if(!empty($tag->get_option( 'sliderstyle' )[0])){

    	$atts['slider_style'] =$tag->get_option( 'sliderstyle' )[0];

	}else{
		$atts['slider_style'] ="rainbow";
	}

	if(!empty($tag->get_option( 'rangeshow' )[0])){
		$atts['rangeshow'] = $tag->get_option( 'rangeshow' )[0];
	}else{
		$atts['rangeshow'] ="enable";
	}

	if(!empty($tag->get_option( 'labels' )[0])){
   	 	$atts['lable_in'] = $tag->get_option( 'labels' )[0];
   	}else{
		$atts['lable_in'] ="";
	}

    if($atts['slider_style'] == "circle"){
     	
     	$class_name = "rsfcf_circles-slider";

     }else if($atts['slider_style']=="scale"){
        $class_name = "rsfcf_scale-slider";
         
    }else if($atts['slider_style']=="rainbow"){ 
        $class_name = "rsfcf_rainbow-slider";
           
    }else if($atts['slider_style']=="modernflat"){ 
        $class_name = "rsfcf_flat-slider";

    }else if($atts['slider_style']=="doublelabels"){ 
        $class_name = "rsfcf_double-label-slider";

    }else{
        $class_name = "rsfcf_slider-display";
    }

	$atts = wpcf7_format_atts($atts);
   
    $html = sprintf(
	'<div class='.$class_name.' %2$s><span class="wpcf7-form-control-wrap %1$s"><input %2$s %4$s />%3$s</span></div>',sanitize_html_class($tag->name) , $atts, $validation_error, 'data-formulas="'.$value.'"' );

	return $html;
}
function RSFFCF7_add_tag_generator_rangeslider() {
	$tag_generator = WPCF7_TagGenerator::get_instance();
	$tag_generator->add( 'rangeslider', __( 'rangeslider', 'range-slider-field-for-contact-form-7' ),'RSFFCF7_tag_generator_rangeslider');	 
}
function RSFFCF7_tag_generator_rangeslider( $contact_form, $args = '' ) {
	$args = wp_parse_args( $args, array() );
	$wpcf7_contact_form = WPCF7_ContactForm::get_current();
	$contact_form_tags = $wpcf7_contact_form->scan_form_tags();
	$type = 'rangeslider';
 ?>
	<div class="control-box">
		<fieldset>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="<?php echo esc_attr( $args['content'] . '-name' ); ?>"><?php echo esc_html( __( 'Name', 'range-slider-field-for-contact-form-7' ) ); ?>
							</label>
						</th>
						<td>
							<input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="<?php echo esc_attr( $args['content'] . '-step' ); ?>"> 
								<?php echo esc_html( __( 'Step', 'range-slider-field-for-contact-form-7' ) ); ?>
							</label>
						</th>
						<td>
							<input type="number" min="1"  value="1" name="step" class="stepvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-step' ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row"><?php echo esc_html( __( 'Range', 'range-slider-field-for-contact-form-7' ) ); ?></th>
							<td>
								<fieldset>
								<legend class="screen-reader-text"><?php echo esc_html( __( 'Range', 'range-slider-field-for-contact-form-7' ) ); ?></legend>
								<label>

								<?php echo esc_html( __( 'Min', 'range-slider-field-for-contact-form-7' ) ); ?>
								<input type="number" min="1"  value="1"  name="min" class="numeric option" />
								</label>
								&ndash;
								<label>
								<?php echo esc_html( __( 'Max', 'range-slider-field-for-contact-form-7' ) ); ?>
								<input type="number" name="max" min="1"  value="100"  class="numeric option" />
								</label>
								</fieldset>
							</td>

					</tr>
					<tr>
						<th scope="row">
							<label for="<?php echo esc_attr( $args['content'] . '-prefix' ); ?>"><?php echo esc_html( __( 'Prefix', 'range-slider-field-for-contact-form-7' ) ); ?>
							</label>
						</th>
						<td>
							<input type="text" name="Prefix" class="Prefixvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-Prefix' ); ?>" />
							<?php echo esc_html( __( 'Use this prefix of the value', 'range-slider-field-for-contact-form-7' ) ); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="<?php echo esc_attr( $args['content'] . '-prefixposition' ); ?>">
								<?php echo esc_html( __( 'Prefix Position', 'range-slider-field-for-contact-form-7' ) ); ?>
							</label>
						</th>
						<td>
							<label><input type="radio" name="calslider" value="left" class="option" checked="checked" disabled/> <?php echo esc_html( __( 'left', 'range-slider-field-for-contact-form-7' ) ); ?></label>
							<label><input type="radio" name="calslider" value="right" class="option" disabled/> <?php echo esc_html( __( 'right', 'range-slider-field-for-contact-form-7' ) ); ?></label>
							<label class="occf7rs_pro_link">Only available in pro version <a href="https://www.plugin999.com/plugin/range-slider-field-for-contact-form-7/" target="_blank">link</a></label>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="<?php echo esc_attr( $args['content'] . '-sliderstyle' ); ?>">
								<?php echo esc_html( __( 'Slider Style', 'range-slider-field-for-contact-form-7' ) ); ?>
							</label>
						</th>
						<td>
							<label><input type="radio" name="sliderstyle" value="circle" class="option" /> <?php echo esc_html( __( 'Circle', 'range-slider-field-for-contact-form-7' ) ); ?></label>
							<label><input type="radio" name="sliderstyle" value="scale" class="option" /> <?php echo esc_html( __( 'Scale', 'range-slider-field-for-contact-form-7' ) ); ?></label>
							<label><input type="radio" name="sliderstyle" value="rainbow" class="option" checked="checked" /> <?php echo esc_html( __( 'Rainbow', 'range-slider-field-for-contact-form-7' ) ); ?></label>
							<label><input type="radio" name="sliderstyle" value="modernflat" class="option" /> <?php echo esc_html( __( 'Modern  Flat', 'range-slider-field-for-contact-form-7' ) ); ?></label>	
							<label><input type="radio" name="sliderstyle" value="doublelabels" class="option" /> <?php echo esc_html( __( 'Double  Labels', 'range-slider-field-for-contact-form-7' ) ); ?></label>	
							<label><input type="radio" name="sliderstyle" value="simple" class="option" /> <?php echo esc_html( __( 'simple', 'range-slider-field-for-contact-form-7' ) ); ?></label>	
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="<?php echo esc_attr( $args['content'] . '-slidershow' ); ?>">
								<?php echo esc_html( __( 'Slider Show', 'range-slider-field-for-contact-form-7' ) ); ?>
							</label>
						</th>
						<td>
							<label><input type="radio" name="slidershow" value="single" class="option" checked="checked" disabled/> <?php echo esc_html( __( 'Single Edge', 'range-slider-field-for-contact-form-7' ) ); ?></label>
							<label><input type="radio" name="slidershow" value="double" class="option" disabled/> <?php echo esc_html( __( 'Double Edge', 'range-slider-field-for-contact-form-7' ) ); ?></label>
							<label class="occf7rs_pro_link">Only available in pro version <a href="https://www.plugin999.com/plugin/range-slider-field-for-contact-form-7/" target="_blank">link</a></label>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="<?php echo esc_attr( $args['content'] . '-rangeshow' ); ?>">
								<?php echo esc_html( __( 'Range Show', 'range-slider-field-for-contact-form-7' ) ); ?>
							</label>
						</th>
						<td>
							<label><input type="radio" name="rangeshow" value="enable" class="option" checked="checked" /> <?php echo esc_html( __( 'Enable', 'range-slider-field-for-contact-form-7' ) ); ?></label>
							<label><input type="radio" name="rangeshow" value="disable" class="option" /> <?php echo esc_html( __( 'Disable', 'range-slider-field-for-contact-form-7' ) ); ?></label>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="<?php echo esc_attr( $args['content'] . '-labels' ); ?>"><?php echo esc_html( __( 'Labels', 'range-slider-field-for-contact-form-7' ) ); ?>
							</label>
						</th>
						<td>
							<input type="text" name="labels" class="labelsvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-labels' ); ?>" />
							<?php echo esc_html( __( '
							[NOTE:if you add label and range-show enable so show label otherwise show range.and label add (ex: sunday|monday|tuseday) use to comma.]', 'range-slider-field-for-contact-form-7' ) ); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="<?php echo esc_attr( $args['content'] . '-id' ); ?>"><?php echo esc_html( __( 'Id attribute', 'range-slider-field-for-contact-form-7' ) ); ?>
							</label>
						</th>
						<td>
							<input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="<?php echo esc_attr( $args['content'] . '-class' ); ?>"><?php echo esc_html( __( 'Class attribute', 'range-slider-field-for-contact-form-7' ) ); ?>
							</label>
						</th>
						<td>
							<input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" />
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</div>
	<div class="insert-box">
		<input type="text" name="<?php echo esc_attr($type); ?>" class="tag code" readonly="readonly" onfocus="this.select()"/>
	     <div class="submitbox">
		<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'range-slider-field-for-contact-form-7' ) ); ?>" />
		</div>
	    <br class="clear" />
		<p class="description mail-tag"><label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'range-slider-field-for-contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?><input type="text" class="mail-tag code hidden" readonly="readonly" id="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>" /></label></p>

	</div>
 <?php  
}
	
add_action('wpcf7_init','RSFFCF7_add_form_tag_rangeslider',10, 0 );
add_action('wpcf7_admin_init','RSFFCF7_add_tag_generator_rangeslider', 18, 0 );
	       

		