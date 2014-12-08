<?php 
	use Scienceguard\SG_Util;
	use Scienceguard\SG_Form;

	$attr = array( 'class' => 'form-control' );

	$company_id = SG_Util::val($values, 'company_id');
	$company_id = ($company_id) ? $company_id : SG_Util::val($values, 'id');
?>
<div class="row">
	<div class="col-sm-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo trans('heading.company_form') ?>
			</div>
			<!-- panel heading -->
			<div class="panel-body">
				<div class="form-group">
					<label><?php echo trans('label.company_name') ?></label>
					<?php echo SG_Form::field('text', 'company_name', $values, $attr); ?>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo trans('label.company_phone') ?></label>
							<?php echo SG_Form::field('text', 'company_phone', $values, $attr); ?>
						</div>
					</div>
					<!-- col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo trans('label.company_email') ?></label>
							<?php echo SG_Form::field('text', 'company_email', $values, $attr); ?>
						</div>
					</div>
					<!-- col -->
				</div>
				<!-- row -->

				<div class="form-group">
					<button type="submit" class="btn btn-default"><?php echo trans('label.btn_submit') ?></button>
				</div>
				<?php echo SG_Form::field('hidden', 'company_id', $company_id); ?>
			</div>
			<!-- panel body -->
		</div>
		<!-- panel -->


		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo trans('heading.company_form_address') ?>
			</div>
			<!-- panel heading -->
			<div class="panel-body">				
				<div class="form-group">
					<label><?php echo trans('label.company_address') ?></label>
					<?php 
						$custom_attr = $attr;
						$custom_attr['rows'] = 4;
					?>
					<?php echo SG_Form::field('textarea', 'company_address', $values, $custom_attr); ?>
				</div>
				<div class="row">				
					<div class="col-sm-6">								
						<div class="form-group">
							<label><?php echo trans('label.company_province') ?></label>
							<?php echo SG_Form::field('text', 'company_province', $values, $attr); ?>
						</div>
					</div>
					<!-- col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo trans('label.company_subprovince') ?></label>
							<?php echo SG_Form::field('text', 'company_subprovince', $values, $attr); ?>
						</div>
					</div>
					<!-- col -->								
				</div>
				<!-- row -->
				<div class="row">				
					<div class="col-sm-6">								
						<div class="form-group">
							<label><?php echo trans('label.company_city') ?></label>
							<?php echo SG_Form::field('text', 'company_city_id', $values, $attr); ?>
						</div>
					</div>
					<!-- col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo trans('label.company_zipcode') ?></label>
							<?php echo SG_Form::field('text', 'company_zipcode', $values, $attr); ?>
						</div>
					</div>
					<!-- col -->								
				</div>
				<!-- row -->
			</div>
			<!-- panel body -->
		</div>
		<!-- panel -->

		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo trans('heading.company_form_desc') ?>
			</div>
			<!-- panel heading -->
			<div class="panel-body">		
				<div class="form-group">
					<label><?php echo trans('label.company_desc') ?></label>
					<?php 
						$custom_attr = $attr;
						$custom_attr['rows'] = 8;
					?>
					<?php echo SG_Form::field('textarea', 'company_desc', $values, $custom_attr); ?>
				</div>
			</div>
			<!-- panel body -->
		</div>
		<!-- panel -->
	</div>
	<!-- col -->

	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo trans('heading.company_form_image') ?>
			</div>
			<!-- panel heading -->
			<div class="panel-body">		
				<div class="form-group">
					<label><?php echo trans('label.company_image') ?></label>
					<?php echo SG_Form::field('text', 'company_desc', $values, $attr); ?>
				</div>
			</div>
			<!-- panel body -->
		</div>
		<!-- panel -->
	</div>
	<!-- col -->
</div>
<!-- row -->