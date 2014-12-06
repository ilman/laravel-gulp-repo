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
		<?php echo trans('text.user_index') ?>
	</div>
	<!-- panel heading -->

	<div class="navbar nav-toolbar">
		<div class="navbar-form">
			<div class="navbar-left">
				<a class="btn btn-primary" href="<?php echo url('admin/user/add') ?>">
					<?php echo trans('label.btn_user_add') ?>
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
			<div class="navbar-text">
				<?php echo App_Util::paginationText($result) ?>
			</div>
			<?php echo App_Util::paginationLinks($result, $link_params) ?>
		</div>
		<!-- nav-toolbar -->


		<table class="table table-list table-striped table-hover">
			<thead>
				<tr>
					<th class="td-no">#</th>
					<th><?php echo trans('label.td_username') ?></th>
					<th><?php echo trans('label.td_email') ?></th>
					<th><?php echo trans('label.td_status') ?></th>
					<th class="td-action"><?php echo trans('label.td_action') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php $i=0+($result->from-1); foreach($result->data as $row): ?>
					<?php 
						$client_id = SG_Util::val($row, 'id');
					?>
					<tr>
						<td class="td-no"><?php echo $i+1 ?></td>
						<td><?php echo SG_Util::val($row, 'username') ?></td>
						<td><?php echo SG_Util::val($row, 'email') ?></td>
						<td>
							<?php 
								$is_suspended = SG_Util::val($row, 'suspended');
								$is_banned = SG_Util::val($row, 'banner');
							?>
							<a class="label label-default">S</a>
							<a class="label label-default">P</a>
						</td>
						<td class="td-action">
							<a href="<?php echo url('client/edit/'.$client_id) ?>">
								<i class="fa fa-pencil"></i> <?php echo trans('label.action_edit') ?>
							</a>
							<a href="<?php echo url('client/delete/'.$client_id) ?>">
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