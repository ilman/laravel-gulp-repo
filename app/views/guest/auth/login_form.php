<?php 
	use Scienceguard\SG_Util;
	use Scienceguard\SG_Form;

	$attr = array( 'class' => 'form-control' );
?>
<div class="form-group">
	<label><?php echo trans('label.username') ?></label>
	<?php echo SG_Form::field('text', 'username', $values, $attr); ?>
</div>
<div class="form-group">
	<label><?php echo trans('label.password') ?></label>
	<?php echo SG_Form::field('text', 'password', $values, $attr); ?>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-default"><?php echo trans('label.btn_submit') ?></button>
</div>