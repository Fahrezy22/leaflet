@extends('layouts.Admin.base')
@section('tittle')
    Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="analytics-sparkle-line reso-mg-b-30">
            <div class="analytics-content">
                <h5>Data Jalan Terdaftar</h5>
                <h2><span class="counter">{{$data['tkp']}}</span></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="analytics-sparkle-line reso-mg-b-30">
            <div class="analytics-content">
                <h5>Jumlah Kasus</h5>
                <h2><span class="counter">{{$data['kasus_selesai']}}</span> <span class="tuition-fees">SelesaI</span></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
            <div class="analytics-content">
                <h5>Jumlah Kasus</h5>
                <h2><span class="counter">{{$data['kasus_terlapor']}}</span> <span class="tuition-fees">Terlapor</span></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
            <div class="analytics-content">
                <h5>Jumlah Kasus</h5>
                <h2><span class="counter">{{$total}}</span> <span class="tuition-fees">Total</span></h2>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="clear-fix"></div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
            <div class="sparkline13-hd">
                <div class="main-sparkline13-hd">
                        <h1 class="float-left">Preview Maps</h1>
                </div>
            </div>
            <div class="sparkline13-graph">
                <div id="map" class="map-canvas" data-lat="40.748817" data-lng="-73.985428"
                        style="height: 300px; position: static; overflow: hidden;">
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
                                                <span class="description">Jalan :</span>
                                                <span class="heading">{{$d->jalan_rol->nama_jalan}}</span>
                                            </div>
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
            $.get("/Admin/Jalan" + '/' + Item_id + '/edit', function (data) {
                $('#univ-modal').modal('show');
                $('#modelheader').html("Edit Data");
                $('#simpan').val("edit-user");
                $('#id').val(data.id);
                $('#nama_jalan').val(data.nama_jalan);
                $('#koordinat').val(data.koordinat);
            });
        });

        $('#simpan').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#ItemForm').serialize(),
                url: "/Admin/Jalan",
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
                    url: "/Admin/Jalan/Destroy/" + id,
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


