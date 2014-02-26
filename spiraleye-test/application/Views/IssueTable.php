<div class="table-responsive">
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>#</th>
	      <th>Name</th>
	      <?php 
	      if(is_array($spiraleye_label->labels_nested) && count($spiraleye_label->labels_nested) > 0) {
	      	foreach($spiraleye_label->labels_nested as $label_parent => $labels) {
	      		if(!is_numeric($label_parent)) {
	      			print "<th style=\"border-color:#".$labels[0]['color']."\">{$label_parent}</th>\n";
	      		} else {
	      			print "<th style=\"border-color:#".$labels['color']."\">".$labels['name']."</th>\n";
	      		}
	      	}
	      }
	      ?>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 
	  	$spiraleye_issue = new \Spiraleye\Issue();
	  	$spiraleye_issue->get_issues("open");
	  	if(is_array($spiraleye_issue->issues) && count($spiraleye_issue->issues) > 0) {
	  		foreach($spiraleye_issue->issues as $issue_pos => $issue) {//print_r($issue);
		  		print "<tr>\n";
				print "<td>".$issue['number']."</td>";
				print "<td><b>".$issue['title']."</b></td>";
				if(is_array($spiraleye_label->labels_nested) && count($spiraleye_label->labels_nested) > 0) {
					foreach($spiraleye_label->labels_nested as $label_parent => $labels) {
						print "<td>";
						if(!is_numeric($label_parent)) {
							$column = $label_parent;
						} else {
							$column = $labels['name'];
						}
						if(is_array($issue['labels']) && count($issue['labels']) > 0) {
							foreach ($issue['labels'] as $issue_label_pos => $issue_label) {
								if($column == $issue_label['name']) {
									print $issue_label['name']."<br />";
								}
								if($column == substr($issue_label['name'], 0, 1)) {
									print substr($issue_label['name'], 2)."<br />";
								}
							}
						}
						print "</td>";
					}
				}
				print "</tr>\n";	
	  		}
	  	}
	  	?>
	  </tbody>
	</table>
</div>