<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="robots" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="W3Admin:Dashboard Bootstrap 5 Template">
        <meta property="og:title" content="W3Admin:Dashboard Bootstrap 5 Template">
        <meta property="og:description" content="W3Admin:Dashboard Bootstrap 5 Template">
        <meta property="og:image" content="https://w3admin.dexignzone.com/xhtml/social-image.png">
        <meta name="format-detection" content="telephone=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- PAGE TITLE HERE -->
        <title>SMS Edulication</title>
        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/favicon.png') }}">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


        <!--<link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">-->
        <link href="{{ URL::asset('/admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" />
        <!--<link href="./vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">-->
        <link href="{{ URL::asset('/admin/vendor/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css">
        <!--<link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">-->
        <link href="{{ URL::asset('/admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/vendor/jvmap/jquery-jvectormap.css')}}" rel="stylesheet">
        <link href="{{ URL::asset('/admin/vendor/jvmap/jquery-jvectormap.css') }}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />

        <!--<link href="./css/style.css" rel="stylesheet">-->
        <link href="{{ URL::asset('/admin/css/style.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('/admin/css/toastr/toastr.min.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('/admin/css/admin_style.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('/admin/vendor/select2/css/select2.min.css') }}" rel="stylesheet" />

         <!-- asColorpicker -->
         <link href="{{ URL::asset('/admin/vendor/jquery-asColorPicker/css/asColorPicker.min.css') }}" rel="stylesheet">
         <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


        <style>
            .nav-header img {
                height: 60px;
            }
        </style>
    </head>
    <?php
    use Illuminate\Support\Facades\Auth;
    
    $user = Auth::user();
    
    ?>
   
    <body>

        <!--*******************
            Preloader start
        ********************-->
        <div id="preloader">
            <div class="dz-ripple">
                <div></div>
                <div></div>
            </div>
        </div>
        <!--*******************
            Preloader end
        ********************-->

        <!--**********************************
            Main wrapper start
        ***********************************-->
        <div id="main-wrapper">
            <!--**********************************
                Nav header start
            ***********************************-->
            <div class="nav-header">
                <a href="{{ URL::route('dashboard') }}" class="brand-logo">
                    <!--<svg class="logo-abbr" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--<path class="logo-react" d="M35.1455 0.990723H15.1455C6.86124 0.990723 0.145508 7.70645 0.145508 15.9907V35.9907C0.145508 44.275 6.86124 50.9907 15.1455 50.9907H35.1455C43.4298 50.9907 50.1455 44.275 50.1455 35.9907V15.9907C50.1455 7.70645 43.4298 0.990723 35.1455 0.990723Z" fill="white"/>-->
                    <!--<path d="M15.6963 36.6899L6.64551 19.4641H11.0249C11.4921 19.4641 11.9981 19.8534 12.1928 20.048C13.7499 23.065 17.0394 29.3908 17.7401 30.5587C18.4408 31.7265 18.2267 32.4078 18.032 32.6024L15.6963 36.6899Z" fill="var(--primary)"/>-->
                    <!--<path d="M13.9443 19.4641L22.9952 36.6899L32.9219 16.8365C31.6567 16.7392 28.9512 16.6029 28.2505 16.8365C27.5498 17.0701 27.1799 17.7124 27.0826 18.0043L22.9952 26.7632C22.0219 24.9141 20.0171 21.0407 19.7836 20.34C19.55 19.6393 18.5184 19.4641 18.0318 19.4641H13.9443Z" fill="var(--primary)"/>-->
                    <!--<path opacity="0.5" d="M36.7175 37.2738H24.4551L25.9149 34.3542C26.382 33.4199 27.3747 33.4783 27.6667 33.4783H35.8416C39.6371 32.6024 37.8853 28.5149 36.1336 28.5149H28.8345L30.8782 24.7194H35.2577C37.3014 23.5516 36.4255 21.5078 35.2577 21.2159H33.7979C32.8636 21.2159 33.0193 20.2427 33.2139 19.7561L34.3818 17.1284C43.1406 17.4204 40.9023 23.3569 39.3451 26.1792C44.7172 32.4856 39.3451 37.2738 36.7175 37.2738Z" fill="var(--primary)"/>-->
                    <!--</svg>-->
                    <!--<svg class="brand-title" width="130" height="22" viewBox="0 0 130 22" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--<path d="M5.32533 20.9908L0.145325 1.39081H3.98132L7.50932 16.9868L11.6533 1.39081H15.6013L19.6333 16.9868L23.1613 1.39081H27.0253L21.7053 20.9908H17.4493L13.5573 6.45881L9.55332 20.9908H5.32533ZM35.4332 21.3268C34.1452 21.3268 32.9785 21.1028 31.9332 20.6548C30.8879 20.1882 30.0479 19.4788 29.4132 18.5268C28.7785 17.5748 28.4425 16.3802 28.4052 14.9428H31.9332C31.9519 15.8948 32.2599 16.6975 32.8572 17.3508C33.4732 17.9855 34.3319 18.3028 35.4332 18.3028C36.4785 18.3028 37.2812 18.0135 37.8412 17.4348C38.4012 16.8562 38.6812 16.1282 38.6812 15.2508C38.6812 14.2242 38.3079 13.4495 37.5612 12.9268C36.8332 12.3855 35.8905 12.1148 34.7332 12.1148H33.2772V9.17481H34.7612C35.7132 9.17481 36.5065 8.95081 37.1412 8.50281C37.7759 8.05481 38.0932 7.39221 38.0932 6.51481C38.0932 5.78681 37.8505 5.20821 37.3652 4.77881C36.8985 4.33081 36.2452 4.10681 35.4052 4.10681C34.4905 4.10681 33.7719 4.37751 33.2492 4.91881C32.7452 5.46021 32.4652 6.12281 32.4092 6.90681H28.9092C28.9839 5.09621 29.6092 3.66821 30.7852 2.62281C31.9799 1.57751 33.5199 1.05481 35.4052 1.05481C36.7492 1.05481 37.8785 1.29751 38.7932 1.78281C39.727 2.24951 40.427 2.87481 40.893 3.65881C41.379 4.44281 41.621 5.31081 41.621 6.26281C41.621 7.36421 41.313 8.29751 40.697 9.06281C40.1 9.80951 39.353 10.3135 38.4572 10.5748C39.559 10.7988 40.455 11.3402 41.145 12.1988C41.836 13.0388 42.181 14.1028 42.181 15.3908C42.181 16.4735 41.92 17.4628 41.397 18.3588C40.875 19.2548 40.109 19.9735 39.101 20.5148C38.1119 21.0562 36.8892 21.3268 35.4332 21.3268ZM43.457 20.9908L50.625 1.39081H54.657L61.825 20.9908H58.017L56.449 16.4548H48.805L47.209 20.9908H43.457ZM49.785 13.6548H55.469L52.613 5.50681L49.785 13.6548ZM69.993 21.3268C68.686 21.3268 67.52 21.0095 66.493 20.3748C65.466 19.7402 64.654 18.8722 64.057 17.7708C63.46 16.6695 63.161 15.4188 63.161 14.0188C63.161 12.6188 63.46 11.3775 64.057 10.2948C64.654 9.19351 65.466 8.33481 66.493 7.71881C67.52 7.08421 68.686 6.76681 69.993 6.76681C71.038 6.76681 71.953 6.96281 72.737 7.35481C73.521 7.74681 74.156 8.29751 74.641 9.00681V0.830811H78.225V20.9908H75.033L74.641 19.0028C74.193 19.6188 73.596 20.1602 72.849 20.6268C72.121 21.0935 71.169 21.3268 69.993 21.3268ZM70.749 18.1908C71.906 18.1908 72.849 17.8082 73.577 17.0428C74.324 16.2588 74.697 15.2602 74.697 14.0468C74.697 12.8335 74.324 11.8442 73.577 11.0788C72.849 10.2948 71.906 9.90281 70.749 9.90281C69.61 9.90281 68.668 10.2855 67.921 11.0508C67.174 11.8162 66.801 12.8055 66.801 14.0188C66.801 15.2322 67.174 16.2308 67.921 17.0148C68.668 17.7988 69.61 18.1908 70.749 18.1908ZM81.875 20.9908V7.10281H85.039L85.347 8.97881C85.795 8.30681 86.383 7.77481 87.111 7.38281C87.857 6.97221 88.716 6.76681 89.687 6.76681C91.833 6.76681 93.355 7.59751 94.251 9.25881C94.755 8.49351 95.427 7.88681 96.267 7.43881C97.125 6.99081 98.059 6.76681 99.067 6.76681C100.877 6.76681 102.268 7.30821 103.239 8.39081C104.209 9.47351 104.695 11.0602 104.695 13.1508V20.9908H101.111V13.4868C101.111 12.2922 100.877 11.3775 100.411 10.7428C99.963 10.1082 99.263 9.79081 98.311 9.79081C97.34 9.79081 96.556 10.1455 95.959 10.8548C95.38 11.5642 95.091 12.5535 95.091 13.8228V20.9908H91.507V13.4868C91.507 12.2922 91.273 11.3775 90.807 10.7428C90.34 10.1082 89.621 9.79081 88.651 9.79081C87.699 9.79081 86.924 10.1455 86.327 10.8548C85.748 11.5642 85.459 12.5535 85.459 13.8228V20.9908H81.875ZM110.029 4.94681C109.376 4.94681 108.835 4.75081 108.405 4.35881C107.995 3.96681 107.789 3.47221 107.789 2.87481C107.789 2.27751 107.995 1.79221 108.405 1.41881C108.835 1.02681 109.376 0.830811 110.029 0.830811C110.683 0.830811 111.215 1.02681 111.625 1.41881C112.055 1.79221 112.269 2.27751 112.269 2.87481C112.269 3.47221 112.055 3.96681 111.625 4.35881C111.215 4.75081 110.683 4.94681 110.029 4.94681ZM108.237 20.9908V7.10281H111.821V20.9908H108.237ZM115.562 20.9908V7.10281H118.726L119.006 9.45481C119.436 8.63351 120.052 7.98021 120.854 7.49481C121.676 7.00951 122.637 6.76681 123.738 6.76681C125.456 6.76681 126.79 7.30821 127.742 8.39081C128.694 9.47351 129.17 11.0602 129.17 13.1508V20.9908H125.586V13.4868C125.586 12.2922 125.344 11.3775 124.858 10.7428C124.373 10.1082 123.617 9.79081 122.59 9.79081C121.582 9.79081 120.752 10.1455 120.098 10.8548C119.464 11.5642 119.146 12.5535 119.146 13.8228V20.9908H115.562Z" fill="white"/>-->
                    <!--</svg>-->
                    {{-- <img src="{{ asset('admin/images/logo-full.png') }}" class="img-fluid" alt="Edulication" > --}}
                    {{-- &nbsp;&nbsp; --}}
                    <span>Edulication</span>
                </a>
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <!--**********************************
                Nav header end
            ***********************************-->

            <!--**********************************
        Chat box start
    ***********************************-->
            <div class="chatbox">
                <div class="chatbox-close"></div>
                <div class="custom-tab-1">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="chat" role="tabpanel">
                            <div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
                                <div class="card-header chat-list-header text-center">
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="1.0" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
                                    <div>
                                        <h6 class="mb-1">Chat List</h6>
                                        <p class="mb-0">Show All</p>
                                    </div>
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                                </div>
                                <div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
                                    <ul class="contacts">
                                        <li class="name-first-letter">A</li>
                                        <li class="active dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/1.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Archie Parker</span>
                                                    <p>Kalid is online</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/2.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon offline"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Alfie Mason</span>
                                                    <p>Taherah left 7 mins ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/3.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>AharlieKane</span>
                                                    <p>Sami is online</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/4.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon offline"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Athan Jacoby</span>
                                                    <p>Nargis left 30 mins ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="name-first-letter">B</li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/5.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon offline"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Bashid Samim</span>
                                                    <p>Rashid left 50 mins ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/1.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Breddie Ronan</span>
                                                    <p>Kalid is online</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/2.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon offline"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Ceorge Carson</span>
                                                    <p>Taherah left 7 mins ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="name-first-letter">D</li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/3.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Darry Parker</span>
                                                    <p>Sami is online</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/4.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon offline"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Denry Hunter</span>
                                                    <p>Nargis left 30 mins ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="name-first-letter">J</li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/5.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon offline"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Jack Ronan</span>
                                                    <p>Rashid left 50 mins ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/1.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Jacob Tucker</span>
                                                    <p>Kalid is online</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/2.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon offline"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>James Logan</span>
                                                    <p>Taherah left 7 mins ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/3.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Joshua Weston</span>
                                                    <p>Sami is online</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="name-first-letter">O</li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/4.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon offline"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Oliver Acker</span>
                                                    <p>Nargis left 30 mins ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dz-chat-user">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                    <img src="{{ asset('admin/images/avatar/5.jpg') }}" class="rounded-circle user_img" alt="">
                                                    <span class="online_icon offline"></span>
                                                </div>
                                                <div class="user_info">
                                                    <span>Oscar Weston</span>
                                                    <p>Rashid left 50 mins ago</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card chat dz-chat-history-box d-none">
                                <div class="card-header chat-list-header text-center">
                                    <a href="javascript:void(0);" class="dz-chat-history-back">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
                                    </a>
                                    <div>
                                        <h6 class="mb-1">Chat with Khelesh</h6>
                                        <p class="mb-0 text-success">Online</p>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
                                            <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
                                            <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
                                            <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                        <div class="msg_cotainer">
                                            Hi, how are you samim?
                                            <span class="msg_time">8:40 AM, Today</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mb-4">
                                        <div class="msg_cotainer_send">
                                            Hi Khalid i am good tnx how about you?
                                            <span class="msg_time_send">8:55 AM, Today</span>
                                        </div>
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                        <div class="msg_cotainer">
                                            I am good too, thank you for your chat template
                                            <span class="msg_time">9:00 AM, Today</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mb-4">
                                        <div class="msg_cotainer_send">
                                            You are welcome
                                            <span class="msg_time_send">9:05 AM, Today</span>
                                        </div>
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                        <div class="msg_cotainer">
                                            I am looking for your next templates
                                            <span class="msg_time">9:07 AM, Today</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mb-4">
                                        <div class="msg_cotainer_send">
                                            Ok, thank you have a good day
                                            <span class="msg_time_send">9:10 AM, Today</span>
                                        </div>
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                        <div class="msg_cotainer">
                                            Bye, see you
                                            <span class="msg_time">9:12 AM, Today</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                        <div class="msg_cotainer">
                                            Hi, how are you samim?
                                            <span class="msg_time">8:40 AM, Today</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mb-4">
                                        <div class="msg_cotainer_send">
                                            Hi Khalid i am good tnx how about you?
                                            <span class="msg_time_send">8:55 AM, Today</span>
                                        </div>
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                        <div class="msg_cotainer">
                                            I am good too, thank you for your chat template
                                            <span class="msg_time">9:00 AM, Today</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mb-4">
                                        <div class="msg_cotainer_send">
                                            You are welcome
                                            <span class="msg_time_send">9:05 AM, Today</span>
                                        </div>
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                        <div class="msg_cotainer">
                                            I am looking for your next templates
                                            <span class="msg_time">9:07 AM, Today</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mb-4">
                                        <div class="msg_cotainer_send">
                                            Ok, thank you have a good day
                                            <span class="msg_time_send">9:10 AM, Today</span>
                                        </div>
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="img_cont_msg">
                                            <img src="{{ asset('admin/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                        </div>
                                        <div class="msg_cotainer">
                                            Bye, see you
                                            <span class="msg_time">9:12 AM, Today</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer type_msg">
                                    <div class="input-group">
                                        <textarea class="form-control" placeholder="Type your message..."></textarea>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary light"><i class="fa fa-location-arrow"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="alerts" role="tabpanel">
                            <div class="card mb-sm-3 mb-md-0 contacts_card">
                                <div class="card-header chat-list-header text-center">
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                                    <div>
                                        <h6 class="mb-1">Notications</h6>
                                        <p class="mb-0">Show All</p>
                                    </div>
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="1"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
                                </div>
                                <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
                                    <ul class="contacts">
                                        <li class="name-first-letter">SEVER STATUS</li>
                                        <li class="active">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont primary">KK</div>
                                                <div class="user_info">
                                                    <span>David Nester Birthday</span>
                                                    <p class="text-primary">Today</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="name-first-letter">SOCIAL</li>
                                        <li>
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont success">RU</div>
                                                <div class="user_info">
                                                    <span>Perfection Simplified</span>
                                                    <p>Jame Smith commented on your status</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="name-first-letter">SEVER STATUS</li>
                                        <li>
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont primary">AU</div>
                                                <div class="user_info">
                                                    <span>AharlieKane</span>
                                                    <p>Sami is online</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont info">MO</div>
                                                <div class="user_info">
                                                    <span>Athan Jacoby</span>
                                                    <p>Nargis left 30 mins ago</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="notes">
                            <div class="card mb-sm-3 mb-md-0 note_card">
                                <div class="card-header chat-list-header text-center">
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="1.0" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
                                    <div>
                                        <h6 class="mb-1">Notes</h6>
                                        <p class="mb-0">Add New Nots</p>
                                    </div>
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="1"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
                                </div>
                                <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
                                    <ul class="contacts">
                                        <li class="active">
                                            <div class="d-flex bd-highlight">
                                                <div class="user_info">
                                                    <span>New order placed..</span>
                                                    <p>10 Aug 2020</p>
                                                </div>
                                                <div class="ms-auto">
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex bd-highlight">
                                                <div class="user_info">
                                                    <span>Youtube, a video-sharing website..</span>
                                                    <p>10 Aug 2020</p>
                                                </div>
                                                <div class="ms-auto">
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex bd-highlight">
                                                <div class="user_info">
                                                    <span>john just buy your product..</span>
                                                    <p>10 Aug 2020</p>
                                                </div>
                                                <div class="ms-auto">
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex bd-highlight">
                                                <div class="user_info">
                                                    <span>Athan Jacoby</span>
                                                    <p>10 Aug 2020</p>
                                                </div>
                                                <div class="ms-auto">
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header">
                <div class="header-content">
                    <nav class="navbar navbar-expand">
                        <div class="collapse navbar-collapse justify-content-between">
                            <div class="header-left">
                              
                            </div>
                            <ul class="navbar-nav header-right">
                                <!--                                <li class="nav-item dropdown notification_dropdown">
                                                                    <a class="nav-link open-cal">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M3.09253 9.40445H20.9165" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M16.442 13.3097H16.4512" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M12.0047 13.3097H12.014" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M7.55793 13.3097H7.5672" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M16.442 17.1964H16.4512" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M12.0047 17.1964H12.014" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M7.55793 17.1964H7.5672" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M16.0438 2V5.29078" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M7.9654 2V5.29078" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2383 3.5791H7.77096C4.83427 3.5791 3 5.21504 3 8.22213V17.2718C3 20.3261 4.83427 21.9999 7.77096 21.9999H16.229C19.175 21.9999 21 20.3545 21 17.3474V8.22213C21.0092 5.21504 19.1842 3.5791 16.2383 3.5791Z" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        </svg>
                                                                    </a>
                                                                </li>-->
                                <!--                                <li class="nav-item dropdown notification_dropdown">
                                                                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M18 8.5C18 6.9087 17.3679 5.38258 16.2426 4.25736C15.1174 3.13214 13.5913 2.5 12 2.5C10.4087 2.5 8.88258 3.13214 7.75736 4.25736C6.63214 5.38258 6 6.9087 6 8.5C6 15.5 3 17.5 3 17.5H21C21 17.5 18 15.5 18 8.5Z" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M13.73 21.5C13.5542 21.8031 13.3019 22.0547 12.9982 22.2295C12.6946 22.4044 12.3504 22.4965 12 22.4965C11.6496 22.4965 11.3054 22.4044 11.0018 22.2295C10.6982 22.0547 10.4458 21.8031 10.27 21.5" stroke="#111828" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        </svg>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 pt-0" style="height:380px;">
                                                                            <ul class="timeline">
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2">
                                                                                            <img alt="image" width="50" src="images/avatar/1.jpg">
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2 media-info">
                                                                                            KG
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Resport created successfully</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2 media-success">
                                                                                            <i class="fa fa-home"></i>
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2">
                                                                                            <img alt="image" width="50" src="images/avatar/1.jpg">
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2 media-danger">
                                                                                            KG
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Resport created successfully</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2 media-primary">
                                                                                            <i class="fa fa-home"></i>
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2">
                                                                                            <img alt="image" width="50" src="images/avatar/1.jpg">
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2 media-info">
                                                                                            KG
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Resport created successfully</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2 media-success">
                                                                                            <i class="fa fa-home"></i>
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2">
                                                                                            <img alt="image" width="50" src="images/avatar/1.jpg">
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2 media-danger">
                                                                                            KG
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Resport created successfully</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="timeline-panel">
                                                                                        <div class="media me-2 media-primary">
                                                                                            <i class="fa fa-home"></i>
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                                                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
                                                                    </div>
                                                                </li>-->
                                <!--                                <li class="nav-item dropdown notification_dropdown">
                                                                    <a class="nav-link bell-link" href="javascript:void(0);">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M17.9026 8.85156L13.4593 12.4646C12.6198 13.1306 11.4387 13.1306 10.5992 12.4646L6.11841 8.85156" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        </svg>
                                                                    </a>
                                                                </li>	-->
                                <!--<li class="nav-item align-items-center header-border"><a href="analytics.html" class="btn btn-primary">Analytics</a></li>-->
                                <li class="nav-item ps-3">
                                    <div class="header-profile2">
                                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="header-info2 d-flex align-items-center">
                                                <div class="header-media">
                                                    @if($user->profile_image_path != null)
                                                    <img class="iavatar" src="{{ asset($user->profile_image_path) }}" alt="img" width="100%">
                                                    @else
                                                    <img class="iavatar" src="{{ getStoragePath() .  'admin/images/avatar/1.png' }}" alt="img" width="100%">
                                                    @endif
                                                </div>
                                                <div class="header-info">
                                                    @if(Session::has('first_name'))
                                                    <h6>{{Session::get('first_name')}} {{Session::get('last_name')}}</h6>
                                                    <p>{{Session::get('email')}} </p>
                                                    @endif
                                                </div>

                                            </div>
                                        </a>
                                        <div class="profile-box" id="profile-box"> 
                                            <div class="products">
                                                <div class="border-img">
                                                    <!--<img src="images/user.jpg" class="avatar " alt="">-->
                                                    @if($user->profile_image_path != null)
                                                    <img class="iavatar" src="{{ asset($user->profile_image_path) }}" alt="img">
                                                    @else
                                                    <img class="iavatar" src="{{ getStoragePath() .  'admin/images/avatar/1.png' }}" alt="img">
                                                    @endif

                                                </div>
                                                <div class="ms-3">
                                                    @if(Session::has('first_name'))
                                                    <h6 class="mb-0">{{Session::get('first_name')}} {{Session::get('last_name')}}</h6>
                                                    <span class="d-block mb-1">{{Session::get('email')}}</span>
                                                    <span class="badge border-0 rounded">{{Session::get('role_name')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="account-setting">
                                                <a href="{{ route('edit-user-profile') }}" class="ai-icon">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.6666 17.5V15.8333C16.6666 14.9493 16.3154 14.1014 15.6903 13.4763C15.0652 12.8512 14.2173 12.5 13.3333 12.5H6.66658C5.78253 12.5 4.93468 12.8512 4.30956 13.4763C3.68444 14.1014 3.33325 14.9493 3.33325 15.8333V17.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10.0001 9.16667C11.841 9.16667 13.3334 7.67428 13.3334 5.83333C13.3334 3.99238 11.841 2.5 10.0001 2.5C8.15913 2.5 6.66675 3.99238 6.66675 5.83333C6.66675 7.67428 8.15913 9.16667 10.0001 9.16667Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                    <span class="ms-2">Profile Settings</span>
                                                </a>
                                                <a href="{{ route('invoice-user') }}" class="ai-icon">
                                                    <i class="fa-solid fa-file-invoice me-2"></i>
                                                    <span class="ms-2">General Invoice</span>
                                                </a>
                                                <!--                                                <a href="app-profile-1.html" class="ai-icon ">
                                                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                    <path d="M3.33341 3.33301H16.6667C17.5834 3.33301 18.3334 4.08301 18.3334 4.99967V14.9997C18.3334 15.9163 17.5834 16.6663 16.6667 16.6663H3.33341C2.41675 16.6663 1.66675 15.9163 1.66675 14.9997V4.99967C1.66675 4.08301 2.41675 3.33301 3.33341 3.33301Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                                    <path d="M18.3334 5L10.0001 10.8333L1.66675 5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                                    </svg>
                                                                                                    <span class="ms-2">Subscription</span>
                                                                                                </a>-->
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="dropdown-item ai-icon" id="darkModeToggle">
                                                        <div>
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M17.4999 10.6583C17.3688 12.0768 16.8365 13.4287 15.9651 14.5557C15.0938 15.6826 13.9195 16.5382 12.5797 17.0221C11.2398 17.5061 9.7899 17.5984 8.3995 17.2884C7.0091 16.9784 5.73575 16.2788 4.72844 15.2715C3.72113 14.2642 3.02153 12.9908 2.71151 11.6004C2.40148 10.21 2.49385 8.76007 2.9778 7.42025C3.46175 6.08042 4.31728 4.90614 5.44426 4.03479C6.57125 3.16345 7.92308 2.63109 9.34158 2.5C8.51109 3.62356 8.11146 5.00787 8.21536 6.40118C8.31926 7.79448 8.9198 9.10421 9.90775 10.0922C10.8957 11.0801 12.2054 11.6807 13.5987 11.7846C14.992 11.8885 16.3764 11.4888 17.4999 10.6583Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                            <span class="ms-2">Dark Mode</span>
                                                        </div>
                                                    </a>
                                                    <div class="dz-layout light">
                                                        {{-- <i class="fas fa-sun sun" id="sunIcon"></i>
                                                        <i class="fas fa-moon moon" id="moonIcon"></i> --}}
                                                    </div>
                                                </div>
                                                <div>
                                                    <div id="colorPalettes">
                                                        <button class="color-palette" style="background-color: #757500;width: 45px;height: 45px;" data-theme="#757500"></button>
                                                        <button class="color-palette" style="background-color: #0A7029;width: 45px;height: 45px;" data-theme="#0A7029"></button>
                                                        <button class="color-palette" style="background-color: #DCBAA9;width: 45px;height: 45px;" data-theme="#0A7029"></button>
                                                        
                                                    </div>
                                                </div>
                                                <a href="{{ route('logout') }}" class="ai-icon">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.5 17.5H4.16667C3.72464 17.5 3.30072 17.3244 2.98816 17.0118C2.67559 16.6993 2.5 16.2754 2.5 15.8333V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H7.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M13.3333 14.1663L17.4999 9.99967L13.3333 5.83301" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M17.5 10H7.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                    <span class="ms-2">Logout </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="deznav">
                <div class="deznav-scroll">
                    <ul class="metismenu" id="menu">

                        <!--                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                                        <div class="menu-icon">
                                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3.29077 9L12.2908 2L21.2908 9V20C21.2908 20.5304 21.0801 21.0391 20.705 21.4142C20.3299 21.7893 19.8212 22 19.2908 22H5.29077C4.76034 22 4.25163 21.7893 3.87656 21.4142C3.50149 21.0391 3.29077 20.5304 3.29077 20V9Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M9.29077 22V12H15.2908V22" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>

                                                        </div>
                                                        <span class="nav-text">Dashboard</span>
                                                    </a>
                                                    <ul aria-expanded="false">
                                                        <li class="mini-dashboard">Dashboard</li>
                                                        <li><a href="index.html">Dashboard Light</a></li>
                                                         <li><a href="index-2.html">Dashboard Dark</a></li>
                                                         <li><a href="index-3.html">Dashboard 3</a></li>
                                                         <li><a href="index-4.html">Dashboard 4</a></li>
                                                         <li><a href="crm.html">CRM</a></li>
                                                         <li><a href="analytics.html">Analytics</a></li>
                                                    </ul>
                                                </li>-->
                        <li><a class=" " href="{{ URL::route('dashboard') }}" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.29077 9L12.2908 2L21.2908 9V20C21.2908 20.5304 21.0801 21.0391 20.705 21.4142C20.3299 21.7893 19.8212 22 19.2908 22H5.29077C4.76034 22 4.25163 21.7893 3.87656 21.4142C3.50149 21.0391 3.29077 20.5304 3.29077 20V9Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.29077 22V12H15.2908V22" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        @if(Session::has('role_id') && Session::get('role_id') == 1)
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Super Admin</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('super-admin-list') }}">List</a></li>
                                <li><a href="{{ URL::route('add-super-admin') }}">add</a></li>
                            </ul>
                        </li>

                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Role</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('role-list') }}">List</a></li>
                                <li><a href="{{ URL::route('add-role') }}">add</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">School</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('school-list') }}">List</a></li>
                                <li><a href="{{ URL::route('add-school') }}">add</a></li>
                            </ul>
                        </li>
                        @endif

                        @if(Session::has('role_id') && Session::get('role_id') != 1)
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Student</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('register-student') }}">Register</a></li>
                                <!--<li><a href="{{ URL::route('student-list') }}">Student List</a></li>-->
                                <li><a href="{{ URL::route('add-student') }}">Add Student</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(Session::has('role_id') && Session::get('role_id') != 1)
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <div class="menu-icon">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <span class="nav-text">Events</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ URL::route('event.courses') }}">Courses</a></li>
                            <li><a href="{{ URL::route('event.calender') }}">Calendar</a></li>
                            <li><a href="{{ URL::route('event.room.calender') }}">Rooms</a></li>
                            <li><a href="{{ URL::route('event.session.index') }}">Sessions</a></li>
                            <li><a href="{{ URL::route('event.trainers.index') }}">Trainers</a></li>
                            <li><a href="{{ URL::route('event.archive.index') }}">Archive</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <span class="nav-text">Peoples</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('people.find.index')}}">Find People</a></li>
                        <li><a href="{{ route('people.active.learners.index')}}">Learner Records</a></li>
                        <li><a href="{{ route('people.enquiry.index')}}">Enquiry Search</a></li>
                        <li><a href="{{ route('people.enrollment.search') }}">Enrolment Search</a></li>
                        <li><a href="{{ route('people.bulk.enrolment') }}">Bulk Enrolment</a></li>
                        <li><a href="{{ route('people.website.enquiries') }}">Website Enquiries</a></li>
                        <li><a href="{{ route('people.website.enrolment') }}">Website Enrolments</a></li>
                        <li><a href="{{ route('people.avitmiss.check')}}">AVETMISS Check</a></li>
                        <li><a href="">Employer Groups</a></li>
                    </ul>
                </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Fees Collections</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                    <span class="nav-text">Student Fees</span>
                                </a>
                                <ul aria-expanded="false" class="sub-menu">
                                    <li><a href="{{ URL::route('fees-student') }}">Fees Due</a></li>
                                    <li><a href="{{ URL::route('fees-student-quick-assign') }}">Quick Assign</a></li>
                                    <li><a href="{{ URL::route('fees-student-quick-received') }}">Quick Received</a></li>
                                    <li><a href="{{ URL::route('fees-student-report') }}">Fees Reports</a></li>
                                </ul>
                                </li>
                                <li><a href="{{ URL::route('list-fees-master') }}">Fees Master</a></li>
                                <li><a href="{{ URL::route('fees-categoris-list') }}">Fees Types</a></li>
                                <li><a href="{{ URL::route('fees-discount-list') }}">Fees Discounts</a></li>
                                <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                    <span class="nav-text">Settings</span>
                                </a>
                                <ul aria-expanded="false" class="sub-menu">
                                    <li><a href="{{ URL::route('fees-fine-list') }}">Fees Fines</a></li>
                                    <li><a href="{{ URL::route('add-fees-receipt') }}">Receipt Setting</a></li>
                                </ul>
                                </li>
                                
                            </ul>
                        </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Incomes & Expenses</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="">Income List</a></li>
                                <li><a href="{{ URL::route('income_categoris') }}">Income Categories</a></li>
                                <li><a href="">Expense List</a></li>
                                <li><a href="{{ URL::route('expense_categoris') }}">Expense Categories</a></li>
                                <li><a href="">Outcome Overview</a></li>
                            </ul>
                        </li>
                    
                   
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <span class="nav-text">Console</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ URL::route('company.avetmissSetting') }}">AVETMISS</a></li>
                        <li><a href="{{ URL::route('company.certificate') }}">Certificate Templates</a></li>
                        <li><a href="{{ URL::route('company.document') }}">Company Documents</a></li>
                        <li><a href="{{ URL::route('company.competency.report') }}">Competency Report</a></li>
                        <li><a href="{{ URL::route('company.company.setting') }}">Company Settings</a></li>
                        <li><a href="{{ URL::route('company.CQR') }}">CQR Report</a></li>
                        <li><a href="{{ URL::route('dataExport') }}">Data Export</a></li>
                        <li><a href="{{ URL::route('exportASQA') }}">Export ASQA</a></li>
                        <li><a href="{{ URL::route('exportNAT') }}">Export NAT Files</a></li>
                        <li><a href="{{ URL::route('dataExport') }}">Process Automation</a></li>
                        <li><a href="{{ URL::route('dataExport') }}">Survey Setting</a></li>
                        <li><a href="{{ URL::route('company') }}">User Managment</a></li>
                    </ul> 
                </li>
                <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <span class="nav-text">Report</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ URL::route('report.activity.log') }}">Activity Log</a></li>
                    <li><a href="{{ URL::route('course.complation') }}">Courser Complation</a></li>
                    <li><a href="{{ URL::route('course.utilisation') }}">Courser Utilisation</a></li>
                    <li><a href="{{ URL::route('duplicate.enrolment') }}">Duplicate Enrolments</a></li>
                    <li><a href="{{ URL::route('duplicate.person') }}">Duplicate persons</a></li>
                    <li><a href="{{ URL::route('invoice.payment') }}">Invoice and Payments</a></li>
                    <li><a href="{{ URL::route('possible.dublicates') }}">Possible Duplicates</a></li>
                    <li><a href="{{ URL::route('sms.usage') }}">SMS Usage</a></li>
                    <li><a href="{{ URL::route('storage.details') }}">Storage Details</a></li>
                    <li><a href="{{ URL::route('trainer.competencies') }}">Trainer Competencies</a></li>
                </ul> 
            </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Courses we run</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('coursecategory-list') }}">courses Categories</a></li>
                                <li><a href="{{ URL::route('course-list') }}">courses List</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Admin</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('ragion-list') }}">Our Regions List</a></li>
                                <li><a href="{{ URL::route('city-town-list') }}">Cities and Towns List</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Admission</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('status-type-list') }}">Status Type</a></li>
                                <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                    <span class="nav-text">Settings</span>
                                    </a>
                                    <ul aria-expanded="false" class="sub-menu">
                                        <li><a href="{{ URL::route('id-card-setting') }}">ID Card Setting</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">User</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('user-list') }}">List</a></li>
                                <li><a href="{{ URL::route('add-user') }}">Add User</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Academic Session</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('academic-session-list') }}">Session</a></li>
                                <li><a href="{{ URL::route('add-academic-session') }}">Add Session</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Academic Class</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('academic-class-list') }}">Class</a></li>
                                <li><a href="{{ URL::route('add-academic-class') }}">Add Class</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Subject</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('subject-list') }}">Subject </a></li>
                                <li><a href="{{ URL::route('add-subject') }}">Add Subject</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Teacher</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('teacher-list') }}">Teacher </a></li>
                                <li><a href="{{ URL::route('add-teacher') }}">Add Teacher</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(Session::has('role_id') && Session::get('role_id') != 1)
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Academic</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('faculty-list') }}">Faculties</a></li>
                                <li><a href="{{ route('program-list') }}">Programs</a></li>
                                <li><a href="{{ route('batch-list') }}">Batches</a></li>
                                <li><a href="{{ route('session-list') }}">Sessions</a></li>    
                                <li><a href="{{ route('semester-list') }}">Semesters</a></li>
                                <li><a href="{{ route('section-list') }}">Sections</a></li>
                                <li><a href="{{ route('classroom-list') }}">Class Rooms</a></li>
                                <li><a href="{{ route('subject-list') }}">Subjects</a></li>
                                <li><a href="{{ route('enrollsubject-list') }}">Enroll Courses</a></li>
                                <li><a href="{{ route('classroutine-list') }}">Class Routines</a></li>
                                <li><a href="{{ route('coursecategory-list') }}">Course Category</a></li>
                                <li><a href="#">Exam Routines</a></li>
                                <li><a href="#">Teacher Routines</a></li>
                                 <li>
                                     <a href="#" class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                                <span class="nav-text">Settings</span>
                                    </a>
                                    <ul class="pcoded-submenu" style="display: block;" >
                                         <li class=""><a href="#" class="">Class Routine</a></li>
                                        <li class=""><a href="#" class="">Exam Routine</a></li>
                                     </ul>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(Session::has('role_id') && Session::get('role_id') != 1)
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Human Resources</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('employee-list') }}">Staff List</a></li>
                                <!--<li><a href="{{ URL::route('student-list') }}">Student List</a></li>-->
                                <li><a href="{{ URL::route('add-employeecategory') }}">Staff Category</a></li>
                                <!--<li><a href="{{ URL::route('add-attendance') }}">Staff Attendance</a></li>-->
                                <li>
                                    <a href="#" class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                                <span class="nav-text">Staff Attendance</span>
                                    </a>
                                    <ul class="pcoded-submenu" style="display: block;" >
                                         <li class=""><a href="{{ URL::route('staff-daily-attendance') }}" class="">Daily Attendances</a></li>
                                         <li class=""><a href="{{ URL::route('staff-daily-attendance-report') }}" class="">Daily Reports</a></li>
                                         <li class=""><a href="{{ URL::route('staff-hourly-attendance') }}" class="">Hourly Attendances</a></li>
                                         <li class=""><a href="#" class="">Hourly Reports</a></li>
                                     </ul>
                                </li>
                                <li><a href="{{ URL::route('staff-note-list') }}">Staff Notes</a></li>
                                <li><a href="{{ URL::route('payroll') }}">Payrolls</a></li>
                                <li><a href="{{ URL::route('payroll_report') }}">Payroll Reports</a></li>
                                <li><a href="{{ URL::route('add-attendancetype') }}">Attendance Types</a></li>
                                <li><a href="{{ URL::route('add-leaveallocation') }}">Leave Manages</a></li>
                                <li><a href="{{ URL::route('add-leaverequest') }}">Apply Leaves</a></li>
                                <li><a href="{{ URL::route('add-leavetype') }}">Leave Types</a></li>
                                <li><a href="{{ URL::route('work-shift-type-list') }}">Work Shift Type</a></li>
                                <li><a href="{{ URL::route('add-designation') }}">Designation</a></li>
                                <li><a href="{{ URL::route('add-department') }}">Department</a></li>
                                
                                 <li>
                                     <a href="#" class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                                <span class="nav-text">Settings</span>
                                    </a>
                                    <ul class="pcoded-submenu" style="display: block;" >
                                         <li class=""><a href="{{ URL::route('tax-setting-list') }}" class="">Tax Settings</a></li>
                                        <li class=""><a href="{{ URL::route('add-pay-slip-setting') }}" class="">Pay Slip Setting</a></li>
                                     </ul>
                                </li>
                                
                                
                                
                            </ul>
                        </li>

                        @endif
                        @if(Session::has('role_id') && Session::get('role_id') != 1)
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Examinations</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('examtype-list') }}">Exam Types</a></li>
                                <li><a href="{{ URL::route('grade-list') }}">Grading System</a></li>
                                
                            </ul>
                        </li>
                         @endif
                         @if(Session::has('role_id') && Session::get('role_id') != 1)
                        <li>
                            <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Study Material</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('content-type-list') }}">Content Type</a></li>
                                                          <li><a href="{{ URL::route('content-list') }}">Content</a></li>
                                                            <li><a href="{{ URL::route('assignment-list') }}">Assignment</a></li>
                                                        </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Communication</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ URL::route('communication.contact.person') }}">Contact</a></li>
                                                        </ul>
                        </li>
                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                <div class="menu-icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <span class="nav-text">Settings</span>
                            </a>
                            <ul aria-expanded="false">

                                <li><a href="{{ URL::route('setting') }}">General</a></li>
                                <li><a href="#">Roles and Permissions</a></li>
                                
                            </ul>
                        </li>

                        @endif
                        <!--                        <li><a href="contacts.html" class="" aria-expanded="false">
                                                                            <div class="menu-icon">
                                                                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M9.13908 12.3145V16.0594" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <path d="M11.0498 14.1863H7.22864" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <path d="M15.6568 12.4285H15.5498" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <path d="M17.4704 16.0027H17.3634" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <path d="M8.36292 2C8.36292 2.74048 8.9754 3.34076 9.73093 3.34076H10.7874C11.953 3.34492 12.8972 4.27026 12.9025 5.41266V6.08771" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7191 21.9623C13.7139 22.0132 10.7638 22.0111 7.86352 21.9623C4.64427 21.9623 2.29077 19.666 2.29077 16.5109V11.8614C2.29077 8.70627 4.64427 6.41005 7.86352 6.41005C10.7797 6.3602 13.7319 6.36123 16.7191 6.41005C19.9383 6.41005 22.2908 8.70731 22.2908 11.8614V16.5109C22.2908 19.666 19.9383 21.9623 16.7191 21.9623Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                </svg>
                                                                            </div>
                                                                            <span class="nav-text">Contacts</span>
                                                                        </a>
                                                                    </li>-->
                        <!--                        <li><a href="blog.html" class="" aria-expanded="false">
                                                        <div class="menu-icon">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76181H8.08493C6.00493 2.75381 4.29993 4.41181 4.25093 6.49081V17.2038C4.20493 19.3168 5.87993 21.0678 7.99293 21.1148C8.02393 21.1148 8.05393 21.1158 8.08493 21.1148H16.0739C18.1679 21.0298 19.8179 19.2998 19.8029 17.2038V8.03781L14.7379 2.76181Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M14.2882 15.3585H8.88818" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M12.2432 11.606H8.88721" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>

                                                        </div>
                                                        <span class="nav-text">Blog</span>
                                                    </a>
                                                </li>-->
                        <!--<li class="menu-title">OUR FEATURES</li>-->
                        <!--                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                                        <div class="menu-icon">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.11086 10.2878V13.7208" stroke="#252525" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M8.86244 12.0045H5.35974" stroke="#252525" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M13.0856 10.3924H12.9875" stroke="#252525" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M14.748 13.6691H14.6499" stroke="#252525" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M6.39948 0.833328C6.39948 1.5121 6.96092 2.06236 7.65349 2.06236H8.62193C9.69042 2.06617 10.5559 2.9144 10.5608 3.9616V4.5804" stroke="#252525" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0593 19.1324C11.3045 19.1791 8.60026 19.1771 5.94166 19.1324C2.99069 19.1324 0.833313 17.0275 0.833313 14.1354V9.87325C0.833313 6.98107 2.99069 4.8762 5.94166 4.8762C8.61483 4.83051 11.321 4.83146 14.0593 4.8762C17.0102 4.8762 19.1666 6.98203 19.1666 9.87325V14.1354C19.1666 17.0275 17.0102 19.1324 14.0593 19.1324Z" stroke="#252525" stroke-linecap="round" stroke-width="1.5" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                        <span class="nav-text">Student</span>
                                                    </a>-->
                        <!--      <ul aria-expanded="false">
                                <li class="mini-dashboard">Register</li>
                               <li><a href=" href="./chat.html">Student List</a></li>
                               <li><a href="./chat.html">Register</a></li>
                                                                                            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Users Manager</a>
                                                                   <ul aria-expanded="false">

                                                                       <li><a href="./app-profile-1.html">Profile 1</a></li>
                                                                       <li><a href="./app-profile-2.html">Profile 2</a></li>
                                                                       <li><a href="./edit-profile.html">Edit Profile</a></li>
                                                                       <li><a href="./post-details.html">Post Details</a></li>
                                                                   </ul>
                                                               </li>
                                                               <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Email</a>
                                                                   <ul aria-expanded="false">
                                                                       <li><a href="./email-compose.html">Compose</a></li>
                                                                       <li><a href="./email-inbox.html">Inbox</a></li>
                                                                       <li><a href="./email-read.html">Read</a></li>
                                                                   </ul>
                                                               </li>
                                                               <li><a href="./app-calender.html">Calendar</a></li>
                                                               <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Shop</a>
                                                                   <ul aria-expanded="false">
                                                                       <li><a href="./ecom-product-grid.html">Product Grid</a></li>
                                                                       <li><a href="./ecom-product-list.html">Product List</a></li>
                                                                       <li><a href="./ecom-product-detail.html">Product Details</a></li>
                                                                       <li><a href="./ecom-product-order.html">Order</a></li>
                                                                       <li><a href="./ecom-checkout.html">Checkout</a></li>
                                                                       <li><a href="./ecom-invoice.html">Invoice</a></li>
                                                                       <li><a href="./ecom-customers.html">Customers</a></li>
                                                                   </ul>
                                                               </li>
                           </ul>
                       </li>-->
                        <!--                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                                        <div class="menu-icon">
                                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5687 13.8887C18.2435 13.8887 18.8098 14.4455 18.7066 15.1118C18.1013 19.0318 14.7456 21.9423 10.6982 21.9423C6.22029 21.9423 2.59082 18.3129 2.59082 13.836C2.59082 10.1476 5.39293 6.71181 8.54766 5.93497C9.22556 5.7676 9.92029 6.24445 9.92029 6.94234C9.92029 11.6708 10.0792 12.8939 10.9771 13.5592C11.875 14.2244 12.9308 13.8887 17.5687 13.8887Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9834 9.95121C22.0371 6.91331 18.3055 2.01647 13.7581 2.10068C13.4045 2.107 13.1213 2.40173 13.1055 2.75437C12.9908 5.25226 13.1455 8.4891 13.2318 9.95647C13.2581 10.4133 13.6171 10.7723 14.0729 10.7986C15.5813 10.8849 18.936 11.0028 21.3981 10.6302C21.7329 10.5796 21.9781 10.2891 21.9834 9.95121Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>


                                                        </div>
                                                        <span class="nav-text">Charts</span>
                                                    </a>
                                                    <ul aria-expanded="false">
                                                        <li class="mini-dashboard">Charts</li>
                                                        <li><a href="./chart-flot.html">Flot</a></li>
                                                        <li><a href="./chart-morris.html">Morris</a></li>
                                                        <li><a href="./chart-chartjs.html">Chartjs</a></li>
                                                        <li><a href="./chart-chartist.html">Chartist</a></li>
                                                        <li><a href="./chart-sparkline.html">Sparkline</a></li>
                                                        <li><a href="./chart-peity.html">Peity</a></li>
                                                    </ul>
                                                </li>-->
                        <!--                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                                        <div class="menu-icon">
                                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.395 4.17701L15.2224 7.82776C15.4015 8.18616 15.7472 8.43467 16.1481 8.49218L20.2361 9.08062C21.2461 9.22644 21.6481 10.4505 20.9171 11.1519L17.961 13.9924C17.6704 14.2718 17.5382 14.6733 17.6069 15.0676L18.3046 19.0778C18.4764 20.0698 17.4205 20.8267 16.5178 20.3574L12.864 18.4627C12.5058 18.2768 12.0768 18.2768 11.7176 18.4627L8.06378 20.3574C7.161 20.8267 6.10517 20.0698 6.27801 19.0778L6.97462 15.0676C7.04334 14.6733 6.9111 14.2718 6.62059 13.9924L3.66445 11.1519C2.93349 10.4505 3.33541 9.22644 4.34544 9.08062L8.43342 8.49218C8.83431 8.43467 9.18105 8.18616 9.36014 7.82776L11.1865 4.17701C11.6384 3.27433 12.9431 3.27433 13.395 4.17701Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                        <span class="nav-text">Bootstrap</span>
                                                    </a>
                                                    <ul aria-expanded="false">
                                                        <li class="mini-dashboard">Bootstrap</li>
                                                        <li><a href="./ui-accordion.html">Accordion</a></li>
                                                        <li><a href="./ui-alert.html">Alert</a></li>
                                                        <li><a href="./ui-badge.html">Badge</a></li>
                                                        <li><a href="./ui-button.html">Button</a></li>
                                                        <li><a href="./ui-modal.html">Modal</a></li>
                                                        <li class="extra-menu-li">
                                                            <ul id="collapseExample" class="pt-0 extra-menu-links extra-menu-area">
                                                                <li><a href="./ui-button-group.html">Button Group</a></li>
                                                                <li><a href="./ui-list-group.html">List Group</a></li>
                                                                <li><a href="./ui-card.html">Cards</a></li>
                                                                <li><a href="./ui-carousel.html">Carousel</a></li>
                                                                <li><a href="./ui-dropdown.html">Dropdown</a></li>
                                                                <li><a href="./ui-popover.html">Popover</a></li>
                                                                <li><a href="./ui-progressbar.html">Progressbar</a></li>
                                                                <li><a href="./ui-tab.html">Tab</a></li>
                                                                <li><a href="./ui-typography.html">Typography</a></li>
                                                                <li><a href="./ui-pagination.html">Pagination</a></li>
                                                                <li><a href="./ui-grid.html">Grid</a></li>
                                                            </ul>
                                                            <a class="btn show-more-btn border-0" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                <span class="show-more">Show More + </span>
                                                                <span class="show-less">Show Less - </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>-->
                        <!--                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                                        <div class="menu-icon">
                                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.7097 15.732C21.7097 19.31 19.6006 21.419 16.0226 21.419H8.24065C4.65365 21.419 2.54065 19.31 2.54065 15.732V7.932C2.54065 4.359 3.85465 2.25 7.43365 2.25H9.43365C10.1516 2.251 10.8276 2.588 11.2576 3.163L12.1706 4.377C12.6026 4.951 13.2786 5.289 13.9966 5.29H16.8266C20.4136 5.29 21.7376 7.116 21.7376 10.767L21.7097 15.732Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M7.77173 14.4629H16.5067" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>

                                                        </div>
                                                        <span class="nav-text">Plugins</span>
                                                    </a>
                                                    <ul aria-expanded="false">
                                                        <li class="mini-dashboard">Plugins</li>
                                                        <li><a href="./uc-select2.html">Select 2</a></li>
                                                        <li><a href="./uc-nestable.html">Nestable</a></li>
                                                        <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                                                        <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                                                        <li><a href="./uc-toastr.html">Toastr</a></li>
                                                        <li><a href="./map-jqvmap.html">Jqv Map</a></li>
                                                        <li><a href="./uc-lightgallery.html">Light Gallery</a></li>
                                                    </ul>
                                                </li>-->
                        <!--                        <li><a href="widget-basic.html" class="" aria-expanded="false">
                                                        <div class="menu-icon">
                                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.29077 6.5C3.29077 3.87479 3.31888 3 6.79077 3C10.2627 3 10.2908 3.87479 10.2908 6.5C10.2908 9.12521 10.3018 10 6.79077 10C3.2797 10 3.29077 9.12521 3.29077 6.5Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2908 6.5C14.2908 3.87479 14.3189 3 17.7908 3C21.2627 3 21.2908 3.87479 21.2908 6.5C21.2908 9.12521 21.3018 10 17.7908 10C14.2797 10 14.2908 9.12521 14.2908 6.5Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.29077 17.5C3.29077 14.8748 3.31888 14 6.79077 14C10.2627 14 10.2908 14.8748 10.2908 17.5C10.2908 20.1252 10.3018 21 6.79077 21C3.2797 21 3.29077 20.1252 3.29077 17.5Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2908 17.5C14.2908 14.8748 14.3189 14 17.7908 14C21.2627 14 21.2908 14.8748 21.2908 17.5C21.2908 20.1252 21.3018 21 17.7908 21C14.2797 21 14.2908 20.1252 14.2908 17.5Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>

                                                        </div>
                                                        <span class="nav-text">Widget</span>
                                                    </a>
                                                </li>-->
                        <!--                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                                        <div class="menu-icon">
                                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.007 16.2236H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M16.007 12.0371H8.78699" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M11.5421 7.86035H8.78711" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1994 2.75C16.1994 2.75 8.52238 2.754 8.51038 2.754C5.75038 2.771 4.04138 4.587 4.04138 7.357V16.553C4.04138 19.337 5.76338 21.16 8.54738 21.16C8.54738 21.16 16.2234 21.157 16.2364 21.157C18.9964 21.14 20.7064 19.323 20.7064 16.553V7.357C20.7064 4.573 18.9834 2.75 16.1994 2.75Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>

                                                        <span class="nav-text">Forms</span>
                                                    </a>
                                                    <ul aria-expanded="false">
                                                        <li class="mini-dashboard">Forms</li>
                                                        <li><a href="./form-element.html">Form Elements</a></li>
                                                        <li><a href="./form-wizard.html">Wizard</a></li>
                                                        <li><a href="./form-ckeditor.html">CkEditor</a></li>
                                                        <li><a href="form-pickers.html">Pickers</a></li>
                                                        <li><a href="form-validation.html">Form Validate</a></li>
                                                    </ul>
                                                </li>-->
                        <!--                        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                                        <div class="menu-icon">
                                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.6209 16.593H4.32019" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M13.4313 6.90066H19.732" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.01706 6.84625C9.01706 5.5506 7.9589 4.5 6.65392 4.5C5.34893 4.5 4.29077 5.5506 4.29077 6.84625C4.29077 8.14191 5.34893 9.19251 6.65392 9.19251C7.9589 9.19251 9.01706 8.14191 9.01706 6.84625Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2907 16.5533C20.2907 15.2576 19.2334 14.207 17.9284 14.207C16.6226 14.207 15.5645 15.2576 15.5645 16.5533C15.5645 17.8489 16.6226 18.8995 17.9284 18.8995C19.2334 18.8995 20.2907 17.8489 20.2907 16.5533Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>

                                                        </div>
                                                        <span class="nav-text">Table</span>
                                                    </a>
                                                    <ul aria-expanded="false">
                                                        <li class="mini-dashboard">Table</li>
                                                        <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                                                        <li><a href="table-datatable-basic.html">Datatable</a></li>
                                                    </ul>
                                                </li>-->
                        <!-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                                        <div class="menu-icon">
                                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.148 20.417C20.021 20.417 21.54 18.899 21.541 17.026V17.024V14.324C20.304 14.324 19.302 13.322 19.301 12.085C19.301 10.849 20.303 9.846 21.54 9.846H21.541V7.146C21.543 5.272 20.026 3.752 18.153 3.75H18.147H6.43502C4.56102 3.75 3.04202 5.268 3.04102 7.142V7.143V9.933C4.23502 9.891 5.23602 10.825 5.27802 12.019C5.27902 12.041 5.28002 12.063 5.28002 12.085C5.28102 13.32 4.28202 14.322 3.04702 14.324H3.04102V17.024C3.04002 18.897 4.55902 20.417 6.43202 20.417H6.43302H18.148Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6621 9.06303L13.2781 10.31C13.3381 10.432 13.4541 10.517 13.5891 10.537L14.9661 10.738C15.3071 10.788 15.4421 11.206 15.1961 11.445L14.2001 12.415C14.1021 12.51 14.0581 12.647 14.0801 12.782L14.3151 14.152C14.3731 14.491 14.0181 14.749 13.7141 14.589L12.4831 13.942C12.3621 13.878 12.2181 13.878 12.0971 13.942L10.8671 14.589C10.5621 14.749 10.2071 14.491 10.2651 14.152L10.5001 12.782C10.5231 12.647 10.4781 12.51 10.3801 12.415L9.38511 11.445C9.13911 11.206 9.27411 10.788 9.61411 10.738L10.9911 10.537C11.1261 10.517 11.2431 10.432 11.3031 10.31L11.9181 9.06303C12.0701 8.75503 12.5101 8.75503 12.6621 9.06303Z" stroke="#252525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>

                                                        </div>
                                                        <span class="nav-text">Pages</span>
                                                    </a>
                                                    <ul aria-expanded="false">
                                                        <li><a href="./page-login.html">Login</a></li>
                                                        <li><a href="./page-register.html">Register</a></li>
                                                        <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Error</a>
                                                            <ul aria-expanded="false">
                                                                <li><a href="./page-error-400.html">Error 400</a></li>
                                                                <li><a href="./page-error-403.html">Error 403</a></li>
                                                                <li><a href="./page-error-404.html">Error 404</a></li>
                                                                <li><a href="./page-error-500.html">Error 500</a></li>
                                                                <li><a href="./page-error-503.html">Error 503</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="./page-lock-screen.html">Lock Screen</a></li>
                                                        <li><a href="./empty-page.html">Empty Page</a></li>
                                                        <li class="mini-dashboard">Pages</li>
                                                    </ul>
                                                </li>-->
                    </ul>
                    <div class="switch-btn">
                        <a href="{{ route('logout') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.36 6.63965C19.6184 7.89844 20.4753 9.50209 20.8223 11.2478C21.1693 12.9936 20.9909 14.803 20.3096 16.4474C19.6284 18.0918 18.4748 19.4972 16.9948 20.486C15.5148 21.4748 13.7749 22.0026 11.995 22.0026C10.2151 22.0026 8.47515 21.4748 6.99517 20.486C5.51519 19.4972 4.36164 18.0918 3.68036 16.4474C2.99909 14.803 2.82069 12.9936 3.16772 11.2478C3.51475 9.50209 4.37162 7.89844 5.63 6.63965" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 2V12" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--**********************************
                Sidebar end
            ***********************************-->

            <!--**********************************
                Content body start
            ***********************************-->
            <div class="outer-body">
                <div class="inner-body">
                    <div class="content-body">
                        <div class="container-fluid">


                            @yield('content')


                        </div>
                    </div>
                    <div class="footer">
                        <div class="copyright">
                            <p>Copyright © Developed by <a href="#" target="_blank">Prismavix</a> 2023</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--**********************************
                Content body end
            ***********************************-->


            <!--**********************************
                Footer start
            ***********************************-->

            <!--**********************************
                Footer end
            ***********************************-->




        </div>
        <!--**********************************
            Main wrapper end
        ***********************************-->

        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <!--<script src="./vendor/global/global.min.js"></script>-->
        <script src="{{ asset('admin/vendor/global/global.min.js')}}"></script>
            <!--<script src="./vendor/moment/moment.min.js"></script>-->
        <script src="{{ asset('admin/vendor/moment/moment.min.js')}}"></script>
            <!--<script src="./vendor/fullcalendar/js/main.min.js"></script>-->
        <script src="{{ asset('admin/vendor/fullcalendar/js/main.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins-init/fullcalendar-init.js') }}"></script>
        <script src="{{ asset('admin/js/plugins-init/fullcalendar-init.js')}}"></script>
        <script src="{{asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
        <!--<script src="./js/custom.js"></script>-->
        <!--<script src="./js/deznav-init.js"></script>-->
        <script src="{{ asset('admin/js/deznav-init.js')}}"></script>
        <!--/////////////////////////-->
        <!--<script src="./js/dashboard/dashboard-1.js"></script>-->
        <script src="{{ asset('admin/js/dashboard/dashboard-1.js')}}"></script>

        <script src="{{ asset('admin/vendor/draggable/draggable.js') }}"></script>
        <script src="{{ asset('admin/vendor/draggable/draggable.js')}}"></script>

