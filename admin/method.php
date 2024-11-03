<?php
$page = 'Method';
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
                <form class="card" method="POST" id="MethodObj<?php echo (int)$ID; ?>">
                    <input type="hidden" id="_csrf" value="<?php echo $csrftoken; ?>">
                    <input type="hidden" id="id" name="id" value="<?php echo (int)$ID; ?>">
                    <!--begin::Card head-->
                    <div class="card-header card-header-stretch">
                        <!--begin::Title-->
                        <div class="card-title d-flex align-items-center">
                            <i class="ki-duotone ki-tablet-book fs-1 text-primary me-3 lh-0">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            <h3 class="fw-bold m-0 text-gray-800 fs-4">Method Manage</h3>
                        </div>
                        <!--end::Title-->
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card head-->
                    <!--begin::Card body-->
                    <div class="card-body">
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="form-label fw-bold">Method Name</label>
                            <div class="input-group input-group-solid input-group-sm mb-5">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-tablet-book fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </span>
                                <input type="text" class="form-control form-control-solid fw-bold" placeholder="Sellix" name="name" value="<?php echo $Methods->MethodsDataID($ID)['name']; ?>">
                            </div>
                        </div>
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="form-label fw-bold">Hub Name</label>
                            <div class="input-group input-group-solid input-group-sm mb-5">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-tablet-book fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </span>
                                <input type="text" class="form-control form-control-solid fw-bold" placeholder="Sellix" name="hubname" value="<?php echo $Methods->MethodsDataID($ID)['hubname']; ?>">
                            </div>
                        </div>
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="form-label fw-bold">Api Name</label>
                            <div class="input-group input-group-solid input-group-sm mb-5">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-tablet-book fs-1">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </span>
                                <input type="text" class="form-control form-control-solid fw-bold" placeholder="Sellix" name="apiname" value="<?php echo $Methods->MethodsDataID($ID)['apiname']; ?>">
                            </div>
                        </div>
                        <div class="separator border-3 mb-3"></div>
                        <!--begin::Input group-->
                        <div class="fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Method Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="description" class="form-control form-control-lg form-control-solid border-radius-sm" placeholder="Some shit" value=""><?php echo $Methods->MethodsDataID($ID)['description']; ?></textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="separator border-3 mb-3 mt-3"></div>
                        <div class="form-group row">
                            <!--begin::Solid input group style-->
                            <label class="form-label fw-bold">Layer</label>
                            <div class="input-group input-group-solid mb-5">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-setting-4 fs-1"></i>
                                </span>
                                <div class="overflow-hidden flex-grow-1">
                                    <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="layer">
                                        <option <?php if ($Secure->SecureTxt($Methods->MethodsDataID($ID)['layer']) == 4) {
                                            echo 'selected';
                                        } ?> value="4">Layer 4
                                        </option>
                                        <option <?php if ($Secure->SecureTxt($Methods->MethodsDataID($ID)['layer']) == 7) {
                                            echo 'selected';
                                        } ?> value="7">Layer 7
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Solid input group style-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Solid input group style-->
                        <div class="fv-row mb-3 fv-plugins-icon-container">
                            <!--begin::Solid input group style-->
                            <label class="form-label fw-bold">Class</label>
                            <div class="input-group input-group-solid mb-5">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-setting-4 fs-1"></i>
                                </span>
                                <div class="overflow-hidden flex-grow-1">
                                    <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="class">
                                        <option <?php if ($Secure->SecureTxt($Methods->MethodsDataID($ID)['class']) == 0) {
                                            echo 'selected';
                                        } ?> value="0">Basic
                                        </option>
                                        <option <?php if ($Secure->SecureTxt($Methods->MethodsDataID($ID)['class']) == 1) {
                                            echo 'selected';
                                        } ?> value="1">Premium
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Solid input group style-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Solid input group style-->
                        <div class="fv-row mb-3 fv-plugins-icon-container">
                            <!--begin::Solid input group style-->
                            <label class="form-label fw-bold">Api</label>
                            <div class="input-group input-group-solid mb-5">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-setting-4 fs-1"></i>
                                </span>
                                <div class="overflow-hidden flex-grow-1">
                                    <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="api">
                                        <option <?php if ($Secure->SecureTxt($Methods->MethodsDataID($ID)['api']) == 0) {
                                            echo 'selected';
                                        } ?> value="0">False
                                        </option>
                                        <option <?php if ($Secure->SecureTxt($Methods->MethodsDataID($ID)['api']) == 1) {
                                            echo 'selected';
                                        } ?> value="1">True
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Solid input group style-->
                        </div>
                        <!--end::Input group-->
                        <div class="separator border-3 mb-3"></div>
                        <!--begin::Input group-->
                        <!--begin::Solid input group style-->
                        <div class="fv-row mb-3 fv-plugins-icon-container">
                            <!--begin::Solid input group style-->
                            <label class="form-label fw-bold">Category</label>
                            <div class="input-group input-group-solid mb-5">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-setting-4 fs-1"></i>
                                </span>
                                <div class="overflow-hidden flex-grow-1">
                                    <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="type">
                                        <option <?php if ($Secure->SecureTxt($Methods->MethodsDataID($ID)['type']) == 1) {
                                            echo 'selected';
                                        } ?> value="1">Category #1
                                        </option>
                                        <option <?php if ($Secure->SecureTxt($Methods->MethodsDataID($ID)['type']) == 2) {
                                            echo 'selected';
                                        } ?> value="2">Category #2
                                        </option>
                                        <option <?php if ($Secure->SecureTxt($Methods->MethodsDataID($ID)['type']) == 3) {
                                            echo 'selected';
                                        } ?> value="3">Category #3
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Solid input group style-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer d-flex justify-content-center">
                        <button type="button" onclick="ChangeMethod(<?php echo (int)$ID; ?>)" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1 mx-1">
                            <i class="ki-duotone ki-copy-success fs-2hx">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            Update
                        </button>
                        <button type="button" onclick="DeleteMethod(<?php echo (int)$ID; ?>)" class="btn btn-sm btn-light-danger fs-5 fw-bold py-1">
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
                    <!--end::Card footer--></form>
                <!--end::Timeline-->
            </div>
        </div>
    </div>
</div>
<?php
include_once('public/footer.php');
?>
