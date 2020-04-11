@extends('backend.stisla.global')
@section("title") Edit Post @endsection
@section("sub_title")Post @endsection
@section('styles')
<!-- CSS Libraries -->
<link rel="stylesheet" href="/assets/stisla/modules/summernote/summernote-bs4.css">
<link rel="stylesheet" href="/assets/stisla/modules/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/assets/stisla/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="/assets/stisla/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="/assets/stisla/modules/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="/assets/stisla/modules/jquery-selectric/selectric.css">
@endsection
@section('content')
<div class="section-body">
    
    
</div>

@section('footer-scripts')
<script src="/assets/stisla/modules/summernote/summernote-bs4.js"></script>
<script src="/assets/stisla/modules/select2/dist/js/select2.full.min.js"></script>
<script src="/assets/stisla/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="/assets/stisla/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script><script src="/assets/stisla/modules/cleave-js/dist/cleave.min.js"></script><script src="/assets/stisla/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/assets/stisla/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="/assets/stisla/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="/assets/stisla/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Page Specific JS File -->
<script src="/assets/stisla/js/page/features-post-create.js"></script>
{{-- <script src="/assets/stisla/js/page/forms-advanced-forms.js"></script> --}}

@include('backend.posts.script')
@endsection
@endsection
