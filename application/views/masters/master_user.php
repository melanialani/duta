
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?php echo $title; ?> </h1>
			<button type="button" class="btn btn-info" id="insertUser" style="margin-left: 87%; margin-bottom: 2%;"> Add New Admin </button>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-user">
						<thead>
							<tr>
								<th style="text-align: center;">
									No
								</th>
								<th style="text-align: center;">
									Username
								</th>
								<th style="text-align: center;">
									Role
								</th>
								<th style="text-align: center;">
									Tindakan
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							for ($i = 0; $i < count($tabelUser); $i++) {
								echo "<tr>";
								echo '<td style="text-align: center;">' . ($i + 1) . '</td>';
								echo '<td style="text-align: center;">' . $tabelUser[$i]['user_username'] . '</td>';
								echo '<td style="text-align: center;">' . $tabelUser[$i]['user_role'] . '</td>';

								echo "<td class='crud-actions' style='text-align: center;'>";
								echo form_open('admin/masterUser');
					   				echo form_hidden('username', $tabelUser[$i]['user_username']);
					   				echo '<button type="submit" name="update_user" value="update_user" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Update</button> &nbsp';
					   				echo '<button type="submit" name="delete" value="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button> &nbsp';
					   			echo form_close();
					   			echo "</td>";

								echo "</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.panel-body -->
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/bower_components/metisMenu/dist/metisMenu.min.js')?>"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('assets/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bower_components/datatables-responsive/js/dataTables.responsive.js')?>"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js')?>"></script>

	<script type="text/javascript" class="init">
		$(document).ready(function() {
			$('#dataTables-user').DataTable({
	            responsive: true
	        });
	        
			$("#insertUser").click(function() {
				$("#modalInsert").modal();
			});
		});
	</script>

<!-- Modal -->
<div class="modal fade" id="modalInsert" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<?php echo form_open('admin/masterUser'); ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"> &times; </button>
				<h4 class="modal-title"> Insert New Admin </h4>
			</div>
			<div class="modal-body">
				<h5> Username: </h5> 
					<input type='text' id='new_username' name='new_username' class='form-control'/>
				<br />
				<h5> Password: </h5> 
					<input type='password' id='new_password' name='new_password' class='form-control'/>
				<br />
				<h5> Role: </h5> 
					<input type='text' id='new_role' name='new_role' class='form-control' value='admin'/>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"> Cancel </button>
				<?php echo form_submit('insert','Insert','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

</body>

</html>