<?php
include_once APPPATH . "views/admin/template/top.php";
 ?>
<div class="inner-wrapper">
	<?php
    include_once APPPATH . "views/admin/template/side_bar.php";
	?>

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Financial Reports</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html"> <i class="fa fa-home"></i> </a>
					</li>
					<li>
						<span>Financial Reports</span>
					</li>
					<li>
						<span>Credit Transfer</span>
					</li>
				</ol>

				<a class="sidebar-right-toggle"  href="<?= site_url('admin/index/index'); ?>"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>

		<!-- start: page -->

		<section class="panel">
			<header class="panel-heading">

				<h2 class="panel-title">Credit Transfer</h2>
			</header>

			<div class="panel-body">

				<div class="well well-sm">
					<form class="form-inline" id = "m_serarch-form" name = "m_search-form" method ="GET">
						<div class="row">
							<div class="col-md-12">

								<div class="input-group">
									<input type="text" name = "search_keyword" id ="search_keyword" class="form-control" placeholder="Search for..." value = "<?= $search_keyword?>">
									<span class="input-group-btn">
										<button type = "submit" class="btn btn-primary" >
											Find
										</button> </span>
								</div><!-- /input-group -->

							</div>
						</div>
						<hr class="dotted short">
						<div class="row" style ="margin-top : 10px">
							<div class="col-md-12">
								<div class="input-group" style = "width : 420px">
									<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									<input type="text" class="form-control" id = "daterange" name="daterange" value = "<?= $daterange?>">
								</div>
								<button style = "margin-left : 10px" data-search = "last month"  type="button" class="btn btn-sm btn-default search-date">
									Last Month
								</button>
								<button data-search = "this month" type="button" class="btn btn-sm btn-default search-date">
									This Month
								</button>
								<button data-search = "last week" type="button" class="btn btn-sm btn-default search-date">
									Last Week
								</button>
								<button data-search = "this week" type="button" class="btn btn-sm btn-default search-date">
									This Week
								</button>
								<button data-search = "yesterday" type="button" class="btn btn-sm btn-default search-date">
									Yesterday
								</button>
								<button data-search = "today" type="button" class="btn btn-sm btn-default search-date">
									Today
								</button>
							</div>
						</div>
					</form>
				</div>

				<h4 class="text-weight-bold text-dark text-uppercase">Summary <small> <?= $daterange?></small></h4>

				<table class="table table-striped table-bordered table-condensed">
					<thead>
						<tr  style="background:#f5f5f5; ">
							<th class="text-right">Deposit</th>
							<th class="text-right">Withdraw</th>
							<th class="text-right">Bonus</th>
							<th class="text-right">Coupon</th>
							<th class="text-right">Comn</th>
							<th class="text-right">Affiliate</th>
							<th class="text-right">Margin(%)</th>
							<th class="text-right">Profit</th>
						</tr>
					</thead>
					<tbody>
						<tr style="background:#FDF5E6">
							<td class="text-right"><strong><?= number_format($t_deposit_amount,2)?></strong></td>
                            <td class="text-right"><strong><?= number_format($t_withdraw_amount,2)?></strong></td>
                            <td class="text-right"><strong><?= number_format($t_deposit_bonus_amount,2)?></strong></td>
                            <td class="text-right"><strong><?= number_format($t_coupon_amount,2)?></strong></td>
                            <td class="text-right"><strong><?= number_format($t_comp_amount,2)?></strong></td>
                            <td class="text-right"><strong><?= number_format($t_agent_settlement,2)?></strong></td>
                            <td class="text-right"><?= number_format($margin,2)?> %</td>
                            <td class="text-right text-primary"><strong><?= number_format($profit,2)?></strong></td>
						</tr>
					</tbody>
				</table>

				<hr class="dotted short">

				<table class="table table-striped">
					<thead>
						<tr height="30px">
							<th class="text-left">User ID</th>
							<th>Type</th>
							<th class="text-right">Deposit</th>
							<th class="text-right">Bonus</th>
							<th class="text-right">Withdraw</th>
							<th class="text-right">Affiliate</th>
							<th class="text-right hidden-xs hidden-sm">Date</th>
							<th class="text-right hidden-xs hidden-sm">Confirm Date</th>
							<th class="text-right">Confirm By</th>
						</tr>
					</thead>
					<tbody>
<?php foreach($action_list as $row):?>					    
						<tr>
							<td class="text-left">
							     <?php if ($row->login_status == 'Y'):?>
                                     <span class="label label-success">On</span>
                                <?php else:?>
                                     <span class="label label-default">On</span>
                                <?php endif?>&nbsp;
							    <strong><a href="<?= site_url('admin/member/member_view');?>/<?=$row-> user_no1?>"><?= $row -> user_id?></a></strong></td>
							<td><?= $row -> type?></td>
							<td class="text-right"><strong><?= number_format($row -> amount1,2)?></strong></td>
							<td class="text-right"><strong><?= number_format($row -> amount2,2)?></strong></td>
							<td class="text-right"><strong><?= number_format($row -> amount3,2)?></strong></td>
							<td class="text-right"><strong><?= number_format($row -> amount4,2)?></strong></td>
							<td class="text-right hidden-xs hidden-sm"><small><?= time_to_string($row -> reg_date)?></small></td>
							<td class="text-right hidden-xs hidden-sm"><small><?= time_to_string($row -> confirm_date)?></small></td>
							<td class="text-right">eveangun</td>
						</tr>
<?php endforeach;?>						
					</tbody>
				</table>


				<!-- <div class="row">
					<nav class="text-center">
						<ul class="pagination">
							<li class="disabled">
								<a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a>
							</li>
							<li class="active">
								<a href="#">1</a>
							</li>
							<li>
								<a href="#">2</a>
							</li>
							<li>
								<a href="#">3</a>
							</li>
							<li>
								<a href="#">4</a>
							</li>
							<li>
								<a href="#">5</a>
							</li>
							<li>
								<a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a>
							</li>
						</ul>
					</nav>
				</div> -->

			</div>
		</section><!-- end: panel -->
		<!-- end: page -->
	</section><!-- end: content-body -->
</div><!-- end: inner-wrapper -->

<?php
    include_once APPPATH . "views/admin/template/footer.php";
?>