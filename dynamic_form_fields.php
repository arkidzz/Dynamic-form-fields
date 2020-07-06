<?php
	include('form_fields.php');
	function dynamic_Forms($data){
		//var_dump($data);
		//$datas = '';
		//foreach($data as $value){
			$datas = form_fields($data);
		//}
		return $datas;
	}
	
	$options = array();
	
	$options[] = array(
		'label' => 'First Name',
		'id' => 'fname',
		'class' => 'for-fname',
		'type' => 'text',
		'placeholder' => 'Enter First Name'
	);
	$options[] = array(
		'label' => 'Last Name',
		'id' => 'lname',
		'class' => 'for-lname',
		'type' => 'text',
		'placeholder' => 'Enter Last Name'
	);
	$options[] = array(
		"label"=>"Password",
		"id"=>"password",
		"class"=>"for-password",
		"type"=>"password",
		"placeholder"=>"Enter Password"
	);
	$options[] = array(
		"label"=>"Email",
		"id"=>"email",
		"class"=>"for-email",
		"type"=>"email",
		"placeholder"=>"Enter Email"
	);
	$options[] = array(
		"label"=>"Contact Number",
		"id"=>"number",
		"class"=>"for-number",
		"type"=>"number",
		"placeholder"=>"Enter Number"
	);
	$options[] = array(
		"label"=>"Date",
		"id"=>"date",
		"class"=>"for-date",
		"type"=>"date"
	);
	
	$area_settings = array(
		"rows"=>5,
		"cols"=>50
	);
	$options[] = array(
		"label"=>"Description",
		"id"=>"description",
		"class"=>"for-desc",
		"type"=>"textarea",
		"placeholder"=>"Description",
		"settings"=> $area_settings
	);
	
	$array_variable = array();
    for($i=0; $i<=50; $i++){
        $array_variable[] = $i;
    }
	$age_array = $array_variable;
	$options[] = array(
		"label"=>"Your Age",
		'name' => 'Age',
		'id' => 'age',
		'std' => '5',
		'type' => 'select',
		'class' => 'for-age-select',
		'options' => $age_array
	);
	
	$option_array = array(
		"yes"=>"Yes",
		"no"=>"No"
	);
	$options[] = array(
		"label"=>"Radio",
		"id"=>"optional",
		"std"=>"no",
		"type"=>"radio",
		'class' => 'for-radio',
		"options"=> $option_array
	);
	
	$options[] = array(
		"label"=>"Check box",
		"id"=>"check",
		"std"=>"Happy?",
		"type"=>"checkbox",
		'class' => 'for-check'
	);
	
	$array_multivariable = array();
    for($i=1; $i<=5; $i++){
        $array_multivariable[] = $i;
    }
	$multi_array = $array_multivariable;
	$options[] = array(
		"label"=>"Multi Check box",
		"id"=>"check",
		"std"=>"1",
		"type"=>"multicheck",
		'class' => 'for-multicheck',
		"options"=> $multi_array
	);
?>
<form>
<?php
	echo form_fields($options);
?>
</form>
