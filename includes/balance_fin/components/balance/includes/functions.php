<?php

//return array with keys
//$arr['__VIEWSTATE'] ,  $arr['__EVENTVALIDATION']
function parseWdcsStateFields(){
	$return = array(
		'__VIEWSTATE' 		=> '',
		'__EVENTVALIDATION' => '',
	);
	
	$ch1 = curl_init();
	curl_setopt($ch1, CURLOPT_URL, WDCS_MAIN_URL);
	curl_setopt($ch1, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0');
	
	curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 0);

	curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);

	//curl_setopt($ch1, CURLOPT_MAXREDIRS, 0);
	curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 0);
	$pageContent = curl_exec($ch1);
	
	$domPageLoggined = new simple_html_dom();
	$domPageLoggined->load($pageContent);
	$viewState = $domPageLoggined->find("input[name=__VIEWSTATE]",0);
	$eventValid = $domPageLoggined->find("input[name=__EVENTVALIDATION]",0);
	
	if( $viewState ){
		$return['__VIEWSTATE'] = $viewState->value;
	}
	
	if( $eventValid ){
		$return['__EVENTVALIDATION'] = $eventValid->value;
	}
	return $return;
}

function deleteUserCookie($filename){
	if( file_exists($filename) ){
		unlink($filename);
		return true;
	}else{
		return false;
	}
}

function isLoggined($pageContent){
	$ret = false;
	
	$domPageLoggined = new simple_html_dom();
	$domPageLoggined->load($pageContent);
	$title = $domPageLoggined->find('title', 0);
	if( $title ){
		if( "Logging in - Cardholder" == trim($title->plaintext) ){
			$ret = true;
		}else{
			$ret = false;
		}	
	}else{
		$ret = false;
	}
	return $ret;
}

function catchErrorMessage($pageContent){
	$ret = '';
	
	$domPageLoggined = new simple_html_dom();
	$domPageLoggined->load($pageContent);
	
	$error = $domPageLoggined->find('#ctl00_ContentPlaceHolder_LoginCTRL_lblMemberLoginError', 0);
	
	
	
	if( $error ){
		if( isset( $error->plaintext ) ){
			return trim($error->plaintext);
		}else{
			return '';
		}
	}else{
		$ret = '';
	}
	
	return $ret;
	
}

?>
