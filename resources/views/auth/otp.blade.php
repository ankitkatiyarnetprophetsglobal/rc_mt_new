<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="{{asset('public/front/themes/images/favicon.png')}}" />
    <title>RC Monitoring</title>
    <link rel="stylesheet" href="{{asset('public/front/themes/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/front/themes/css/gijgo.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/front/themes/css/fontawesome-all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/front/themes/css/icomoon.css')}}" />
    <link rel="stylesheet" href="{{asset('public/front/themes/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/front/themes/css/dashboard.css')}}" />

    <style>
      html body {
        background: #f6f9ff;
      }
    </style>
  </head>
  <body>
    <!-- Login Form -->
    <div class="login">
      <div class="container">
        <div class="row form justify-content-center align-items-md-center align-items-start pt-md-0 pt-4">
          <div class="col-12">
            <img
              src="{{asset('public/front/themes/images/login/nsrs.svg')}}"
              class="img-fluid d-block m-auto"
              alt=""
            />
            <!-- <p
              class="my-3 text-center"
              style="
                font-size: 21px;
                line-height: 39px;
                font-weight: 500;
                color: white;
                text-transform: uppercase;
              "
            >
              WELCOME BACK!
            </p> -->
            <div class="login-form row justify-content-center p-1 mt-4">
              <div class="col-lg-6 col-md-9 col-12 bg-white p-5">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{ Session::get('message') }}
                    </div>
                     @endif
                     @if (Session::has('error_message'))
                    <div class="alert alert-danger">
                        <strong>Error!</strong> {{ Session::get('error_message') }}
                    </div>
                    @endif
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <img src="{{asset('public/front/themes/images/login/user.png')}}"  height="24px" width="24px" alt="">
                    <p class="login-heading ms-2 mb-0">ENTER OTP</p>
                </div>
                <form action="{{route('verfyOtp')}}" method="POST" id="otp_form">
                    @csrf
                <div class="mb-3">
                    <input
                      type="text"
                      name ="otp"
                      placeholder="Enter OTP"
                      class="form-control p-3 rounded-0 allownumericwithoutdecimal"
                      id="login_otp"
                    />
                    <span class="text-danger error_otp"></span>
                  </div>
                  <div class="mb-3 d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight:400;">
                    <div class="time resend_time"></div>
                    <div class="resend-otp " ><button disabled type="button" style="color: #F18020; border:0px; background:transparent;" class="resend_otp_btn">{{__('Resend OTP')}} </button></div>
                  </div>
                  <button type="submit" class="btn login-btn w-100 p-3">
                    SUBMIT
                  </button>
                </form>
                <form id="resend_otp" action="{{ route('resendOtp') }}" method="POST" class="d-none">
                  @csrf
               </form>
              </div>
            </div>
            <span></span>
            <div class="forgot text-center mt-3 d-block "><span class="text-decoration-none">Did you remembered your password?</span><a href="javascript::void(0)" class="text-decoration-underline forgot "> Try log in</a></div>
          </div>
          <!-- <a href="#"  class="forgot text-center mt-3 d-block text-decoration-underline" >Try log in</a> -->
          <!-- <div class="col-6">asdas</div> -->
        </div>
      </div>
    </div>
    <script src="{{asset('public/front/themes/js/jquery-3.4.1.min.js')}}"></script>
    <script>
        $(document).on("keypress keyup blur", '.allownumericwithoutdecimal', function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        $('#otp_form').on('submit',function(){
            if($('#login_otp').val() == ''){
             $('.error_otp').text('Please enter your OTP.');
             return false;  
            }
            $('.error_otp').text('');
        });

        function secondsToHms(d) {
  d = Number(d);
  // const h = Math.floor(d / 3600);
  const m = Math.floor(d % 3600 / 60);
  const s = Math.floor(d % 3600 % 60);
  // const hDisplay = h > 0 ? h : "";
  const mDisplay = m > 0 ? m : "0";
  const sDisplay = (s > 0 && s <= 9) ? "0" + s : ((s > 9) ? s : "00");
  return mDisplay + ':' + sDisplay;
}


        $(document).ready(function(){
          let resendOtp = document.querySelector('.resend_time');
          let resendOtpBtn = document.querySelector('.resend_otp_btn');
              let seconds = 60;
              let resendOtpInterval = setInterval(() => {
              if(seconds == 1) {
                resendOtpBtn.disabled = false;
               $('.resend_otp_btn').addClass('submitform');
               clearInterval(resendOtpInterval);
             } else {
			           resendOtp.innerHTML = secondsToHms(seconds);
			           seconds--;
            }
            }, 1000);
        });
      $(document).on('click','.submitform',function(){
          $('#resend_otp').submit();
      });
    </script>
  </body>
</html>
