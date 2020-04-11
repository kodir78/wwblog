@extends('backend.stisla.global')
@section("title") Data Pegawai @endsection
@section("sub_title")Pegawai @endsection
@section('styles')
<!-- Start styles Libraies -->
<link rel="stylesheet" href="{{ asset('public/assets/stisla/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/stisla/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<!-- Start styles Libraies -->
@endsection
@section('content')
<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <a href="javascript:void(0)" class="btn btn-info" id="tombol-tambah">Tambah PEGAWAI</a>
                <br><br>
            <table class="table table-striped table-bordered table-sm" id="table_pegawai">
              <thead>                                 
                <tr>
                  <th><b>Name</b></th>
                  <th><b>Gender</b></th>
                  <th><b>Email</b></th>
                  <th><b>Address</b></th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- MULAI MODAL FORM TAMBAH/EDIT-->
<div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modal-judul"></h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                  <div class="row">
                      <div class="col-sm-12">

                          <input type="hidden" name="id" id="id">

                          <div class="form-group">
                              <label for="name" class="col-sm-12 control-label">Nama Pegawai</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                                      value="" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="name" class="col-sm-12 control-label">Jenis Kelamin</label>
                              <div class="col-sm-12">
                                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control required">
                                      <option value="">Pilih Jenis Kelamin</option>
                                      <option value="Laki-laki">Laki-laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="name" class="col-sm-12 control-label">E-mail</label>
                              <div class="col-sm-12">
                                  <input type="email" class="form-control" id="email" name="email" value=""
                                      required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="name" class="col-sm-12 control-label">Alamat</label>
                              <div class="col-sm-12">
                                  <textarea class="form-control" name="alamat" id="alamat" required></textarea>
                              </div>
                          </div>

                      </div>

                      <div class="col-sm-offset-2 col-sm-12">
                          <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                              value="create">Simpan
                          </button>
                      </div>
                  </div>

              </form>
          </div>
          <div class="modal-footer">
          </div>
      </div>
  </div>
</div>
<!-- AKHIR MODAL -->
<!-- Start JS Libraies footer-scripts  -->
@section('footer-scripts')
<!-- Start Libraies Datatables  -->
<script src="{{ asset('public/assets/stisla/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('public/assets/stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/stisla/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
{{-- <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script> --}}

<!-- Page Specific JS File -->
{{-- <script src="assets/js/page/modules-datatables.js"></script> --}}

<!-- Script Datatables -->
<script> 
//TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
        $('#tombol-tambah').click(function () {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Pegawai Baru"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });
  var table = $('#table_pegawai').DataTable({
    pageLength: 10,
    processing: true,
    serverSide: true,
    ajax: "{{ route ('pegawai.index') }}",
    columns: [
            {"data":"name"},
            {"data":"gender"},
            {"data":"email"},
            {"data":"address"},
            {"data":"action"},
          ],
          order: [
                    [0, 'asc']
                ]
      });
</script>
@endsection
<!-- End JS Libraies footer-scripts -->
@endsection
