<!--jquery library js-->
<script src="{{asset('Frontend/js/jquery-3.6.0.min.js')}}"></script>
<!--bootstrap js-->
<script src="{{asset('Frontend/js/bootstrap.bundle.min.js')}}"></script>
<!--font-awesome js-->
<script src="{{asset('Frontend/js/Font-Awesome.js')}}"></script>
<!--select2 js-->
<script src="{{asset('Frontend/js/select2.min.js')}}"></script>
<!--slick slider js-->
<script src="{{asset('Frontend/js/slick.min.js')}}"></script>
<!--simplyCountdown js-->
<script src="{{asset('Frontend/js/simplyCountdown.js')}}"></script>
<!--product zoomer js-->
<script src="{{asset('Frontend/js/jquery.exzoom.js')}}"></script>
<!--nice-number js-->
<script src="{{asset('Frontend/js/jquery.nice-number.min.js')}}"></script>
<!--counter js-->
<script src="{{asset('Frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('Frontend/js/jquery.countup.min.js')}}"></script>
<!--add row js-->
<script src="{{asset('Frontend/js/add_row_custon.js')}}"></script>
<!--multiple-image-video js-->
<script src="{{asset('Frontend/js/multiple-image-video.js')}}"></script>
<!--sticky sidebar js-->
<script src="{{asset('Frontend/js/sticky_sidebar.js')}}"></script>
<!--price ranger js-->
<script src="{{asset('Frontend/js/ranger_jquery-ui.min.js')}}"></script>
<script src="{{asset('Frontend/js/ranger_slider.js')}}"></script>
<!--isotope js-->
<script src="{{asset('Frontend/js/isotope.pkgd.min.js')}}"></script>
<!--venobox js-->
<script src="{{asset('Frontend/js/venobox.min.js')}}"></script>
<!--classycountdown js-->
<script src="{{asset('Frontend/js/jquery.classycountdown.js')}}"></script>

<script src="{{asset('Backend/assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="{{asset('Backend/assets/modules/moment.min.js')}}"></script>
<script src="{{asset('Backend/assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!--main/custom js-->
<script src="{{asset('Frontend/js/main.js')}}"></script>

<script>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{$error}}")
    @endforeach
    @endif
</script>

<script>
    /** summernote **/
    $('.summernote').summernote({
        height:150
    })

    /** date picker **/
    $('.datepicker').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        },
        singleDatePicker: true
    });
</script>

<!-- Dynamic Delete alart -->

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
