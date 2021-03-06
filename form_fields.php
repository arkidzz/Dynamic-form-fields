<?php
function def( $selected, $current = true, $echo = true, $type ) {
    if ( (string) $selected === (string) $current ) {
        $result = " $type='$type'";
    } else {
        $result = '';
    }
    if ( $echo ) {
        echo $result;
    }
    return $result;
}

function form_fields($opt){
	
	$option_name = 'for-field-framework';
	$output = '';
	foreach($opt as $options){
		
		$val = '';
		$placeholder = '';
		
		if ( ( $options['type'] != "heading" ) && ( $options['type'] != "info" ) ) {

			// Keep all ids lowercase with no spaces
			$options['id'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($options['id']) );

			$id = 'section-' . $options['id'];

			$class = 'section';
			if ( isset( $options['type'] ) ) {
				$class .= ' section-' . $options['type'];
			}
			if ( isset( $options['class'] ) ) {
				$class .= ' ' . $options['class'];
			}

			$output .= '<div id="' . htmlspecialchars( $id ) .'" class="' . htmlspecialchars( $class ) . '">'."\n";
			if ( isset( $options['label'] ) ) {
				$output .= '<h4 class="heading">' . htmlspecialchars( $options['label'] ) . '</h4>' . "\n";
			}
			if ( $options['type'] != 'editor' ) {
				$output .= '<div class="option">' . "\n" . '<div class="controls">' . "\n";
			}
		}
		
		if ( isset( $options['std'] ) ) {
			$val = $options['std'];
		}
		if ( isset( $options['placeholder'] ) ) {
			$placeholder = ' placeholder="' . htmlspecialchars( $options['placeholder'] ) . '"';
		}
		switch ( $options["type"] ) {
			case "text":
				$output .= '<input id="' . htmlspecialchars( $options['id'] ) . '" class="of-input" name="' . htmlspecialchars( $option_name . '[' . $options['id'] . ']' ) . '" type="'.$options["type"].'" value="' . htmlspecialchars( $val ) . '"' . $placeholder . ' />';
			break;
			case "number":
				$output .= '<input id="' . htmlspecialchars( $options['id'] ) . '" class="of-input" name="' . htmlspecialchars( $option_name . '[' . $options['id'] . ']' ) . '" type="'.$options["type"].'" value="' . htmlspecialchars( $val ) . '"' . $placeholder . ' />';
			break;
			case "password":
				$output .= '<input id="' . htmlspecialchars( $options['id'] ) . '" class="of-input" name="' . htmlspecialchars( $option_name . '[' . $options['id'] . ']' ) . '" type="'.$options["type"].'" value="' . htmlspecialchars( $val ) . '"' . $placeholder . ' />';
			break;
			case "date":
				$output .= '<input id="' . htmlspecialchars( $options['id'] ) . '" class="of-input" name="' . htmlspecialchars( $option_name . '[' . $options['id'] . ']' ) . '" type="'.$options["type"].'" value="' . htmlspecialchars( $val ) . '"' . $placeholder . ' />';
			break;
			case "email":
				$output .= '<input id="' . htmlspecialchars( $options['id'] ) . '" class="of-input" name="' . htmlspecialchars( $option_name . '[' . $options['id'] . ']' ) . '" type="'.$options["type"].'" value="' . htmlspecialchars( $val ) . '"' . $placeholder . ' />';
			break;
			case 'textarea':
				$rows = '8';
				$rows = '50';

				if ( isset( $options['settings']['rows'] ) ) {
					$custom_rows = $options['settings']['rows'];
					if ( is_numeric( $custom_rows ) ) {
						$rows = $custom_rows;
					}
				}
				if ( isset( $options['settings']['cols'] ) ) {
					$custom_cols = $options['settings']['cols'];
					if ( is_numeric( $custom_cols ) ) {
						$cols = $custom_cols;
					}
				}

				$val = stripslashes( $val );
				$output .= '<textarea id="' . htmlspecialchars( $options['id'] ) . '" class="of-input" name="' . htmlspecialchars( $option_name . '[' . $options['id'] . ']' ) . '" rows="' . $rows . '" cols="' . $cols . '"' . $placeholder . '>' . htmlspecialchars( $val ) . '</textarea>';
			break;
			case 'select':
				$output .= '<select class="of-input" name="' . htmlspecialchars( $option_name . '[' . $options['id'] . ']' ) . '" id="' . htmlspecialchars( $options['id'] ) . '">';

				foreach ($options['options'] as $key => $option ) {
					$output .= '<option'. def( $val, $key, false, 'selected' ) .' value="' . htmlspecialchars( $key ) . '">' . htmlspecialchars( $option ) . '</option>';
				}
				$output .= '</select>';
			break;
			case "radio":
				$name = $option_name .'['. $options['id'] .']';
				$output .= '<div class="hc-options_selector">';
				foreach ($options['options'] as $key => $option) {
					$id = $option_name . '-' . $options['id'] .'-'. $key;
					$output .= '<div class="hc-head_label"><input class="of-input of-radio" type="'.$options["type"].'" name="' . htmlspecialchars( $name ) . '" id="' . htmlspecialchars( $id ) . '" value="'. htmlspecialchars( $key ) . '" '. def( $val, $key, false, 'checked') .' /><label for="' . htmlspecialchars( $id ) . '">'.htmlspecialchars( $option ).'</label></div>';
				}
				$output .= '</div>';
			break;
			case "checkbox":
				$output .= '<input id="' . htmlspecialchars( $options['id'] ) . '" class="checkbox of-input" type="'.$options["type"].'" name="' . htmlspecialchars( $option_name . '[' . $options['id'] . ']' ) . '" '. def( $val, 1, false, 'checked') .' />';
				$output .= '<label class="explain" for="' . htmlspecialchars( $options['id'] ) . '">' . $options["std"] . '</label>';
			break;
			case "multicheck":
				foreach ($options['options'] as $key => $option) {
					$checked = '';
					$label = $option;
					$option = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($key));

					$id = $option_name . '-' . $options['id'] . '-'. $option;
					$name = $option_name . '[' . $options['id'] . '][' . $option .']';
					
					if ( isset($val[$option]) ) {
						$checked = def($val[$option], 1, false, 'checked');
					}

					$output .= '<input id="' . htmlspecialchars( $id ) . '" class="checkbox of-input" type="checkbox" name="' . htmlspecialchars( $name ) . '" ' . $checked . ' /><label for="' . htmlspecialchars( $id ) . '">' . htmlspecialchars( $label ) . '</label>';
				}
			break;
		}
		
		if ( ( $options['type'] != "heading" ) && ( $options['type'] != "info" ) ) {
			$output .= '</div>';
			$output .= '</div></div>'."\n";
		}
	}
	
	return $output;
	
}