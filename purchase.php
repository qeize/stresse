<?php
$page = 'Purchase';
define('allow', TRUE);
include_once('global/public/header.php');

header('Cache-Control: public, max-age=3600');
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
            <?php foreach ($Plan->PlanDataAll()['Response'] as $Kv => $Vv) if ($Vv['private'] == false) { ?>
                <div class="col-sm-4 col-xxl-4 hover-elevate-up">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-header ribbon ribbon-end d-flex justify-content-center">
                            <div class="card-title fw-bold fs-1"><?php echo $Secure->SecureTxt($Vv['name']); ?></div>
                            <div class="ribbon-label bg-info fw-bold fs-2">
                                $<?php echo $Secure->SecureTxt($Vv['price']); ?></div>
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
                                        <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Concurrents</div>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="fw-bold fs-5 badge badge-light-warning"><?php echo $Secure->SecureTxt($Vv['concurrents']); ?></div>
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
                                        <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Boot Time</div>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="fw-bold fs-5 badge badge-light-warning"><?php echo $Secure->SecureTxt($Vv['mbt']); ?></div>
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
                                        <div
                                            class="fs-5 text-gray-800 text-hover-primary text-capitalize fw-bold"><?php echo $Secure->SecureTxt($Vv['unit']); ?></div>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="fw-bold fs-5 badge badge-light-warning"><?php echo $Secure->SecureTxt($Vv['length']); ?></div>
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
                                        <div class="fs-5 text-gray-800 text-hover-primary fw-bold">Premium</div>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="fw-bold fs-7 badge badge-light-warning"><?php echo ($Secure->SecureTxt($Vv['premium']) == 1) ? "true" : "false"; ?></div>
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
                                        <div
                                            class="fw-bold fs-7 badge badge-light-warning"><?php echo ($Secure->SecureTxt($Vv['api']) == 1) ? "true" : "false"; ?></div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Description-->
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center pb-3">
                            <form method="POST" id="Purchase<?php echo (int)$Vv['ID']; ?>">
                                <input hidden id="_csrf" value="<?php echo $csrftoken; ?>">
                                <input hidden id="id" name="id" value="<?php echo (int)$Vv['ID']; ?>">
                                <?php if ($User->UserData()['plan'] != $Vv['ID']) { ?>
                                    <button type="button" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </button>
                                <?php } else { ?>
                                    <button type="button"
                                            class="btn btn-sm btn-light-primary fs-5 fw-bold py-1 disabled">
                                        <i class="ki-duotone ki-shop fs-2hx">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                        Purchase
                                    </button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
        <!--end::Row-->
        <!--end::Container-->
    </div>
    <!--end::Content-->
</div>
<?php
include_once('global/public/footer.php');
?>
