
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ISPSM | Admin Panel</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Rahul Kumar" />

    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url();?>admin_assets/images/favicon.ico" type="image/x-icon">

    <!-- fontawesome icon -->
    <link rel="stylesheet" href="<?= base_url();?>admin_assets/fonts/fontawesome/css/font-awesome.min.css">

    <!-- animation css -->
    <link rel="stylesheet" href="<?= base_url();?>admin_assets/plugins/animation/css/animate.min.css">
    <!-- data tables css -->
    <link rel="stylesheet" href="<?= base_url();?>admin_assets/plugins/data-tables/css/datatables.min.css">

    <!-- vandor css -->
    <link rel="stylesheet" href="<?= base_url();?>admin_assets/css/style.css">

    <link rel="stylesheet" href="<?= base_url();?>admin_assets/plugins/summernote/summernote.min.css">

    


</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="<?= base_url();?>" class="b-brand">

                    <span class="b-title">ISPSM</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="active">
                        <a href="<?= base_url();?>dashboard/home" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    
                   
                    <li class="nav-item pcoded-menu-caption">
                        <label>Conferences</label>
                    </li>

                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Conference</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?= base_url();?>conference/create">Create Conference</a></li>
                            <li class=""><a href="<?= base_url();?>conference/manage">Manage Conference</a></li>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Programs</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?= base_url();?>programs/create">Create Programs</a></li>
                            <li class=""><a href="<?= base_url();?>programs/manage">Manage Programs</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
            <a href="index.html" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-trending-up"></i>
                   </div>
                   <span class="b-title">Onconxt</span>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="#!">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            </ul>
            <ul class="navbar-nav ml-auto">                
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="<?= base_url()?>admin_assets/images/user/avatar-1.png" class="img-radius" alt="Rahul Kumar">
                                <span>Rahul Kumar</span>
                                <a href="<?= base_url();?>admin/logout" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="<?= base_url();?>admin/logout" class="dropdown-item"><i class="feather icon-lock"></i> Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>

    <section class="header-user-list">
        
        <div class="h-list-body">
            <a href="#!" class="h-close-text"><i class="feather icon-chevrons-right"></i></a>
            <div class="main-friend-cont scroll-div">
                <div class="main-friend-list">
                    <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe">
                        <a class="media-left" href="#!"><img class="media-object img-radius" src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image ">
                            <div class="live-status">3</div>
                        </a>
                        <div class="media-body">
                            <h6 class="chat-header">Rahul Kumar<small class="d-block text-c-green">Typing . . </small></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="header-chat">
        <div class="h-list-header">
            <h6>Rahul Kumar</h6>
            <a href="#!" class="h-back-user-list"><i class="feather icon-chevron-left"></i></a>
        </div>
        <div class="h-list-body">
            <div class="main-chat-cont scroll-div">
                <div class="main-friend-chat">
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!"><img class="media-object img-radius img-radius m-t-5" src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image"></a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">Hello Rahul</p>
                                <p class="chat-cont">about yourself?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <section class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <?php
               if(isset($view_file))
               {
               $this->load->view($view_module.'/'.$view_file);
               }

            ?>
        </div>
    </section>


    <!-- Required Js -->
    <script src="<?= base_url();?>admin_assets/js/vendor-all.min.js"></script>
    <script src="<?= base_url();?>admin_assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>admin_assets/js/pcoded.min.js"></script>
    <!-- datatable Js -->
    <script src="<?= base_url();?>admin_assets/plugins/data-tables/js/datatables.min.js"></script>
    <script src="<?= base_url();?>admin_assets/js/pages/tbl-datatable-custom.js"></script>

   <script src="<?= base_url();?>admin_assets/plugins/summernote/summernote.min.js"></script>

</body>
</html>
