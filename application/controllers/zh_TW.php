<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Zh_TW extends MY_Controller {
	public function __construct()
	{
		parent::changeLanguage('zh_TW');
		parent::__construct();
		$this->lang->load('main');
	}
}