<!--<script src="./vendor/swiper/js/swiper-bundle.min.js"></script>-->
        <script src="{{ asset('admin/vendor/swiper/js/swiper-bundle.min.js')}}"></script>

        <!-- tagify -->
        <!--<script src="./vendor/tagify/dist/tagify.js"></script>-->
        <script src="{{ asset('admin/vendor/tagify/dist/tagify.js')}}"></script>
        
        <!--<script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>-->
        <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>

        <!--<script src="./vendor/datatables/js/dataTables.buttons.min.js"></script>-->
        <script src="{{ asset('admin/vendor/datatables/js/dataTables.buttons.min.js')}}"></script>
        
        <!--<script src="./vendor/datatables/js/buttons.html5.min.js"></script>-->
        <script src="{{ asset('admin/vendor/datatables/js/buttons.html5.min.js')}}"></script>

<!--<script src="./vendor/datatables/js/jszip.min.js"></script>-->
        <script src="{{ asset('admin/vendor/datatables/js/jszip.min.js')}}"></script>
        
<!--<script src="./js/plugins-init/datatables.init.js"></script>-->
        <script src="{{ asset('admin/js/plugins-init/datatables.init.js')}}"></script>
        <!-- Apex Chart -->
        
        <!--<script src="vendor/bootstrap-datetimepicker/js/moment.js"></script>-->
        <script src="{{ asset('admin/vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
        <!--<script src="vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>-->
        <script src="{{ asset('admin/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
        

        <!-- Vectormap -->
        <!--<script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>-->
        <script src="{{ asset('admin/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
