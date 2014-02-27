<?php 

namespace Spiraleye;

/**
 * @author Allie du Plooy
 * @copyright CC 2014
 */

require_once 'vendor/autoload.php';
require_once 'Spiraleye/Issue.php';

	

interface LabelModel {
	public function get_labels();
	public function get_issue_labels($issue_id);
	public function get_labels_nested();
}

class Label extends Issue implements LabelModel {
	public $labels;
	public $issue;
	public $labels_nested;
	
	public function __construct() {
		$this->client = new \Github\Client();
		return $this;	
	}
	
	public function get_labels() {
		return $this->labels =	$this->client->api('issue')->labels()->all(Client::$github_repo_provider, Client::$github_repo);
	}
	
	public function get_labels_nested() {
		$this->get_labels();
		if(is_array($this->labels) && count($this->labels) > 0) {
			foreach($this->labels as $label_pos => $label_name) {
				$exploded_label = explode(":", $label_name['name']);
				if(count($exploded_label) > 1) {
					$add_short_name = $this->labels[$label_pos]["name_short"] = $exploded_label[1];
					$labels_nested[$exploded_label[0]][] = $this->labels[$label_pos];
				} else {
					$labels_nested[] = $this->labels[$label_pos];
				}
			}
			return $this->labels_nested = $labels_nested;
		}
	}
	
	public function get_issue_labels($issue_id) {
		return $this->get_issue($issue_id)['labels'];
	}
}