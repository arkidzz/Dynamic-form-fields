<?php
	include('form_fields.php');
	function dynamic_Forms($data){
		
		$frm = '';
			
		foreach($data as $value){
			$frm .= '<form method="'.$value["method"].'" action="'.$value["action"].'">';
			$frm .= '<h1>'.$value["title"].'</h1>';
			$frm .= '<div>'.form_fields($value["input"]).'</div>';
			$frm .= '<button>'.$value["button"].'</button>';
			$frm .= '</form>';
			
		}
		
		return $frm;
	}
	
	$inputArray = array();
	
	$inputArray[] = array(
		'label' => 'First Name',
		'id' => 'fname',
		'class' => 'for-fname',
		'type' => 'text',
		'placeholder' => 'Enter First Name'
	);
	$inputArray[] = array(
		'label' => 'Last Name',
		'id' => 'lname',
		'class' => 'for-lname',
		'type' => 'text',
		'placeholder' => 'Enter Last Name'
	);
	$inputArray[] = array(
		"label"=>"Password",
		"id"=>"password",
		"class"=>"for-password",
		"type"=>"password",
		"placeholder"=>"Enter Password"
	);
	$inputArray[] = array(
		"label"=>"Email",
		"id"=>"email",
		"class"=>"for-email",
		"type"=>"email",
		"placeholder"=>"Enter Email"
	);
	$inputArray[] = array(
		"label"=>"Contact Number",
		"id"=>"number",
		"class"=>"for-number",
		"type"=>"number",
		"placeholder"=>"Enter Number"
	);
	
	// For Multiple Form Actions
	$formArray = array();
	$formArray[] = array(
		"title"=>"Contact Form",
		"method"=>"POST",
		"action"=>"#",
		"button"=>"Submit",
		"input"=>$inputArray
	);
	
	$inputArraylogin = array();
	$inputArraylogin[] = array(
		'label' => 'User Name',
		'id' => 'uname',
		'class' => 'for-uname',
		'type' => 'text',
		'placeholder' => 'Enter User Name'
	);
	$inputArraylogin[] = array(
		'label' => 'User Password',
		'id' => 'pass',
		'class' => 'for-pass',
		'type' => 'password',
		'placeholder' => 'Enter User Password'
	);
	
	$formArray[] = array(
		"title"=>"Login Form",
		"method"=>"POST",
		"action"=>"#",
		"button"=>"Submit",
		"input"=>$inputArraylogin
	);
	
	echo dynamic_Forms($formArray);
?>