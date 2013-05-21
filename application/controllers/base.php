<?php

class Base_Controller extends Controller {

	public function __construct(){
		//stylesheets
		Asset::add('bootstrap_style', 'css/bootstrap.css');
		Asset::add('bootstrap-responsive_style', 'css/bootstrap-responsive.css');
		Asset::add('bootstrap.min_style', 'css/bootstrap.min.css');
		Asset::add('font-awesome.min_style', 'css/font-awesome.min.css');

		//scripts
		Asset::add('jquery_script', 'js/assets/jquery.js');
		Asset::add('bootstrap-transition_script', 'js/assets/bootstrap-transition.js');
		Asset::add('bootstrap-alert_script', 'js/assets/bootstrap-alert.js');
		Asset::add('bootstrap-modal_script', 'js/assets/bootstrap-modal.js');
		Asset::add('bootstrap-dropdown_script', 'js/assets/bootstrap-dropdown.js');
		Asset::add('bootstrap-scrollspy_script', 'js/assets/bootstrap-scrollspy.js');
		Asset::add('bootstrap-tab_script', 'js/assets/bootstrap-tab.js');
		Asset::add('bootstrap-tooltip_script', 'js/assets/bootstrap-tooltip.js');
		Asset::add('bootstrap-popover_script', 'js/assets/bootstrap-popover.js');
		Asset::add('bootstrap-button_script', 'js/assets/bootstrap-button.js');
		Asset::add('bootstrap-collapse_script', 'js/assets/bootstrap-collapse.js');
		Asset::add('bootstrap-carousel_script', 'js/assets/bootstrap-carousel.js');
		Asset::add('bootstrap-typeahead_script', 'js/assets/bootstrap-typeahead.js');

		parent::__construct();
	}

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}