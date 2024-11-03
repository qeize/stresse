<?php
$page = 'Login';
define('allow', TRUE);
include_once('inc.php');

if ($User->IsLoged() == true) {
   $Alert->SaveAlert('Welcome back!', 'success');
   header('Location: home');
   die();
}

header('Cache-Control: public, max-age=300');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="stresse.re" name="author">
    <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport">
    <meta content="Stresser Re is one of the best IP Stresser that has attack methods like `Rapid Reset` being able to disable many protected layer 7 targets." name="description">
    <meta content="free stresser, top stresser, stressthem, stress them, stress denial of service, dos, stresser app,booter,ip stresser, stresser, booter, ddos tool, ddos attack, ddos attack online, layer7 ddos, layer4 ddos, api, api access, network stresser, network booter, slowloris, best Booter, best stresser, strongest stresser, powerful booter, ddoser, ddos, gbooter, top booter, ipstress, booter, stresser, network stresser, network booter, #Booter, BROWSER, captcha bypass, drdos,ssyn, dns amplification" name="keywords">
    <meta content="https://stresse.re" name="application-url">
    <meta content="Stresser Re" name="application-name">
    <meta content="index, follow" name="robots">
    <meta property="og:title" content="The most advanced DDoS tools on the DDoS market."/>
    <meta property="og:description" content="Stresser Re is one of the best IP Stresser that has attack methods like " Rapid Reset
    " being able to disable many protected layer 7 targets."/>
    <meta property="og:image" content="/assets/images/favicon-32x32.png"/>
    <meta property="og:url" content="https://stresse.re"/>
    <meta property="og:type" content="website"/>
    <title><? echo $domain ?> - <? echo $page ?></title>
    <link rel="shortcut icon" href="<?php echo $assets; ?>assets/media/favicon/favicon.ico"/>
    <!--end::Fonts-->
    <link href="<?php echo $assets; ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $assets; ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $assets; ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <link rel="preconnect" href="https://ajax.cloudflare.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
</head>
<body id="kt_body" class="aside-enabled">
<!--begin::wrapper -->
<div class="wrapper d-flex flex-column">
    <!--begin::Header-->
    <div class="header align-items-stretch">
        <!--begin::Brand-->
        <div class="header-brand">
            <!--begin::Logo-->
            <a href="index"><img alt="Logo" src="assets/media/logos/logo.svg"/></a>
            <span class="fs-1"><?php echo $domain ?></span>
            <!--end::Logo-->
            <!--begin::Aside toggle-->
            <div class="d-flex align-items-center d-lg-none me-n2">
                <a href="register">
                    <i class="ki-duotone ki-address-book fs-4hx">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                    </i>
                </a>
            </div>
            <!--end::Aside toggle-->
        </div>
        <!--end::Brand-->
        <!--begin::Toolbar-->
        <div class="toolbar d-flex align-items-stretch">
            <!--begin::Toolbar container-->
            <div class="container-xxl py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-end">
                <!--begin::Action group-->
                <div class="d-flex align-items-stretch overflow-auto pt-3 pt-lg-0">
                    <!--begin::Theme mode-->
                    <div class="d-flex align-items-center">
                        <!--begin::Menu toggle-->
                        <a href="#" class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-address-book fs-2hx">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                        </a>
                        <!--begin::Menu toggle-->
                    </div>
                    <!--end::Theme mode-->
                </div>
                <!--end::Action group-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
</div>
<!--end::wrapper -->
<!-- begin:: Login -->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-column flex-column-fluid-jum flex-lg-row justify-content-center">
        <div class="d-flex flex-center w-lg-50 p-10">
            <!--begin::Card-->
            <div class="card rounded-1 w-md-650px">
                <!--begin::Card body-->
                <div class="card-body p-10 p-lg-6">
                    <!--begin::Form-->
                    <form method="POST" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="Login">
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Login</h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::csrf token input -->
                        <input hidden="hidden" type="text" id="_csrf" value="<?php echo $csrftoken; ?>">
                        <!--end::csrf token input -->
                        <!--begin::Input group=-->
                        <div class="input-group input-group-solid mb-5">
                            <span class="input-group-text">
                                <i class="ki-duotone ki-user-tick fs-2qx">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                    <i class="path3"></i>
                                </i>
                            </span>
                            <input type="text" class="form-control" name="Username" placeholder="Username" aria-label="Username">
                        </div>
                        <!--end::Input group=-->
                        <div class="input-group input-group-solid mb-5">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="ki-duotone ki-key-square fs-2qx">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                </i>
                            </span>
                            <input type="password" class="form-control" name="Password" placeholder="Password" aria-label="Password">
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-3">
                                Login
                            </button>
                        </div>
                        <!--end::Submit button-->
                        <!--begin::Sign In-->
                        <div class="text-gray-500 text-center fw-bold fs-6 mt-2">Not a Member yet?
                            <a href="/register" class="link-primary">Sign up</a>
                        </div>
                        <!--end::Sign In-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Page-->
</div>
<!-- end:: Login -->
<!--begin::Footer-->
<div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
    <!--begin::Container-->
    <div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1">2023&copy;</span>
            <a href="https://<?php echo $domain ?>" target="_blank" class="text-gray-800 text-hover-primary"><?php echo $domain ?></a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2">Support</a>
            </li>
            <li class="menu-item">
                <a href="purchase" target="_blank" class="menu-link px-2">Purchase</a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->
<!--end::Wrapper-->
<!--end::Page-->
<!--end::Root-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-duotone ki-arrow-up">
        <span class="path1"></span><span class="path2"></span>
    </i>
</div>
<!--end::Scrolltop-->
<!--begin::Javascript-->
<!--begin::Main-JS-->
<script src="<?php echo $assets; ?>assets/js/scripts.bundle.js"></script>
<script src="<?php echo $assets; ?>assets/plugins/global/plugins.bundle.js"></script>
<!--end::Main-JS-->
<script src="<?php echo $assets; ?>assets/js/custom/home.js"></script>
<script src="<?php echo $assets; ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Javascript-->
</body>
</html>