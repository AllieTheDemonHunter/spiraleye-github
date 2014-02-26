<div class="row placeholders">
  <?php 
  $spiraleye_user = new \Spiraleye\User();
  $spiraleye_user->get_users();
  if(is_array($spiraleye_user->users) && count($spiraleye_user->users) > 0){
  	foreach($spiraleye_user->users as $user_pos => $user) {
  		?>
	  		<div class="col-xs-6 col-sm-3 placeholder">
              <img src="<?php print $user['avatar_url']; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4><?php print $user['login']?></h4>
              <span class="text-muted"><?php print $user['id']?></span>
            </div>
	  		<?php
  		if($user_pos == 3){continue;}
  	}
  }
  ?>
</div>