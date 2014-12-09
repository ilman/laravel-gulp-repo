<?php 
	use Scienceguard\SG_Util;
	use Scienceguard\SG_Form;

	$attr = array(
		'class' => 'form-control',
	);
	$link_params = array(
		'filter' => $filter,
	);
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo trans('heading.product_list') ?>
	</div>
	<!-- panel heading -->

	<div class="navbar nav-toolbar">
		<div class="navbar-form">
			<div class="navbar-left">
				<a class="btn btn-primary" href="<?php echo url('member/product/add') ?>">
					<?php echo trans('label.btn_product_add') ?>
				</a>
			</div>
			<div class="navbar-right">
				<form action="">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default"><?php echo trans('label.btn_submit') ?></button>
				</form>
			</div>
		</div>
	</div>

	<?php if(isset($result) && $result->total): ?>
		<div class="navbar nav-toolbar">
			<div class="navbar-text hidden-xs">
				<?php echo App_Util::paginationText($result) ?>
			</div>
			<?php echo App_Util::paginationLinks($result, $link_params) ?>
		</div>
		<!-- nav-toolbar -->


		<table class="table table-list table-striped table-hover">
			<thead>
				<tr>
					<th class="td-no">#</th>
					<th><?php echo trans('label.td_product_name') ?></th>
					<th><?php echo trans('label.td_product_url') ?></th>
					<th class="td-action"><?php echo trans('label.td_action') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php $i=0+($result->from-1); foreach($result->data as $row): ?>
					<?php 
						$product_id = SG_Util::val($row, 'id');
					?>
					<tr>
						<td class="td-no"><?php echo $i+1 ?></td>
						<td><?php echo SG_Util::val($row, 'product_name') ?></td>
						<td><?php echo SG_Util::val($row, 'product_slug') ?></td>
						<td class="td-action">
							<a href="<?php echo url('member/product/edit/'.$product_id) ?>">
								<i class="fa fa-pencil"></i> <?php echo trans('label.action_edit') ?>
							</a>
							<a href="<?php echo url('member/product/delete/'.$product_id) ?>">
								<i class="fa fa-remove"></i> <?php echo trans('label.action_delete') ?>
							</a>
						</td>
					</tr>
				<?php $i++; endforeach; ?>
			</tbody>
		</table>

		<div class="navbar nav-toolbar">
			<?php echo App_Util::paginationLinks($result, $link_params) ?>
		</div>
		<!-- nav-toolbar -->
	<?php else: ?>
		<div class="padding-4x text-center"><?php echo trans('text.no_data') ?></div>
	<?php endif; ?>
			
</div>
<!-- panel --> 