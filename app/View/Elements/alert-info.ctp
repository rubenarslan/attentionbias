<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?php
	if(isset($params['bold']))
		echo $params['bold'];
	else
		echo 'Information.';
	 	?></strong>
	<?=$message;?>
</div>