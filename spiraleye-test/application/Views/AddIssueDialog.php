<div id="dialog-form" title="Create new issue">
  <p class="validateTips">All form fields are required.</p>
  <form action="controller.php" method="post">
  <fieldset>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="text ui-widget-content ui-corner-all">
    <label for="body">Body</label>
    <textarea name="body" id="body" class="text ui-widget-content ui-corner-all"></textarea>
    <input type="hidden" name="action" id="action" value="add_issue">
    <?php 
            $spiraleye_label = new \Spiraleye\Label();
            $spiraleye_label->get_labels_nested();
            if(is_array($spiraleye_label->labels_nested) && count($spiraleye_label->labels_nested) > 0) {
            	print "<ul>";
            	foreach($spiraleye_label->labels_nested as $label_parent => $labels) {
            		if(!is_numeric($label_parent)) {
            			print "<li style=\"border-color:#".$labels[0]['color']."\"><a href=\"#\">{$label_parent}</a>
            					<ul class=\"nav nav-nested\">";
            			foreach($labels as $label) {
            				print "<li><input type=\"checkbox\"  name=\"labels[]\" value=\"".$label['name']."\" >".$label['name_short']."</li>\n";
            			}
            			print "</ul></li>";
            		} else {
            			print "<li style=\"border-color:#".$labels['color']."\"><input type=\"checkbox\"  name=\"labels[]\" value=\"".$labels['name']."\" >".$labels['name']."</li>\n";
            		}
            	}
            	print "</ul>";
            }
            ?>
    <input type="submit" name="submit" id="submit" class="ui-button">
    
  </fieldset>
  </form>
</div>