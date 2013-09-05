<?php

/**
 * @version		$Id: currency_converter.php 2013-09-03
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

class THCurrencyconverter
{
	function get_exchange_rate($currency){

		if(isset($currency) && $currency!='USD'){
			$exchange_rate=file_get_contents('http://finance.yahoo.com/d/quotes.csv?e=.csv&f=l1&s=USD'.$currency.'=X');
			
		}
		else 
			$exchange_rate=1;
		
		/*if($currency==0)
			$exchange_rate=1;*/
		
		return $exchange_rate;
	}	
	
	function print_cost($cost,$exchange_rate,$currency){
		
		if(isset($currency) && $currency!='USD'){
			$exchange_currency=$cost*$exchange_rate;
			$exchange_currency=$currency." ".$exchange_currency;		
		}
		else
		{
			$exchange_currency=$cost*$exchange_rate;
			$exchange_currency="USD ".$exchange_currency;		
		}
			
		return $exchange_currency;
	}
}


?>
