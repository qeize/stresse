<?php
$page = 'News';
define('allow', TRUE);
include_once('public/header.php');
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
   <!--begin::Container-->
   <div id="kt_content_container" class="container-xxl">
      <!--begin::Row-->
      <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-header border-0 pt-2">
                  <h3 class="card-title align-items-start flex-column">
                     <span class="card-label fw-bold text-gray-800 fs-4">News</span>
                  </h3>
                  <div class="card-toolbar">
                     <!--begin::Menu-->
                     <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-category fs-6">
                           <span class="path1"></span><span class="path2"></span>
                           <span class="path3"></span><span class="path4"></span>
                        </i>
                     </button>
                     <!--begin::Menu 2-->
                     <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
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
                              <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                                 Create News </a>
                           </div>
                        </div>
                        <!--end::Menu item-->
                     </div>
                     <!--end::Menu 2-->
                     <!--end::Menu-->
                  </div>
               </div>
               <div class="card-body">
                  <div class="overflow-auto pb-5">
                      <?php foreach ($News->NewsDataAll()['Response'] as $Nk => $Nv) { ?>
                         <!--begin::Notice-->
                         <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6 mt-5">
                            <form method="POST" id="NewsObj<?php echo (int)$Nv['ID']; ?>">
                               <input type="hidden" id="_csrf" value="<?php echo $csrftoken; ?>">
                               <input type="hidden" id="ID" name="ID" value="<?php echo (int)$Nv['ID']; ?>">
                               <button type="button" onclick="DeleteNews(<?php echo (int)$Nv['ID']; ?>)" class="test btn btn-sm btn-danger fw-bold">
                                  Delete
                               </button>
                            </form>
                            <div class="content-wrapper">
                               <!--begin::Wrapper-->
                               <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                  <!--begin::Content-->
                                  <div class="mb-3 mb-md-0 fw-bold">
                                     <h4 class="text-gray-900 fw-bold"><?php echo $Secure->SecureTxt($Nv['title']); ?></h4>
                                     <div class="fs-6 text-gray-700 pe-7 scroll-y h-sm-150px">
                                         <?php echo $Nv['message']; ?>
                                     </div>
                                  </div>
                                  <!--end::Content-->
                               </div>
                            </div>
                            <!--end::Wrapper-->
                         </div>
                      <? } ?>
                     <!--end::Notice-->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--end::row-->
      <!--end::Container-->
      <!--begin::modal-->
      <div class="modal fade" tabindex="-1" id="kt_modal_1">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <form class="card rounded-0 w-100" method="POST" id="NewsObj">
                  <!--begin::Card header-->
                  <div class="card-header pe-5">
                     <!--begin::Title-->
                     <div class="card-title fw-bold">
                        Add News
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
                     <!--begin::Input group-->
                     <div class="fv-row mb-3 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="form-label fw-bold required">Title</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input name="title" class="form-control form-control-lg form-control-solid border-radius-sm fw-bold" placeholder="Update" value="">
                        <!--end::Input-->
                     </div>
                     <!--end::Input group-->
                     <!--begin::Input group-->
                     <div class="fv-row mb-3 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="form-label fw-bold required">Text</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea id="kt_docs_tinymce_plugins" name="message" class="tox-target"></textarea>
                        <!--end::Input-->
                     </div>
                     <!--end::Input group-->
                  </div>
                  <!--end::Card body-->
                  <!--begin::Card footer-->
                  <div class="card-footer d-flex justify-content-center">
                     <button type="button" onclick="AddNews()" class="btn btn-sm btn-light-primary fs-5 fw-bold py-1">
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
