<?php
$page = 'Methods Manager';
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
                  <span class="card-label fw-bold fs-3">Methods</span>
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
                     <div class="separator mb-3 opacity-75"></div>
                     <!--end::Menu separator-->
                     <!--begin::Menu item-->
                     <div class="menu-item">
                        <div class="menu-content">
                           <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_1"> New
                              Methods </a>
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
                  <table class="table table-methods table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                     <!--begin::Table head-->
                     <thead>
                     <tr class="fw-bold text-muted">
                        <th class="min-w-150px">Method Name</th>
                        <th class="min-w-100px">Hub Name</th>
                        <th class="min-w-100px">API Name</th>
                        <th class="min-w-100px">Layer</th>
                        <th class="min-w-100px">Class</th>
                        <th class="min-w-100px">Category</th>
                        <th class="min-w-100px">Api</th>
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
               <form class="card rounded-0 w-200" method="POST" id="MethodObj">
                  <!--begin::Card header-->
                  <div class="card-header pe-5">
                     <!--begin::Title-->
                     <div class="card-title fw-bold">
                        <h3 class="card-title align-items-start flex-column">
                           <span class="card-label fw-bold text-gray-800 fs-4">Create Method</span>
                        </h3>
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
                        <label class="form-label fw-bold">Method Name</label>
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
                        <label class="form-label fw-bold">API Name</label>
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
                                  name="apiname" value=""/>
                        </div>
                        <!--end::Input group-->
                     </div>
                     <div class="fv-row fv-plugins-icon-container">
                        <!--begin::Input group-->
                        <label class="form-label fw-bold">Hub Name</label>
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
                                  name="hubname" value=""/>
                        </div>
                        <!--end::Input group-->
                     </div>
                     <div class="form-group row">
                        <!--begin::Input group-->
                        <div class="fv-row mb-3 fv-plugins-icon-container col-6">
                           <!--begin::Solid input group style-->
                           <label class="form-label fw-bold">Class</label>
                           <div class="input-group input-group-solid mb-5">
                              <span class="input-group-text">
                                 <i class="ki-duotone ki-setting-4 fs-2"></i>
                              </span>
                              <div class="overflow-hidden flex-grow-1">
                                 <select
                                    class="form-select form-select-solid form-select-md rounded-start-0 border-start"
                                    data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" name="class">
                                    <option value="0">Free</option>
                                    <option value="1">Basic</option>
                                    <option value="2">Premium</option>
                                 </select>
                              </div>
                           </div>
                           <!--end::Solid input group style-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-3 fv-plugins-icon-container col-6">
                           <!--begin::Solid input group style-->
                           <label class="form-label fw-bold">Layer</label>
                           <div class="input-group input-group-solid mb-5">
                              <span class="input-group-text">
                                 <i class="ki-duotone ki-setting-4 fs-2"></i>
                              </span>
                              <div class="overflow-hidden flex-grow-1">
                                 <select
                                    class="form-select form-select-solid form-select-md rounded-start-0 border-start"
                                    data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" name="layer">
                                    <option value="4">Layer 4</option>
                                    <option value="7">Layer 7</option>
                                 </select>
                              </div>
                           </div>
                           <!--end::Solid input group style-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <div class="form-group row">
                        <!--begin::Input group-->
                        <div class="fv-row mb-3 fv-plugins-icon-container col-6">
                           <!--begin::Solid input group style-->
                           <label class="form-label fw-bold">Category</label>
                           <div class="input-group input-group-solid mb-5">
                              <span class="input-group-text">
                                 <i class="ki-duotone ki-setting-4 fs-2"></i>
                              </span>
                              <div class="overflow-hidden flex-grow-1">
                                 <select
                                    class="form-select form-select-solid form-select-md rounded-start-0 border-start"
                                    data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" name="type">
                                    <option value="1">Type 1</option>
                                    <option value="2">Type 2</option>
                                    <option value="3">Type 3</option>
                                    <option value="4">Type 4</option>
                                    <option value="5">Type 5</option>
                                 </select>
                              </div>
                           </div>
                           <!--end::Solid input group style-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-3 fv-plugins-icon-container col-6">
                           <!--begin::Solid input group style-->
                           <label class="form-label fw-bold">Api</label>
                           <div class="input-group input-group-solid mb-5">
                              <span class="input-group-text">
                                 <i class="ki-duotone ki-setting-4 fs-2"></i>
                              </span>
                              <div class="overflow-hidden flex-grow-1">
                                 <select
                                    class="form-select form-select-solid form-select-md rounded-start-0 border-start"
                                    data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" name="api">
                                    <option value="1">False</option>
                                    <option value="0">True</option>
                                 </select>
                              </div>
                           </div>
                           <!--end::Solid input group style-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <!--begin::Input group-->
                     <div class="fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="form-label fw-bold">Method Description</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea name="description"
                                  class="form-control form-control-lg form-control-solid border-radius-sm"
                                  placeholder="Some shit" value=""></textarea>
                        <!--end::Input-->
                     </div>
                     <!--end::Input group-->
                  </div>
                  <!--end::Card body-->
                  <!--begin::Card footer-->
                  <div class="card-footer justify-content-center d-flex">
                     <button type="button" onclick="AddMethod()" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
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
