<?php 
	use Scienceguard\SG_Util;
	use Scienceguard\SG_Form;

	$attr = array( 'class' => 'form-control' );

	$group_id = SG_Util::val($values, 'group_id');
	$group_id = ($group_id) ? $group_id : SG_Util::val($values, 'id');
?>
<div class="form-group">
	<label><?php echo trans('label.group_name') ?></label>
	<?php echo SG_Form::field('text', 'group_name', $values, $attr); ?>
</div>
<div class="form-group">
	<label><?php echo trans('label.group_permission') ?></label>
	<?php 
		$options = array(
			array('label'=>'member', 'value'=>'member'),
			array('label'=>'premium', 'value'=>'premium'),
			array('label'=>'admin', 'value'=>'admin'),
		);
	?>
	<?php echo SG_Form::field('multicheckbox', 'group_permission', $values, array(), '', $options); ?>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-default"><?php echo trans('label.btn_submit') ?></button>
</div>
<?php echo SG_Form::field('hidden', 'group_id', $group_id); ?>