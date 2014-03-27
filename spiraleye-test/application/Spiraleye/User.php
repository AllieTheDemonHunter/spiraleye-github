<?php 

namespace Spiraleye;

/**
 * @author Allie du Plooy
 * @copyright CC, 2014
 */

require_once 'vendor/autoload.php';
require_once 'Spiraleye/Client.php';

interface UserModel {
	public function get_users();
	public function get_user($user_id);
}

class User extends Client implements UserModel {
	public $users;
	public $user;
	
	public function get_users() {
		return $this->users = $this->client->api('user')->following(Client::$github_repo_provider);
	}
	
	public function get_user($user_id) {
		return $this->user = $client->api('user')->show($user_id);
	}
}
