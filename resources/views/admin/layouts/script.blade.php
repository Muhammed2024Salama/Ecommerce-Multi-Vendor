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
<script  src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- Start JS yajra DataTable https://datatables.net/ --}}
<script src="//cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
{{-- End JS yajra DataTable https://datatables.net/ --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

{{--Dynamic Delete alert --}}
<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('body').on('click', '.delete-item', function(event){
            event.preventDefault();

            let deleteUrl = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,

                        success: function(data){

                            if(data.status == 'success'){
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'success'
                                )
                                window.location.reload();
                            }else if (data.status == 'error'){
                                Swal.fire(
                                    'Cant Delete',
                                    data.message,
                                    'error'
                                )
                            }
                        },
                        error: function(xhr, status, error){
                            console.log(error);
                        }
                    })
                }
            })
        })

    })

</script>



@stack('scripts')
{{-- End Validation Script By Toastr --}}
