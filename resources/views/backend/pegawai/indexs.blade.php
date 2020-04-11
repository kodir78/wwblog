@extends('backend.stisla.global')
@section("title") Data Pegawai @endsection
@section("sub_title")Pegawai @endsection
<!-- Start styles Libraies -->
@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/stisla/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/stisla/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" /> --}}
<!-- Start styles Libraies -->
@endsection
@section('content')
<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm" id="table_pegawai">
              <thead>                                 
                <tr>
                  <th><b>Name</b></th>
                  <th><b>Gender</b></th>
                  <th><b>Email</b></th>
                  <th><b>Address</b></th>
                  {{-- <th>Action</th> --}}
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Start JS Libraies footer-scripts  -->
@section('footer-scripts')
{{-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}

<script src="{{ asset('public/assets/stisla/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('public/assets/stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/stisla/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Page Specific JS File -->
<script src="assets/js/page/modules-datatables.js"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script> --}}

{{-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}

{{-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js" integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script> --}}
<script> 
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
    ],
  });
</script>
@endsection
<!-- End JS Libraies footer-scripts -->
@endsection
