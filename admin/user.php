<?php
$page = 'User';
define('allow', TRUE);
include_once('public/header.php');

$ID = isset($GET['ID']) ? $GET['ID'] : null;
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
            <div class=col-xl-12>
                <form class="card mb-5 mb-xl-10" method="POST" id="UserObj<?php echo (int)$ID; ?>">
                    <!--begin::csrf token and ID input -->
                    <input type="hidden" id="_csrf" value="<?php echo $csrftoken; ?>">
                    <input type="hidden" id="ID" name="ID" value="<?php echo (int)$ID; ?>">
                    <?php $addons = array_filter(explode('|', $User->UserDataID($ID, 1)['addons'] ?? '')); ?>
                    <!--end::csrf token and ID input -->
                    <!--begin::Card header-->
                    <div class="card-header card-header-stretch pb-0">
                        <!--begin::Title-->
                        <div class="card-title">
                            <h3 class="m-0 fw-bold text-gray-800 fs-4">User Manager</h3>
                        </div>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar m-0">
                            <!--begin::Tab nav-->
                            <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                                <!--begin::Tab item-->
                                <li class="nav-item" role="presentation">
                                    <a id="main" class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab"
                                       role="tab" href="#main_ID" aria-selected="true">Main</a>
                                </li>
                                <!--end::Tab item-->
                                <!--begin::Tab item-->
                                <li class="nav-item" role="presentation">
                                    <a id="plan" class="nav-link fs-5 fw-bold" data-bs-toggle="tab" role="tab"
                                       href="#plan_ID" aria-selected="false" tabindex="-1">Plan & Addons</a>
                                </li>
                                <!--end::Tab item-->
                            </ul>
                            <!--end::Tab nav-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Tab content-->
                    <div class="card-body tab-content">
                        <!--begin::Tab panel-->
                        <div id="main_ID" class="tab-pane fade show active" role="tabpanel" aria-labelledby="#main">
                            <div class="row g-5 g-xl-8">
                                <div class="col-xl-8 mt-5">
                                    <div class="mt-10 m-6">
                                        <div class="m-1">
                                            <label class="form-label fw-bold">Username</label>
                                            <input type="text" disabled class="form-control form-control-solid"
                                                   autocomplete="off"
                                                   placeholder="<?php echo $User->UserDataID($ID, 1)['username']; ?>"/>
                                        </div>
                                        <div class="mt-5">
                                            <div class="card card-flush">
                                                <div class="card-header ribbon">
                                                    <div class="card-title col-xl-11">
                                                        <div class="input-group">
                                                            <input type="password" class="form-control form-control-solid fs-6"
                                                                   placeholder="New Password" name="newpw1"/>
                                                            <span class="input-group-text fs-3">@</span>
                                                            <input type="password" class="form-control form-control-solid fs-6"
                                                                   placeholder="Confirm Password" name="newpw2"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-10 m-6">
                                        <div class="mb-5">
                                            <label class="form-label fw-bold">Balance:</label>
                                            <input type="text" class="form-control form-control-solid fw-bold" placeholder="Balance" name="money" value="<?php echo $Secure->SecureTxt(empty($User->UserDataID($ID, 1)['money']) ? 0 : $User->UserDataID($ID, 1)['money']); ?>"/>
                                        </div>
                                        <div class="mb-5">
                                            <label class="form-label fw-bold">Status:</label>
                                            <select class="form-select form-select-solid fw-bold" data-control="select2"
                                                    data-dropdown-parent="body" data-hide-search="true"
                                                    aria-label="Select status" name="status">
                                                <option <?php if ($Secure->SecureTxt($User->UserDataID($ID, 1)['status']) == 0) {
                                                    echo 'selected';
                                                } ?> value="0">Active
                                                </option>
                                                <option <?php if ($Secure->SecureTxt($User->UserDataID($ID, 1)['status']) == 1) {
                                                    echo 'selected';
                                                } ?> value="1">Banned
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card card-xl-stretch">
                                        <!--begin::Body-->
                                        <div class="card-body p-0">
                                            <!--begin::Header-->
                                            <div class="px-9 pt-7 card-rounded h-250px w-100 bg-gray-100i">
                                                <!--begin::Heading-->
                                                <div class="d-flex flex-stack justify-content-center">
                                                    <h3 class="m-0 text-white fw-bold fs-3">About</h3>
                                                </div>
                                                <!--end::Heading-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Items-->
                                            <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -180px">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-6">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-45px w-40px me-5">
                                                        <span class="symbol-label bg-lighten">
                                                            <i class="ki-duotone ki-compass fs-1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span></i>
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Description-->
                                                    <div class="d-flex align-items-center flex-wrap w-100">
                                                        <!--begin::Title-->
                                                        <div class="mb-1 pe-1 flex-grow-1">
                                                            <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                                Invoices:
                                                            </div>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Label-->
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                             class="fw-bold fs-5 text-gray-800 pe-1"><?php echo $Order->OrderDataUser($ID, 0)['Count']; ?></div>
                                                            <i class="ki-duotone ki-filter-square fs-5 text-info">
                                                                <i class="path1"></i>
                                                                <i class="path2"></i>
                                                            </i>
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-6">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-45px w-40px me-5">
                                                        <span class="symbol-label bg-lighten">
                                                            <i class="ki-duotone ki-element-11 fs-1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                                <span class="path4"></span>
                                                            </i>
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Description-->
                                                    <div class="d-flex align-items-center flex-wrap w-100">
                                                        <!--begin::Title-->
                                                        <div class="mb-1 pe-3 flex-grow-1">
                                                            <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                                Boots:
                                                            </div>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Label-->
                                                        <div class="d-flex align-items-center">
                                                            <div class="fw-bold fs-5 text-gray-800 pe-1"><?php echo $ALogs->LogsDataUserID($ID, 0)['Count']; ?></div>
                                                            <i class="ki-duotone ki-clipboard fs-5 text-danger">
                                                                <i class="path1"></i>
                                                                <i class="path2"></i>
                                                                <i class="path3"></i>
                                                            </i>
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-6">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-45px w-40px me-5">
                                                        <span class="symbol-label bg-lighten">
                                                            <i class="ki-duotone ki-graph-up fs-1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                                <span class="path4"></span>
                                                                <span class="path5"></span>
                                                                <span class="path6"></span>
                                                            </i>
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Description-->
                                                    <div class="d-flex align-items-center flex-wrap w-100">
                                                        <!--begin::Title-->
                                                        <div class="mb-1 pe-3 flex-grow-1">
                                                            <div class="fs-5 text-gray-800 text-hover-primary fw-bold">
                                                                Running:
                                                            </div>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Label-->
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                             class="fw-bold fs-5 text-gray-800 pe-1"><?php echo $ALogs->UserAttacks($ID)['Count']; ?></div>
                                                            <i class="ki-duotone ki-graph-up fs-5 text-primary">
                                                                <i class="path1"></i>
                                                                <i class="path2"></i>
                                                                <i class="path3"></i>
                                                                <i class="path4"></i>
                                                                <i class="path5"></i>
                                                                <i class="path6"></i>
                                                            </i>
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center ">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-45px w-40px me-5">
                                                        <span class="symbol-label bg-lighten">
                                                            <i class="ki-duotone ki-document fs-1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Description-->
                                                    <div class="d-flex align-items-center flex-wrap w-100">
                                                        <!--begin::Title-->
                                                        <div class="mb-1 pe-3 flex-grow-1">
                                                            <a href="#"
                                                               class="fs-5 text-gray-800 text-hover-primary fw-bold">Balance:</a>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Label-->
                                                        <div class="d-flex align-items-center">
                                                            <div class="fw-bold fs-5 text-gray-800 pe-1">
                                                                $<?php echo $Secure->SecureTxt(empty($User->UserDataID($ID, 1)['money']) ? 0 : $User->UserDataID($ID, 1)['money']); ?></div>
                                                            <i class="ki-duotone ki-graph fs-5 text-warning">
                                                                <i class="path1"></i>
                                                                <i class="path2"></i>
                                                                <i class="path3"></i>
                                                                <i class="path4"></i>
                                                            </i>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Items-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab panel-->
                        </div>
                        <!--end::Tab content-->
                        <!--begin::Tab panel-->
                        <div id="plan_ID" class="tab-pane fade" role="tabpanel" aria-labelledby="#plan">
                            <div class="row g-5 g-xl-8">
                                <div class="col-xl-8 mt-5">
                                    <div class="mt-10 m-6">
                                        <div class="m-1">
                                            <label class="form-label fw-bold">Select Plan</label>
                                            <div class="input-group input-group-solid mb-5">
                                                <span class="input-group-text">
                                                    <i class="ki-duotone ki-shop fs-2">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                        <i class="path3"></i>
                                                        <i class="path4"></i>
                                                        <i class="path5"></i>
                                                    </i>
                                                </span>
                                                <div class="overflow-hidden flex-grow-1">
                                                    <select
                                                     class="form-select form-select-solid form-select-md rounded-start-0 border-start fw-bold"
                                                     data-control="select2" data-placeholder="Select an option"
                                                     name="plan">
                                                        <option <?= !isset($User->UserDataID($ID, 1)['plan']) || $User->UserDataID($ID, 1)['plan'] == 0 ? 'selected' : '' ?>
                                                         value="0">Select
                                                        </option>
                                                        <?php foreach ($Plan->PlanDataAll()['Response'] as $Pk => $Pv): ?><?php $selected = is_array($User->UserDataID($ID, 1)) && $User->UserDataID($ID, 1)['plan'] == $Pv['ID'] ? 'selected' : ''; ?>
                                                            <option
                                                             value="<?= $Pv['ID'] ?>" <?= $selected ?>><?= $Pv['name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-1">
                                            <label class="form-label fw-bold fw-bold">Expire Date</label>
                                            <div class="input-group input-group-solid input-group-sm mb-5">
                                                <span class="input-group-text">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                    <i class="ki-duotone ki-calendar-8 fs-1">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                        <i class="path3"></i>
                                                        <i class="path4"></i>
                                                        <i class="path5"></i>
                                                        <i class="path6"></i>
                                                    </i>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <input class="form-control form-control-solid form-control-sm fw-bold"
                                                       placeholder="Pick a date" type="date"
                                                       value="<?php echo date('Y-m-d', $User->UserDataID($ID, 1)['expire']); ?>"
                                                       id="kt_datepicker_2" name="expire"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-10 m-6">
                                        <div class="mb-5">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-3 fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="form-label fw-bold">Addon Boot Time</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control form-control-solid border-radius-sm fw-bold"
                                                           value="<?php echo isset($addons[1]) && (int)$addons[1] === "" ? "0" : (isset($addons[1]) ? (int)$addons[1] : "0"); ?>"
                                                           name="seconds">
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <div class="mb-5">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-3 fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="form-label fw-bold">Addon Concurrents</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-solid border-radius-sm fw-bold" value="<?php echo isset($addons[0]) && (int)$addons[0] === "" ? "0" : (isset($addons[0]) ? (int)$addons[0] : "0"); ?>" name="concurrents">
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="mb-5 row">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-3 fv-plugins-icon-container col-xl-6">
                                                <!--begin::Label-->
                                                <label class="form-label fw-bold">Addon Premium</label>
                                                <!--end::Label-->
                                                <select class="form-select form-select-solid fw-bold" data-control="select2" data-dropdown-parent="body" data-hide-search="true" aria-label="Select status" name="premium">
                                                    <option <?php if (isset($addons[3]) && $addons[3] == 0) {
                                                        echo 'selected';
                                                    } ?> value="0">Disabled
                                                    </option>
                                                    <option <?php if (isset($addons[3]) && $addons[3] == 1) {
                                                        echo 'selected';
                                                    } ?> value="1">Active
                                                    </option>
                                                </select>
                                            </div>
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-3 fv-plugins-icon-container col-xl-6">
                                                <!--begin::Label-->
                                                <label class="form-label fw-bold">Addon Api</label>
                                                <!--end::Label-->
                                                <select class="form-select form-select-solid fw-bold" data-control="select2" data-dropdown-parent="body" data-hide-search="true" aria-label="Select status" name="api">
                                                    <option <?php if (isset($addons[2]) && $addons[2] == 0) {
                                                        echo 'selected';
                                                    } ?> value="0">Disabled
                                                    </option>
                                                    <option <?php if (isset($addons[2]) && $addons[2] == 1) {
                                                        echo 'selected';
                                                    } ?> value="1">Active
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card card-xl-stretch">
                                        <!--begin::Body-->
                                        <div class="card-body p-0 fw-bold">
                                            <div class="m-0 mt-15">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex align-items-sm-center mb-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-45px me-4">
                                                        <span class="symbol-label bg-primary">
                                                            <i class="ki-duotone ki-ship text-inverse-primary fs-1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span></i>
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Section-->
                                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                        <div class="flex-grow-1 me-2">
                                                            <a href="#" class="text-gray-400 fs-6 fw-bold">Plan:</a>
                                                            <span
                                                             class="text-gray-800 fw-bold d-block fs-4"><?php $planName = $Plan->PlanDataID($User->UserDataID($ID, 1)['plan'])['name'] ?? 'n/a';
                                                                echo $Secure->SecureTxt($planName); ?></span>
                                                        </div>
                                                        <span
                                                         class="badge badge-lg badge-light-success fw-bold my-2"><?php echo $Secure->SecureTxt(($Plan->PlanDataID($User->UserDataID($ID, 1)['plan'])['premium'] ?? 0) == 1 ? 'Premium' : 'Basic'); ?></span>
                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Timeline-->
                                                <div class="timeline">
                                                    <!--begin::Timeline item-->
                                                    <div class="timeline-item align-items-center mb-7">
                                                        <!--begin::Timeline line-->
                                                        <div class="timeline-line w-40px mt-6 mb-n12"></div>
                                                        <!--end::Timeline line-->
                                                        <!--begin::Timeline icon-->
                                                        <div class="timeline-icon" style="margin-left: 8px">
                                                            <i class="ki-duotone ki-cd fs-2 text-success">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::Timeline icon-->
                                                        <!--begin::Timeline content-->
                                                        <div class="timeline-content m-0">
                                                            <!--begin::Title-->
                                                            <span
                                                             class="fs-6 text-gray-400 fw-bold d-block">Concurrents</span>
                                                            <!--end::Title-->
                                                            <!--begin::Title-->
                                                            <span class="fs-6 fw-bold text-gray-800"><?php
                                                                $planData = $Plan->PlanDataID($User->UserDataID($ID, 1)['plan']);
                                                                $planName = ($planData && $planData['concurrents']) ? $Secure->SecureTxt($planData['concurrents']) : 'N/A';
                                                                echo $planName;
                                                                ?></span>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Timeline content-->
                                                    </div>
                                                    <!--end::Timeline item-->
                                                    <!--begin::Timeline item-->
                                                    <div class="timeline-item align-items-center mb-7">
                                                        <!--begin::Timeline line-->
                                                        <div class="timeline-line w-40px mt-6 mb-n12"></div>
                                                        <!--end::Timeline line-->
                                                        <!--begin::Timeline icon-->
                                                        <div class="timeline-icon" style="margin-left: 8px">
                                                            <i class="ki-duotone ki-cd fs-2 text-primary">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::Timeline icon-->
                                                        <!--begin::Timeline content-->
                                                        <div class="timeline-content m-0">
                                                            <!--begin::Title-->
                                                            <span class="fs-6 text-gray-400 fw-bold d-block">Boot
                                                                Time</span>
                                                            <!--end::Title-->
                                                            <!--begin::Title-->
                                                            <span class="fs-6 fw-bold text-gray-800"><?php
                                                                $planData = $Plan->PlanDataID($User->UserDataID($ID, 1)['plan']);
                                                                $planName = ($planData && $planData['mbt']) ? $Secure->SecureTxt($planData['mbt']) : 'N/A';
                                                                echo $planName;
                                                                ?> Seconds</span>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Timeline content-->
                                                    </div>
                                                    <!--end::Timeline item-->
                                                    <!--begin::Timeline item-->
                                                    <div class="timeline-item align-items-center">
                                                        <!--begin::Timeline line-->
                                                        <div class="timeline-line w-40px mt-6 mb-n12"></div>
                                                        <!--end::Timeline line-->
                                                        <!--begin::Timeline icon-->
                                                        <div class="timeline-icon" style="margin-left: 8px">
                                                            <i class="ki-duotone ki-cd fs-2 text-warning">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::Timeline icon-->
                                                        <!--begin::Timeline content-->
                                                        <div class="timeline-content m-0">
                                                            <!--begin::Title-->
                                                            <span class="fs-6 text-gray-400 fw-bold d-block">API
                                                                Access</span>
                                                            <!--end::Title-->
                                                            <!--begin::Title-->
                                                            <span
                                                             class="badge badge-lg badge-light-success fw-bold my-2"><?php echo $Secure->SecureTxt(($Plan->PlanDataID($User->UserDataID($ID, 1)['plan'])['premium'] ?? 0) == 1 ? 'True' : 'False'); ?></span>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Timeline content-->
                                                    </div>
                                                    <!--end::Timeline item-->
                                                </div>
                                                <!--end::Timeline-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Tab panel-->
                    </div>
                    <div class="card-footer">
                        <button type="button" onclick="ChangeUser(<?php echo (int)$ID; ?>)"
                                class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                            <i class="ki-duotone ki-copy-success fs-2hx">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            Update
                        </button>
                        <button type="button" onclick="DeleteUser(<?php echo (int)$ID; ?>)"
                                class="btn btn-sm btn-light-danger fs-5 fw-bold py-1">
                            <i class="ki-duotone ki-calendar-remove fs-2hx">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                                <i class="path4"></i>
                                <i class="path5"></i>
                                <i class="path6"></i>
                            </i>
                            Delete
                        </button>
                    </div>
                </form>
            </div>
            <!--end::row-->
            <!--end::Container-->
        </div>
        <!--end::Content-->
    </div>
</div>
<?php
include_once('public/footer.php');
?>
