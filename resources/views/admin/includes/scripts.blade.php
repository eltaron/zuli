  <!--   Core JS Files   -->
  <script src="{{ env('APP_URL') . asset('admin_files/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ env('APP_URL') . asset('admin_files/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ env('APP_URL') . asset('admin_files/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ env('APP_URL') . asset('admin_files/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
          var options = {
              damping: '0.5'
          }
          Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
  </script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ env('APP_URL') . asset('admin_files/assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
  <script>
      function deleteItem(id) {
          item_id_delete.value = id;
      }

      function editItem(id) {
          item_id_edit.value = id;
      }
  </script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
  <script>
      new DataTable("#example");
  </script>
  @stack('script')
  </body>

  </html>
