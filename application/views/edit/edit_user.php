
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<?php echo form_open('admin/updateUser'); ?>
						<div class="modal-header">
							<h4 class="modal-title"> <?php echo $title; ?> </h4>
						</div>
						<div class="modal-body">
							<h5> Username: 
								<input type="hidden" name="new_username" value="<?php echo $new_username; ?>" />
								<label><?php echo $new_username; ?></label>
							</h5> 
							<h5> Password: </h5> 
								<input type='password' id='new_password' name='new_password' class='form-control' value='<?php echo $new_password; ?>'/>
							<br />
							<h5> Role: </h5> 
								<input type='text' id='new_role' name='new_role' class='form-control' value='<?php echo $new_role; ?>'/>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default"> <a href="<?php echo base_url('index.php/admin/masterUser')?>">Cancel</a> </button>
							<?php echo form_submit('save','Save','class="btn btn-primary"');?>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
			<!-- /.panel-body -->
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>