@extends('layouts.Admin.base')
@section('tittle')
    Kasus
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
            <div class="sparkline13-hd">
                <div class="main-sparkline13-hd">
                        <h1 class="float-left">Data Kasus</h1>
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
                                <th data-field="Nama Kategori" data-editable="true">Nama Kategori</th>
                                <th data-field="Nama Jalan" data-editable="true">Nama Jalan</th>
                                <th data-field="Jumlah Terlapor" data-editable="true">Jumlah Terlapor</th>
                                <th data-field="Jumlah Selesai" data-editable="true">Jumlah Selesai</th>
                                <th data-field="keterangan" data-editable="true">Keterangan</th>
                                <th data-field="cara yang digunakan" data-editable="true">Cara</th>
                                <th data-field="action">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no =1;
                            @endphp
                            @foreach ($data['kasus'] as $item)
                                <tr>
                                    <td></td>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->kategori_rol->nama_kategori}}</td>
                                    <td>{{$item->jalan_rol->nama_jalan}}</td>
                                    <td>{{$item->jumlah_laporan}}</td>
                                    <td>{{$item->jumlah_selesai}}</td>
                                    <td>{{$item->keterangan}}</td>
                                    <td>{{$item->cara}}</td>
                                    <td class="datatable-ct">
                                        <button class="btn btn-sm btn-warning" data-id="{{$item->id}}" id="editItem"><i class="fas fa-edit"></i></button>
                                        <button onclick="deleteConfirmation({{$item->id}} ,'{{$item->kategori_rol->nama_kategori}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
            <div class="sparkline13-graph">
                <div class="card border-0">
                    <div id="map" class="map-canvas" data-lat="40.748817" data-lng="-73.985428"
                        style="height: 600px; position: relative; overflow: hidden;">
                        <script>
                            var map = L.map('map').setView([-0.8917, 119.8707], 13);

                            L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=iVwxS42CVMlobjgLaPRM', {
                                attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
                            }).addTo(map);
                            var locations = [
                                @foreach ($data['kasus'] as $d)
                                [`
                                    <div class="card card-profile">
                                        <div class="card-body pt-0">
                                            <div class="text-center">
                                            <h5 class="h3">
                                            {{$d->kategori_rol->nama_kategori}}
                                            </h5>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="card-profile-stats d-flex justify-content-center">
                                                <div>
                                                    <span class="description">Jumlah Laporan :</span>
                                                    <span class="heading">{{$d->jumlah_laporan}}</span>
                                                </div>
                                                <div>
                                                    <span class="description">Jumlah Laporan Selesai :</span>
                                                    <span class="heading">{{$d->jumlah_selesai}}</span>
                                                </div>
                                                <div>
                                                    <span class="description">Jumlah Kasus :</span>
                                                    <span class="heading">
                                                        @php
                                                            $total = $d->jumlah_laporan + $d->jumlah_selesai;
                                                        @endphp
                                                        {{$total}}
                                                    </span>
                                                </div>
                                                <div>
                                                    <span class="description">Keterangan :</span>
                                                    <span class="heading">{{$d->keterangan}}</span>
                                                </div>
                                                <div>
                                                    <span class="description">Cara yang digunakan :</span>
                                                    <span class="heading">{{$d->cara}}</span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                `, {{ $d->jalan_rol->koordinat }}],
                                @endforeach
                            ];
                            var greenIcon = L.icon({
                                iconUrl: '{{asset('static/marker/tinggi.png')}}',
                                iconSize:     [75, 50], // size of the icon
                            });
                            for (var i = 0; i < locations.length; i++) {
                                marker = new L.marker([locations[i][1], locations[i][2]],{icon: greenIcon})
                                    .bindPopup(locations[i][0])
                                    .addTo(map);
                            }
                        </script>
                    </div>
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
                        <label class="control-label col-md-3 col-sm-3 ">Kategori Kasus</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select id="id_kategori_kasus" name="id_kategori_kasus" class="form-control" required>
                                <option selected disabled>Pilih</option>
                                @foreach ($data['kategori'] as $d)
                                <option value="{{$d->id}}">{{$d->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Jumlah Kasus</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="hidden" name="id" id="id">
                            <input id="jumlah_selesai" name="jumlah_selesai" type="number" class="form-control"
                                placeholder="Isi disini.." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Jumlah Terlapor</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="jumlah_laporan" name="jumlah_laporan" type="number" class="form-control"
                                placeholder="Isi disini.." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Jalan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select id="id_jalan" name="id_jalan" class="form-control" required>
                                <option selected disabled>Pilih</option>
                                @foreach ($data['jalan'] as $d)
                                <option value="{{$d->id}}">{{$d->nama_jalan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Keterangan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea id="keterangan" required="required" class="form-control" name="keterangan" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Cara yang digunakan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea id="cara" required="required" class="form-control" name="cara" required></textarea>
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
            $.get("/Admin/Kasus" + '/' + Item_id + '/edit', function (data) {
                $('#univ-modal').modal('show');
                $('#modelheader').html("Edit Data");
                $('#simpan').val("edit-user");
                $('#id').val(data.id);
                $('#id_jalan').val(data.id_jalan);
                $('#id_kategori_kasus').val(data.id_kategori_kasus);
                $('#jumlah_laporan').val(data.jumlah_laporan);
                $('#jumlah_selesai').val(data.jumlah_selesai);
                $('#keterangan').val(data.keterangan);
                $('#cara').val(data.cara);
            });
        });

        $('#simpan').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#ItemForm').serialize(),
                url: "/Admin/Kasus",
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
                    console.log(data);
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
                    url: "/Admin/Kasus/Destroy/" + id,
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
