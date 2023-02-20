    <script src="{{asset('public/front/themes/js/jquery-3.4.1.min.js')}}"></script>

    <script src="{{asset('public/front/themes/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/front/themes/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/front/themes/js/gijgo.min.js')}}"></script>
    <script src="{{asset('public/front/js/plugin/sweet-alert2.js')}}"></script>
   <script src="{{asset('public/front/themes/js/custom.js')}}"></script>
   <script src="{{asset('public/front/js/plugin/jquery-ui.js')}}"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script>

//     var login_expire_time = "{{(Session::get('login_expire_time')*1 - time())*1 - 120}}";
//     // console.log(login_expire_time);
// function secondsToHms(d) {
//   d = Number(d);
//   // const h = Math.floor(d / 3600);
//   const m = Math.floor(d % 3600 / 60);
//   const s = Math.floor(d % 3600 % 60);
//   // const hDisplay = h > 0 ? h : "";
//   const mDisplay = m > 0 ? m : "0";
//   const sDisplay = (s > 0 && s <= 9) ? "0" + s : ((s > 9) ? s : "00");
//   return mDisplay + ':' + sDisplay;
// }

//         function secondsToHms(d) {
//             d = Number(d);
//             // const h = Math.floor(d / 3600);
//             const m = Math.floor(d % 3600 / 60);
//             const s = Math.floor(d % 3600 % 60);
//             // const hDisplay = h > 0 ? h : "";
//             const mDisplay = m > 0 ? m : "0";
//             const sDisplay = (s > 0 && s <= 9) ? "0" + s : ((s > 9) ? s : "00");
//             return mDisplay + ':' + sDisplay;
//         }

//         $(document).ready(function() {
//             let seconds = login_expire_time;
//             let resendOtpInterval = setInterval(() => {
//               if(seconds == 5*60) {
//                 // console.log('second if-' + seconds);
//                 // swal('You are about to logout, Please save your work!!');
//                 // clearInterval(resendOtpInterval);
//                }
//                if(seconds <= -1){
//                 // console.log('second else if-' + seconds);
//                 // console.log("if");

//             //   swal("Message",'Please Login Again..', "error")
//             //   .then(() => {
//             //     $('#logout-form').submit();
//               });
//           clearInterval(resendOtpInterval);
//              }else {
// 			          // console.log(seconds);
// 			           seconds--;
//             }
//             }, 1000);
//         });
    </script>
    @yield('page_specific_js')
