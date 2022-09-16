<div class="container">
	<?php if(isset($arr)){ ?>
		<table class="table table-hover">
			<thead>
				<h2 class="projecttitle">LIST PROJECT</h2>
				<div>
					<a href="<?php echo esc_url(admin_url('admin.php?')) ?>page=project_list&view=post&pageSum=<?php echo isset($nextpage)? esc_attr( $nextpage ) : $pageSum ?>" class="btn btn-info">Add</a>
				</div>
				<tr>
					<th>STT</th>
					<th>Id</th>
					<th>Projec_Name</th>
					<th>Start_Date</th>
					<th>Deadline</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $start; foreach($arr['data'] as $row) { $start++; ?>
					<tr>		
						<td><?php echo esc_attr($start);  ?></td>
						<td><?php echo esc_attr($row['id']) ?></td>
						<td><?php echo esc_attr($row['project_name']) ?> </td>
						<td><?php echo esc_attr(date('d-m-Y',strtotime($row['start_date'])))?></td>
						<td><?php echo esc_attr(date('d-m-Y',strtotime($row['deadline'])))?></td>
						<td><?php echo esc_attr($row['status']) ?></td>
						<td>
							<a href="<?php echo esc_url(admin_url('admin.php?')) ?>page=project_list&view=edit&id=<?php echo esc_attr($row['id']) ?>&pageNum=<?php echo esc_attr($pageNum) ?>" class="btn btn-success p-2"><i class="fa-solid fa-pen-to-square"></i></a>
							<button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="delete btn btn-danger p-2 gethref" data-href="<?php echo esc_url(admin_url('admin.php?')) ?>page=project_list&iddel=<?php echo esc_attr($row['id']) ?>&pageNum=<?php echo esc_attr($pageNum) ?>"><i class="fa-solid fa-trash-can"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php }else{ ?>
		<div id="error">
			<h1>Error : API not found</h1>
		</div>
	<?php die(); } ?>
		<div class="container ">        
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					<?php if ($pageNum > 1) { ?>
								<li class="page-item"><a class="page-link" href="<?php echo esc_url(admin_url('admin.php?')) ?>page=project_list&pageNum=1"><<</a>
								</li>
								<li class="page-item"><a class="page-link" href="<?php echo esc_url(admin_url('admin.php?')) ?>page=project_list&pageNum=<?php echo esc_attr($pageNum) - 1 ?>"><</a>
								</li>
					<?php } 
						for ($i = $pre; $i <= $next; $i++) { ?>
								<?php if ($i == $pageNum) { ?>
										<li class="page-item"><a class="page-link bg-warning" href="<?php echo esc_url(admin_url('admin.php?')) ?>page=project_list&pageNum=<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></a></li>
								<?php } else { ?>
										<li class="page-item"><a class="page-link" href="<?php echo esc_url(admin_url('admin.php?')) ?>page=project_list&pageNum=<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></a></li>
								<?php } ?>
					<?php }
						if ($pageNum < $pageSum) { ?>
								<li class="page-item"><a class="page-link" href="<?php echo esc_url(admin_url('admin.php?')) ?>page=project_list&pageNum=<?php echo esc_attr($pageNum) + 1 ?>"> > </a></li>
								<li class="page-item"><a class="page-link" href="<?php echo esc_url(admin_url('admin.php?')) ?>page=project_list&pageNum=<?php echo esc_attr($pageSum) ?>"> >> </a></li>
					<?php } ?>
				</ul>
			</nav>
		</div>
	<form class="logout" action="" method="GET">
		<button type="submit" name="logout" value="project" class="logout btn btn-danger">logout</button>
	</form>
<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">you are sure <b>delete</b> ?</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<a class="delete btn btn-danger p-2 posthref"  href="" >Delete</a>
		</div>
		</div>
	</div>
	</div>



