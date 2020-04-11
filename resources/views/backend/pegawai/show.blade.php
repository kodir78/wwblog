@extends('backend.stisla.global')
@section("title") Data Pegawai @endsection
@section("sub_title")Pegawai @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                {{-- <div class="card-header">
                </div> --}}
                <div class="card-body">
                    <div class="float-left">
                        <a href="{{route('pegawai.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                <div class="float-right">
                    <form action="{{ route('pegawai.index') }}">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                        <div class="input-group-append">                                            
                          <button type="submit" value="filter" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="clearfix mb-3"></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>#</th>
                                <th><b>Name</b></th>
                                <th><b>Gender</b></th>
                                <th><b>Email</b></th>
                                <th><b>Address</b></th>
                                <th><b>Action</b></th>
                            </tr>
                            <tbody>
                                @foreach($pegawai as $pgw => $hasil)
                                <tr>
                                    <td>{{$pgw + $pegawai->firstitem()}}</td>
                                    <td>{{$hasil->name}}</td>
                                    <td>{{$hasil->gender}}</td>
                                    <td>{{$hasil->email}}</td>
                                    <td>{{$hasil->address}}</td>
                                    {{-- <td> 
                                        @if($hasil->image)
                                        <img src="{{asset($hasil->image)}}" width="70px"/>
                                        @else
                                        <img alt="image" src="{{ asset('public/assets/stisla/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture" width="70px">
                                        @endif
                                    </td> --}}
                                    <td> 
                                        <a class="btn btn-info text-white btn-sm" href="{{route('pegawai.edit', [$hasil->id])}}">Edit</a>
                                        {{-- <a href="{{route('pegawai.show', $hasil->id)}}" class="btn btn-primary btn-sm">Detail</a> --}}
                                        <form  class="d-inline" action="{{route('pegawai.destroy', [$hasil->id])}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                            <input type="submit" value="Trash" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan=10>{{$pegawai->appends(Request::all())->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JS Libraies -->
<script src="{{ asset('public/assets/stisla/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('public/assets/stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/stisla/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('public/assets/stisla/js/page/modules-datatables.js') }}"></script>
 <!-- JAVASCRIPT -->
 <script>
    //CSRF TOKEN PADA HEADER
    //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    //TOMBOL TAMBAH DATA
    //jika tombol-tambah diklik maka
    $('#tombol-tambah').click(function () {
        $('#button-simpan').val("create-post"); //valuenya menjadi create-post
        $('#id').val(''); //valuenya menjadi kosong
        $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
        $('#modal-judul').html("Tambah Pegawai Baru"); //valuenya tambah pegawai baru
        $('#tambah-edit-modal').modal('show'); //modal tampil
    });

    //MULAI DATATABLE
    //script untuk memanggil data json dari server dan menampilkannya berupa datatable
    $(document).ready(function () {
        $('#table_pegawai').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side 
            ajax: {
                url: "{{ route('pegawai.index') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'nama_pegawai',
                    name: 'nama_pegawai'
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ],
            order: [
                [0, 'asc']
            ]
        });
    });

    //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
    //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
    //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
    if ($("#form-tambah-edit").length > 0) {
        $("#form-tambah-edit").validate({
            submitHandler: function (form) {
                var actionType = $('#tombol-simpan').val();
                $('#tombol-simpan').html('Sending..');

                $.ajax({
                    data: $('#form-tambah-edit')
                        .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                    url: "{{ route('pegawai.store') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    success: function (data) { //jika berhasil 
                        $('#form-tambah-edit').trigger("reset"); //form reset
                        $('#tambah-edit-modal').modal('hide'); //modal hide
                        $('#tombol-simpan').html('Simpan'); //tombol simpan
                        var oTable = $('#table_pegawai').dataTable(); //inialisasi datatable
                        oTable.fnDraw(false); //reset datatable
                        iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                            title: 'Data Berhasil Disimpan',
                            message: '{{ Session('
                            success ')}}',
                            position: 'bottomRight'
                        });
                    },
                    error: function (data) { //jika error tampilkan error pada console
                        console.log('Error:', data);
                        $('#tombol-simpan').html('Simpan');
                    }
                });
            }
        })
    }

    //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
    //ketika class edit-post yang ada pada tag body di klik maka
    $('body').on('click', '.edit-post', function () {
        var data_id = $(this).data('id');
        $.get('pegawai/' + data_id + '/edit', function (data) {
            $('#modal-judul').html("Edit Post");
            $('#tombol-simpan').val("edit-post");
            $('#tambah-edit-modal').modal('show');

            //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
            $('#id').val(data.id);
            $('#nama_pegawai').val(data.nama_pegawai);
            $('#jenis_kelamin').val(data.jenis_kelamin);
            $('#email').val(data.email);
            $('#alamat').val(data.alamat);
        })
    });

    //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
    $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#konfirmasi-modal').modal('show');
    });

    //jika tombol hapus pada modal konfirmasi di klik maka
    $('#tombol-hapus').click(function () {
        $.ajax({

            url: "pegawai/" + dataId, //eksekusi ajax ke url ini
            type: 'delete',
            beforeSend: function () {
                $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
            },
            success: function (data) { //jika sukses
                setTimeout(function () {
                    $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                    var oTable = $('#table_pegawai').dataTable();
                    oTable.fnDraw(false); //reset datatable
                });
                iziToast.warning({ //tampilkan izitoast warning
                    title: 'Data Berhasil Dihapus',
                    message: '{{ Session('
                    delete ')}}',
                    position: 'bottomRight'
                });
            }
        })
    });

</script>

<!-- JAVASCRIPT -->
@endsection
