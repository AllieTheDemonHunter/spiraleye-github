<?php 
/**
 * @author Allie du Plooy
 * @copyright CC 2014
 */

namespace Spiraleye;

require_once 'vendor/autoload.php';

function __autoload($class_name){
	include $class_name.'.php';
}

interface ClientModel {
	public function authenticate();
}

class Client implements ClientModel {
	public static $github_user = '';
	public static $github_pass = '';
	public static $github_repo = 'spiraleye_openerp_addons_6.1';
	public static $github_repo_provider = 'MachineTi';
	public $client;
	
	public function __construct() {
		$this->client = new \Github\Client();		
	}
	
	public function authenticate() {
		$this->client->authenticate(self::$github_user, self::$github_pass,\Github\Client::AUTH_HTTP_PASSWORD);
	}
}