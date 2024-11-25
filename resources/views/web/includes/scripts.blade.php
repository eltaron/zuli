<script src="{{ env('APP_URL') }}web_files/js/jquery-3.6.4.min.js"></script>
<script src="{{ env('APP_URL') }}web_files/datatables/jquery.dataTables.js"></script>
<script src="{{ env('APP_URL') }}web_files/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ env('APP_URL') }}web_files/js/bootstrap.bundle.min.js"></script>
{{-- <script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });

    document.onkeydown = function(e) {
        // Disable F12, Ctrl+Shift+I, Ctrl+Shift+J, and Ctrl+U
        if (
            e.keyCode == 123 ||
            (e.ctrlKey && e.shiftKey && e.keyCode == 73) || // Ctrl+Shift+I
            (e.ctrlKey && e.shiftKey && e.keyCode == 74) || // Ctrl+Shift+J
            (e.ctrlKey && e.keyCode == 85) // Ctrl+U
        ) {
            return false;
        }
    };
</script> --}}
@stack('scripts')
</body>

</html>
