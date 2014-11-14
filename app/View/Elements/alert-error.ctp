<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?php
	if(isset($params['bold']))
		echo $params['bold'];
	else
		echo 'Fehler! ';
	 	?></strong>
	<?=$message;?>
</div>