<!--<script src="./vendor/jqvmap/js/jquery.vmap.world.js"></script>-->
<script src="{{ asset('admin/vendor/jqvmap/js/jquery.vmap.world.js')}}"></script>
<!--<script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>-->
        <script src="{{ asset('admin/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>

        <script type="text/javascript" src="{{ asset('admin/js/toastr/toastr.min.js')}}  "></script>
        <script type="text/javascript" src="{{ asset('admin/js/create.js')}}  "></script>
        
        <script src="{{ asset('admin/vendor/datatables/js/datatables.min.js')}}"></script>

        <!-- asColorPicker -->
        <script src="{{ asset('admin/vendor/jquery-asColor/jquery-asColor.min.js')}}"></script>
        <script src="{{ asset('admin/vendor/jquery-asGradient/jquery-asGradient.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js')}}"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="{{ asset('admin/js/custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
<script>
    $(document).ready(function () {
        $(".nav-item .open-cal").click(function () {
            $(".calendar-warpper").toggleClass("active");
        });
    });
</script>
<!--data table-->
<script type="text/javascript">
        'use strict';
        $(document).ready(function() {

            // [ HTML5-Export ] start
            $('#example4').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy"></i>',
                        footer: true,
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        footer: true,
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fas fa-file"></i>',
                        footer: true,
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        footer: true,
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        autoPrint: true,
                        // title: '',
                        footer: true,
                        exportOptions: {
                            columns: ':not(:last-child)',
                        },
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                /*.prepend(
                                    '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                                );*/
         
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );

                            $(win.document.body).find( 'caption' )
                                .css( 'font-size', '10px' );

                            $(win.document.body).find('h1')
                                .css({"text-align": "center", "font-size": "16pt"});
                        }
                    }
                   
                ],
                language: {
        			paginate: {
        				next: '<i class="fa-solid fa-angle-right"></i>',
        				previous: '<i class="fa-solid fa-angle-left"></i>' 
        			}
        			
        		},
            });
        });
