<!-- General JS Scripts -->
<script src="{{ asset('Backend/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('Backend/assets/modules/popper.js') }}"></script>
<script src="{{ asset('Backend/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('Backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('Backend/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('Backend/assets/js/stisla.j') }}s"></script>

<!-- JS Libraies -->
<script src="{{ asset('Backend/assets/modules/simple-weather/jquery.simpleWeather.min.j') }}s"></script>
<script src="{{ asset('Backend/assets/modules/chart.min.js') }}"></script>
<script src="{{ asset('Backend/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('Backend/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('Backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('Backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script  href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('Backend/assets/js/page/index-0.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('Backend/assets/js/scripts.js') }}"></script>
<script src="{{ asset('Backend/assets/js/custom.js') }}"></script>

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
