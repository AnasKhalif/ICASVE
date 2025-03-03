<!-- plugins:js -->
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/dataTables.select.min.js') }}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->
@vite(['resources/js/app.js'])

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (window.Swal && "{{ session('type') }}" && "{{ session('message') }}") {
            Swal.fire({
                icon: "{{ session('type') }}",
                title: "{{ session('type') }}" === "success" ? "Success!" :
                    "{{ session('type') }}" === "error" ? "Error!" : "{{ session('type') }}" ===
                    "warning" ? "Warning!" : "Info",
                text: "{{ session('message') }}",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            });
        }
    });


    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".btn-delete").forEach(button => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                let form = this.closest("form");

                Swal.fire({
                    title: "Are you sure?",
                    text: "This data will be permanently deleted!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
