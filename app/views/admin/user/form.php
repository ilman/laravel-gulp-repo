<?php 
	use Scienceguard\SG_Util;
	use Scienceguard\SG_Form;

	$attr = array( 'class' => 'form-control' );

	$group_id = SG_Util::val($values, 'group_id');
	$group_id = ($group_id) ? $group_id : SG_Util::val($values, 'id');
?>

<div class="row">
	<div class="col-sm-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo trans('text.group_permission') ?>
			</div>
			<!-- panel heading -->
			<div class="panel-body">
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
					<button type="submit" class="btn btn-default"><?php echo trans('label.btn_submit') ?></button>
				</div>
				<?php echo SG_Form::field('hidden', 'group_id', $group_id); ?>
			</div>
			<!-- panel body -->
		</div>
		<!-- panel -->
	</div>
	<!-- col -->
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo trans('text.group_permission') ?>
			</div>
			<!-- panel heading -->
			<div class="panel-body">
				<div class="form-group">
					<label><?php echo trans('label.user_group') ?></label>
					<?php echo SG_Form::field('text', 'user_group', $values, $attr); ?>
				</div>
				<div class="form-group">
					<label><?php echo trans('label.status') ?></label>
					<?php 
						$options = array(
							array('label'=>'banned', 'value'=>'banned'),
							array('label'=>'suspended', 'value'=>'suspended'),
						);
					?>
					<?php echo SG_Form::field('multicheckbox', 'status', $values, array(), '', $options); ?>
				</div>
			</div>
			<!-- panel body -->
		</div>
		<!-- panel -->
	</div>
	<!-- col -->
</div>
<!-- row -->