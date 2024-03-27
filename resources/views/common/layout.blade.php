<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/spellbee/logo.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('img/spellbee/logo.png')}}">
    <title>
        Admin|{{$page_title}}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'> -->

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/style_pro.css')}}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('css/glstyle.css')}}" rel="stylesheet" />

     <!-- toaster css -->
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
         integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
 

</head>

<style>
    .table-bordered{
        border-color: #000;
    }
</style>

<body class="g-sidenav-show bg-gray-200  g-sidenav-hidden"> <!-- g-sidenav-hidden -->
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-primary  bg-gra dient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="dashboard">
                <img src="{{ asset('img/spellbee/logo_web1.png')}}" class="navbar-brand-img h-100"
                    alt="main_logo">
                <span class="ms-0 font-weight-bold text-white"><img
                        src="{{ asset('img/spellbee/logo_web2.png')}}" class="navbar-brand-img h-100"
                        alt="main_logo"></span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <!-- <li class="nav-item mb-2 mt-0">
                    <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white <?php echo $active == 'profile ' ? 'active bg-dark' : ''; ?>"
                        aria-controls="ProfileNav" role="button" aria-expanded="false">
                        <img src="{{ asset('img/team-3.jpg')}}" class="avatar">
                        <span class="nav-link-text ms-2 ps-1">Brooklyn Alice</span>
                    </a>
                    <div class="collapse <?php echo $active == 'profile' ? 'show' : ''; ?>" id="ProfileNav" style>
                        <ul class="nav ">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="logout">
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="horizontal light mt-0"> -->
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo $active == 'dashboard' ? 'active bg-dark' : ''; ?> " href="{{route('admin_dashboard')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons ms-1 opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-2">Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white  <?php echo $active == 'product' ? 'active bg-dark' : ''; ?>" href="{{route('product.index')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons ms-1 opacity-10">category</i>
                        </div>
                        <span class="nav-link-text ms-2">Product</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link text-white  <?php echo $active == 'level' ? 'active bg-dark' : ''; ?>" href="level">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons ms-1 opacity-10">clear_all</i>
                        </div>
                        <span class="nav-link-text ms-2"> Levels</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link text-white  <?php echo $active == 'class' ? 'active bg-dark' : ''; ?>" href="{{route('class.index')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-symbols-outlined ms-1 opacity-10">mitre</i>
                        </div>
                        <span class="nav-link-text ms-2"> Class</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo $active == 'godown' ? 'active bg-dark' : ''; ?> " href="{{route('godown.index')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-symbols-outlined  opacity-10">account_tree</i>
                        </div>
                        <span class="nav-link-text ms-2">Godown</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#material" class="nav-link text-white <?php echo $active == 'material_creation' || $active == 'all_material' ? 'active bg-dark' : ''; ?>"
                        aria-controls="material" role="button" aria-expanded="false">
                        <i class="material-symbols-outlined  opacity-10">menu_book</i>
                        <span class="nav-link-text ms-2 ">Material</span>
                    </a>
                    <div class="collapse  <?php echo $active == 'material_creation' || $active == 'all_material' ? 'show' : ''; ?> " id="material">
                        <ul class="nav ">
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'material_creation' ? 'active' : ''; ?>" href="{{route('material.index')}}">
                                    <span class="sidenav-mini-icon"> MC </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Material Creation </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'all_material' ? 'active' : ''; ?>" href="{{route('material.all_materials')}}">
                                    <span class="sidenav-mini-icon"> AM </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> All Material </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#coordinator" class="nav-link text-white <?php echo $active == 'coordinator_creation' || $active == 'all_coordinator' ? 'active bg-dark' : ''; ?>"
                        aria-controls="coordinator" role="button" aria-expanded="false">
                        <i class="material-icons opacity-10">diversity_3</i>
                        <span class="nav-link-text ms-2 "> Coordinator</span>
                    </a>
                    <div class="collapse  <?php echo $active == 'coordinator_creation' || $active == 'all_coordinator' ? 'show' : ''; ?> " id="coordinator">
                        <ul class="nav ">
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'coordinator_creation' ? 'active' : ''; ?>" href="{{route('coordinator.index')}}">
                                    <span class="sidenav-mini-icon"> CC </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Add Coordinator </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'all_coordinator' ? 'active' : ''; ?>" href="{{route('coordinator.allCoordinators')}}">
                                    <span class="sidenav-mini-icon"> AC </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> All Coordinator </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#school" class="nav-link text-white <?php echo $active == 'school_registration' || $active == 'all_school' || $active == 'all_school_list' ? 'active bg-dark' : ''; ?>"
                        aria-controls="school" role="button" aria-expanded="false">
                        <i class="material-icons opacity-10">school</i>
                        <span class="nav-link-text ms-2 ">Schools </span>
                    </a>
                    <div class="collapse  <?php echo $active == 'school_registration' || $active == 'registered_school' || $active == 'all_school_list' ? 'show' : ''; ?> " id="school">
                        <ul class="nav ">
                            <li class="nav-item  ">
                                <a class="nav-link text-white <?php echo $active == 'school_registration' ? 'active' : ''; ?>" href="{{ route('school.index')}}">
                                    <span class="sidenav-mini-icon"> SC </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Schools Registration</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'registered_school' ? 'active' : ''; ?>" href="{{ route('school.registered_schools') }}">
                                    <span class="sidenav-mini-icon"> AS </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Registered Schools </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'all_school_list' ? 'active' : ''; ?>" href="{{ route('school.all_schools') }}">
                                    <span class="sidenav-mini-icon"> AS </span>
                                    <span class="sidenav-normal  ms-2  ps-1">List Of Schools</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#student" class="nav-link text-white <?php echo $active == 'student_creation' || $active == 'all_student' ? 'active bg-dark' : ''; ?>"
                        aria-controls="student" role="button" aria-expanded="false">
                        <i class="fas fa-user-graduate opacity-10" style='font-size:19px'></i>
                        <span class="nav-link-text ms-2 ">Student </span>
                    </a>
                    <div class="collapse <?php echo $active == 'student_creation' || $active == 'all_student' ? 'show' : ''; ?>" id="student">
                        <ul class="nav ">
                            <li class="nav-item  ">
                                <a class="nav-link text-white <?php echo $active == 'student_creation' ? 'active' : ''; ?>" href="{{ route('student.index') }}">
                                    <span class="sidenav-mini-icon"> SC </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Student Creation </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'all_student' ? 'active' : ''; ?>" href="{{route('student.all_students')}}">
                                    <span class="sidenav-mini-icon"> AS </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> All Student </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#year" class="nav-link text-white <?php echo $active == 'year' || $active == 'year_details' ? 'active bg-dark' : ''; ?>"
                        aria-controls="batch" role="button" aria-expanded="false">
                        <i class="material-symbols-outlined opacity-10">hive</i>
                        <span class="nav-link-text ms-2 ">Year</span>
                    </a>
                    <div class="collapse  <?php echo $active == 'year' || $active == 'year_details' ? 'show' : ''; ?> " id="year">
                        <ul class="nav ">
                            <li class="nav-item  ">
                                <a class="nav-link text-white <?php echo $active == 'year' ? 'active' : ''; ?> " href="{{route('year.index')}}">
                                    <span class="sidenav-mini-icon"> BC </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Year Creation </span>
                                </a>
                            </li>
                            {{-- <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'year_details' ? 'active' : ''; ?> " href="batch_details">
                                    <span class="sidenav-mini-icon"> BD </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Year Details </span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#exam" class="nav-link text-white <?php echo $active == 'mock_test_exam_creation' || $active == 'final_test_exam_creation' || $active == 'mock_exam_list' || $active == 'final_exam_list' ? 'active bg-dark' : ''; ?>"
                        aria-controls="exam" role="button" aria-expanded="false">
                        <i class="material-symbols-outlined opacity-10">stylus_note</i>
                        <span class="nav-link-text ms-2 ">Exam</span>
                    </a>
                    <div class="collapse  <?php echo $active == 'mock_test_exam_creation' || $active == 'final_test_exam_creation' || $active == 'mock_exam_list' || $active == 'final_exam_list' ? 'show' : ''; ?> " id="exam">
                        <ul class="nav ">
                            <li class="nav-item  ">
                                <a class="nav-link text-white <?php echo $active == 'mock_test_exam_creation' ? 'active' : ''; ?>" href="{{route('mockExam.index')}}">
                                    <span class="sidenav-mini-icon"> EC </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Mock Test Exam Creation </span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a class="nav-link text-white <?php echo $active == 'final_test_exam_creation' ? 'active' : ''; ?>" href="{{route('finalExam.index')}}">
                                    <span class="sidenav-mini-icon"> FC </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Final Test Exam Creation </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'mock_exam_list' ? 'active' : ''; ?>" href="{{route('mockExam.list')}}">
                                    <span class="sidenav-mini-icon"> ML </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Mock Exam list </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'final_exam_list' ? 'active' : ''; ?>" href="{{route('finalExam.list')}}">
                                    <span class="sidenav-mini-icon"> FL </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Final Exam list </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo $active == 'result' ? 'active bg-dark' : ''; ?> " href="result">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons ms-1 opacity-10">list_alt</i>
                        </div>
                        <span class="nav-link-text ms-2">Result</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#newss" class="nav-link text-white <?php echo $active == 'news_notifications' || $active == 'news_notifications_list' ? 'active bg-dark' : ''; ?>"
                        aria-controls="newss" role="button" aria-expanded="false">
                        <i class="material-symbols-outlined opacity-10">newspaper</i>
                        <span class="nav-link-text ms-2 "> Notifications</span>
                    </a>
                    <div class="collapse <?php echo $active == 'news_notifications' || $active == 'news_notifications_list' ? 'show' : ''; ?> " id="newss">
                        <ul class="nav ">
                            <li class="nav-item  ">
                                <a class="nav-link text-white <?php echo $active == 'news_notifications' ? 'active' : ''; ?>" href="{{route('notification.index')}}">
                                    <span class="sidenav-mini-icon"> NC </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Notifications Create </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'news_notifications_list' ? 'active' : ''; ?>" href="{{route('notification.allNotification')}}">
                                    <span class="sidenav-mini-icon"> NL </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Notifications list </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo $active == 'payment' ? 'active bg-dark' : ''; ?> " href="{{route('paymentList')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons ms-1 opacity-10">payments</i>
                        </div>
                        <span class="nav-link-text ms-2">Payments</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#order" class="nav-link text-white <?php echo $active == 'pending_order' || $active == 'dispatch_order' || $active == 'executed_order' || $active = 'received_order' ? 'active bg-dark' : ''; ?>"
                        aria-controls="order" role="button" aria-expanded="false">
                        <i class="material-symbols-outlined opacity-10">order_approve</i>
                        <span class="nav-link-text ms-2 ">Order</span>
                    </a>
                    <div class="collapse <?php echo $active == 'pending_order' || $active == 'dispatch_order' || $active == 'executed_order' ? 'show' : ''; ?>" id="order">
                        <ul class="nav ">
                            <li class="nav-item  ">
                                <a class="nav-link text-white <?php echo $active == 'pending_order' ? 'active' : ''; ?>" href="{{route('dashboard.pendingOrders')}}">
                                    <span class="sidenav-mini-icon"> PO </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Pending orders</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a class="nav-link text-white <?php echo $active == 'dispatch_order' ? 'active' : ''; ?>" href="{{route('dashboard.dispatchOrders')}}">
                                    <span class="sidenav-mini-icon"> PO </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Dispatch orders</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'executed_order' ? 'active' : ''; ?>" href="{{route('dashboard.executedOrders')}}">
                                    <span class="sidenav-mini-icon"> EO </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Executed orders</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'received_order' ? 'active' : ''; ?>" href="{{route('dashboard.receivedOrders')}}">
                                    <span class="sidenav-mini-icon"> EO </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Received orders</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#stock" class="nav-link text-white <?php echo $active == 'stock_add' || $active == 'stock_list' ? 'active bg-dark' : ''; ?>"
                        aria-controls="stock" role="button" aria-expanded="false">
                        <i class="material-symbols-outlined opacity-10">inventory_2</i>
                        <span class="nav-link-text ms-2 ">Stock</span>
                    </a>
                    <div class="collapse <?php echo $active == 'stock_add' || $active == 'stock_list' ? 'show' : ''; ?>" id="stock">
                        <ul class="nav ">
                            <!-- <li class="nav-item  ">
                <a class="nav-link text-white <?php echo $active == 'stock_add' ? 'active' : ''; ?>" href="stock_add">
                  <span class="sidenav-mini-icon"> AC </span>
                  <span class="sidenav-normal  ms-2  ps-1">Add Stock</span>
                </a>
              </li> -->
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'stock_list' ? 'active' : ''; ?>" href="{{route('stock.index')}}">
                                    <span class="sidenav-mini-icon"> SL </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Stock List </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo $active == 'r_upload' ? 'active bg-dark' : ''; ?> " href="{{route('adminResource.index')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons ms-1 opacity-10">upload</i>
                        </div>
                        <span class="nav-link-text ms-2">Upload Resources</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo $active == 'school_order_file' ? 'active bg-dark' : ''; ?>" href="{{route('adminSchoolOrderView')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-symbols-outlined opacity-10">format_align_justify</i>
                        </div>
                        <span class="nav-link-text ms-2">School Order files</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo $active == 'office_contact' ? 'active bg-dark' : ''; ?>" href="{{route('officeContact.index')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-symbols-outlined opacity-10">call</i>
                        </div>
                        <span class="nav-link-text ms-2">Office Contact</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#location" class="nav-link text-white <?php echo $active == 'country' || $active == 'pincode' || $active == 'state' || $active == 'city' ? 'active bg-dark' : ''; ?>"
                        aria-controls="location" role="button" aria-expanded="false">
                        <i class="material-symbols-outlined  opacity-10">menu_book</i>
                        <span class="nav-link-text ms-2 ">Locations</span>
                    </a>
                    <div class="collapse  <?php echo $active == 'country' || $active == 'pincode' || $active == 'state' || $active == 'city' ? 'show' : ''; ?> " id="location">
                        <ul class="nav ">
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'country' ? 'active' : ''; ?>" href="{{route('country.index')}}">
                                    <span class="sidenav-mini-icon"> CC </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Country Creation </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'state' ? 'active' : ''; ?>" href="{{ route('state.index') }}">
                                    <span class="sidenav-mini-icon"> SC </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> State Creation </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'pincode' ? 'active' : ''; ?>" href="{{route('pincode.index')}}">
                                    <span class="sidenav-mini-icon"> PC </span>
                                    <span class="sidenav-normal  ms-2  ps-1">Pincode Creation </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white <?php echo $active == 'city' ? 'active' : ''; ?>" href="{{route('city.index')}}">
                                    <span class="sidenav-mini-icon"> PC </span>
                                    <span class="sidenav-normal  ms-2  ps-1">City Creation </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <!-- <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav> -->
                <div class="sidenav-toggler sidenav-toggler-inner me-4 d-xl-block d-none ">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </div>


                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class=" pe-md-3 d-flex align-items-center d-xl-none">
                        <img src="{{ asset('img/spellbee/logo_web2.png')}}" class=""
                            style="max-width: 130px;" alt="main_logo">
                    </div>
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                                <span
                                    class="position-absolute top-15 start-80 translate-middle badge rounded-pill bg-danger border border-white small py-0 px-1">
                                    <span class="small opacity-0">.</span>
                                </span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{ asset('img/team-2.jpg')}}"
                                                    class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{ asset('img/small-logos/logo-spotify.svg')}}"
                                                    class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown d-flex align-items-center">
                            <a href=" " class="nav-link text-body font-weight-bold px-0"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Admin</span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton1">
                                <li class="mb-2">
                                    <di class="dropdown-item border-radius-md">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{ asset('img/team-2.jpg')}}"
                                                    class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">Name name </span>
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    Admin
                                                </p>
                                            </div>
                                        </div>
                                        </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md mx-auto text-center" href="{{route('logout')}}">
                                        <button type="button" class="m-auto px-5 btn btn-info ">logout</button>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        {{-- end of header section --}}

        @yield('page_content_body')
        @yield('edit_model')

        {{-- begining of footer section --}}

        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center text-center ">
                    <div class="col-lg-12 mb-lg-0 mb-4 ">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,

                            <a href="" class="font-weight-bold" target="_blank">Spellbee</a>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                          <li class="nav-item">
                            <a href=" " class="nav-link text-muted" target="_blank">one</a>
                          </li>
                          <li class="nav-item">
                            <a href=" " class="nav-link text-muted" target="_blank">two</a>
                          </li>
                          <li class="nav-item">
                            <a href=" " class="nav-link text-muted" target="_blank">three</a>
                          </li>
                          <li class="nav-item">
                            <a href=" " class="nav-link pe-0 text-muted" target="_blank">four</a>
                          </li>
                        </ul>
                      </div> -->
                </div>
            </div>
        </footer>
    </main>

     <!--  jquery   -->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/popper.min.js')}}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{ asset('js/plugins/password.js')}}"></script>

    {{-- project related js --}}
    <script src="{{ asset('js/admin/classes.js')}}"></script>
    <script src="{{ asset('js/admin/product.js')}}"></script>
    <script src="{{ asset('js/admin/material.js')}}"></script>
    <script src="{{ asset('js/admin/school.js')}}"></script>
    <script src="{{ asset('js/admin/country.js')}}"></script>
    <script src="{{ asset('js/admin/pincode.js')}}"></script>
    <script src="{{ asset('js/admin/state.js')}}"></script>
    <script src="{{ asset('js/admin/city.js')}}"></script>
    <script src="{{ asset('js/admin/student.js')}}"></script>
    <script src="{{ asset('js/admin/godown.js')}}"></script>
    <script src="{{ asset('js/admin/stock.js')}}"></script>
    <script src="{{ asset('js/admin/year.js')}}"></script>
    <script src="{{ asset('js/admin/exam.js')}}"></script>
    <script src="{{ asset('js/admin/coordinator.js')}}"></script>
    <script src="{{ asset('js/coordinator/coordinator_order.js')}}"></script>
    <script src="{{asset('js/coordinator/coordinator_payment.js')}}"></script>
    <script src="{{ asset('js/admin/office_contact.js')}}"></script>
    <script src="{{ asset('js/admin/admin_resource.js')}}"></script>
    <script src="{{ asset('js/school/school_upload_order.js')}}"></script>
    <script src="{{ asset('js/admin/notification.js')}}"></script>
    <script src="{{ asset('js/admin/examiner.js')}}"></script>

 <!-- toaster js -->
 <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <!-- <script src="{{ asset('js/material-dashboard.min.js?v=3.1.0')}}"></script> -->
    <script src="{{ asset('js/prog.js')}}"></script>
</body>

</html>
