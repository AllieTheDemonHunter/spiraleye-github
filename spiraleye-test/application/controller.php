<?php
require_once 'Spiraleye/Client.php';
require_once 'Spiraleye/Issue.php';
print_r($_POST);
if($_POST){
	switch($_POST['action']){
		case "add_issue":
			$new_issue = new \Spiraleye\Issue();
			$new_issue->set_issue($_POST['title'], $_POST['body'], implode(" ", $_POST['labels']));
			break;
	}
}