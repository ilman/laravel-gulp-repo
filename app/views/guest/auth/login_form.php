<?php 
	use Scienceguard\SG_Util;
	use Scienceguard\SG_Form;

	$attr = array( 'class' => 'form-control' );
?>
<div class="panel panel-login">
	<div class="panel-body">

		<a class="btn btn-block btn-default" href="<?php echo url('login-facebook') ?>">
			<i class="fa fa-facebook fa-fw"></i> <?php echo trans('label.btn_login_facebook') ?>
		</a>
		
		<?php echo SG_Tags::divider() ?>
		
		<div class="form-group">
			<label><?php echo trans('label.username_email') ?></label>
			<?php $attr['tabindex'] = 1; ?>
			<?php echo SG_Form::field('text', 'username', $values, $attr) ?>
		</div>
		<div class="form-group">
			<label class="display-block">
				<?php echo trans('label.password') ?>
				<a class="text-thin pull-right" href="<?php echo url('forgot') ?>">
					<?php echo trans('label.forgot_password') ?>?
				</a>
			</label>
			<?php $attr['tabindex'] = 2; ?>
			<?php echo SG_Form::field('text', 'password', $values, $attr) ?>
		</div>
		<div class="form-group clearfix">
			<?php $attr['tabindex'] = 3; ?>
			<label class="pull-left">
				<?php echo SG_Form::field('checkbox','remember', $values) ?> 
				<?php echo trans('label.keep_signed_in') ?>
			</label>
			<button type="submit" class="btn btn-primary pull-right" tabindex="4">
				<?php echo trans('label.btn_login') ?>
			</button>
		</div>
		
		<?php echo SG_Tags::divider() ?>

		<div class="form-group login-row-last">
			<p class="text-center"><?php echo trans('label.dont_have_account') ?>?</p>
			<a class="btn btn-block btn-default bg-white" href="<?php echo url('register') ?>">
				<?php echo trans('label.btn_register') ?>
			</a>
		</div>
		
	</div>
	<!-- panel body -->
</div>