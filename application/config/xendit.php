<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Nur
$config['xendit']['api_key']	= 'xnd_development_dFNfKxMeCqqff7oldj7s2KeTEuxfbgmwOdQQZxsUeAFeGWzFC4scGd1OvdYnpL';
$config['xendit']['callback_token'] = 'DFmzBNCxn4uchicqog86JLfBkCxviyRpaCsLygxStOn5Ft6Z';

$config['xendit']['fees'] = array();
//$config['xendit']['fees'] = array(
//	array('type' => 'Admin','value' => 5000)
//);



$config['xendit']['invoice_expired'] = 900; // detik
$config['xendit']['callback_url'] = 'https://apismlfx.alfadigitalsolution.com/api/callback/xendit';

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
