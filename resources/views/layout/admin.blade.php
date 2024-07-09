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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/vendor/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="/rocker/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="/rocker/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="/rocker/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="/rocker/css/bootstrap-extended.css" rel="stylesheet">
	<link href="/rocker/css/app.css" rel="stylesheet">
	<link href="/css/custom.css" rel="stylesheet">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>
<body>
    <div class="wrapper">

        @include('partials.adminnav')

        <div class="page-wrapper">
            <div class="page-content">

            @yield('container')

            </div>
        </div>
        <div class="overlay toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
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
    <script src="/rocker/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="/rocker/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="/rocker/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="/rocker/js/app.js"></script>
    
    @include('sweetalert::alert')

    <script>
        $(document).ready(function() {
            document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            });

            $('.select2-bootstrap4').select2({
                theme: 'bootstrap4',
            });

            // $("#tgl").datepicker({
            //     format: 'yyyy-mm-dd',
            //     autoclose: true,
            //     todayHighlight: true,
            //     language : 'id'
            // });

            $('#pasbaru').click(function() {
                $('#status').val('Belum Terdaftar');
                $('#tgl').val('').prop('readonly', false);
                $('#bln').val('').prop('readonly', false);
                $('#thn').val('').prop('readonly', false);
                $('#namakk').val('').prop('readonly', false);
                $('#nomr').val('').prop('readonly', false);
                $('#nik').val('').prop('readonly', false);
                $('#jekel').val('0').change().prop('disabled', false);
                $('#pekerjaan').val('').prop('readonly', false);
                $('#alamat').val('').prop('readonly', false);
                $('#nohp').val('').prop('readonly', false);
            });

            $('#poli').change(function() {
                var poli = $(this).val();
                $.ajax({
                    url: `/noantri/${poli}`,
                    type: 'GET',
                    success: function(response) {
                        var prefix = poli.substring(0, 2).toUpperCase();
                        var newRegNumber;
                        console.log(prefix);

                        if (response.noantrian) {
                            // Extract the numeric part
                            var number = parseInt(response.noantrian.substring(2));

                            // Increment the numeric part
                            var incrementedNumber = number + 1;

                            // Format the new number with leading zeros if necessary (assuming 3 digits)
                            newRegNumber = prefix + String(incrementedNumber).padStart(3, '0');
                        } else {
                            // Start from 001 if no registration numbers exist
                            newRegNumber = prefix + '001';
                        }
                        $('#noantrian').val(newRegNumber);
                    },
                    error: function(xhr) {
                        $('#noantrian').val('Error');
                    }
                });
            });

            $('#rujukIntern').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Extract info from data-* attributes

                // Construct the action URL using the named route
                var actionUrl = "{{ route('admin.pendaftaran.update', ['pendaftaran' => ':id']) }}";
                actionUrl = actionUrl.replace(':id', id);

                $('#updateRujukIntern').attr('action', actionUrl);
            });

            $('#caripasien').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('caripasien') }}",
                        data: {
                            term: request.term
                        },
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    $.ajax({
                        url: `/getpasien/${ui.item.idpas}`,
                        dataType: "json",
                        success: function(data) {
                            // Populate the input fields
                            $('#namakk').val(data.namakk).prop('readonly', true);
                            $('#nomr').val(data.nomr).prop('readonly', true);
                            $('#nik').val(data.nik).prop('readonly', true);

                            let birthdate = new Date(data.tgl);
                            let day = birthdate.getDate();
                            let month = birthdate.getMonth() + 1; // Months are zero-indexed
                            let year = birthdate.getFullYear();
                            $('#tgl').val(day).prop('readonly', true);
                            $('#bln').val(month).prop('readonly', true);
                            $('#thn').val(year).prop('readonly', true);

                            $('#jekel').val(data.jekel).change().prop('disabled', true);
                            $('#pekerjaan').val(data.pekerjaan).prop('readonly', true);
                            $('#alamat').val(data.alamat).prop('readonly', true);
                            $('#nohp').val(data.nohp).prop('readonly', true);
                            $('#status').val('Terdaftar');
                        },
                        error: function() {
                            alert('User data could not be retrieved.');
                        }
                    });
                }
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

            $(".hapusDataM").click(function (event) {
                var form =  $(this).closest("form");
                event.preventDefault();
                Swal.fire({
                    title: 'Hapus data?',
                    text: "data yang sudah dihapus tidak akan bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#004A99',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            $(".setSuperAdmin").click(function (event) {
                var form =  $(this).closest("form");
                event.preventDefault();
                Swal.fire({
                    title: 'Akses Super Admin?',
                    html: "Berikan akses super admin pada user ini?<br>user akan dapat mengoperasikan seluruh fitur yang terdapat pada Akses Super Admin!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#004A99',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Beri Akses',
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