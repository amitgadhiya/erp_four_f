<!-- container-scroller -->

  <!-- plugins:js -->

  <script src="{{ asset(Config::get('vars.adminFolder').'/vendors/js/vendor.bundle.base.js')}}"></script>

  <script src="{{ asset(Config::get('vars.adminFolder').'/vendors/js/vendor.bundle.addons.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- endinject -->

  <!-- Plugin js for this page-->

  <!-- End plugin js for this page-->

  <!-- inject:js -->

  <script src="{{ asset(Config::get('vars.adminFolder').'/js/off-canvas.js')}}"></script>
  

  <script src="{{ asset(Config::get('vars.adminFolder').'/js/misc.js') }}"></script>
  
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
</script>
<script>
  $(document).ready(function() {
    
    $('.select2').select2();
});
</script>
  <!-- endinject -->

  <!-- Custom js for this page-->

  <!-- End custom js for this page-->
