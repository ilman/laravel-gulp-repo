<?php 

class SG_Tags{

	static function spacer($attr=array()){
		
		$output = '<div class="vspacer"></div>';	

		return $output;
	}

	static function divider($attr=array()){
		
		$output = '<div class="hr"><hr></div>';	

		return $output;
	}

	static function popover($attr=array(), $content=''){

		$content = '<div class="popover-content">'.$content.'</div>';
		$output = '<div class="popover top"><div class="arrow"></div>'.$content.'</div>';

		return $output;
	}

	static function pageTitle($page_title, $page_icon='icon-page'){

		if(!$page_title){
			return;
		}

		$page_title = str_replace('/', ' ', $page_title);
		$page_title = ucwords(str_replace('_', ' ', $page_title));

		$output = '<h2 class="page-title"><i class="icon32 '.$page_icon.'"></i> '.$page_title.'</h2>';

		return $output;
	}

	static function breadcrumb($str_path){

		$paths = explode('/', $str_path);
		$paths_count = count($paths);
		$path_url = '';

		$output = '<ol class="breadcrumb">';
		for($i=0; $i<$paths_count; $i++){

			$path_text = ucwords(str_replace('_', ' ', $paths[$i]));
			$path_url .= '/'.$paths[$i];

			if($i<$paths_count-1){
				$output .= '<li><a href="'.url($path_url).'">'.$path_text.'</a></li>';
			}
			else{
				$output .= '<li class="active">'.$path_text.'</li>';
			}
		}
		$output .= '</ol>';

		return $output;
	}

	static function navTabs($tabs)
	{
		$output = '<ul class="nav nav-tabs div-tabs">';
		foreach($tabs as $tab){
			$tab_label = SG_Util::val($tab,'label');
			$tab_value = SG_Util::val($tab,'value');
			$tab_notif = SG_Util::val($tab, 'notif');
			$tab_notif = ($tab_notif) ? ' <span class="badge bg-danger">'.$tab_notif.'</span>' : '';

			$li_class = (App_Util::urlCompares('',$tab_value)) ? 'active' : '';
			$output .= '<li class="'.$li_class.'"><a href="'.sg_url($tab_value).'">'.$tab_label.$tab_notif.'</a></li>';
		}
		$output .= '</ul>';

		return $output;
	}

}