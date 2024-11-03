<?php
   $page = 'Logs';
   define ('allow' , TRUE);
   include_once ('public/header.php');
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
                              <span class="card-label fw-bold text-gray-800 fs-4">Logs</span>
                         </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                         <!--begin::Table container-->
                         <div class="table-responsive">
                              <!--begin::Table-->
                              <table class="table table-logs table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                   <!--begin::Table head-->
                                   <thead>
                                   <tr class="fw-bold text-muted">
                                        <th class="min-w-150px">User</th>
                                        <th class="min-w-100px">Target</th>
                                        <th class="min-w-100px">Method</th>
                                        <th class="min-w-100px">Date</th>
                                        <th class="min-w-100px">Handler</th>
                                        <th class="min-w-100px">Path</th>
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
          <!--end::Container-->
     </div>
     <!--end::Content-->
</div>
<?php
   include_once ('public/footer.php');
?>
