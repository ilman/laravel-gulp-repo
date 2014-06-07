<?php 
	$page = (isset($_GET['page'])) ? $_GET['page'] : 'home';

	define('BASEPATH',dirname(__FILE__));
	define('BASEURL','[url_to_this_folder]');

	$body_class = 'page-'.$page;
		
	if(false){

	}
	else{
		include('templates/header.php');
		include('templates/page-'.$page.'.php');
		include('templates/footer.php');
	}
?>