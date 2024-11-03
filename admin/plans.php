<?php
$page = 'Plans';
define('allow', TRUE);
include_once('public/header.php');

$defaultPlan = [
    'ID' => 1,
    'name' => 'Custom',
    'unit' => 'days',
    'length' => '0',
    'mbt' => '0',
    'price' => '0',
    'premium' => '0',
    'concurrents' => '0',
    'private' => '1',
    'api' => '0',
];

$existingCustomPlanCount = $Plan->PlanCheck($defaultPlan['ID'], $defaultPlan['name'])['Count'];

if ($existingCustomPlanCount === 0) {
    $DataBase->Query("TRUNCATE `plans`");
    $DataBase->Execute();

    $DataBase->Query("INSERT INTO `plans` (`ID`, `name`, `unit`, `length`, `mbt`,  `price`, `premium`, `concurrents`, `private`, `api`) VALUES (:id, :name,  :unit, :length, :mbt, :price, :premium, :concurrents, :private, :api);");
    $DataBase->Bind(':id', $defaultPlan['ID']);
    $DataBase->Bind(':name', $defaultPlan['name']);
    $DataBase->Bind(':mbt', $defaultPlan['mbt']);
    $DataBase->Bind(':unit', $defaultPlan['unit']);
    $DataBase->Bind(':length', $defaultPlan['length']);
    $DataBase->Bind(':price', $defaultPlan['price']);
    $DataBase->Bind(':premium', $defaultPlan['premium']);
    $DataBase->Bind(':concurrents', $defaultPlan['concurrents']);
    $DataBase->Bind(':private', $defaultPlan['private']);
    $DataBase->Bind(':api', $defaultPlan['api']);

    $DataBase->Execute();

}
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
                        <span class="card-label fw-bold text-gray-800 fs-4">Plans</span>
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
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
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
                                    <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_1"> Create Plan </a>
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
                        <table class="table table-plans table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 gs-0">
                                <th class="min-w-100px">Plan ID</th>
                                <th class="min-w-100px">Price</th>
                                <th class="min-w-100px">Length</th>
                                <th class="min-w-100px">Unit</th>
                                <th class="min-w-100px">Concurrents</th>
                                <th class="min-w-100px">Boot Time</th>
                                <th class="min-w-100px">Status</th>
                                <th class="min-w-100px">Api</th>
                                <th class="min-w-100px text-end">Actions</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody></tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
        </div>
        <!--end::row-->
        <!--end::Container-->
        <!--begin::modal-->
        <div class="modal fade" tabindex="-1" id="kt_modal_1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form class="card rounded-0 w-100" method="POST" id="PlanObj">
                        <!--begin::Card header-->
                        <div class="card-header pe-5">
                            <!--begin::Title-->
                            <div class="card-title fw-bold">
                                Create Plan
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
                                <label class="form-label fw-bold">Plan Name</label>
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
                                           name="name" value=""/>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="fv-row fv-plugins-icon-container">
                                <!--begin::Input group-->
                                <label class="form-label fw-bold">Price</label>
                                <div class="input-group input-group-solid input-group-sm mb-5">
                                    <span class="input-group-text">
                                        <i class="ki-duotone ki-euro fs-1">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                        </i>
                                    </span>
                                    <input type="text" class="form-control form-control-solid fw-bold" placeholder="35"
                                           name="price" value=""/>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--begin::Input group-->
                            <div class="fv-row mb-3 fv-plugins-icon-container">
                                <!--begin::Solid input group style-->
                                <label class="form-label fw-bold">Select Unit</label>
                                <div class="input-group input-group-solid mb-5">
                                    <span class="input-group-text">
                                        <i class="ki-duotone ki-calendar-search fs-1">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                        </i>
                                    </span>
                                    <div class="overflow-hidden flex-grow-1">
                                        <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Select an option" name="unit">
                                            <option value="days">Days</option>
                                            <option value="months">Months</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end::Solid input group style-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row fv-plugins-icon-container">
                                <label class="form-label fw-bold">Length</label>
                                <div class="input-group input-group-solid input-group-sm mb-5">
                                    <span class="input-group-text">
                                        <i class="ki-duotone ki-calendar-8 fs-1">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                            <i class="path6"></i>
                                        </i>
                                    </span>
                                    <input type="text" class="form-control form-control-solid fw-bold" placeholder="1"
                                           name="length"/>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row fv-plugins-icon-container">
                                <label class="form-label fw-bold">Concurrents</label>
                                <div class="input-group input-group-solid input-group-sm mb-5">
                                    <span class="input-group-text">
                                        <i class="ki-duotone ki-devices fs-1">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                    </span>
                                    <input type="text" class="form-control form-control-solid fw-bold" placeholder="1"
                                           name="slots"/>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row fv-plugins-icon-container">
                                <label class="form-label fw-bold">Boot Time</label>
                                <div class="input-group input-group-solid input-group-sm mb-5">
                                    <span class="input-group-text">
                                        <i class="ki-duotone ki-devices fs-1">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                            <i class="path4"></i>
                                            <i class="path5"></i>
                                        </i>
                                    </span>
                                    <input type="text" class="form-control form-control-solid fw-bold" placeholder="3600"
                                           name="mbt"/>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-3 fv-plugins-icon-container">
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
                                            <option value="0">False</option>
                                            <option value="1">True</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end::Solid input group style-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-3 fv-plugins-icon-container">
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
                                            <option value="0">False</option>
                                            <option value="1">True</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end::Solid input group style-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-3 fv-plugins-icon-container">
                                <!--begin::Solid input group style-->
                                <label class="form-label fw-bold">Status</label>
                                <div class="input-group input-group-solid mb-5">
                                    <span class="input-group-text">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </span>
                                    <div class="overflow-hidden flex-grow-1">
                                        <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Select an option" name="private">
                                            <option value="0">Visible</option>
                                            <option value="1">Private</option>
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
                            <button type="button" onclick="AddPlan()" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
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
    </div>
    <!--end::Content-->
</div>
<?php
include_once('public/footer.php');
?>
