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
            <p
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
            </p>
            <div class="login-form row justify-content-center p-1">
            
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
                    <p class="login-heading ms-2 mb-0">LOG IN</p>
                    
                </div>
                <form action="{{url('login')}}" method="POST" id="LoginForm">
                  @csrf
                  <div class="mb-3 user-name">
                    <input
                      type="text"
                      name="username"
                      placeholder="Enter Username"
                      class="form-control rounded-0 padding-form uname"
                      id="login_username"
                      aria-describedby="emailHelp"
                      autocomplete="off"
                      value="{{old('username')}}"
                    />
                    <span class="text-danger error_username"></span>
                  </div>
                  <div class="mb-3 eye-fill">
                    <input
                      type="password"
                      name="password"
                      placeholder="Enter Password"
                      class="form-control padding-form rounded-0 hide-password"
                      id="login_password"
                      autocomplete="off"
                    />
                    <span class="text-danger error_password"></span>
                    <a href="javascript:void(0)">
                    <img src="{{asset('public/front/themes/images/login/eye.png')}}" class="eye eye-icon" alt="">
                    </a>
                  </div>
                  <h2 class="my-4"><span>OR</span></h2>
                  <div class="mb-3">
                    <input
                      type="text"
                      placeholder="Enter Mobile Number"
                      class="form-control padding-form rounded-0 allownumericwithoutdecimal"
                      name="mobile_no"
                      id="login_mobile_no"
                      autocomplete="off"
                    />
                    <span class="text-danger error_mobile_no"></span>
                  </div>
                  <button type="submit" class="btn login-btn w-100 p-3">
                    LOG IN
                  </button>
                </form>
              </div>
            </div>
            <a
              href="http://192.168.23.254:8000/#/forgot-password"
              class="forgot text-center mt-3 d-block text-decoration-underline"
            >
              Forgot your password?</a
            >
          </div>

          <!-- <div class="col-6">asdas</div> -->
        </div>
      </div>
    </div>
    <script src="{{asset('public/front/themes/js/jquery-3.4.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    <script>
        $(document).on("keypress keyup blur", '.allownumericwithoutdecimal', function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        $(document).on('keyup','#login_mobile_no',function(){
          $('#login_username').val("");
          $('#login_password').val("");
          $('.error_password').text(''); 
          $('.error_username').text('');
         })
        $(document).on('keyup','#login_username',function(){
          $('#login_mobile_no').val("");
          $('.mobile_no').text("");
        })
        $(document).on('keyup','#login_password',function(){
          $('#login_mobile_no').val("");
          $('.mobile_no').text("");
        })



        $(document).on('click','.eye-icon', function(){
            $(this).toggleClass('active-eye');

        if ($('#login_password').hasClass('hide-password')){
            $('#login_password').attr('type','text');
            $('#login_password').removeClass('hide-password');
            
        }else{
            $('#login_password').attr('type','password');
            $('#login_password').addClass('hide-password');
        }
        
    });
    function encryptionAES(plainText) {
      let enc_Key = '7739826323491690';
      let ency_iv = '7739826323491690';
    let _key = CryptoJS.enc.Utf8.parse(enc_Key);
    let _iv = CryptoJS.enc.Utf8.parse(ency_iv);
    let encrypted = CryptoJS.AES.encrypt(CryptoJS.enc.Utf8.parse(plainText), _key, {
      keySize: 128 / 8,
      iv: _iv,
      mode: CryptoJS.mode.CBC,
      padding: CryptoJS.pad.Pkcs7
    }).toString();
    return encrypted
  }
  
  $(document).on('submit','#LoginForm',function(){

    if($('#login_username').val() == '' && $('#login_mobile_no').val() == ''){
          $('.error_password').text(''); 
          $('.error_mobile_no').text('');
           $('.error_username').text('Enter username.');
           $('#login_username').focus();
           return false;
    }else if($('#login_username').val() != '' &&   $('#login_password').val() == '' &&   $('#login_mobile_no').val() == ''){
           $('.error_password').text('Enter password.'); 
           $('.error_username').text(''); 
           $('.error_mobile_no').text('');
           $('#login_password').focus();
           return false; 
    }else if($('#login_username').val() == '' && $('#login_password').val() == '' && $('#login_mobile_no').val() != ''){
        var filter = /^[0-9-+]+$/;
      if (!filter.test($('#login_mobile_no').val())) {
        $('.error_password').text(''); 
        $('.error_username').text(''); 
        $('.error_mobile_no').text('Please enter a valid phone number.');
        $('#login_mobile_no').focus();
        return false;
      }
           $('.error_password').text(''); 
           $('.error_username').text(''); 
           $('.error_mobile_no').text(''); 
    }else{
      $('#login_password').attr('type','password');
      let password = encryptionAES($('#login_password').val());
      $('#login_password').val(password);
    }

    
    
  });
    </script>
  </body>
</html>
