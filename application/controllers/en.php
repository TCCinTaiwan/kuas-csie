<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class En extends MY_Controller {
	public function __construct()
	{
		parent::changeLanguage('en');
		parent::__construct();
		$this->lang->load('main');
	}
}