</script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@yield('customjs')
<style>
    .pagination .paginate_button.page-item a {
        width: fit-content;
        height: fit-content;
        margin: 0;
        padding: 0;
        vertical-align: middle;
        margin-top: 3px;
    }
    .pagination .paginate_button.page-item.active a {
        width: 23px;
        height: 23px;
        font-weight: 900;
        margin-top: 0;
        border-radius: 4px;
    }
    li.paginate_button.page-item.active {
        min-width: fit-content;
        padding: 0;
        margin: 0;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: transparent;
        border: none;
    }
    .btn-group > .btn:not(:last-child):not(.dropdown-toggle), .btn-group > .btn.dropdown-toggle-split:first-child, .btn-group > .btn-group:not(:last-child) > .btn, .btn.btn-secondary.buttons-print {
        background: white;
        color: #a0cf1a;
        font-size: 16px;
        border: 1px solid #a0cf1a;
    }
    div#example4_filter {
        margin-right: 10px;
    }
</style>
<script>
    $(document).ready(function() {
        var mode = "{{ $user->theme }}";
        $('body').attr('data-theme-version', mode);
        $('.dz-layout').addClass(mode);
    $('.dz-layout').click(function() {
        var mode = $('body').attr('data-theme-version')
        // Toggle dark mode class on the body
        $.ajax({
            url: '/user/dark-mode', // URL of the route to handle the request
            type: 'POST',
            data: {
                mode: mode,
                _token: '{{ csrf_token() }}' // Include CSRF token for security
            },
            success: function(response) {
                console.log('Dark mode preference saved.');
            },
            error: function(xhr, status, error) {
                console.error('Error saving dark mode preference:', error);
            }
        });
        
        
    });
});
</script>
<script>
    $(document).ready(function() {
    // Handle the color palette button clicks
    $('#colorPalettes .color-palette').on('click', function() {
        var selectedColor = $(this).data('theme');  // Get the selected color
        
        // Change the theme color dynamically
        $('body').css({
            'background-color': selectedColor,  // Change the background color
            'color': getTextColor(selectedColor) // Change the text color based on the selected color
        });
    });
});

// Function to determine appropriate text color based on background color
function getTextColor(backgroundColor) {
    // Convert hex to RGB
    var rgb = hexToRgb(backgroundColor);
    if (!rgb) return '#000';  // Default text color to black if unable to determine RGB
    
    // Calculate brightness using the luminance formula
    var brightness = 0.2126 * rgb.r + 0.7152 * rgb.g + 0.0722 * rgb.b;
    
    // If brightness is too low, use white text for better contrast
    return brightness < 128 ? '#fff' : '#000';
}

// Convert hex color to RGB
function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    if (result) {
        return {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        };
    }
    return null;
}
</script>
@stack('scripts')
    </body>
</html>