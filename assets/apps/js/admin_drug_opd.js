$(document).ready(function () {
    var dataTable = $('#table_data').DataTable({
        'createdRow': function (row, data, dataIndex) {
            $(row).attr('name', 'row' + dataIndex);
        },
        "processing": true,
        "serverSide": true,
        "order": [],

        "pageLength": 50,
        "ajax": {
            url: site_url + '/admin_drug_opd/fetch_admin_drug_opd',
            data: {
                'csrf_token': csrf_token
            },
            type: "POST"
        },
        "columnDefs": [
            {
                "targets": [0, 4,5,6],
                "orderable": false,
            },
        ],
    });

});

var crud = {};

crud.ajax = {
    del_data: function (id, cb) {
        var url = '/admin_drug_opd/del_admin_drug_opd',
            params = {
                id: id
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    }, save: function (items, cb) {
        var url = '/admin_drug_opd/save_admin_drug_opd',
            params = {
                items: items
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    }, get_update: function (id, cb) {
        var url = '/admin_drug_opd/get_admin_drug_opd',
            params = {
                id: id
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    }

};
crud.del_data = function (id) {

    crud.ajax.del_data(id, function (err, data) {
        if (err) {
            swal(err)
        }
        else {
            //swal('ลบข้อมูลเรียบร้อย')
            app.alert('ลบข้อมูลเรียบร้อย');

        }
    });
}

crud.save = function (items, row_id) {
    crud.ajax.save(items, function (err, data) {
        if (err) {
            //app.alert(err);
            swal(err);
        }
        else {
            if (items.action == 'insert') {
                crud.set_after_insert(items, data.id);
            } else if (items.action == 'update') {
                crud.set_after_update(items, row_id);
            }
            $('#frmModal').modal('toggle');
            swal('บันทึกข้อมูลเรียบร้อยแล้ว ');
        }
    });

}


crud.get_update = function (id, row_id) {
    crud.ajax.get_update(id, function (err, data) {
        if (err) {
            //app.alert(err);
            swal(err);
        }
        else {
            //swal('แก้ไขข้อมูลเรียบร้อยแล้ว ');
            //location.reload();
            crud.set_update(data, row_id);
        }
    });

}


crud.set_after_update = function (items, row_id) {

    var row_id = $('tr[name="' + row_id + '"]');
    row_id.find("td:eq(0)").html(items.id);
/*    row_id.find("td:eq(1)").html(items.didstd);*/
    row_id.find("td:eq(1)").html(items.didstd_19);
    row_id.find("td:eq(2)").html(items.dname);
    row_id.find("td:eq(3)").html(items.dname_thai);
    row_id.find("td:eq(4)").html(items.drug_detail);
    //row_id.find("td:eq(6)").html(items.sound);
    //row_id.find("td:eq(7)").html(items.vdo);
    //row_id.find("td:eq(8)").html(items.note);
    row_id.find("td:eq(5)").html(items.use);

}
crud.set_after_insert = function (items, id) {

    $('<tr name="row' + (id + 1) + '"><td>' + id + '</td>' +
        '<td>' + items.id + '</td>' +
       /* '<td>' + items.didstd + '</td>' +*/
        '<td>' + items.didstd_19 + '</td>' +
        '<td>' + items.dname + '</td>' +
        '<td>' + items.dname_thai + '</td>' +
        '<td>' + items.drug_detail + '</td>' +
/*        '<td>' + items.sound + '</td>' +
        '<td>' + items.vdo + '</td>' +
        '<td>' + items.note + '</td>' + */
        '<td>' + items.use + '</td>' +
        '<td><div class="btn-group pull-right" role="group">' +
        '<button class="btn btn-outline btn-success" data-btn="btn_view" data-didstd="'+items.didstd_19+'" data-id="' + id + '"><i class="fa fa-eye"></i></button>' +
        '<button class="btn btn-outline btn-warning" data-btn="btn_edit" data-id="' + id + '"><i class="fa fa-edit"></i></button>' +
        '<button class="btn btn-outline btn-danger" data-btn="btn_del" data-id="' + id + '"><i class="fa fa-trash"></i></button>' +
        '</td></div>' +
        '</tr>').insertBefore('table > tbody > tr:first');
}

crud.set_update = function (data, row_id) {
    $("#row_id").val(row_id);
    $("#id").val(data.rows["id"]);
    //$("#didstd").val(data.rows["didstd"]);
    $("#didstd_19").val(data.rows["didstd_19"]);
    $("#dname").val(data.rows["dname"]);
    $("#dname_thai").val(data.rows["dname_thai"]);
    tinyMCE.activeEditor.setContent(data.rows["drug_detail"]);
    //$("#sound").val(data.rows["sound"]);
   // $("#vdo").val(data.rows["vdo"]);
   // $("#note").val(data.rows["note"]);
    $("#use").val(data.rows["use"]);
}

$('#btn_save').on('click', function (e) {
    e.preventDefault();
    var action;
    var items = {};
    var row_id = $("#row_id").val();
    items.action = $('#action').val();
     items.brand_name = $("#brand option:selected").text();
    items.id = $("#id").val();
    items.didstd = $("#didstd").val();
    items.didstd_19 = $("#didstd_19").val();
    items.dname = $("#dname").val();
    items.dname_thai = $("#dname_thai").val();
    items.drug_detail = tinyMCE.activeEditor.getContent();
    items.sound = $("#sound").val();
    items.vdo = $("#vdo").val();
    items.note = $("#note").val();
    items.use = $("#use").val();

    //console.log(tinyMCE.activeEditor.getContent());
  if (validate(items)) {
        crud.save(items, row_id);
    }

});

$('#add_data').on('click', function (e) {
    e.preventDefault();
    $("#frmModal input").prop('disabled', false);
    $("#frmModal select").prop('disabled', false);
    $("#frmModal textarea").prop('disabled', false);
    $("#frmModal .btn").prop('disabled', false);
    app.clear_form();
});

$(document).on('click', 'button[data-btn="btn_del"]', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var td = $(this).parent().parent().parent();

    swal({
        title: "คำเตือน?",
        text: "คุณต้องการลบข้อมูล ",
        icon: "warning",
        buttons: [
            'cancel !',
            'Yes !'
        ],
        dangerMode: true,
    }).then(function (isConfirm) {
        if (isConfirm) {
            crud.del_data(id);
            td.hide();
        }
    });
});

$(document).on('click', 'button[data-btn="btn_edit"]', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#action').val('update');
    $('#id').val(id);
    var row_id = $(this).parent().parent().parent().attr('name');
    $("#frmModal input").prop('disabled', false);
    $("#frmModal select").prop('disabled', false);
    $("#frmModal textarea").prop('disabled', false);
    $("#frmModal .btn").prop('disabled', false);

    crud.get_update(id, row_id);
    $('#frmModal').modal('show');

});

$(document).on('click', 'button[data-btn="btn_view"]', function (e) {
    e.preventDefault();
     var id = $(this).data('didstd');
     /*$('#action').val('update');
    $('#id').val(id);
  var row_id = $(this).parent().parent().parent().attr('name');
    crud.get_update(id, row_id);
    $("#frmModal input").prop('disabled', true);
    $("#frmModalselect").prop('disabled', true);
    $("#frmModaltextarea").prop('disabled', true);
    $("#frmModal .btn").prop('disabled', true);
    $("#btn_close").prop('disabled', false);
    $('#frmModal').modal('show');*/
    window.open(site_url+"/drug/index/00031/"+id, "_blank");
});

function validate(items) {

    if (!items.didstd_19) {
        swal("กรุณาระบุรหัสยา 19 หลัก");
        $("#didstd_19").focus();
    } else if (!items.dname) {
        swal("กรุณาระบุชื่อยา Eng");
        $("#dname").focus();
    } else if (!items.dname_thai) {
        swal("กรุณาระบุชื่อยาไทย");
        $("#dname_thai").focus();
    } else if (!items.drug_detail) {
        swal("กรุณาระบุคำอธิบาย");
        $("#drug_detail").focus();
    }  else if (!items.use) {
        swal("กรุณาระบุสถานะการใช้");
        $("#use").focus();
    }
    else {
        return true;
    }

}