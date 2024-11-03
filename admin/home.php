<?php
$page = 'Home';
define('allow', TRUE);
include_once('public/header.php');
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
   <!--begin::Container-->
   <div id="kt_content_container" class="container-xxl">
      <!--begin::Row-->
      <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
         <div class="col-xl-4">
            <!--begin::Widget 1-->
            <div class="card">
               <!--begin::Body-->
               <div class="card-body d-flex justify-content-between">
                  <div class="text-gray-900 fw-bold">
                     <div class="d-flex flex-column">
                        <h1 class="fs-6 text-gray-500">Total Users</h1>
                        <span class="fs-1 text-dark fw-bold text-gray-800"><?php echo (int)$User->UserDataAll()['Count']; ?></span>
                     </div>
                  </div>
                  <div>
                     <i class="ki-duotone ki-people fs-4qx text-success">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                        <i class="path4"></i>
                        <i class="path5"></i>
                     </i>
                  </div>
               </div>
               <!--end::Body-->
            </div>
            <!--end::Widget 1-->
         </div>
         <div class="col-xl-4">
            <!--begin::Widget 1-->
            <div class="card">
               <!--begin::Body-->
               <div class="card-body d-flex justify-content-between">
                  <div class="text-gray-900 fw-bold">
                     <div class="d-flex flex-column">
                        <h1 class="fs-6 text-gray-500">Running Boots</h1>
                        <span class="fs-1 text-dark fw-bold text-gray-800"><?php echo (int)$ALogs->LogsDataRunning()['Count']; ?></span>
                     </div>
                  </div>
                  <div>
                     <i class="ki-duotone ki-graph-up fs-4qx text-warning">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                        <i class="path4"></i>
                        <i class="path5"></i>
                        <i class="path6"></i>
                     </i>
                  </div>
               </div>
               <!--end::Body-->
            </div>
            <!--end::Widget 1-->
         </div>
         <div class="col-xl-4">
            <!--begin::Widget 1-->
            <div class="card">
               <!--begin::Body-->
               <div class="card-body d-flex justify-content-between">
                  <div class="text-gray-900 fw-bold">
                     <div class="d-flex flex-column">
                        <h1 class="fs-6 text-gray-500">Total Boots</h1>
                        <span class="fs-1 text-dark fw-bold text-gray-800"><?php echo (int)$ALogs->LogsDataAll()['Count']; ?></span>
                     </div>
                  </div>
                  <div>
                     <i class="ki-duotone ki-chart-simple fs-4qx text-primary">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                        <i class="path4"></i>
                     </i>
                  </div>
               </div>
               <!--end::Body--></a>
               <!--end::Widget 1-->
            </div>
         </div>
      </div>
      <!--end::Row-->
      <!--begin::Row-->
      <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
         <div class="col-xl-4">
            <!--begin::Widget 1-->
            <div class="card">
               <!--begin::Body-->
               <div class="card-body d-flex justify-content-between">
                  <div class="text-gray-900 fw-bold">
                     <div class="d-flex flex-column">
                        <h1 class="fs-6 text-gray-500">Total Paid</h1>
                        <span class="fs-1 text-dark fw-bold text-gray-800"><?php echo (int)$User->UserDataPaid()['Count']; ?></span>
                     </div>
                  </div>
                  <div>
                     <i class="ki-duotone ki-user-tick fs-4qx text-success">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                        <i class="path4"></i>
                        <i class="path5"></i>
                     </i>
                  </div>
               </div>
               <!--end::Body-->
            </div>
            <!--end::Widget 1-->
         </div>
         <div class="col-xl-4">
            <!--begin::Widget 1-->
            <div class="card">
               <!--begin::Body-->
               <div class="card-body d-flex justify-content-between">
                  <div class="text-gray-900 fw-bold">
                     <div class="d-flex flex-column">
                        <h1 class="fs-6 text-gray-500">Earned Month</h1>
                        <span class="fs-1 text-dark fw-bold text-gray-800"><?php echo $Order->MonthEarned() ?? 0; ?>
                           $</span>
                     </div>
                  </div>
                  <div>
                     <i class="ki-duotone ki-dollar fs-4qx text-warning">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                        <i class="path4"></i>
                        <i class="path5"></i>
                        <i class="path6"></i>
                     </i>
                  </div>
               </div>
               <!--end::Body-->
            </div>
            <!--end::Widget 1-->
         </div>
         <div class="col-xl-4">
            <!--begin::Widget 1-->
            <div class="card">
               <!--begin::Body-->
               <div class="card-body d-flex justify-content-between">
                  <div class="text-gray-900 fw-bold">
                     <div class="d-flex flex-column">
                        <h1 class="fs-6 text-gray-500">Earned Total</h1>
                        <span class="fs-1 text-dark fw-bold text-gray-800"><?php echo $Order->TotalEarned() ?? 0; ?>
                           $</span>
                     </div>
                  </div>
                  <div>
                     <i class="ki-duotone ki-dollar fs-4qx text-primary">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                        <i class="path4"></i>
                     </i>
                  </div>
               </div>
               <!--end::Body-->
               <!--end::Widget 1-->
            </div>
         </div>
      </div>
      <!--end::Row-->
      <!--begin::Row -->
      <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-header border-0">
                  <h3 class="card-title align-items-start flex-column">
                     <span class="card-label fw-bold text-gray-800 fs-4">Running</span>
                  </h3>
                  <form class="card-toolbar" method="POST" id="manageattacks">
                     <button type="button" onclick="StopAll()" class="btn btn-sm fw-bold btn-light-danger">STOP ALL
                     </button>
                     <button type="button" onclick="ClearOldAttack()" class="btn btn-sm fw-bold btn-light-warning mx-3">Clear Attacks
                     </button>
                  </form>
               </div>
               <div class="card-body">
                  <!--begin::Table container-->
                  <div class="table-responsive">
                     <!--begin::Table-->
                     <table class="table table-attacks table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <!--begin::Table head-->
                        <thead>
                        <tr class="fw-bold text-muted">
                           <th class="min-w-140px">Target</th>
                           <th class="min-w-160px">Time</th>
                           <th class="min-w-120px">Method</th>
                           <th class="min-w-120px">User</th>
                           <th class="min-w-120px">Path</th>
                           <th class="min-w-120px">Handler</th>
                           <th class="min-w-120px">Action</th>
                        </tr>
                        </thead>
                        <!--end::Table head-->
                     </table>
                     <!--end::Table-->
                  </div>
                  <!--end::Table container-->
               </div>
            </div>
         </div>
      </div>
      <!--end::Row -->
      <!--end::Container-->
   </div>
   <!--end::Content-->
</div>
<?php
include_once('public/footer.php');
?>
