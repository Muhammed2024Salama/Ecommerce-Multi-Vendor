<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>
        @yield('title')
    </title>
    <link rel="icon" type="image/png" href="{{ route('Frontend/images/favicon.png') }}">
    <link rel="stylesheet" href="{{asset('Frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/jquery.nice-number.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/jquery.calendar.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/add_row_custon.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/mobile_menu.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/jquery.exzoom.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/multiple-image-video.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/ranger_style.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/jquery.classycountdown.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/assets/modules/summernote/summernote-bs4.css')}}">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('Backend/assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{asset('Frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/responsive.css')}}">
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
    <script>
        const USER = {
            id: "{{ auth()->user()->id }}",
            name: "{{ auth()->user()->nmae }}",
            image: "{{ asset(auth()->user()->image) }}"
        }
        const PUSHER = {
            key: "{{ $pusherSetting->pusher_key }}",
            cluster: "{{ $pusherSetting->pusher_cluster }}"
        }
    </script>
    @vite(['resources/js/app.js', 'resources/js/frontend.js'])
</head>
