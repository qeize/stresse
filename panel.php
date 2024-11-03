<?php
$page = 'Panel';
define('allow', TRUE);
include_once('global/public/header.php');
header('Cache-Control: public, max-age=5');
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
   <!--begin::Container-->
   <div id="kt_content_container" class="container-xxl">
      <!--begin::Row-->
      <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
         <!--begin::Col-->
         <div class="col-sm-5 col-xxl-4">
            <div class="card">
               <div class="card-body">
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane smooth-transition show active" id="tab_layer7" role="tabpanel">
                        <form method="POST" id="Launch7">
                           <!--begin::csrf token input -->
                           <input type="hidden" id="_csrf" value="<?php echo $csrftoken; ?>">
                           <!--end::csrf token input -->
                           <!--begin::Solid input group style-->
                           <div class="fv-row mb-1 fv-plugins-icon-container">
                              <label class="form-label fw-bold">Method</label>
                              <div class="input-group input-group-solid flex-nowrap">
                                 <span class="input-group-text">
                                    <i class="ki-duotone ki-note-2 fs-2">
                                       <i class="path1"></i>
                                       <i class="path2"></i>
                                       <i class="path3"></i>
                                       <i class="path4"></i>
                                    </i>
                                 </span>
                                 <div class="overflow-hidden flex-grow-1">
                                    <select
                                       class="form-select form-select-solid rounded-start-0 border-start fw-bold"
                                       data-control="select2" data-dropdown-parent="body"
                                       data-hide-search="true" data-placeholder="Select an method"
                                       id="method-select" name="method">
                                       <option></option>
                                       <optgroup class="fw-bold fs-5" label="@Flood">
                                           <?php foreach ($Methods->MethodsDataAll()['Response'] as $Mk => $Mv) {
                                               if ($Mv['layer'] == 7) {
                                                   if ($Mv['type'] == 1) { ?>
                                                      <option <? if ($Mv['status'] == 1) echo 'disabled' ?> value="<?php echo $Mv['id']; ?>"><?php echo $Secure->SecureTxt($Mv['hubname']); ?></option>
                                                   <?php }
                                               }
                                           } ?>
                                       </optgroup>
                                       <optgroup class="fw-bold fs-5" label="@Browser">
                                           <?php foreach ($Methods->MethodsDataAll()['Response'] as $Mk => $Mv) {
                                               if ($Mv['layer'] == 7) {
                                                   if ($Mv['type'] == 2) { ?>
                                                      <option style="color: darkgoldenrod" <? if ($Mv['status'] == 1) echo 'disabled' ?> value="<?php echo $Mv['id']; ?>"><?php echo $Secure->SecureTxt($Mv['hubname']); ?></option>
                                                   <?php }
                                               }
                                           } ?>
                                       </optgroup>
                                        <?php if ($Admin->AdminAllow() == true) { ?>
                                           <optgroup class="fw-bold fs-5" label="Beta Admin">
                                               <?php foreach ($Methods->MethodsDataAll()['Response'] as $Mk => $Mv) {
                                                   if ($Mv['layer'] == 7) {
                                                       if ($Mv['type'] == 3) { ?>
                                                          <option style="display: color: red !important;" value="<?php echo $Mv['id']; ?>"><?php echo $Secure->SecureTxt($Mv['hubname']); ?></option>
                                                       <?php }
                                                   }
                                               } ?>
                                           </optgroup>
                                        <? } ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <!--end::Solid input group style-->
                           <!--begin::Input group-->
                           <div class="fv-row  fv-plugins-icon-container">
                              <label class="form-label fw-bold">Target</label>
                              <div class="input-group input-group-solid input-group-md mb-1">
                                 <span class="input-group-text">
                                    <i class="ki-duotone ki-avalanche fs-2">
                                       <i class="path1"></i>
                                       <i class="path2"></i>
                                    </i>
                                 </span>
                                 <input type="text" class="form-control fs-6" placeholder="example.link" name="target"/>
                              </div>
                           </div>
                           <!--end::Input group-->
                           <!--begin::Input group-->
                           <div class="fv-row  fv-plugins-icon-container">
                              <label class="form-label fw-bold">Time</label>
                              <div class="input-group input-group-solid input-group-md mb-1">
                                 <span class="input-group-text">
                                    <i class="ki-duotone ki-timer fs-2">
                                       <i class="path1"></i>
                                       <i class="path2"></i>
                                       <i class="path3"></i>
                                    </i>
                                 </span>
                                 <input type="text" class="form-control fs-6" placeholder="300" name="time"/>
                              </div>
                           </div>
                           <!--end::Input group-->
                           <!--begin::Input group-->
                           <div class="fv-row fv-plugins-icon-container">
                              <!--begin::Label-->
                              <label class="form-label fw-bold  d-flex justify-content-between mt-2">Concurrents
                                 <span class="badge badge-light-warning slider_slotsl7">1</span>
                              </label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <input type="range" class="form-range slotsl7" value="1" min="1" max="<?php $addons = explode('|', $User->UserData()['addons']);
                              $concurrents = $Plan->PlanDataID($User->UserData()['plan'])['concurrents'] + $addons[0];
                              echo $concurrents; ?>">
                              <!--end::Input-->
                           </div>
                           <!--end::Input group-->
                           <!--begin::Accordion-->
                           <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
                              <!--begin::Body-->
                              <div id="layer7" class="fs-6 collapse" data-bs-parent="#kt_accordion_2">
                                 <!--begin::Solid input group style-->
                                 <div class="fv-row fv-plugins-icon-container d-flex justify-content-center mt-5 mb-2">
                                    <!--begin::Options-->
                                    <div class="mb-0 d-flex">
                                       <!--begin:Option-->
                                       <label class="d-flex cursor-pointer me-3">
                                          <!--begin:Label-->
                                          <span class="d-flex align-items-center me-2">
                                             <!--begin::Description-->
                                             <span class="d-flex flex-column">
                                                <span
                                                   class="fw-bold text-gray-800 text-hover-primary fs-7 ">GET</span>
                                             </span>
                                             <!--end:Description-->
                                          </span>
                                          <!--end:Label-->
                                          <!--begin:Input-->
                                          <span
                                             class="form-check form-check-sm form-check-custom form-check-solid">
                                             <input class="form-check-input" type="radio" checked name="requestmethod" value="GET">
                                          </span>
                                          <!--end:Input-->
                                       </label>
                                       <!--end::Option-->
                                       <!--begin:Option-->
                                       <label class="d-flex cursor-pointer me-3">
                                          <!--begin:Label-->
                                          <span class="d-flex align-items-center me-2">
                                             <!--begin::Description-->
                                             <span class="d-flex flex-column">
                                                <span
                                                   class="fw-bold text-gray-800 text-hover-primary fs-7 ">POST</span>
                                             </span>
                                             <!--end:Description-->
                                          </span>
                                          <!--end:Label-->
                                          <!--begin:Input-->
                                          <span
                                             class="form-check form-check-sm form-check-custom form-check-solid">
                                             <input class="form-check-input" type="radio" name="requestmethod" value="POST">
                                          </span>
                                          <!--end:Input-->
                                       </label>
                                       <!--end::Option-->
                                    </div>
                                    <!--end::Options-->
                                 </div>
                                 <!--end::Solid input group style-->
                                 <!--begin::Input group-->
                                 <div class="fv-row fv-plugins-icon-container" id="postdata" style="display: none;">
                                    <label class="form-label fw-bold">Json Post Data</label>
                                    <div class="input-group input-group-solid input-group-md mb-1">
                                       <span class="input-group-text">
                                          <i class="ki-duotone ki-devices fs-2">
                                             <i class="path1"></i>
                                             <i class="path2"></i>
                                             <i class="path3"></i>
                                             <i class="path4"></i>
                                             <i class="path5"></i>
                                          </i>
                                       </span>
                                       <input type="text" id="custompostdata" class="form-control" placeholder="%RAND%" value="{}" name="postdata"/>
                                    </div>
                                 </div>
                                 <!--end::Input group-->
                                 <!--begin::Input group-->
                                 <div id="cookie" class="fv-row fv-plugins-icon-container">
                                    <label class="form-label fw-bold">Cookie</label>
                                    <div class="input-group input-group-solid input-group-md mb-1">
                                       <span class="input-group-text">
                                          <i class="ki-duotone ki-devices fs-2">
                                             <i class="path1"></i>
                                             <i class="path2"></i>
                                             <i class="path3"></i>
                                             <i class="path4"></i>
                                             <i class="path5"></i>
                                          </i>
                                       </span>
                                       <input type="text" class="form-control" placeholder="PHPSESSID=SOMEDATA" name="cookie"/>
                                    </div>
                                 </div>
                                 <!--end::Input group-->
                                 <!--begin::Input group-->
                                 <div class="fv-row  fv-plugins-icon-container">
                                    <label class="form-label fw-bold">Ratelimit</label>
                                    <div class="input-group input-group-solid input-group-md mb-1">
                                       <span class="input-group-text">
                                          <i class="ki-duotone ki-devices fs-2">
                                             <i class="path1"></i>
                                             <i class="path2"></i>
                                             <i class="path3"></i>
                                             <i class="path4"></i>
                                             <i class="path5"></i>
                                          </i>
                                       </span>
                                       <input id="ratelimitholder" type="text" class="form-control" placeholder="Min: 1 | Default: 32 | Max: 100" name="ratelimit"/>
                                    </div>
                                 </div>
                                 <!--end::Input group-->
                                 <!--begin::Input group-->
                                 <div class="fv-row  fv-plugins-icon-container" id="reconnection" style="display: none">
                                    <label class="form-label fw-bold">Re-Connection</label>
                                    <div class="input-group input-group-solid input-group-md mb-1">
                                       <span class="input-group-text">
                                          <i class="ki-duotone ki-devices fs-2">
                                             <i class="path1"></i>
                                             <i class="path2"></i>
                                             <i class="path3"></i>
                                             <i class="path4"></i>
                                             <i class="path5"></i>
                                          </i>
                                       </span>
                                       <input type="text" class="form-control" placeholder="Min: 1 | Default: 25 | Max: 75" name="reconnection"/>
                                    </div>
                                 </div>
                                 <!--end::Input group-->
                                 <!--begin::Input group-->
                                 <div class="fv-row mb-3 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold first-upperchase">HTTP Vers.</label>
                                    <!--end::Label-->
                                    <!--begin::select-->
                                    <select class="form-select form-select-sm form-select-test form-select-solid" data-control="select2" data-close-on-select="false" data-allow-clear="true"  data-minimum-results-for-search="Infinity" name="http">
                                       <option value="2">HTTP2</option>
                                       <option value="1" disabled>HTTP1</option>
                                    </select>
                                    <!--end::select-->
                                 </div>
                                 <!--end::Input group-->
                                 <!--begin::Input group-->
                                 <div class="fv-row mb-3 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold first-upperchase">Country Select</label>
                                    <!--end::Label-->
                                    <!--begin::select-->
                                    <select class="form-select form-select-sm form-select-test form-select-solid" data-control="select2" data-close-on-select="false" data-placeholder="Select an country" data-allow-clear="true" multiple name="http">
                                       <option value="mix" selected>Mix</option>
                                       <option value="usa" disabled>USA</option>
                                       <option value="de" disabled>DE</option>
                                       <option value="br" disabled>BR</option>
                                    </select>
                                    <!--end::select-->
                                 </div>
                                 <!--end::Input group-->
                              </div>
                              <!--end::Body-->
                           </div>
                           <!--end::Item-->
                           <div class="d-flex flex-column">
                              <button id="blockUIall" type="button" class="btn fw-bold btn-sm btn-active-primary bg-primary mt-2">
                                 Start Attack
                              </button>
                              <button type="button" data-bs-toggle="collapse" data-bs-target="#layer7" class="btn fw-bold btn-sm btn-active-light bg-secondary bg-body mt-2">
                                 Advanced Options
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-7 col-xxl-8">
            <div class="card">
               <div class="card-header border-0">
                  <h3 class="card-title align-items-start flex-column">
                     <span class="card-label fw-bold fs-5 text-gray-800 mb-1">Running Boots</span>
                  </h3>
                  <form class="card-toolbar" method="POST" id="stopall">
                     <button id="blockUIall" type="button" class="btn btn-sm fw-bold btn-light-danger ">STOP ALL
                     </button>
                  </form>
               </div>
               <div class="card-body">
                  <!--begin::Table container-->
                  <div class="table-responsive">
                     <!--begin::Table-->
                     <table
                        class="table table-attacks table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <!--begin::Table head-->
                        <thead>
                        <tr class="fw-bold text-muted">
                           <th class="min-w-140px">Target</th>
                           <th class="min-w-160px">Time</th>
                           <th class="min-w-120px">Method</th>
                           <th class="min-w-120px">Handler</th>
                           <th class="min-w-120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <!--end::Table head-->
                     </table>
                     <!--end::Table-->
                  </div>
                  <!--end::Table container-->
               </div>
            </div>
         </div>
         <!--end::Col-->
      </div>
      <!--end::Container-->
   </div>
   <!--end::Content-->
</div>
<?php
include_once('global/public/footer.php');
?>
