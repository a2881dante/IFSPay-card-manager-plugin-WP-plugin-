<?php

/*Template Name: Balance page*/

	get_header();
	
	require_once get_template_directory() . '/components/balance/includes/config.php';
	require_once COMPONENT_BALANCE_DIR . '/includes/Balance.class.php';

	$page = 'login';

	$template =  get_template_directory() . '/components/balance/templates/template-login.php';
	//echo $template;
	$cardNumber = !empty($_POST['card-number']) ? str_replace(" ", "", $_POST['card-number']) : '';
	$password = !empty($_POST['password']) ? $_POST['password'] : '';

	if ($cardNumber AND $password) {    
		$page = 'balance';    
		$cardNumber = str_replace(' ', '', $cardNumber);    
		$balancePage = new Balance($cardNumber, $password);    
		try {        
			$balancePage->fetchContent();        
			$balanceInfoObject = $balancePage->getBalanceInfo();    
		} catch (Exception $ex) {        
			echo $ex->getMessage();        
			die;    
		}    
		$template =  get_template_directory() . '/components/balance/templates/template-balance.php';
	} else {    
		$page = 'login';    
		$template =  get_template_directory() . '/components/balance/templates/template-login.php';
	}
	add_filter('body_class', 'balance_body_class', $page);

	if(file_exists($template)){
		//echo "<br>TRUE: ".$template;
		
	}else{
		//echo "FALSE";
	}
	
	require_once $template;
	/** * @param $classes * @param $page string login | balance */

	function balance_body_class ($classes, $page) {    
		global $page;    
		if ('balance' === $page) {        
			$classes[] = 'balance-page';    
		} elseif ('login') {        
			$classes[] = 'login-page';        
			$classes[] = 'js-login-page';
		}    
		return $classes;
	}
?>