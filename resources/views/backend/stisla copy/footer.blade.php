<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2020 <div class="bullet"></div> Template <strong>  Satisla </strong> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a> - Coding with <a href="https://zaelani.id/">Kodir Zaelani</a>
  </div>
  <div class="footer-right">
    
  </div>
</footer>
</div>
<!-- General JS Scripts -->
<script src="{{ asset('public/assets/stisla/modules/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/stisla/modules/popper.js') }}"></script>
<script src="{{ asset('public/assets/stisla/modules/tooltip.js') }}"></script>
<script src="{{ asset('public/assets/stisla/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/stisla/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('public/assets/stisla/modules/moment.min.js') }}"></script>
<script src="{{ asset('public/assets/stisla/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('public/assets/stisla/modules/select2/dist/js/select2.full.min.js') }}"></script>

@yield('footer-scripts')

<!-- Template JS File -->
<script src="{{ asset('public/assets/stisla/js/scripts.js') }}"></script>
<script src="{{ asset('public/assets/stisla/js/custom.js') }}"></script>
@include('sweetalert::alert')
</body>
</html>