<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Website UMKM Kota Sungai Penuh">
    <meta name="keywords" content="UMKM kota sungai penuh">
    <meta name="author" content="Pemerintah Kota Sungai Penuh">

    <link rel="icon" href="/img/tablogo.webp">
    <title>{{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/vendor/animated-text/animated-text.css">
    <link rel="stylesheet" href="/vendor/aos/aos.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/news-ticker.css">
    <link rel="stylesheet" href="/vendor/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>
<body id="page-top">

    @include('partials.mainheader')
    
    <div class="row custom-container">
        @yield('container')
    </div>
    
    @include('partials.footer')

    {{-- @if(request()->segment(1) != 'login' && request()->segment(1) != 'daftar' && request()->segment(1) != 'daftaradmin')
        @include('partials.mainheader')
    @endif

    @yield('container')
    @if(request()->segment(1) != 'login' && request()->segment(1) != 'daftar' && request()->segment(1) != 'daftaradmin')
        @include('home.contact')
        
    @endif
    @include('partials.footer') --}}
    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="/vendor/datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="/vendor/aos/aos.js"></script>
    <script src="/vendor/marquee/jquery.marquee.min.js" type="text/javascript"></script>
    <script src="/vendor/animated-text/animated-text.js"></script>
    <script src="/js/main.js"></script>
    
    @include('sweetalert::alert')

    <script>
        $(document).ready(function() {
            document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            });

            $('.select2-bootstrap4').select2({
                theme: 'bootstrap4',
            });

            $("#datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                language : 'id'
            });

            $('#kecamatan_id').on('change', function() {
                var selectedValue = $(this).val();
                console.log(selectedValue);
                $.ajax({
                    url: `/getdesa/${selectedValue}`,
                    dataType: "json",
                    success: function(data) {
                        // Clear existing options in desa_id select element
                        var desaSelect = $('#desa_id');
                        desaSelect.empty();
                        desaSelect.append('<option value="0" selected>Pilih</option>');

                        // Populate new options
                        $.each(data, function(index, item) {
                            desaSelect.append(new Option(item.desa, item.id));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching desa data:', error);
                    }
                });
            });
        });
    </script>
</body>
</html>