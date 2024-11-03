<?php
 $page = 'Users Manager';
 define ('allow' , TRUE);
 include_once ('public/header.php');
 
 $ID = isset($_POST['ID']) ? $_POST['ID'] : null;
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
     <!--begin::Container-->
     <div id="kt_content_container" class="container-xxl">
          <!--begin::Row-->
          <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
               <div class="col-sm-12">
                    <div class="card">
                         <div class="card-header">
                              <h3 class="card-title align-items-start flex-column">
                                   <span class="card-label fw-bold text-gray-800 fs-4">Users</span>
                              </h3>
                         </div>
                         <form class="card-body" method="POST" id="UserData">
                              <input type="hidden" name="ID" id="user" value="">
                              <div class="border border-radius-sm">
                                   <select id="user_select" class="form-select form-select-lg form-select-solid user">
                                        <option value="0" selected data-kt-rich-content-subcontent="Select User" data-kt-rich-content-icon="<?php echo $assets ?>assets/media/other/cat.png">Empty</option>
                                    <?php foreach ($User -> UserDataAll ()['Response'] as $Uk => $Uv) { ?>
                                         <option value="<?php echo $Secure -> SecureTxt ($Uv['id']); ?>" data-kt-rich-content-subcontent="<?php if ($Secure -> SecureTxt ($Uv['plan']) == 0) {
                                          echo 'None';
                                         } else {
                                          $planData = $Plan -> PlanDataID ($Uv['plan']);
                                          echo is_array ($planData) ? $Secure -> SecureTxt ($planData['name']) : '';
                                         } ?>" data-kt-rich-content-icon="<?php echo $assets ?>assets/media/other/cat.png"><?php echo $Secure -> SecureTxt ($Uv['username']); ?>
                                         </option>
                                    <?php } ?>
                                   </select>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
          <!--end::row-->
          <!--end::Container-->
     </div>
     <!--end::Content-->
</div>
<?php
 include_once ('public/footer.php');
?>
