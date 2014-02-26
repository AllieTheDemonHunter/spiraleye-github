<div class="span3">All Labels</div>
          <ul class="nav nav-sidebar">
            <?php 
            $spiraleye_label = new \Spiraleye\Label();
            $spiraleye_label->get_labels_nested();
            if(is_array($spiraleye_label->labels_nested) && count($spiraleye_label->labels_nested) > 0) {
            	foreach($spiraleye_label->labels_nested as $label_parent => $labels) {
            		if(!is_numeric($label_parent)) {
            			print "<li style=\"border-color:#".$labels[0]['color']."\"><a href=\"#\">{$label_parent}</a>
            					<ul class=\"nav nav-nested\">";
            			foreach($labels as $label) {
            				print "<li><a href=\"#\">".$label['name_short']."</a></li>\n";
            			}
            			print "</ul></li>";
            		} else {
            			print "<li style=\"border-color:#".$labels['color']."\"><a href=\"#\">".$labels['name']."</a></li>\n";
            		}
            	}
            }
            ?>
          </ul>