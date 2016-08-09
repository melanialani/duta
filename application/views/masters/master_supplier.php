
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> <?php echo $title; ?> </h1>
            <button type="button" class="btn btn-info" id="insertSupplier" style="margin-left: 85%; margin-bottom: 2%;"> Add New Supplier </button>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-supplier">
                        <thead>
                            <tr>
                                <th style="text-align: center;">
                                    No
                                </th>
                                <th style="text-align: center;">
                                    ID Supplier
                                </th>
                                <th style="text-align: center;">
                                    Nama
                                </th>
                                <th style="text-align: center;">
                                    Alamat
                                </th>
                                <th style="text-align: center;">
                                    Kota/Kabupaten
                                </th>
                                <th style="text-align: center;">
                                    Telepon 1
                                </th>
                                <th style="text-align: center;">
                                    Telepon 2
                                </th>
                                <th style="text-align: center;">
                                    Status
                                </th>
                                <th style="text-align: center;">
                                    Tindakan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($tabel); $i++) {
                                echo "<tr>";
                                echo '<td style="text-align: center;">' . ($i + 1) . '</td>';
                                echo '<td style="text-align: center;">' . $tabel[$i]['supplier_id'] . '</td>';
                                echo '<td style="text-align: center;">' . $tabel[$i]['supplier_nama'] . '</td>';
                                echo '<td style="text-align: center;">' . $tabel[$i]['supplier_alamat'] . '</td>';
                                echo '<td style="text-align: center;">' . $tabel[$i]['supplier_kota'] . '</td>';
                                echo '<td style="text-align: center;">' . $tabel[$i]['supplier_telp1'] . '</td>';
                                echo '<td style="text-align: center;">' . $tabel[$i]['supplier_telp2'] . '</td>';
                                echo '<td style="text-align: center;">' . $tabel[$i]['supplier_status'] . '</td>';

                                echo "<td class='crud-actions' style='text-align: center;'>";
                                echo form_open('admin/masterSupplier');
                                echo form_hidden('id', $tabel[$i]['supplier_id']);
                                echo '<button type="submit" name="update_supplier" value="update_supplier" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Update</button> &nbsp';
                                echo '<button style="margin-top:2%;" type="submit" name="delete" value="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>';
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
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets/bower_components/metisMenu/dist/metisMenu.min.js') ?>"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets/bower_components/datatables/media/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables-responsive/js/dataTables.responsive.js') ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets/dist/js/sb-admin-2.js') ?>"></script>

<script type="text/javascript" class="init">
    $(document).ready(function () {
        $('#dataTables-supplier').DataTable({
            responsive: true
        });

        $("#insertSupplier").click(function () {
            $("#modalInsert").modal();
        });
    });
</script>

<!-- Modal -->
<div class="modal fade" id="modalInsert" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <?php echo form_open('admin/masterSupplier'); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> &times; </button>
                <h4 class="modal-title"> Insert New Supplier </h4>
            </div>
            <div class="modal-body">
                <h5> Nama Supplier: </h5>
                <input type='text' id='nama' name='nama' class='form-control'/>
                <br />
                <h5> Alamat: </h5>
                <input type='text' id='alamat' name='alamat' class='form-control'/>
                <br />
                <h5> Kota: </h5>
                    <select multiple class="form-control" name="kota" id='kota'>
                        <?php
                            for ($i = 0; $i < count($dropdown_kota); $i++) {
                                echo '<option value="' . $dropdown_kota[$i]['name'] . '">' . $dropdown_kota[$i]['name'] . '</option>';
                            }
                        ?>
                    </select>
                <br />
                <h5> No. Telp: </h5>
                <input type='number' id='telp1' name='telp1' class='form-control'/>
                <br />
                <h5> No. Telp: </h5>
                <input type='number' id='telp2' name='telp2' class='form-control'/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel </button>
                <?php echo form_submit('insert', 'Insert', 'class="btn btn-primary"'); ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

</body>

</html>