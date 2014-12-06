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
	<label><?php echo trans('label.email') ?></label>
	<?php echo SG_Form::field('text', 'email', $values, $attr); ?>
</div>
<div class="form-group">
	<label><?php echo trans('label.phone') ?></label>
	<?php echo SG_Form::field('text', 'phone', $values, $attr); ?>
</div>
<div class="form-group">
	<label><?php echo trans('label.password') ?></label>
	<?php echo SG_Form::field('text', 'password', $values, $attr); ?>
</div>
<div class="form-group">
	<label><?php echo trans('label.confirm_password') ?></label>
	<?php echo SG_Form::field('text', 'confirm_password', $values, $attr); ?>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-default"><?php echo trans('label.btn_submit') ?></button>
</div>