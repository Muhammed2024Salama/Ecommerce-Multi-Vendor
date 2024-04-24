<!--jquery library js-->
<script src="{{ asset('Frontend/js/jquery-3.6.0.min.js') }}"></script>
<!--bootstrap js-->
<script src="{{ asset('Frontend/js/bootstrap.bundle.min.js') }}"></script>
<!--font-awesome js-->
<script src="{{ asset('Frontend/js/Font-Awesome.js') }}"></script>
<!--select2 js-->
<script src="{{ asset('Frontend/js/select2.min.js') }}"></script>
<!--slick slider js-->
<script src="{{ asset('Frontend/js/slick.min.js') }}"></script>
<!--simplyCountdown js-->
<script src="{{ asset('Frontend/js/simplyCountdown.js') }}"></script>
<!--product zoomer js-->
<script src="{{ asset('Frontend/js/jquery.exzoom.js') }}"></script>
<!--nice-number js-->
<script src="{{ asset('Frontend/js/jquery.nice-number.min.js') }}"></script>
<!--counter js-->
<script src="{{ asset('Frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('Frontend/js/jquery.countup.min.js') }}"></script>
<!--add row js-->
<script src="{{ asset('Frontend/js/add_row_custon.js') }}"></script>
<!--multiple-image-video js-->
<script src="{{ asset('Frontend/js/multiple-image-video.js') }}"></script>
<!--sticky sidebar js-->
<script src="{{ asset('Frontend/js/sticky_sidebar.js') }}"></script>
<!--price ranger js-->
<script src="{{ asset('Frontend/js/ranger_jquery-ui.min.js') }}"></script>
<script src="{{ asset('Frontend/js/ranger_slider.js') }}"></script>
<!--isotope js-->
<script src="{{ asset('Frontend/js/isotope.pkgd.min.js') }}"></script>
<!--venobox js-->
<script src="{{ asset('Frontend/js/venobox.min.js') }}"></script>
<!--toastr js-->
<script  href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!--classycountdown js-->
<script src="{{ asset('Frontend/js/jquery.classycountdown.js') }}"></script>

<!--main/custom js-->
<script src="{{ asset('Frontend/js/main.js') }}"></script>

{{--Validation Script By Toastr --}}
<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            @php
                toastr()->error($error)
            @endphp
        @endforeach
    @endif
</script>
{{-- End Validation Script By Toastr --}}
