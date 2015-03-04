<?php
//Error reporting
showErrors();


//From Google Dev (https://console.developers.google.com)
//Client ID
function getClientID()
{
	return '[Client ID]';
}
//Service email address
function getAcctName()
{
	return '[Service address]';
}
//Application Name
function getAppName()
{
	return "[Application Name]";
}


//File locations
//.p12 file location
function getKeyFile()
{
	return '[P12 File]';
}
//Google API path (include trailing /)
function getAPIPath()
{
	return './google-api/';
}

function showErrors()
{
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
}


?>