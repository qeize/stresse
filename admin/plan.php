<?php
$page = 'News';
define('allow', TRUE);
include_once('public/header.php');

$ID = isset($GET['ID']) ? $GET['ID'] : null;
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="d-flex flex-row flex-center">
            <div class="col-xl-6">
                <!--begin::Timeline-->
                <form class="card" method="POST" id="ManagePlan<?php echo (int)$ID; ?>">
                    <input type="hidden" id="_csrf" value="<?php echo $csrftoken; ?>">
                    <input type="hidden" id="ID" name="ID" value="<?php echo (int)$ID; ?>">
                    <!--begin::Card head-->
                    <div class="card-header card-header-stretch">
                        <!--begin::Title-->
                        <div class="card-title d-flex align-items-center">
                            <i class="ki-duotone ki-tablet-book fs-1 text-primary me-3 lh-0">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            <h3 class="fw-bold m-0 text-gray-800 fs-4">Plan Manage</h3>
                        </div>
                        <!--end::Title-->
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card head-->
                    <!--begin::Card body-->
                    <div class="card-body">
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="form-label fw-bold">Plan Name</label>
                            <div class="input-group input-group-solid input-group-sm mb-5">
                                        <span class="input-group-text">
                                             <i class="ki-duotone ki-tablet-book fs-1">
                                                  <i class="path1"></i>
                                                  <i class="path2"></i>
                                             </i>
                                        </span>
                                <input type="text" class="form-control form-control-solid fw-bold" placeholder="Sellix"
                                       name="name" value="<?php echo $Plan->PlanDataID($ID)['name']; ?>">
                            </div>
                        </div>
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="form-label fw-bold">Plan Price</label>
                            <div class="input-group input-group-solid input-group-sm mb-5">
                                        <span class="input-group-text">
                                             <i class="ki-duotone ki-tablet-book fs-1">
                                                  <i class="path1"></i>
                                                  <i class="path2"></i>
                                             </i>
                                        </span>
                                <input type="text" class="form-control form-control-solid fw-bold" placeholder="35"
                                       name="price" value="<?php echo $Plan->PlanDataID($ID)['price']; ?>">
                            </div>
                        </div>
                        <div class="separator border-3 mb-3"></div>
                        <div class="form-group row">
                            <div class="fv-row fv-plugins-icon-container col-xl-6">
                                <label class="form-label fw-bold">Concurrents</label>
                                <div class="input-group input-group-solid input-group-sm mb-5">
                                             <span class="input-group-text">
                                                  <i class="ki-duotone ki-calculator fs-1 ">
                                                       <i class="path1"></i>
                                                       <i class="path2"></i>
                                                       <i class="path3"></i>
                                                       <i class="path4"></i>
                                                       <i class="path5"></i>
                                                       <i class="path6"></i>
                                                  </i>
                                             </span>
                                    <input type="text" class="form-control form-control-solid fw-bold" placeholder="1"
                                           name="slots" value="<?php echo $Plan->PlanDataID($ID)['concurrents']; ?>">
                                </div>
                            </div>
                            <div class="fv-row fv-plugins-icon-container col-xl-6">
                                <label class="form-label fw-bold">Boot Time</label>
                                <div class="input-group input-group-solid input-group-sm mb-5">
                                             <span class="input-group-text">
                                                  <i class="ki-duotone ki-time fs-1">
                                                       <i class="path1"></i>
                                                       <i class="path2"></i>
                                                  </i>
                                             </span>
                                    <input type="text" class="form-control form-control-solid fw-bold" placeholder="1"
                                           name="mbt" value="<?php echo $Plan->PlanDataID($ID)['mbt']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="fv-row mb-3 fv-plugins-icon-container">
                            <!--begin::Solid input group style-->
                            <label class="form-label fw-bold">Unit</label>
                            <div class="input-group input-group-solid mb-5">
                                        <span class="input-group-text">
                                             <i class="ki-duotone ki-star fs-1"></i>
                                        </span>
                                <div class="overflow-hidden flex-grow-1">
                                    <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start"
                                            data-control="select2" data-hide-search="true"
                                            data-placeholder="Select an option" name="unit">
                                        <option <?php if ($Secure->SecureTxt($Plan->PlanDataID($ID)['unit']) == 'days') {
                                            echo 'selected';
                                        } ?> value="days">Days
                                        </option>
                                        <option <?php if ($Secure->SecureTxt($Plan->PlanDataID($ID)['unit']) == 'months') {
                                            echo 'selected';
                                        } ?> value="months">Months
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Solid input group style-->
                        </div>
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="form-label fw-bold">Length</label>
                            <div class="input-group input-group-solid input-group-sm mb-5">
                                        <span class="input-group-text">
                                             <i class="ki-duotone ki-time fs-1">
                                                  <i class="path1"></i>
                                                  <i class="path2"></i>
                                             </i>
                                        </span>
                                <input type="text" class="form-control form-control-solid fw-bold" placeholder="1"
                                       name="length" value="<?php echo $Plan->PlanDataID($ID)['length']; ?>">
                            </div>
                        </div>
                        <div class="separator border-3 mb-3"></div>
                        <div class="form-group row">
                            <div class="fv-row fv-plugins-icon-container col-xl-6">
                                <!--begin::Solid input group style-->
                                <label class="form-label fw-bold">Premium</label>
                                <div class="input-group input-group-solid mb-5">
                                             <span class="input-group-text">
                                                  <i class="ki-duotone ki-star fs-1"></i>
                                             </span>
                                    <div class="overflow-hidden flex-grow-1">
                                        <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Select an option" name="plan_class">
                                            <option <?php if ($Secure->SecureTxt($Plan->PlanDataID($ID)['premium']) == 0) {
                                                echo 'selected';
                                            } ?> value="0">False
                                            </option>
                                            <option <?php if ($Secure->SecureTxt($Plan->PlanDataID($ID)['premium']) == 1) {
                                                echo 'selected';
                                            } ?> value="1">True
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <!--end::Solid input group style-->
                            </div>
                            <div class="fv-row fv-plugins-icon-container col-xl-6">
                                <!--begin::Solid input group style-->
                                <label class="form-label fw-bold">API</label>
                                <div class="input-group input-group-solid mb-5">
                                             <span class="input-group-text">
                                                  <i class="ki-duotone ki-star fs-1"></i>
                                             </span>
                                    <div class="overflow-hidden flex-grow-1">
                                        <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Select an option" name="plan_api">
                                            <option <?php if ($Secure->SecureTxt($Plan->PlanDataID($ID)['api']) == 0) {
                                                echo 'selected';
                                            } ?> value="0">False
                                            </option>
                                            <option <?php if ($Secure->SecureTxt($Plan->PlanDataID($ID)['api']) == 1) {
                                                echo 'selected';
                                            } ?> value="1">True
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <!--end::Solid input group style-->
                            </div>
                        </div>
                        <div class="fv-row fv-plugins-icon-container">
                            <!--begin::Solid input group style-->
                            <label class="form-label fw-bold">Premium</label>
                            <div class="input-group input-group-solid mb-5">
                                        <span class="input-group-text">
                                             <i class="ki-duotone ki-star fs-1"></i>
                                        </span>
                                <div class="overflow-hidden flex-grow-1">
                                    <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start"
                                            data-control="select2" data-hide-search="true"
                                            data-placeholder="Select an option" name="private">
                                        <option <?php if ($Secure->SecureTxt($Plan->PlanDataID($ID)['private']) == 0) {
                                            echo 'selected';
                                        } ?> value="0">Visible
                                        </option>
                                        <option <?php if ($Secure->SecureTxt($Plan->PlanDataID($ID)['private']) == 1) {
                                            echo 'selected';
                                        } ?> value="1">Private
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Solid input group style-->
                        </div>
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer d-flex justify-content-center">
                        <button type="button" onclick="ChangePlan(<?php echo (int)$ID; ?>)"
                                class="btn btn-sm btn-light-primary fs-5 fw-bold py-1 mx-1">
                            <i class="ki-duotone ki-copy-success fs-2hx">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            Update
                        </button>
                        <button type="button" onclick="DeletePlan(<?php echo (int)$ID; ?>)"
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
                    <!--end::Card footer-->
                </form>
                <!--end::Timeline-->
            </div>
        </div>
    </div>
</div>
<?php
include_once('public/footer.php');
?>
