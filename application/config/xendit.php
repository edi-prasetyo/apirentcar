<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Nur
$config['xendit']['api_key']	= '';
$config['xendit']['callback_token'] = '';

$config['xendit']['fees'] = array();
//$config['xendit']['fees'] = array(
//	array('type' => 'Admin','value' => 5000)
//);



$config['xendit']['invoice_expired'] = 900; // detik
$config['xendit']['callback_url'] = '';

$config['xendit']['production'] =  false;
//$config['xendit']['merchant'] = '10766'; // Untufk prefix VA number


/* Setting Untuk direct method */
//$config['xendit']['redirect_url'] = 'https://apismlfx.alfadigitalsolution.com'; // unused
// For direct api
$config['xendit']['channels'] = array(
	'VIRTUAL_ACCOUNT',
	'RETAIL_OUTLET',
	'EWALLET',
	//'CREDIT_CARD', // Not supported
	//'QRIS', // Not supported
);
