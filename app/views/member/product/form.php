<?php 
	use Scienceguard\SG_Util;
	use Scienceguard\SG_Form;

	$attr = array( 'class' => 'form-control' );

	$product_id = SG_Util::val($values, 'product_id');
	$product_id = ($product_id) ? $product_id : SG_Util::val($values, 'id');
?>
<div class="row">
	<div class="col-sm-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo trans('heading.product_form') ?>
			</div>
			<!-- panel heading -->
			<div class="panel-body">
				<div class="form-group">
					<label><?php echo trans('label.company_id') ?></label>
					<?php
						$options = $option_user_company;
					?>
					<?php echo SG_Form::field('select', 'company_id', $values, $attr, '', $options); ?>
				</div>
				<div class="form-group">
					<label><?php echo trans('label.product_name') ?></label>
					<?php echo SG_Form::field('text', 'product_name', $values, $attr); ?>
				</div>
				<div class="row">
				
					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo trans('label.product_price') ?></label>
							<div class="input-group">
								<div class="input-group-btn">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										Rp <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">IDR</a></li>
										<li><a href="#">USD</a></li>
									</ul>
								</div><!-- /btn-group -->
								<?php echo SG_Form::field('text', 'product_price', $values, $attr); ?>
							</div>	
						</div>
					</div>
					<!-- col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo trans('label.product_weight') ?></label>
							<div class="input-group">
								<div class="input-group-btn">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										Kg <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">IDR</a></li>
										<li><a href="#">USD</a></li>
									</ul>
								</div><!-- /btn-group -->
								<?php echo SG_Form::field('text', 'product_weight', $values, $attr); ?>
							</div>	
						</div>
					</div>
					<!-- col -->
				
				</div>
				<!-- row -->

				<div class="form-group">
					<button type="submit" class="btn btn-default"><?php echo trans('label.btn_submit') ?></button>
				</div>
				<?php echo SG_Form::field('hidden', 'product_id', $product_id); ?>
			</div>
			<!-- panel body -->
		</div>
		<!-- panel -->


		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo trans('heading.product_form_address') ?>
			</div>
			<!-- panel heading -->
			<div class="panel-body">				
				<div class="form-group">
					<label><?php echo trans('label.product_address') ?></label>
					<?php 
						$custom_attr = $attr;
						$custom_attr['rows'] = 4;
					?>
					<?php echo SG_Form::field('textarea', 'product_address', $values, $custom_attr); ?>
				</div>
				<div class="row">				
					<div class="col-sm-6">								
						<div class="form-group">
							<label><?php echo trans('label.product_province') ?></label>
							<?php echo SG_Form::field('text', 'product_province', $values, $attr); ?>
						</div>
					</div>
					<!-- col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo trans('label.product_subprovince') ?></label>
							<?php echo SG_Form::field('text', 'product_subprovince', $values, $attr); ?>
						</div>
					</div>
					<!-- col -->								
				</div>
				<!-- row -->
				<div class="row">				
					<div class="col-sm-6">								
						<div class="form-group">
							<label><?php echo trans('label.product_city') ?></label>
							<?php echo SG_Form::field('text', 'product_city_id', $values, $attr); ?>
						</div>
					</div>
					<!-- col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label><?php echo trans('label.product_zipcode') ?></label>
							<?php echo SG_Form::field('text', 'product_zipcode', $values, $attr); ?>
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
				<?php echo trans('heading.product_form_desc') ?>
			</div>
			<!-- panel heading -->
			<div class="panel-body">		
				<div class="form-group">
					<label><?php echo trans('label.product_desc') ?></label>
					<?php 
						$custom_attr = $attr;
						$custom_attr['rows'] = 8;
					?>
					<?php echo SG_Form::field('textarea', 'product_desc', $values, $custom_attr); ?>
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
				<?php echo trans('heading.product_form_image') ?>
			</div>
			<!-- panel heading -->
			<div class="panel-body">		
				<div class="form-group">
					<label><?php echo trans('label.product_image') ?></label>
					<?php echo SG_Form::field('text', 'product_desc', $values, $attr); ?>
				</div>
			</div>
			<!-- panel body -->
		</div>
		<!-- panel -->
	</div>
	<!-- col -->
</div>
<!-- row -->