<script src="<?php echo base_url() ?>assets/vendor/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/vendor/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<link href="<?php echo base_url() ?>assets/vendor/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<html>
<body>
<br>

<div class="row">
    <div class="panel panel-info ">
        <div class="panel-heading w3-theme">
            <i class="fa fa-user fa-2x "></i> รายการยา
             <button class="btn btn-success pull-right" id="add_data" data-toggle="modal" data-target="#frmModal"><i class="fa fa-plus-circle"></i> Add</button>
</span>

        </div>
        <div class="panel-body">

            <table id="table_data" class="table table-responsive">
                <thead>
                <tr>
                    <th>รหัส</th><th>รหัสยา24หลัก</th><th>รหัสยา 19 หลัก</th><th>ชื่อยา Eng</th><th>ชื่อยาไทย</th><th>คำอธิบาย</th><th>เสียง</th><th>vdo</th><th>บันทึกเพิ่มเติม</th><th>สถานะการใช้</th>
                    <th>#</th>
                </tr>
                </thead>

            </table>
        </div>

    </div>

</div>


<div class="modal fade" id="frmModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มรายการยา</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type="hidden" id="action" value="insert">
        <input type="hidden" class="form-control" id="row_id" placeholder="ROWID" value=""><div class="form-group">
                    <label for="id">รหัส</label>
                    <input type="text" class="form-control" id="id" placeholder="รหัส" value=""></div><div class="form-group">
                    <label for="didstd">รหัสยา24หลัก</label>
                    <input type="text" class="form-control" id="didstd" placeholder="รหัสยา24หลัก" value=""></div><div class="form-group">
                    <label for="didstd_19">รหัสยา 19 หลัก</label>
                    <input type="text" class="form-control" id="didstd_19" placeholder="รหัสยา 19 หลัก" value=""></div><div class="form-group">
                    <label for="dname">ชื่อยา Eng</label>
                    <input type="text" class="form-control" id="dname" placeholder="ชื่อยา Eng" value=""></div><div class="form-group">
                    <label for="dname_thai">ชื่อยาไทย</label>
                    <input type="text" class="form-control" id="dname_thai" placeholder="ชื่อยาไทย" value=""></div><div class="form-group">
                    <label for="drug_detail">คำอธิบาย</label>
                    <input type="text" class="form-control" id="drug_detail" placeholder="คำอธิบาย" value=""></div><div class="form-group">
                    <label for="sound">เสียง</label>
                    <input type="text" class="form-control" id="sound" placeholder="เสียง" value=""></div><div class="form-group">
                    <label for="vdo">vdo</label>
                    <input type="text" class="form-control" id="vdo" placeholder="vdo" value=""></div><div class="form-group">
                    <label for="note">บันทึกเพิ่มเติม</label>
                    <input type="text" class="form-control" id="note" placeholder="บันทึกเพิ่มเติม" value=""></div><div class="form-group">
                    <label for="use">สถานะการใช้</label>
                    <input type="text" class="form-control" id="use" placeholder="สถานะการใช้" value=""></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btn_save">Save</button><button type="button" class="btn btn-danger" id="btn_close" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<script src="<?php echo base_url() ?>assets/apps/js/droug_opd.js" charset="utf-8"></script>

<!--         foreach ($invit_type as $r) {
                                if ($outsite["invit_type"] == $r->id) {
                                    $s = "selected";
                                } else {
                                    $s = "";
                                }
                                echo "<option value=" $r->id" $s > $r->name </option>";

}
-->