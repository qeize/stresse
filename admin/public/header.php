<?php
if (!defined('allow')) {
    header("HTTP/1.0 404 Not Found");
}

define('admin', TRUE);
include_once('../inc.php');

if (!($User->IsLoged()) == true) {
    $Alert->SaveAlert('You are not logged in.', 'warning');
    header('Location: login');
    die();
}

if ($Admin->AdminAllow() != true) {
    $Alert->SaveAlert('You are admin.', 'error');
    header('Location: ../home');
    die();
}

if ($User->UserData()['id'] == null) {
    $Alert->SaveAlert('An error has occurred', 'error');
    header('Location: ../logout');
    die();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="<? echo $domain ?>" name="author">
    <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport">
    <meta content="Stresser Tech - is a utility that allows you to test the protection of your site, server or network from real DDoS attacks for free"
          name="description">
    <meta content="free stresser, top stresser, stressthem, stress them, stress denial of service, dos, stresser app,booter,ip stresser, stresser, booter, ddos tool, ddos attack, ddos attack online, layer7 ddos, layer4 ddos, api, api access, network stresser, network booter, slowloris, best Booter, best stresser, strongest stresser, powerful booter, ddoser, ddos, gbooter, top booter, ipstress, booter, stresser, network stresser, network booter, #Booter, BROWSER, captcha bypass, drdos,ssyn, dns amplification"
          name="keywords">
    <meta content="https://<? echo $domain ?>" name="application-url">
    <meta content="Stresser Tech" name="application-name">
    <meta content="index, follow" name="robots">
    <meta property="og:title" content="The most advanced DDoS tools on the DDoS market."/>
    <meta property="og:description"
          content="Stresser Tech is a premium IP Stresser/Booter that has browser emulation technology with CAPTCHA bypass for Layer 7 and unique Layer 4 DDoS methods."/>
    <meta property="og:image" content="<?php echo $assets; ?>assets/images/favicon-32x32.png"/>
    <meta property="og:url" content="https://<? echo $domain ?>"/>
    <meta property="og:type" content="website"/>
    <title><? echo $domain ?> - <? echo $page ?></title>
    <link rel="shortcut icon" href="<?php echo $assets; ?>assets/media/favicon/favicon.ico"/>
    <!--end::Fonts-->
    <link href="<?php echo $assets; ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
          type="text/css"/>
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
<!--begin::Main-->
<div id="loader-container">
    <div id="loader">
        <div class="loader-circle"></div>
    </div>
</div>
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
                                <span class="text-gray-600 fw-bold d-block fs-8 mb-1"><?php $planName = $Plan->PlanDataID($User->UserData()['plan'])['name'] ?? 'n/a';
                                    echo $Secure->SecureTxt($planName); ?></span>
                                <!--end::Description-->
                            </div>
                            <!--end::Info-->
                            <!--begin::User menu-->
                            <div class="me-n2">
                                <!--begin::Action-->
                                <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
                                   data-kt-menu-trigger="click" data-kt-menu-placement="left"
                                   data-kt-menu-overflow="true">
                                    <i class="ki-duotone ki-setting-2 text-muted fs-1">
                                        <span class="path1"></span><span class="path2"></span>
                                    </i>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-bold py-4 fs-6 w-275px"
                                     data-kt-menu="true"
                                     style="z-index: 107; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(212px, 119px);"
                                     data-popper-placement="bottom-start">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                    Settings
                                                </div>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                         data-kt-menu-placement="right-start" data-kt-menu-offset="-15px, 0">
                                        <a href="#" class="menu-link px-5">
                                            <span class="menu-title">Maintenance</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--begin::Menu sub-->
                                        <form class="menu-sub menu-sub-dropdown w-175px py-4" method="POST"
                                              id="MaintainceUpdate">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 fw-bold">
                                                    Maintenance
                                                </div>
                                            </div>
                                            <!--begin::csrf token and ID input -->
                                            <input type="hidden" id="_csrf" value="<?php echo $csrftoken; ?>">
                                            <!--end::csrf token and ID input -->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-2">
                                                <div class="menu-content px-3">
                                                    <!--begin::Switch-->
                                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input maintaince-form w-30px h-20px"
                                                               type="checkbox" <?php if ($Main->Data()['maintenance'] == true) {
                                                            echo 'checked';
                                                        } ?> value="maintenance">
                                                        <!--end::Input-->
                                                        <!--end::Label-->
                                                        <span class="form-check-label text-muted fw-bold fs-6">Main</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Switch-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-2">
                                                <div class="menu-content px-3">
                                                    <!--begin::Switch-->
                                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input maintaince-form w-30px h-20px"
                                                               type="checkbox" <?php if ($Main->Data()['layer4'] == true) {
                                                            echo 'checked';
                                                        } ?> value="layer4">
                                                        <!--end::Input-->
                                                        <!--end::Label-->
                                                        <span class="form-check-label text-muted fw-bold fs-6">Layer 4</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Switch-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-2">
                                                <div class="menu-content px-3">
                                                    <!--begin::Switch-->
                                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input maintaince-form w-30px h-20px"
                                                               type="checkbox" <?php if ($Main->Data()['layer7'] == true) {
                                                            echo 'checked';
                                                        } ?> value="layer7">
                                                        <!--end::Input-->
                                                        <!--end::Label-->
                                                        <span class="form-check-label text-muted fw-bold fs-6">Layer 7</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Switch-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-2">
                                                <div class="menu-content px-3">
                                                    <!--begin::Switch-->
                                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input maintaince-form w-30px h-20px"
                                                               type="checkbox" <?php if ($Main->Data()['api'] == true) {
                                                            echo 'checked';
                                                        } ?> value="api">
                                                        <!--end::Input-->
                                                        <!--end::Label-->
                                                        <span class="form-check-label text-muted fw-bold fs-6">API</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Switch-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </form>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="#" class="menu-link px-5">Clear Logs</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
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
                    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                         id="#kt_aside_menu" data-kt-menu="true">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="/home">
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
                                <span class="menu-title fw-bold">Home</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="plans">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-copy-success fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Plans</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="users">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-people fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                        <i class="path4"></i>
                                        <i class="path5"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Users</span>
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
                            <a class="menu-link" href="servers">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-switch fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Servers</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="methods">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-theta fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Methods</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="blacklists">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-filter-edit fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Blacklist</span>
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
                            <a class="menu-link" href="invoices">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-bitcoin fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Payments</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="news">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-book fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                        <i class="path4"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">News</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <a class="menu-link" href="logs">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-eye fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                    </i>
                                </span>
                                <span class="menu-title fw-bold">Attack Logs</span>
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
                    <a href="index">
                        <img alt="Logo" src="<?php echo $assets; ?>assets/media/logos/logo.png"
                             class="h-35px h-lg-55px"/></a>
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
                    <div class="container-xxl py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
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
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->