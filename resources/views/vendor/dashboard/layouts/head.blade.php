<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>
        @yield('title')
    </title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.nice-number.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.calendar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/add_row_custon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/mobile_menu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.exzoom.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/multiple-image-video.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/ranger_style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.classycountdown.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/summernote/summernote-bs4.css')}}">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
{{--    <script>--}}
{{--        const USER = {--}}
{{--            id: "{{ auth()->user()->id }}",--}}
{{--            name: "{{ auth()->user()->nmae }}",--}}
{{--            image: "{{ asset(auth()->user()->image) }}"--}}
{{--        }--}}
{{--        const PUSHER = {--}}
{{--            key: "{{ $pusherSetting->pusher_key }}",--}}
{{--            cluster: "{{ $pusherSetting->pusher_cluster }}"--}}
{{--        }--}}
{{--    </script>--}}
{{--    @vite(['resources/js/app.js', 'resources/js/frontend.js'])--}}
</head>
