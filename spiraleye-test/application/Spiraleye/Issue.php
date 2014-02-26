<?php 

namespace Spiraleye;

require_once 'vendor/autoload.php';
require_once 'Spiraleye/Client.php';

interface IssueModel {
	public function get_issues($state);
	public function get_issue($issue_id);
	public function set_issue($title, $body);
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
	
	public function set_issue($title, $body) {
		$this->authenticate();
		$this->client->api('issue')->create(Client::$github_repo_provider, Client::$github_repo, array('title' => 'The issue title', 'body' => 'The issue body'));
	}
}
