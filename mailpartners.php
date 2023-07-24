<?php

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

date_default_timezone_set('Europe/Moscow');
    $hours = date('H');

    $dd = date('dmY');

if (isset($_POST) ) {

	file_put_contents(__DIR__ . '/mails.txt', $_POST['name'].';'.$_POST['email'].';'.$_POST['phone'].';'.$_POST['utm_medium'].';'.$_POST['utm_source'].';'.$_POST['utm_content'].';'.$_POST['utm_group'].';'.$_POST['utm_term'].';'.$_POST['utm_campaign'].';'.$_POST['gcpc'].';'.$_POST['gcao'].';'.$_POST['referer'].';'.date('Y-m-d H:i:s')."\n", FILE_APPEND);
	
//	MAIL
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$ip = $_POST['ip'];
	$utm_campaign = $_POST['utm_campaign'];
	$utm_medium = $_POST['utm_medium'];
	$utm_source = $_POST['utm_source'];
	$utm_content = $_POST['utm_content'];
	$utm_group = $_POST['utm_group'];
	$utm_term = $_POST['utm_term'];
	$gcpc = $_POST['gcpc'];
	$gcao = $_POST['gcao'];
	$referer = $_POST['referer'];

	
	
	
//	GETRESPONSE
	$url = "https://api.getresponse.com/v3/contacts";
	$headers = array();
	$headers[] = "Content-Type: application/json";
	$headers[] = "X-Auth-Token: api-key 47ca94ced8065e01bf16020ac4670f53";
	
	$data = array();
	$data['name'] = $name;
	$data['email'] = $email;
	$data['campaign'] = array('campaignId'=>'');
	$data['customFieldValues'] = array();
	
	if (!empty($phone)) {
        $data['customFieldValues'][] = array(
            'customFieldId' => 'jOniI',
            'value' => [$phone]
        );
    }
	if ($utm_medium != null) {
		$data['customFieldValues'][1]['customFieldId'] = 'jiFyg';
		$data['customFieldValues'][1]['value'] = [ $utm_medium ];
	}
	
	
	
	if ($gcao != null) {
		$data['customFieldValues'][5]['customFieldId'] = 'jiC2d';
		$data['customFieldValues'][5]['value'] = [ $gcao ];
	}
	if ($gcpc != null) {
		$data['customFieldValues'][6]['customFieldId'] = 'jiCmj';
		$data['customFieldValues'][6]['value'] = [ $gcpc ];
	}
	if ($referer != null) {
		$data['customFieldValues'][7]['customFieldId'] = 'jiCDI';
		$data['customFieldValues'][7]['value'] = [ $referer ];
	}
	
	

$data_string = json_encode($data);

	$data = curl_init();
		curl_setopt($data, CURLOPT_URL, $url);
		curl_setopt($data, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($data, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($data, CURLOPT_POST, true);
		curl_setopt($data, CURLOPT_POSTFIELDS, $data_string);
		$state_result = curl_exec ($data);
		$state_result = json_decode($state_result);
		// print_r($state_result);
	curl_close($data);
	


	
//	GETCOURSE
	$accountName = 'nesterenko';
	$secretKey = 'Se626LXuMfDP38Mgs6VRaMff7u877J2DjE30V9d3aet7FhaDNkbmu7Mt1BuJH295CSQlrkpdbZnD8xHoBgDTNPmlk2zBLYzQKY4enyHpJefqgsF3pdq32f4ro4RThHAf';
	
	// присваиваем нужному каналу утм метку
	
	
	
	$deal = array ();
    $deal['user']['phone'] = $phone;
	$deal['user']['group_name'] = Array ("ideas_for_partners", "ideas_for_partners".$dd);
	$deal['session']['utm_campaign'] = $utm_campaign;
	$deal['session']['utm_medium'] = $utm_medium;
	$deal['session']['utm_source'] = $utm_source;
	$deal['session']['utm_content'] = $utm_content;
	$deal['session']['utm_term'] = $utm_term;
	$deal['session']['utm_group'] = $utm_group;
	$deal['session']['gcao'] = $gcao;
	$deal['session']['gcpc'] = $gcpc;
	$deal['session']['referer'] = $referer;
    $deal['system']['refresh_if_exists'] = 1;
    $deal['deal']['deal_status'] = "new";
    $deal['deal']['offer_code'] = $product;
    $deal['deal']['deal_cost'] = $suma;
    
    $deal['user']['addfields'] = array(

        'utm_campaign' => $utm_campaign,
        'utm_medium' => $utm_medium,
        'utm_source' => $utm_source,
        'utm_content' => $utm_content,
        'utm_term' => $utm_term,
        'utm_group' => $utm_group

    );

    

      $deal['deal']['addfields'] = array(

        'utm_campaign' => $utm_campaign,
        'utm_medium' => $utm_medium,
        'utm_source' => $utm_source,
        'utm_content' => $utm_content,
        'utm_term' => $utm_term,
        'utm_group' => $utm_group
          
    );

	$deal['system']['refresh_if_exists'] = 1;

	$json = json_encode($user);
	$base64 = base64_encode($json);

	if( $curl = curl_init() ) {
		curl_setopt($curl, CURLOPT_URL, 'https://' . $accountName . '.getcourse.ru/pl/api/users');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, 'action=add&key=' . $secretKey . '&params=' . $base64);
		$out = curl_exec($curl);
		curl_close($curl);
	} else {
		echo 'Failed initialization';
	}

	
	
	$utm = '';

    if(isset($_POST['utm_campaign']) and !$_POST['utm_campaign'] == '')
    $utm = '&utm_campaign='.$_POST['utm_campaign'].'';

    if(isset($_POST['utm_medium']) and !$_POST['utm_medium'] == '')
    $utm = '&utm_medium='.$_POST['utm_medium'].''.$utm.'';  

    if(isset($_POST['utm_source']) and !$_POST['utm_source'] == '')
    $utm = '&utm_source='.$_POST['utm_source'].''.$utm.''; 
    
    if(isset($_POST['utm_content']) and !$_POST['utm_content'] == '')
    $utm = '&utm_content='.$_POST['utm_content'].''.$utm.'';   

    if(isset($_POST['utm_group']) and !$_POST['utm_group'] == '')
    $utm = '&utm_group='.$_POST['utm_group'].''.$utm.'';  

     if(isset($_POST['utm_term']) and !$_POST['utm_term'] == '')
    $utm = '&utm_term='.$_POST['utm_term'].''.$utm.'';    
    
    if(isset($_POST['gcao']) and !$_POST['gcao'] == '')
    $utm = '&gcao='.$_POST['gcao'].''.$utm.''; 

    if(isset($_POST['gcpc']) and !$_POST['gcpc'] == '')
    $utm = '&gcpc='.$_POST['gcpc'].''.$utm.'';  

    $utm = 'name='.$name.'&email='.$email.'&phone='.$phone.''.$utm.'';

    header('Location: https://nesternoschool.com/partners_confirm?'.$utm.'');
	
}