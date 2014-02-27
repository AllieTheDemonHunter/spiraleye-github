<?php 

namespace Spiraleye;

/**
 * @author Allie du Plooy
 * @copyright CC 2014
 */

require_once 'vendor/autoload.php';
require_once 'Spiraleye/Client.php';

interface IssueModel {
	public function get_issues($state);
	public function get_issue($issue_id);
	public function set_issue($title, $body, $label);
}

class Issue extends Client implements IssueModel {
	public $issues;
	public $issue;
	
	public function get_issues($state) {
		return $this->issues = $this->client->api('issue')->all(Client::$github_repo_provider, Client::$github_repo, array('state' => $state));
	}
	
	public function get_issue($issue_id) {
		return $this->issue = $this->client->api('issue')->show(Client::$github_repo_provider, Client::$github_repo, $issue_id);
	}
	
	public function set_issue($title, $body, $label) {
		$this->authenticate();
		$this->client->api('issue')->create(Client::$github_repo_provider, Client::$github_repo, array('title' => $title, 'body' => $body, 'labels' => $label));
	}
}
