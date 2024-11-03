<?php
$page = 'Handler';
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
            <form class="card" method="POST" id="ApiObj<?php echo (int)$ID; ?>">
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
                     <h3 class="fw-bold m-0 text-gray-800 fs-4">Handler Manage</h3>
                  </div>
                  <!--end::Title-->
                  <!--end::Toolbar-->
               </div>
               <!--end::Card head-->
               <!--begin::Card body-->
               <div class="card-body">
                  <div class="fv-row fv-plugins-icon-container">
                     <label class="form-label fw-bold">Handler Name</label>
                     <div class="input-group input-group-solid input-group-sm mb-5">
                        <span class="input-group-text">
                           <i class="ki-duotone ki-tablet-book fs-1">
                              <i class="path1"></i>
                              <i class="path2"></i>
                           </i>
                        </span>
                        <input type="text" class="form-control form-control-solid fw-bold" placeholder="Sellix"
                               name="name" value="<?php echo $Api->ApiDataID($ID, 1)['name']; ?>">
                     </div>
                  </div>
                  <div class="fv-row fv-plugins-icon-container">
                     <label class="form-label fw-bold">Slots</label>
                     <div class="input-group input-group-solid input-group-sm mb-5">
                        <span class="input-group-text">
                           <i class="ki-duotone ki-tablet-book fs-1">
                              <i class="path1"></i>
                              <i class="path2"></i>
                           </i>
                        </span>
                        <input type="text" class="form-control form-control-solid fw-bold" placeholder="35"
                               name="slots" value="<?php echo $Api->ApiDataID($ID, 1)['slots']; ?>">
                     </div>
                  </div>
                  <div class="separator border-3 mb-3"></div>
                  <div class="fv-row fv-plugins-icon-container">
                     <label class="form-label fw-bold">Link</label>
                     <div class="input-group input-group-solid input-group-sm mb-5">
                        <span class="input-group-text">
                           <i class="ki-duotone ki-tablet-book fs-1">
                              <i class="path1"></i>
                              <i class="path2"></i>
                           </i>
                        </span>
                        <input type="text" class="form-control form-control-solid fw-bold" placeholder="35"
                               name="link" value="<?php echo $Api->ApiDataID($ID, 1)['link']; ?>">
                     </div>
                  </div>
                  <div class="separator border-3 mb-3"></div>
                  <div class="form-group row">
                     <!--begin::Solid input group style-->
                     <label class="form-label fw-bold">Status</label>
                     <div class="input-group input-group-solid mb-5">
                        <span class="input-group-text">
                           <i class="ki-duotone ki-setting-4 fs-1"></i>
                        </span>
                        <div class="overflow-hidden flex-grow-1">
                           <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start"
                                   data-control="select2" data-hide-search="true"
                                   data-placeholder="Select an option" name="status">
                              <option <?php if ($Secure->SecureTxt($Api->ApiDataID($ID, 1)['status']) == 0) {
                                  echo 'selected';
                              } ?> value="0">Online
                              </option>
                              <option <?php if ($Secure->SecureTxt($Api->ApiDataID($ID, 1)['status']) == 1) {
                                  echo 'selected';
                              } ?> value="1">Offline
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
                     <label class="form-label fw-bold">Layer</label>
                     <div class="input-group input-group-solid mb-5">
                        <span class="input-group-text">
                           <i class="ki-duotone ki-setting-4 fs-1"></i>
                        </span>
                        <div class="overflow-hidden flex-grow-1">
                           <select class="form-select form-select-solid form-select-lg rounded-start-0 border-start"
                                   data-control="select2" data-hide-search="true"
                                   data-placeholder="Select an option" name="layer">
                              <option <?php if ($Secure->SecureTxt($Api->ApiDataID($ID, 1)['layer']) == 4) {
                                  echo 'selected';
                              } ?> value="4">Layer 4
                              </option>
                              <option
                              <option <?php if ($Secure->SecureTxt($Api->ApiDataID($ID, 1)['layer']) == 7) {
                                  echo 'selected';
                              } ?> value="7">Layer 7
                              </option>
                           </select>
                        </div>
                     </div>
                     <!--end::Solid input group style-->
                  </div>
                  <!--end::Input group-->
                  <div class="separator border-3 mb-3"></div>
                  <!--begin::Input group-->
                  <div class="fv-row mb-3 fv-plugins-icon-container">
                     <!--begin::Label-->
                     <label class="form-label fw-bold first-upperchase">Methods</label>
                     <!--end::Label-->
                     <!--begin::select-->
                     <select class="form-select form-select-sm form-select-solid" data-control="select2" data-close-on-select="false" data-placeholder="Select an method" data-allow-clear="true" multiple="multiple" name="methods[]">
                        <option value="none">None</option>
                         <?php foreach ($Methods->MethodsDataAll()['Response'] as $K => $V) {
                             $pos = strpos($Api->ApiDataID($ID, 1)['methods'], $V['name']);
                             if ($pos === false) {
                                 $selected = '';
                             } else {
                                 $selected = 'selected';
                             }
                             echo '<option ' . $selected . ' value="' . $V['name'] . '">' . $V['name'] . '  - Layer' . $V['layer'] . '</option>	';
                         } ?>
                     </select>
                     <!--end::select-->
                  </div>
                  <!--end::Input group-->
               </div>
               <!--end::Card body-->
               <!--begin::Card footer-->
               <div class="card-footer d-flex justify-content-center">
                  <button type="button" onclick="ChangeAPI(<?php echo (int)$ID; ?>)"
                          class="btn btn-sm btn-light-primary fs-5 fw-bold py-1 mx-1">
                     <i class="ki-duotone ki-copy-success fs-2hx">
                        <i class="path1"></i>
                        <i class="path2"></i>
                     </i>
                     Update
                  </button>
                  <button type="button" onclick="DeleteApi(<?php echo (int)$ID; ?>)"
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
