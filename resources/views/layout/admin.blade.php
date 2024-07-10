<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="description" content="-">
    <meta name="keywords" content="- Kota Sungai Penuh">
    <meta name="author" content="Pemerintah Kota Sungai Penuh">

    <link rel="icon" href="/img/tablogo.png">
    <title>{{ $title }}</title>

    <!-- Vendor CSS STYLE -->
    <link rel="stylesheet" href="/modernize/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/vendor/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

        @include('partials.adminnav')

        <div class="body-wrapper">

            @include('partials.header')

            @yield('container')

        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    
    @include('sweetalert::alert')

    <script>
        $(document).ready(function() {
            document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            });

            $('.select2-bootstrap4').select2({
                theme: 'bootstrap4',
            });

            $('.datatable').DataTable({
                pageLength : 10,
                lengthMenu: [[10, 20, 30], [10, 20, 30]],
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': false,
                'info': false,
                'autoWidth': true,
                "language":{
                    "url":"https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json",
                    "sEmptyTable":"Tidak ada data."
                }
            });

            $(".setVerified").click(function (event) {
                var form =  $(this).closest("form");
                event.preventDefault();
                Swal.fire({
                    title: 'Verifikasi UKM?',
                    html: "UKM akan diverifikasi!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#004A99',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Verifikasi',
                    cancelButtonText: 'Batalkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            $(".setRejected").click(function (event) {
                var form =  $(this).closest("form");
                event.preventDefault();
                Swal.fire({
                    title: 'Tolak UKM?',
                    html: "UKM akan ditolak!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#004A99',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Tolak',
                    cancelButtonText: 'Batalkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            $(".hapusProduk").click(function (event) {
                var form =  $(this).closest("form");
                event.preventDefault();
                Swal.fire({
                    title: 'Hapus produk?',
                    html: "Data produk akan dihapus!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#004A99',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batalkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

        });
    </script>

</body>
</html>