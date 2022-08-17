@extends('layouts.Admin.base')
@section('tittle')
    Kategori - Kasus
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
            <div class="sparkline13-hd">
                <div class="main-sparkline13-hd">
                        <h1 class="float-left">Data Kategori</h1>
                        <button id="create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Tambah</button>
                </div>
            </div>
            <div class="sparkline13-graph">
                <div class="datatable-dashv1-list custom-datatable-overright">
                    <div id="toolbar">
                        <select class="form-control dt-tb">
                            <option value="">Export Basic</option>
                            <option value="all">Export All</option>
                            <option value="selected">Export Selected</option>
                        </select>
                    </div>
                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                        <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="id">No</th>
                                <th data-field="name" data-editable="true">Nama Kategori</th>
                                <th data-field="action">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no =1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td></td>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_kategori}}</td>
                                    <td class="datatable-ct">
                                        <button class="btn btn-sm btn-warning" data-id="{{$item->id}}" id="editItem"><i class="fas fa-edit"></i></button>
                                        <button onclick="deleteConfirmation({{$item->id}} ,'{{$item->nama_kategori}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="univ-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelheader">Tambah Data</h4>
            </div>
            <form id="ItemForm" name="ItemForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Kategori</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="hidden" name="id" id="id">
                            <input id="nama_kategori" name="nama_kategori" type="text" class="form-control"
                                placeholder="Isi disini.." required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="batal" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" id="simpan" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#create').click(function () {
            $('#simpan').val("create-Item");
            $('#id').val('');
            $('#ItemForm').trigger("reset");
            $('#modelheader').html("Tambah Data Baru");
            $('#univ-modal').modal('show');
        });

        $('body').on('click', '#editItem', function () {
            var Item_id = $(this).data('id');
            $.get("/Admin/Kategori" + '/' + Item_id + '/edit', function (data) {
                $('#univ-modal').modal('show');
                $('#modelheader').html("Edit Data");
                $('#simpan').val("edit-user");
                $('#id').val(data.id);
                $('#nama_kategori').val(data.nama_kategori);
            });
        });

        $('#simpan').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#ItemForm').serialize(),
                url: "/Admin/Kategori",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#ItemForm').trigger("reset");
                    $('#simpan').html("simpan");
                    $('#univ-modal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil di simpan !',
                        showConfirmButton: true,
                    });
                    setInterval(function() {
                        location.reload();
                    }, 2000 );
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#simpan').html('Save Changes');
                }
            });
        });

        $('#batal').on('click', function () {
            location.reload();
        });

    });

    function deleteConfirmation(id, name) {
        swal.fire({
            title: "HAPUS?",
            text: "Yakin ingin menghapus data (" + name + ") !",
            icon: "warning",
            showCancelButton: !0,
            cancelButtonText: "Tidak, batal!",
            confirmButtonText: "Ya, Hapus!",
            confirmButtonColor: '#ff0000',
            reverseButtons: 0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "/Admin/Kategori/Destroy/" + id,
                    data: {
                        _token: CSRF_TOKEN
                    },
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal.fire("Berhasil!", results.message, "success").then((result) => {
                                location.reload();
                            });
                        } else {
                            swal.fire("Gagal!", results.message, "error").then((result) => {
                                var oTable = $('#datatables').DataTable();
                                location.reload();
                            });
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }

</script>
@endsection
