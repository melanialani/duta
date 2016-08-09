
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <?php echo form_open('admin/updateSupplier'); ?>
                    <div class="modal-header">
                        <h4 class="modal-title"> <?php echo $title; ?> </h4>
                    </div>
                    <div class="modal-body">
                        <h5> ID Supplier: 
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <label><?php echo $id; ?></label>
                        </h5> 
                        
                        <h5> Nama: </h5> 
                        <input type='text' id='nama' name='nama' class='form-control' value='<?php echo $nama; ?>'/>
                        <br />
                        
                        <h5> Alamat: </h5> 
                        <input type='text' id='alamat' name='alamat' class='form-control' value='<?php echo $alamat; ?>'/>
                        <br />
                        
                        <h5> Kota: </h5> 
                        <select multiple class="form-control" name="kota" id='kota'>
                            <?php
                                for ($i = 0; $i < count($dropdown_kota); $i++) {
                                    if ($dropdown_kota[$i]['name'] == $kota){
                                        echo '<option value="' . $dropdown_kota[$i]['name'] . '" selected>' . $dropdown_kota[$i]['name'] . '</option>';
                                    } else
                                        echo '<option value="' . $dropdown_kota[$i]['name'] . '">' . $dropdown_kota[$i]['name'] . '</option>';
                                }
                            ?>
                        </select>
                        <br />
                        
                        <h5> No. Telp: </h5> 
                        <input type='text' id='telp1' name='telp1' class='form-control' value='<?php echo $telp1; ?>'/>
                        <br />
                        
                        <h5> No. Telp: </h5> 
                        <input type='text' id='telp2' name='telp2' class='form-control' value='<?php echo $telp2; ?>'/>
                        <br />
                        
                        <h5> Status: </h5> 
                        <input type='number' max="1" min="0" id='new_status' name='new_status' class='form-control' value='<?php echo $status; ?>'/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"> <a href="<?php echo base_url('index.php/admin/masterSupplier') ?>">Cancel</a> </button>
                        <?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?>
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