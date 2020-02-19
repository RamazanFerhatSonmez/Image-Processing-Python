<?php 

$config = array('server' => 'http://127.0.0.1:5000/');
    // Run some setup
$this->rest->initialize($config);

$this->rest->format('application/json');

$param = array('img_path' => $_GET['img'],
	'img_type' => $_GET['imageprocess'],
	'luminoso_account' => Settings::get('luminoso_account'), 
	'luminoso_account_name' => Settings::get('luminoso_account_name'),
	'luminoso_password' => Settings::get('luminoso_password'));

$json = json_decode($this->rest->get('image_process', $param), true);

if ($json) 
{
	echo $json;
}
else {
	log_message('error', 'Bad response from Luminoso');
	return false;
}


?>