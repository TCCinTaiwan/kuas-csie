<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller Extends CI_Controller {
	private static $lang = 'zh_TW';//語言
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('date');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('language');

		$this->load->model('message_model');
		$this->load->model('menu_model');
		$this->load->model('main_model');
    	$this->config->set_item('language',self::$lang);
    }
    public function changeLanguage($lang)
    {
        self::$lang = $lang;
    }
	public function index($test = FALSE)
	{
    	$data['message'] = $this->message_model->get_message();//讀取前10則訊息(10,0)
	    $data['menu'] = $this->menu_model->get_menu(0,self::$lang);
	    $data['marquee'] = $this->main_model->get_all('marquee');
	    $data['photo'] = $this->main_model->get_all('photo',array('show' => 1));
		$data['meta'] = array(
	        array('name' => 'description','content' => '高應大資訊工程系系網'),
	        array('name' => 'keywords','content' => '高應大,資訊工程系,系網'),
	        array('name' => 'robots','content' => 'no-cache'),
	        array('name' => 'Content-type','content' => 'text/html; charset=utf-8','type' => 'equiv')
	    );
	    $data['css'] = array(
	        'css/reset.css',//初始化不同瀏覽器樣示
	        'css/main.css',//主樣示
	        'css/menu.css',//載入選單樣示
	        'css/jquery.marquee.css',//跑馬燈
	        'css/photo.css',//圖片牆
	        'css/message.css'//最新消息表格
	    );
	    $data['js'] = array(
	        'js/jquery-1.11.2.js',//jQuery
	        'js/jquery.cycle.all.js',
	        'js/jquery.tablesorter.js',
	        'js/jquery.marquee.js',
	        'js/menu.js',//
	        'js/marquee.js',//
	        'js/message.js',//
	        'js/photo.js'//
	    );
		$this->load->view('init',$data);
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('marquee');
		$this->load->view('photo');
		$this->load->view('message');
		$this->load->view('footer');
	}
	public function Message($Type = 'news',$Page = 0)
	{
		$this->load->library('pagination');
    	$data['message'] = $this->message_model->get_message(10,$Page,$Type);//讀取前10則訊息(10,0)
    	
	    $data['menu'] = $this->menu_model->get_menu(0,self::$lang);
	    $data['marquee'] = $this->main_model->get_all('marquee');
		$data['meta'] = array(
	        array('name' => 'description','content' => '高應大資訊工程系系網'),
	        array('name' => 'keywords','content' => '高應大,資訊工程系,系網'),
	        array('name' => 'robots','content' => 'no-cache'),
	        array('name' => 'Content-type','content' => 'text/html; charset=utf-8','type' => 'equiv')
	    );
		$data['css'] = array(
	        'css/reset.css',//初始化不同瀏覽器樣示
	        'css/main.css',//主樣示
	        'css/menu.css',//載入選單樣示
	        'css/jquery.marquee.css',//跑馬燈
	        'css/photo.css',//圖片牆
	        'css/message.css'//最新消息表格
	    );
	    $data['js'] = array(
	        'js/jquery-1.11.2.js',//jQuery
	        'js/jquery.tablesorter.js',
	        'js/jquery.marquee.js',
	        'js/menu.js',//
	        'js/marquee.js',//
	        'js/message.js'//
	    );
		$config['base_url'] = '/kuas-csie/'.self::$lang.'/message/'.$Type;
	    $config['total_rows'] = $this->message_model->get_message_count($Type);//讀訊息數量
		$config['uri_segment'] = 4;
		$config['num_links'] = 3;
		$config['per_page'] = 10;
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('init',$data);
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('marquee');
		$this->load->view('message');
		$this->load->view('footer');
	}
	public function Blog()
	{
		$data['meta'] = array(
	        array('name' => 'description','content' => '高應大資訊工程系系網'),
	        array('name' => 'keywords','content' => '高應大,資訊工程系,系網'),
	        array('name' => 'robots','content' => 'no-cache'),
	        array('name' => 'Content-type','content' => 'text/html; charset=utf-8','type' => 'equiv')
	    );

		$this->load->view('init',$data);
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('footer');
	}
}