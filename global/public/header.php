<?php
if (!defined('allow')) {
   header("HTTP/1.0 404 Not Found");
}

include_once('inc.php');

$Plan->resetCustomPlan();

if (empty($_SESSION['UserLogin']['id'])) {
   http_response_code(444);
   header('Content-Type: application/json'); // Set the content type to JSON
   header('Cache-Control: public, max-age=5'); // Set the public cache to be alive for 5 seconds
   echo json_encode(["message" => "Bad Route, return to login"]);
   exit();
}


if (!($User->IsLoged()) == true) {
   $Alert->SaveAlert('You are not logged in.', 'warning');
   header('Location: login');
   die();
}

if ($User->UserData()['id'] == null) {
   $Alert->SaveAlert('An error has occurred', 'error');
   header('Location: logout');
   die();
}

if ($Admin->AdminAllow() != true) {
   if ($Main->Data()['maintenance'] == true) {
      include_once("global/public/error.php");
      die();
   }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Test your site, server, or network's protection against real DDoS attacks for free with Stresser Re. The most advanced DDoS testing tool.">
    <meta name="author" content="<?php echo $domain ?>">
    <meta name="keywords" content="DDoS testing, IP Stresser, Booter, cloudflare ddos, DDoS tool, rapid reset, RAPID RESET, Layer7 DDoS, Layer4 DDoS, Network Stresser, Powerful Booter, CAPTCHA Bypass, DNS Amplification, <?php echo $domain ?>">
    <meta name="application-url" content="https://<?php echo $domain ?>">
    <meta name="application-name" content="Stresser Re">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta Tags for Social Sharing -->
    <meta property="og:title" content="Stresser Re - Advanced DDoS Testing Tool">
    <meta property="og:description" content="Test your site, server, or network's protection against real DDoS attacks for free with Stresser Re.">
    <meta property="og:image" content="<?php echo $assets; ?>assets/images/favicon-32x32.png">
    <meta property="og:url" content="https://<?php echo $domain ?>">
    <meta property="og:type" content="website">
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
<body id="kt_body" data-kt-app-header-fixed="false" data-kt-app-header-fixed-mobile="false"
      data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" class="aside-enabled">
<script>
    // Restore sidebar minimize state from LocalStorage
    const asideMinimizeState = localStorage.getItem("aside_minimize_state");
    if (asideMinimizeState) {
        document.body.setAttribute("data-kt-aside-minimize", asideMinimizeState);
    }
</script>
<div id="loader-container">
    <div id="loader">
        <div class="loader-circle"></div>
    </div>
</div>
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
             data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
             data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
             data-kt-drawer-toggle="#kt_aside_mobile_toggle">
            <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
                <!--begin::Aside user-->
                <!--begin::User-->
                <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-70px">
                        <img src="<?php echo $assets ?>assets/media/svg/duck.svg" alt="">
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Wrapper-->
                    <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
                        <!--begin::Section-->
                        <div class="d-flex">
                            <!--begin::Info-->
                            <div class="flex-grow-1 me-2">
                                <!--begin::Username-->
                                <a href="#"
                                   class="text-white text-hover-primary fs-6 fw-bold"><?php echo $User->UserData()['username'] ?></a>
                                <!--end::Username-->
                                <!--begin::Description-->
                                <span
                                 class="text-gray-600 fw-bold d-block fs-8 mb-1"><?php $planName = $Plan->PlanDataID($User->UserData()['plan'])['name'] ?? 'n/a';
                                   echo $Secure->SecureTxt($planName); ?></span>
                                <!--end::Description-->
                            </div>
                            <!--end::Info-->
                            <!--begin::User menu-->
                            <div class="me-n2">
                                <!--begin::Action-->
                                <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
                                   data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                   data-kt-menu-overflow="true">
                                    <i class="ki-duotone ki-setting-2 text-muted fs-1">
                                        <span class="path1"></span><span class="path2"></span>
                                    </i>
                                </a>
                                <!--begin::User account menu-->
                                <div
                                 class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-bold py-4 fs-6 w-275px"
                                 data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="<?php echo $assets ?>assets/media/other/duck.png">
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                   <?php echo $User->UserData()['username'] ?>
                                                </div>
                                                <a href="#"
                                                   class="fw-bold text-muted text-hover-primary fs-7"><?php $planName = $Plan->PlanDataID($User->UserData()['plan'])['name'] ?? 'n/a';
                                                   echo $Secure->SecureTxt($planName); ?></a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="/invoices" class="menu-link px-5"> My Invoices </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="logout" class="menu-link px-5"> Sign Out </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Action-->
                            </div>
                            <!--end::User menu-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::User-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
            </div>
            <!--begin::Aside menu-->
            <div class="aside-menu flex-column-fluid">
                <!--begin::Aside Menu-->
                <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                     data-kt-scroll-height="auto"
                     data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
                     data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
                    <!--begin::Menu-->
                    <div
                     class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                     id="#kt_aside_menu" data-kt-menu="true">
                       <?php if ($Admin->AdminAllow() == true) { ?>
                           <!--begin:Menu item-->
                           <div class="menu-item">
                               <a class="menu-link" href="admin/index">
                                   <span class="menu-icon">
                                       <i class="ki-duotone ki-setting-2 fs-1">
                                           <i class="path1"></i>
                                           <i class="path2"></i>
                                       </i>
                                   </span>
                                   <span class="menu-title fw-bold">Admin</span>
                               </a>
                           </div>
                           <!--end:Menu item-->
                       <? } ?>

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="#" id="CreateInvoice_button">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-bitcoin fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Deposit</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu content-->
                        <div class="menu-item pt-5">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold fs-7">Main</span>
                            </div>
                        </div>
                        <!--end:Menu content-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="home">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-devices fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                        <i class="path4"></i>
                                        <i class="path5"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Dash</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="purchase">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-handcart fs-1"></i>
                                </span>
                                <span class="menu-title fw-bold">Purchase</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu content-->
                        <div class="menu-item pt-5">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold  fs-7">App</span>
                            </div>
                        </div>
                        <!--end:Menu content-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="panel">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-technology fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Manager</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="api">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-theta fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">API Manager</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu content-->
                        <div class="menu-item pt-5">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold  fs-7">Other</span>
                            </div>
                        </div>
                        <!--end:Menu content-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="https://t.me/stressere">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-send fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Telegram</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-office-bag fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                        <i class="path4"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Contact</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" style="" class="header  align-items-stretch">
                <!--begin::Brand-->
                <div class="header-brand">
                    <!--begin::Logo-->
                    <a href="index" class="text-center">
                        <img alt="Logo" src="<?php echo $assets; ?>assets/media/logos/logo.svg"/>
                    </a>
                    <!--end::Logo-->
                    <!--begin::Aside minimize-->
                    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize"
                         data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                         data-kt-toggle-name="aside-minimize">
                        <i class="ki-duotone ki-abstract-14 fs-3">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                    </div>
                    <!--end::Aside minimize-->
                    <!--begin::Aside toggle-->
                    <div class="d-flex align-items-center d-lg-none me-n2" title="Show aside menu">
                        <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-1">
                                <span class="path1"></span><span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <!--end::Aside toggle-->
                </div>
                <!--end::Brand-->
                <!--begin::Toolbar-->
                <div class="toolbar d-flex align-items-stretch">
                    <!--begin::Toolbar container-->
                    <div
                     class="container-xxl py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
                        <!--begin::Page title-->
                        <div class="page-title d-flex justify-content-center flex-column me-1">
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    <a href="home" class="text-muted text-hover-primary">Home</a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-dark">
                                   <?php echo $page ?>
                                </li>
                                <!--end::Item-->
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page title-->
                        <!--begin::Action group-->
                        <div class="d-flex align-items-stretch overflow-auto pt-3 pt-lg-0">
                            <!--begin::Theme mode-->
                            <div class="d-flex align-items-center">
                                <div class="m-0">
                                    <!--begin::Menu toggle-->
                                    <a href="#" id="CreateInvoice_button"
                                       class="btn btn-sm btn-icon btn-active-icon-primary pulse pulse-warning"
                                       data-kt-menu-trigger="{default:'click', lg: 'hover'}">
                                        <i class="ki-duotone ki-wallet fs-1 text-success" data-bs-toggle="tooltip"
                                           data-bs-placement="bottom" title="Balance">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                        </i>
                                        <span class="pulse-ring"></span>
                                    </a>
                                    <span class="menu-badge">
                                        <span
                                         class="badge badge-light-success fw-bold fs-7"><?php echo (int)$User->UserData()['money']; ?>
                                            $</span>
                                    </span>
                                    <!--begin::Menu toggle-->
                                </div>
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
            <!--begin::Drawer-->
            <div id="#" class="bg-dark" data-kt-drawer="true" data-kt-drawer-activate="true" data-kt-drawer-toggle="#CreateInvoice_button" id="kt_aside_mobile_toggle" data-kt-drawer-close="#CreateInvoice_Close" data-kt-drawer-width="360px">
                <form class="card rounded-0" method="POST" id="InvoiceObj">
                    <!--begin::Card header-->
                    <div class="card-header pe-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800 fs-4">Balance</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-light-primary" id="CreateInvoice_Close">
                                <i class="ki-duotone ki-cross fs-2">
                                    <span class="path1"></span><span class="path2"></span>
                                </i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::csrf token input -->
                        <input type="hidden" id="_csrf" value="<?php echo $csrftoken; ?>">
                        <!--end::csrf token input -->
                        <div class="fv-row fv-plugins-icon-container">
                            <!--begin::Input group-->
                            <label class="form-label fw-bold">Amount</label>
                            <div class="input-group input-group-solid input-group-sm mb-5">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-euro fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                    </i>
                                </span>
                                <input type="text" class="form-control form-control-solid fw-bold" placeholder="35" id="amount" name="amount" value=""/>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--begin::Input group-->
                        <div class="fv-row mb-3 fv-plugins-icon-container">
                            <!--begin::Solid input group style-->
                            <label class="form-label fw-bold">Concurrency</label>
                            <div class="input-group input-group-solid mb-5 d-flex flex-column mt-5">
                                <!--begin:Option-->
                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center me-6">
                                        <!--begin:Icon-->
                                        <span class="symbol symbol-50px me-6">
                                            <span class="symbol-label bg-light-warning">
                                                <img src="/assets/media/icons/bitcoin.png" class="h-45px">
                                            </span>
                                        </span>
                                        <!--end:Icon-->
                                        <!--begin:Info-->
                                        <span class="d-flex flex-column">
                                            <span class="fw-bold fs-6">Bitcoin</span>
                                        </span>
                                        <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid me-4">
                                        <input class="form-check-input" type="radio" name="gateway"
                                               value="BITCOIN"/>
                                    </span>
                                    <!--end:Input-->
                                </label>
                                <!--end::Option-->
                                <!--begin:Option-->
                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center me-6">
                                        <!--begin:Icon-->
                                        <span class="symbol symbol-50px me-6">
                                            <span class="symbol-label bg-light-warning">
                                                <img src="/assets/media/icons/ethereum.png" class="h-45px">
                                            </span>
                                        </span>
                                        <!--end:Icon-->
                                        <!--begin:Info-->
                                        <span class="d-flex flex-column">
                                            <span class="fw-bold fs-6">Ethereum</span>
                                        </span>
                                        <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid me-4">
                                        <input class="form-check-input" type="radio" name="gateway"
                                               value="ETHEREUM"/>
                                    </span>
                                    <!--end:Input-->
                                </label>
                                <!--end::Option-->
                                <!--begin:Option-->
                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center me-6">
                                        <!--begin:Icon-->
                                        <span class="symbol symbol-50px me-6">
                                            <span class="symbol-label bg-light-warning">
                                                <img src="/assets/media/icons/litecoin.png" class="h-45px">
                                            </span>
                                        </span>
                                        <!--end:Icon-->
                                        <!--begin:Info-->
                                        <span class="d-flex flex-column">
                                            <span class="fw-bold fs-6">Litecoin</span>
                                        </span>
                                        <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid me-4">
                                        <input class="form-check-input" type="radio" name="gateway"
                                               value="LITECOIN"/>
                                    </span>
                                    <!--end:Input-->
                                </label>
                                <!--end::Option-->
                                <!--begin:Option-->
                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center me-6">
                                        <!--begin:Icon-->
                                        <span class="symbol symbol-50px me-6">
                                            <span class="symbol-label bg-light-warning">
                                                <img src="/assets/media/icons/tether.png" class="h-45px">
                                            </span>
                                        </span>
                                        <!--end:Icon-->
                                        <!--begin:Info-->
                                        <span class="d-flex flex-column">
                                            <span class="fw-bold fs-6">USDT ERC20</span>
                                        </span>
                                        <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid me-4">
                                        <input class="form-check-input" type="radio" name="gateway"
                                               value="USDT:ERC20"/>
                                    </span>
                                    <!--end:Input-->
                                </label>
                                <!--end::Option-->
                                <!--begin:Option-->
                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center me-6">
                                        <!--begin:Icon-->
                                        <span class="symbol symbol-50px me-6">
                                            <span class="symbol-label bg-light-warning">
                                                <img src="/assets/media/icons/tether.png" class="h-45px">
                                            </span>
                                        </span>
                                        <!--end:Icon-->
                                        <!--begin:Info-->
                                        <span class="d-flex flex-column">
                                            <span class="fw-bold fs-6">USDT TRC20</span>
                                        </span>
                                        <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid me-4">
                                        <input class="form-check-input" type="radio" name="gateway"
                                               value="USDT:TRC20"/>
                                    </span>
                                    <!--end:Input-->
                                </label>
                                <!--end::Option-->
                            </div>
                            <!--end::Solid input group style-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer">
                        <button type="button" onclick="CreateInvoice()"
                                class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                            <i class="ki-duotone ki-copy-success fs-2hx">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            Create
                        </button>
                    </div>
                    <!--end::Card footer-->
                </form>
            </div>
            <!--end::Drawer-->