<?php 

namespace Spiraleye;

require_once 'vendor/autoload.php';

function __autoload($class_name){
	include $class_name.'.php';
}

interface ClientModel {
	public function authenticate();
}

class Client implements ClientModel {
	public static $github_user = 'AllieTheDemonHunter';
	public static $github_pass = 'Nishiki.7';
	public static $github_repo = 'spiraleye_openerp_addons_6.1';
	public static $github_repo_provider = 'MachineTi';
	public static $client_id = '6dea668eb75161aa6651';
	public static $client_secret = '5e2c098bd37583f5ec707a4a3d8a60f01ad4d555';
	public $client;
	
	public function __construct() {
		$this->client = new \Github\Client();		
	}
	
	public function authenticate() {
		$client->authenticate($this->github_user, $this->github_pass);
	}
}