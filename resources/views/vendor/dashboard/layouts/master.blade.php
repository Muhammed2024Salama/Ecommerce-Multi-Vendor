<!DOCTYPE html>
<html lang="en">

@include('frontend.dashboard.layouts.head')

<body>


<!--=============================
  DASHBOARD MENU START
==============================-->
<div class="wsus__dashboard_menu">
    <div class="wsusd__dashboard_user">
        <img src="{{ asset('Frontend/images/dashboard_user.jpg') }}" alt="img" class="img-fluid">
        <p>anik roy</p>
    </div>
</div>
<!--=============================
  DASHBOARD MENU END
==============================-->


<!--=============================
  DASHBOARD START
==============================-->

@yield('content')

<!--=============================
  DASHBOARD START
==============================-->


<!--============================
    SCROLL BUTTON START
  ==============================-->
<div class="wsus__scroll_btn">
    <i class="fas fa-chevron-up"></i>
</div>
<!--============================
  SCROLL BUTTON  END
==============================-->


@include('frontend.dashboard.layouts.script')

</body>

</html>
