<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.head')

<body>

<!--============================
    HEADER START
==============================-->

@include('frontend.layouts.header')

<!--============================
    HEADER END
==============================-->


<!--============================
    MAIN MENU START
==============================-->

@include('frontend.layouts.menu')

<!--============================
    MAIN MENU END
==============================-->


<!--============================
    MOBILE MENU START
==============================-->

@include('frontend.layouts.mobile-menu')

<!--============================
    MOBILE MENU END
==============================-->


<!--==========================
    POP UP START
===========================-->
<!-- <section id="wsus__pop_up">
    <div class="wsus__pop_up_center">
        <div class="wsus__pop_up_text">
            <span id="cross"><i class="fas fa-times"></i></span>
            <h5>get up to <span>75% off</span></h5>
            <h2>Sign up to E-SHOP</h2>
            <p>Subscribe to the <b>E-SHOP</b> market newsletter to receive updates on special offers.</p>
            <form>
                <input type="email" placeholder="Your Email" class="news_input">
                <button type="submit" class="common_btn">go</button>
                <div class="wsus__pop_up_check_box">
                </div>
            </form>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                <label class="form-check-label" for="flexCheckDefault11">
                    Don't show this popup again
                </label>
            </div>
        </div>
    </div>
</section> -->
<!--==========================
    POP UP END
===========================-->


<!--============================
    Main Content START
==============================-->

@yield('content')

<!--============================
    Main Content End
==============================-->

<!--============================
    FOOTER PART START
==============================-->

@include('frontend.layouts.footer')

<!--============================
    FOOTER PART END
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

<!--============================
     Script PART START
==============================-->

@include('frontend.layouts.script')

<!--============================
     Script PART End
==============================-->

</body>

</html>
