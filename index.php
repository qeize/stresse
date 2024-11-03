<?php
define('allow', TRUE);
include_once('inc.php');
header('Cache-Control: public, max-age=25');
?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
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
    <meta property="og:description" content="Stresser Re is one of the best IP Stresser that has attack methods like ` Rapid Reset ` being able to disable many protected layer 7 targets."/>
    <meta property="og:image" content="/assets/images/favicon-32x32.png"/>
    <meta property="og:url" content="https://stresse.re"/>
    <meta property="og:type" content="website"/>
    <title>stresse.re - Best ddos utility with modern mechanism of attack</title>
    <link rel="shortcut icon" href="/assets/media/favicon/favicon.ico"/>
    <!--end::Fonts-->
    <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <link rel="preconnect" href="https://ajax.cloudflare.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
<!--begin::Theme mode setup on page load-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Header Section-->
    <div class="mb-0" id="home">
        <!--begin::Wrapper-->
        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="  background-image: url(/assets/media/f12.png); background-repeat: repeat;">
            <!--begin::Header-->
            <div class="landing-header"
                 data-kt-sticky="true"
                 data-kt-sticky-name="landing-header"
                 data-kt-sticky-offset="{default: '200px', lg: '300px'}">

                <!--begin::Container-->
                <div class="container">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-center justify-content-between">
                        <!--begin::Logo-->
                        <div class="d-flex align-items-center flex-equal">
                            <!--begin::Mobile menu toggle-->
                            <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                                <i class="ki-duotone ki-abstract-14 fs-2hx"><span class="path1"></span><span class="path2"></span></i>
                            </button>
                            <!--end::Mobile menu toggle-->

                            <!--begin::Logo image-->
                            <a href="/index">
                                <img alt="Logo" src="/assets/media/logos/logo.svg" class="logo-default"/>
                                <img alt="Logo" src="/assets/media/logos/logo.svg" class="logo-sticky"/>
                            </a>
                            <!--end::Logo image-->
                        </div>
                        <!--end::Logo-->

                        <!--begin::Menu wrapper-->
                        <div class="d-lg-block" id="kt_header_nav_wrapper">
                            <div
                             class="d-lg-block p-5 p-lg-0"
                             data-kt-drawer="true"
                             data-kt-drawer-name="landing-menu"
                             data-kt-drawer-activate="{default: true, lg: false}"
                             data-kt-drawer-overlay="true"
                             data-kt-drawer-width="200px"
                             data-kt-drawer-direction="start"
                             data-kt-drawer-toggle="#kt_landing_menu_toggle"

                             data-kt-swapper="true"
                             data-kt-swapper-mode="prepend"
                             data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">

                                <!--begin::Menu-->
                                <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                            Home </a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#how-it-works" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                            How it Works </a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#pricing" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                            Pricing </a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item">
                                        <!--begin::Menu link-->
                                        <a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="https://t.me/slowaris">
                                            Contact </a>
                                        <!--end::Menu link-->
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Menu wrapper-->

                        <!--begin::Toolbar-->
                        <div class="flex-equal text-end ms-1">
                            <a href="/login" class="btn btn-sm btn-primary">Sign In</a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->

            <!--begin::Landing hero-->
            <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                <div class="container">
                    <!--begin::Heading-->
                    <div class="text-center mt-15 mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-white fw-bold mb-5">Better than never</h3>
                        <!--end::Title-->

                        <!--begin::Description-->
                        <div class="fs-5 text-gray-700 fw-bold">
                            One of the best professional service for DDoS for Hire <br>
                            you won't find cheaper and better
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Statistics-->
                    <div class="d-flex flex-center">
                        <!--begin::Items-->
                        <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-1200px">
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('/assets/media/svg/octagon.svg')">
                                <!--begin::Symbol-->
                                <i class="ki-duotone ki-airplane  fs-2tx text-white mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--end::Symbol-->
                                <!--begin::Info-->
                                <div class="mb-0 text-center">
                                    <!--begin::Value-->
                                    <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                        <div class="counted" data-kt-countup="true" data-kt-countup-value="<?php echo (int)$ALogs->LogsDataRunning()['Count']; ?>" data-kt-countup-suffix="+" data-kt-initialized="0"><?php echo (int)$ALogs->LogsDataRunning()['Count']; ?>+</div>
                                    </div>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                    <span class="text-gray-600 fw-bold fs-5 lh-0">
                                        Running Attacks </span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('/assets/media/svg/octagon.svg')">
                                <!--begin::Symbol-->
                                <i class="ki-duotone ki-element-11 fs-2tx text-white mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                <!--end::Symbol-->
                                <!--begin::Info-->
                                <div class="mb-0 text-center">
                                    <!--begin::Value-->
                                    <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                        <div class="counted" data-kt-countup="true" data-kt-countup-value="<?php echo (int)$ALogs->LogsDataAll()['Count']; ?>" data-kt-countup-suffix="+" data-kt-initialized="0"><?php echo (int)$ALogs->LogsDataAll()['Count']; ?>+</div>
                                    </div>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                    <span class="text-gray-600 fw-bold fs-5 lh-0">
                                        Daily Attacks </span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('/assets/media/svg/octagon.svg')">
                              <!--begin::Symbol-->
                              <i class="ki-duotone ki-graph-up fs-2tx text-white mb-3">
                                 <i class="path1"></i>
                                 <i class="path2"></i>
                                 <i class="path3"></i>
                                 <i class="path4"></i>
                                 <i class="path5"></i>
                                 <i class="path6"></i>
                              </i>
                              <!--end::Symbol-->
                              <!--begin::Info-->
                              <div class="mb-0 text-center">
                                 <!--begin::Value-->
                                 <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                    <div class="counted" data-kt-countup="true" data-kt-countup-value="<?php echo (int)$ALogs->TotalAttacks(); ?>" data-kt-countup-suffix="+" data-kt-initialized="0"><?php echo (int)$ALogs->TotalAttacks(); ?>+</div>
                                 </div>
                                 <!--end::Value-->
                                 <!--begin::Label-->
                                 <span class="text-gray-600 fw-bold fs-5 lh-0">
                                    Total Attacks </span>
                                 <!--end::Label-->
                              </div>
                              <!--end::Info-->
                           </div>
                           <!--end::Item-->

                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Statistics-->

                    <!--begin::Testimonial-->
                    <div class="fs-2 fw-bold text-muted text-center mb-3">
                        <span class="fs-1 lh-1 text-gray-700">“</span>
                        We provide the best services for testing your web application
                        <br>
                        using one of the famous rapid reset mechanism.
                        <span class="fs-1 lh-1 text-gray-700">“</span>
                    </div>
                    <!--end::Testimonial-->

                    <!--begin::Author-->
                    <div class="fs-2 fw-semibold text-muted text-center">
                        <a href="https://t.me/slowaris" class="link-primary fs-4 fw-bold">Slowaris,</a>

                        <span class="fs-4 fw-bold text-gray-600">Stresse.re CEO</span>
                    </div>
                    <!--end::Author-->
                </div>
            </div>
            <!--end::Landing hero-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Header Section-->

    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2">

        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">How
                    it Works</h3>
                <!--end::Title-->

                <!--begin::Text-->
                <div class="fs-5 text-gray-800 fw-bold">
                    When registering, you get free access with limited features.<br>
                    In order to unlock paid features, you should buy access
                </div>
                <!--end::Text-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-md-20 d-flex justif-content-center">
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="/assets/media/login-sketch.png" class="mh-125px mb-9" alt=""/>
                        <!--end::Illustration-->

                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
                            <!--end::Badge-->

                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bold text-dark text-gray-800">
                                Auth & Register
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted text-center">
                            Registration in just 15 seconds!</br>
                            Login in to get free access.</br>
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="/assets/media/dollar-currency.png" class="mh-125px mb-9" alt=""/>
                        <!--end::Illustration-->

                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
                            <!--end::Badge-->

                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bold text-dark text-gray-800">
                                Paid Plan
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Description-->
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                            Make a deposit with some currency<br/>
                            Open purchase page and select plan<br/>
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="/assets/media/favorites-star-sketch.png" class="mh-125px mb-9" alt=""/>
                        <!--end::Illustration-->

                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
                            <!--end::Badge-->

                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bold text-dark text-gray-800">
                                Enjoy App
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                            Now you can click panel<br/>
                            And enjoy all the features<br/>
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->

                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Product slider-->
            <div class="tns tns-default">
                <!--begin::Slider-->
                <div
                 data-tns="true"
                 data-tns-loop="true"
                 data-tns-swipe-angle="false"
                 data-tns-speed="2000"
                 data-tns-autoplay="true"
                 data-tns-autoplay-timeout="18000"
                 data-tns-controls="true"
                 data-tns-nav="false"
                 data-tns-items="1"
                 data-tns-center="false"
                 data-tns-dots="false"
                 data-tns-prev-button="#kt_team_slider_prev1"
                 data-tns-next-button="#kt_team_slider_next1">

                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="/assets/media/1.jpg" class="card-rounded shadow mh-lg-650px mw-100" alt=""/>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="/assets/media/2.jpg" class="card-rounded shadow mh-lg-650px mw-100" alt=""/>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="/assets/media/3.jpg" class="card-rounded shadow mh-lg-650px mw-100" alt=""/>
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Slider-->
                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                    <i class="ki-duotone ki-left fs-2x"></i></button>
                <!--end::Slider button-->

                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                    <i class="ki-duotone ki-right fs-2x"></i></button>
                <!--end::Slider button-->
            </div>
            <!--end::Product slider-->


        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->


    <!--begin::Pricing Section-->
    <div class="mt-sm-n1">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color ">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->

        <!--begin::Wrapper-->
        <div class="py-20 landing-dark-bg ">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column container pt-lg-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="fs-2hx fw-bold text-white mb-5" id="pricing" data-kt-scroll-offset="{default: 100, lg: 150}">
                            Clear Pricing Makes it Easy</h1>

                        <div class="text-gray-600 fw-semibold fs-5">
                            One of the cheapest services with huge potential
                        </div>
                    </div>
                    <!--end::Heading-->

                    <!--begin::Pricing-->
                    <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Bet</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $15
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">1</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">900</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">false</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">false</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Pet</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $45
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">3</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">2400</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">false</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">false</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Met</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $95
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">5</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">3600</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">false</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">false</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Ket</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $155
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">7</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">4500</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Dep</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $195
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">9</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">5100</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Jet</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $245
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">11</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">6200</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Got</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $275
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">15</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">7200</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Sim</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $335
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">20</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">8100</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Hot</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $405
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">25</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">9200</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Gam</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $755
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">50</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">10600</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Yon</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $985
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">75</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">10600</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                            <div class="card card-xl-stretch mb-xl-8">
                                <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                                    <div class="card-title fw-bold fs-1">Din</div>
                                    <div class="ribbon-label bg-info fw-bold fs-2">
                                        $1205
                                    </div>
                                </div>
                                <!--begin::Body-->
                                <div class="card-body m-4 mt-0 mb-0 pt-3 pb-3">
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-graph-up fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                    <span class="path3"></span><span class="path4"></span>
                                                    <span class="path5"></span><span class="path6"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                    Concurrents
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">95</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-time fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot
                                                    Time
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">12800</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-calendar-add fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                    <i class="path6"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold">days</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-5 badge badge-light-warning">30</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="separator border-5 my-3"></div>
                                    <div class="d-flex align-items-center mb-0">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45px w-40px me-5 m-2">
                                            <span class="symbol-label bg-lighten">
                                                <i class="ki-duotone ki-avalanche fs-1">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center flex-wrap w-100">
                                            <!--begin::Title-->
                                            <div class="mb-1 pe-3 flex-grow-1">
                                                <div class="fs-5 text-gray-800 text-hover-primary fw-bold">API</div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bold fs-7 badge badge-light-warning">true</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center pb-3">
                                    <a href="/purchase" type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Pricing-->
                </div>
                <!--end::Plans-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color ">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Pricing Section-->
    <!--begin::Footer Section-->
    <div class="mb-0">
        <!--begin::Separator-->
        <div class="landing-dark-separator"></div>
        <!--end::Separator-->
        <!--begin::Container-->
        <div class="container">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                <!--begin::Copyright-->
                <div class="d-flex align-items-center order-2 order-md-1">
                    <!--begin::Logo-->
                    <a href="index">
                        <img alt="Logo" src="/assets/media/logos/logo.png" class="h-15px h-md-20px"/>
                    </a>
                    <!--end::Logo image-->
                    <!--begin::Logo image-->
                    <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="https://stresse.re">
                        &copy; 2023 Stresse.re
                    </span>
                    <!--end::Logo image-->
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                    <li class="menu-item mx-5">
                        <a href="https://t.me/slowaris" target="_blank" class="menu-link px-2">Support</a>
                    </li>

                    <li class="menu-item">
                        <a href="#pricing" target="_blank" class="menu-link px-2">Purchase</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Footer Section-->
</div>
<!--end::Root-->
<!--begin::Engage modals-->
</div>
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-duotone ki-arrow-up">
        <span class="path1"></span>
        <span class="path2"></span>
    </i>
</div>
<!--end::Scrolltop-->
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="/assets/plugins/global/plugins.bundle.js"></script>
<script src="/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
</body>
<!--end::Body-->
</html>