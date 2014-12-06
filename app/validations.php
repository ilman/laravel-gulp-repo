<?php 

// Validator::extend('no_duplicate_product_name', function($attribute, $value, $parameters)
// {
// 	if(Member\MarketMemberProduct::checkUserProductAlreadyExist()){
// 		return false;
// 	}

// 	return true;
// });


Validator::extend('no_empty_price', function($attribute, $value, $parameters)
{
	if(!App_Util::validatePrice($value)){
		return false;
	}

	return true;
});

// Validator::extend('balance_suffice', function($attribute, $value, $parameters)
// {
// 	$user = Auth::user();
// 	$user_id = $user->id;

// 	$params = array(
// 		'user_id' => $user_id
// 	);

// 	$current_balance = Member\MarketMemberBalance::userBalanceValue($params);
// 	$value = App_Util::validatePrice($value);

// 	if($current_balance < $value){
// 		return false;
// 	}

// 	return true;
// });


// Validator::extend('verify_password', function($attribute, $value, $parameters)
// {
// 	$verify = DB::connection('mysql_nesia_user')
// 		->table('users')
// 		->where('password', '=', md5(trim($value)))
// 		->count();

// 	if(!$verify){
// 		return false;
// 	}

// 	return true;
// });


// Validator::extend('no_bad_words', function($attribute, $value, $parameters)
// {
// 	$catch_word = '';		
// 	$bad_words = explode(',', BAD_WORDS.BANNED_WORDS);		
// 	$input = strtolower($value);
	
// 	foreach($bad_words as $word){			
// 		if(stripos($input, $word) !== false){
// 			$catch_word = $word;
// 			break;
// 		}			
// 	}
	
// 	if($catch_word){
// 		return false;
// 	}
	
// 	return true;
// });

// Validator::replacer('no_bad_words', function($message, $attribute, $rule, $parameters) {

// 	$catch_word = '';		
// 	$bad_words = explode(',', BAD_WORDS.BANNED_WORDS);		
// 	$input = strtolower(Input::get($attribute));

// 	foreach($bad_words as $word){			
// 		if(stripos($input, $word) !== false){
// 			$catch_word .= $word.', ';
// 		}			
// 	}

// 	$catch_word = trim($catch_word);
// 	$catch_word = trim($catch_word,',');

// 	$field_label = str_replace('_', ' ', $attribute);
// 	$field_label = ucwords($field_label);

// 	$message = str_replace(':words', $catch_word, $message);
// 	$message = str_replace(':field', $field_label, $message);

// 	return $message;
// });