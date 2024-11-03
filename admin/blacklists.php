<?php
$page = 'Servers Manager';
define('allow', TRUE);
include_once('public/header.php');
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-2">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800 fs-4">Blacklist</span>
                    </h3>
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-category fs-6">
                                <span class="path1"></span><span class="path2"></span>
                                <span class="path3"></span><span class="path4"></span>
                            </i>
                        </button>
                        <!--begin::Menu 2-->
                        <div
                         class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                         data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator mt-3 opacity-75"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item">
                                <div class="menu-content">
                                    <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_1"> New Target </a>
                                </div>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 2-->
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-blacklist table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-150px">#ID</th>
                                <th class="min-w-100px">Target</th>
                                <th class="min-w-100px text-end">Actions</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
        </div>
        <!--end::row-->
        <!--begin::modal-->
        <div class="modal fade" tabindex="-1" id="kt_modal_1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form class="card rounded-0 w-100" method="POST" id="AddBlackList">
                        <!--begin::Card header-->
                        <div class="card-header pe-5">
                            <!--begin::Title-->
                            <div class="card-title fw-bold">
                                Add Blacklist
                            </div>
                            <!--end::Title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
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
                                <label class="form-label fw-bold">Target</label>
                                <div class="input-group input-group-solid mb-5">
                                    <span class="input-group-text">
                                        <i class="ki-duotone ki-subtitle fs-1">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                    </span>
                                    <input type="text" class="form-control form-control-solid fw-bold" placeholder="Meta"
                                           name="word" value=""/>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer justify-content-center d-flex">
                            <button type="button" onclick="AddBlackList()"
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
            </div>
        </div>
        <!--end::modal-->
        <!--end::Container-->
    </div>
    <!--end::Content-->
</div>
<?php
include_once('public/footer.php');
?>
