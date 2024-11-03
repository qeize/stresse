<?php
$page = 'Home';
define('allow', TRUE);
include_once('global/public/header.php');
header('Cache-Control: public, max-age=25');
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
   <!--begin::Container-->
   <div id="kt_content_container" class="container-xxl">
      <!--begin::Row-->
      <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
         <div class="col-xl-4">
            <!--begin::Widget 1-->
            <div class="card shadow-sm">
               <!--begin::Body-->
               <div class="card-body d-flex justify-content-between">
                  <div class="text-gray-900 fw-bold">
                     <div class="d-flex flex-column">
                        <h1 class="fs-4 text-gray-700">Active Attacks</h1>
                        <span class="fs-1 text-dark fw-bold text-gray-800"><?php echo (int)$ALogs->LogsDataRunning()['Count']; ?></span>
                     </div>
                  </div>
                  <div>
                     <i class="ki-duotone ki-graph-up fs-3qx text-warning">
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
            <div class="card shadow-sm">
               <!--begin::Body-->
               <div class="card-body d-flex justify-content-between">
                  <div class="text-gray-900 fw-bold">
                     <div class="d-flex flex-column">
                        <h1 class="fs-4 text-gray-700">Daily Attacks</h1>
                        <span
                           class="fs-1 text-dark fw-bold text-gray-800"><?php echo (int)$ALogs->LogsDataAll()['Count']; ?></span>
                     </div>
                  </div>
                  <div>
                     <i class="ki-duotone ki-chart-simple fs-3qx text-primary">
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
         <div class="col-xl-4">
            <!--begin::Widget 1-->
            <div class="card shadow-sm">
               <!--begin::Body-->
               <div class="card-body d-flex justify-content-between">
                  <div class="text-gray-900 fw-bold">
                     <div class="d-flex flex-column">
                        <h1 class="fs-4 text-gray-700">Total Attacks</h1>
                        <span
                           class="fs-1 text-dark fw-bold text-gray-800"><?php echo (int)$ALogs->TotalAttacks(); ?></span>
                     </div>
                  </div>
                  <div>
                     <i class="ki-duotone ki-chart-pie-4 fs-3qx text-info">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                     </i>
                  </div>
               </div>
               <!--end::Body--></a>
               <!--end::Widget 1-->
            </div>
         </div>
      </div>
      <!--end::Row-->
      <!--Begin::row-->
      <div class="row g-5 g-xl-12">
         <div class="col-sm-8 col-xxl-8">
            <div class="card card-stretch shadow-sm">
               <div class="card-header">
                  <h3 class="card-title fw-bold text-muted first-upperchase">News</h3>
               </div>
               <div class="card-body">
                  <div class="timeline scroll-y h-sm-325px h-xxl-325px mobile">
                     <!--begin::Timeline item-->
                      <?php foreach ($News->NewsData()['Response'] as $Nk => $Nv) { ?>
                         <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                               <div class="symbol-label bg-light">
                                  <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                  <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                              d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                              fill="currentColor"/>
                                        <path
                                           d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                           fill="currentColor"/>
                                     </svg>
                                  </span>
                                  <!--end::Svg Icon-->
                               </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mt-n1">
                               <!--begin::Timeline heading-->
                               <div class="pe-3 mb-5">
                                  <!--begin::Title-->
                                  <div
                                     class="fs-5 fw-bold mb-2"><?php echo $Secure->SecureTxt($Nv['title']); ?></div>
                                  <!--end::Title-->
                                  <!--begin::Message -->
                                  <div class="fs-6 fw-bold mt-2 text-gray-800">
                                      <?php echo $Nv['message']; ?>
                                  </div>
                                  <!--end::Message -->
                                  <!--begin::Description-->
                                  <div class="d-flex align-items-center mt-1 fs-6">
                                     <!--begin::Info-->
                                     <div class="text-muted fw-bold me-2 fs-8">Placed
                                        at <?php echo $Secure->SecureTxt(date('H:i - F d, Y', $Nv['date'])); ?>
                                        by
                                     </div>
                                     <!--end::Info-->
                                     <!--begin::User-->
                                     <span class="text-primary fw-bold me-1 fs-8">Admin</span>
                                     <!--end::User-->
                                  </div>
                                  <!--end::Description-->
                               </div>
                               <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                         </div>
                      <?php } ?>
                     <!--end::Timeline item-->
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-4 col-xxl-4">
            <div class="card card-stretch mb-5 shadow-sm">
               <div class="card-header">
                  <div class="card-title fw-bold text-muted first-upperchase">Plan</div>
               </div>
               <div class="card-body py-0">
                  <div class="mt-2">
                     <div class="py-1 fs-6">
                        <div class="d-flex flex-center">
                           <div class="symbol symbol-40px me-2">
                              <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                 <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                          d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                          fill="currentColor"/>
                                    <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                          fill="currentColor"/>
                                    <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor"/>
                                 </svg>
                              </span>
                           </div>
                           <div class="d-flex justify-content-between flex-grow-1">
                              <div class="fw-bolder text-color-dark opacity-75">Username:</div>
                              <div class="text-gray-600">
                                 <span class="badge badge-light-primary"><?php echo $Secure->SecureTxt($User->UserData()['username']); ?></span>
                              </div>
                           </div>
                        </div>
                        <div class="d-flex flex-center mt-4">
                           <div class="symbol symbol-40px me-2">
                              <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                          d="M7 20.5L2 17.6V11.8L7 8.90002L12 11.8V17.6L7 20.5ZM21 20.8V18.5L19 17.3L17 18.5V20.8L19 22L21 20.8Z"
                                          fill="currentColor"/>
                                    <path d="M22 14.1V6L15 2L8 6V14.1L15 18.2L22 14.1Z"
                                          fill="currentColor"/>
                                 </svg>
                              </span>
                           </div>
                           <div class="d-flex justify-content-between flex-grow-1">
                              <div class="fw-bolder text-color-dark opacity-75">Plan:</div>
                              <div class="text-gray-600">
                                 <span class="badge badge-light-primary"><?php echo $Secure->SecureTxt($Plan->PlanDataID($User->UserData()['plan'])['name'] ?? 'N/A'); ?></span>
                              </div>
                           </div>
                        </div>
                        <div class="d-flex flex-center mt-4">
                           <div class="symbol symbol-40px me-2">
                              <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                          d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z"
                                          fill="currentColor"/>
                                    <path d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z"
                                          fill="currentColor"/>
                                 </svg>
                              </span>
                           </div>
                           <div class="d-flex justify-content-between flex-grow-1">
                              <div class="fw-bolder text-color-dark opacity-75">Boot Time:</div>
                              <div class="text-gray-600">
                                 <span class="text-gray-600 text-hover-primary">
                                    <span class="badge badge-light-primary"><?php $addons = explode('|', $User->UserData()['addons']);
                                        $plan_mbt = $Plan->PlanDataID($User->UserData()['plan'])['mbt'];
                                        echo !empty($plan_mbt) ? $plan_mbt + $addons[1] : $addons[1]; ?></span>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="d-flex flex-center mt-4">
                           <div class="symbol symbol-40px me-2">
                              <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                          d="M20.335 15.537C21.725 14.425 21.57 12.812 21.553 11.224C21.4407 9.50899 20.742 7.88483 19.574 6.624C18.5503 5.40102 17.2668 4.4216 15.817 3.757C14.4297 3.26981 12.9703 3.01966 11.5 3.01701C8.79576 2.83108 6.11997 3.66483 4 5.35398C2.289 6.72498 1.23101 9.12497 2.68601 11.089C3.22897 11.6881 3.93029 12.1214 4.709 12.339C5.44803 12.6142 6.24681 12.6888 7.024 12.555C6.88513 12.9965 6.85078 13.4644 6.92367 13.9215C6.99656 14.3786 7.17469 14.8125 7.444 15.189C7.73891 15.5299 8.10631 15.8006 8.51931 15.9812C8.93232 16.1619 9.38047 16.2478 9.831 16.233C10.0739 16.2296 10.3141 16.1807 10.539 16.089C10.7371 15.9871 10.9288 15.8732 11.113 15.748C12.1594 15.2831 13.3275 15.1668 14.445 15.416C15.7795 15.7213 17.1299 15.952 18.49 16.107C18.7927 16.1438 19.0993 16.1313 19.398 16.07C19.7445 15.9606 20.0639 15.7789 20.335 15.537Z"
                                          fill="currentColor"/>
                                    <path d="M19.008 16.114C18.9486 16.6061 18.7934 17.0817 18.551 17.514C18.229 18.114 17.581 18.314 17.103 18.752C16.457 19.343 16.595 20.38 16.632 21.164C16.6522 21.3437 16.621 21.5254 16.542 21.688C16.4335 21.835 16.2751 21.9373 16.0965 21.9758C15.9179 22.0143 15.7314 21.9863 15.572 21.897C15.2577 21.7083 15.0072 21.4296 14.853 21.097C14.581 20.607 14.362 20.085 14.053 19.612C13.3182 18.7548 12.4201 18.0525 11.411 17.546C10.9334 17.1942 10.5857 16.6942 10.422 16.124C10.459 16.111 10.499 16.106 10.536 16.09C10.7336 15.9879 10.925 15.8741 11.109 15.749C12.1554 15.2842 13.3234 15.1678 14.441 15.417C15.7754 15.7223 17.1259 15.953 18.486 16.108C18.6598 16.1191 18.834 16.1211 19.008 16.114ZM18.8 10.278V3C18.8 2.73478 18.6946 2.48044 18.5071 2.29291C18.3196 2.10537 18.0652 2 17.8 2C17.5348 2 17.2804 2.10537 17.0929 2.29291C16.9053 2.48044 16.8 2.73478 16.8 3V10.278C16.4187 10.4981 16.1207 10.8379 15.9522 11.2447C15.7838 11.6514 15.7542 12.1024 15.8681 12.5277C15.9821 12.953 16.2332 13.3287 16.5825 13.5967C16.9318 13.8648 17.3597 14.0101 17.8 14.0101C18.2403 14.0101 18.6682 13.8648 19.0175 13.5967C19.3668 13.3287 19.6179 12.953 19.7318 12.5277C19.8458 12.1024 19.8162 11.6514 19.6477 11.2447C19.4793 10.8379 19.1813 10.4981 18.8 10.278ZM13.8 2C13.5348 2 13.2804 2.10537 13.0929 2.29291C12.9053 2.48044 12.8 2.73478 12.8 3V8.586L12.312 9.07397C11.8792 8.95363 11.4188 8.98003 11.0026 9.14899C10.5864 9.31794 10.2379 9.61994 10.0115 10.0079C9.78508 10.3958 9.69351 10.8478 9.75109 11.2933C9.80867 11.7387 10.0122 12.1526 10.3298 12.4702C10.6474 12.7878 11.0612 12.9913 11.5067 13.0489C11.9522 13.1065 12.4042 13.0149 12.7921 12.7885C13.18 12.5621 13.4821 12.2136 13.651 11.7974C13.82 11.3812 13.8463 10.9207 13.726 10.488L14.507 9.70697C14.6945 9.51948 14.7999 9.26519 14.8 9V3C14.8 2.73478 14.6946 2.48044 14.5071 2.29291C14.3196 2.10537 14.0652 2 13.8 2ZM9.79999 2C9.53478 2 9.28042 2.10537 9.09289 2.29291C8.90535 2.48044 8.79999 2.73478 8.79999 3V4.586L7.31199 6.07397C6.87924 5.95363 6.41882 5.98004 6.00263 6.14899C5.58644 6.31794 5.23792 6.61994 5.0115 7.00787C4.78508 7.39581 4.69351 7.84781 4.75109 8.29327C4.80867 8.73874 5.01216 9.1526 5.32977 9.47021C5.64739 9.78783 6.06124 9.99131 6.50671 10.0489C6.95218 10.1065 7.40417 10.0149 7.7921 9.78851C8.18004 9.56209 8.48207 9.21355 8.65102 8.79736C8.81997 8.38117 8.84634 7.92073 8.726 7.48798L10.507 5.70697C10.6945 5.51948 10.7999 5.26519 10.8 5V3C10.8 2.73478 10.6946 2.48044 10.5071 2.29291C10.3196 2.10537 10.0652 2 9.79999 2Z"
                                          fill="currentColor"/>
                                 </svg>
                              </span>
                           </div>
                           <div class="d-flex justify-content-between flex-grow-1">
                              <div class="fw-bolder text-color-dark opacity-75">Concurrents:</div>
                              <div class="text-gray-600">
                                 <span class="badge badge-light-primary"><?php $addons = explode('|', $User->UserData()['addons']);
                                     $plan_concurrents = $Plan->PlanDataID($User->UserData()['plan'])['concurrents'];
                                     echo !empty($plan_concurrents) ? $plan_concurrents + $addons[0] : $addons[0]; ?></span>
                              </div>
                           </div>
                        </div>
                        <div class="d-flex flex-center mt-4">
                           <div class="symbol symbol-40px me-2">
                              <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                          d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                          fill="currentColor"/>
                                    <path opacity="0.3"
                                          d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                          fill="currentColor"/>
                                    <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                          fill="currentColor"/>
                                 </svg>
                              </span>
                           </div>
                           <div class="d-flex justify-content-between flex-grow-1">
                              <div class="fw-bolder text-color-dark opacity-75">Balance:</div>
                              <div class="text-gray-600">
                                 <span class="badge badge-light-primary"><?php echo (int)$User->UserData()['money']; ?></span>
                              </div>
                           </div>
                        </div>
                        <div class="d-flex flex-center mt-4">
                           <div class="symbol symbol-40px me-2">
                              <i class="ki-duotone ki-pointers fs-2hx">
                                 <span class="path1"></span>
                                 <span class="path2"></span>
                                 <span class="path3"></span>
                              </i>
                           </div>
                           <div class="d-flex justify-content-between flex-grow-1">
                              <div class="fw-bolder text-color-dark opacity-75">Date:</div>
                              <div class="text-gray-600">
                                 <span class="badge badge-light-primary"><?php echo $User->UserData()['expire'] > time() ? date('d.m.Y', $User->UserData()['expire']) : ($User->UserData()['expire'] == 1 ? 'Expired' : 'N/A'); ?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--end::Row-->
      <!--begin::Row-->
      <div class="row g-5 g-xl-12 mb-5">
         <div class="col-xl-12">
            <div class="card shadow-sm">
               <div class="card-header pt-1">
                  <h3 class="card-title align-items-start text-center flex-column">
                     <span class="card-label fw-bold fs-3 mb-1">Main</span>
                     <span class="text-muted mt-1 fw-bold fs-7">Network</span>
                  </h3>
                  <div class="card-toolbar">
                     <div class="symbol symbol-square symbol-60px w-60px me-3">
                        <span class="symbol-label bg-lighten">
                           <div class="d-flex flex-column flex-center fw-bold">
                              <span class="text-gray-800 fs-5"><?php $count1 = (int)$ALogs->LogsDataMethodRunning('2')['Count'];
                                  $count2 = (int)$ALogs->LogsDataMethodRunning('7')['Count'];
                                  $sum = $count1 + $count2;
                                  echo $sum; ?> </span>
                              <span class="text-gray-500">Run</span>
                           </div>
                        </span>
                     </div>
                     <div class="symbol symbol-square symbol-60px w-60px me-3">
                        <span class="symbol-label bg-lighten">
                           <div class="d-flex flex-column flex-center fw-bold">
                              <span class="text-gray-800 fs-5"><?php echo (int)$Api->ApiSlotsL7Method('Gamba|Quasar'); ?></span>
                              <span class="text-gray-500">Total</span>
                           </div>
                        </span>
                     </div>
                  </div>
               </div>
               <script>
                   document.addEventListener("DOMContentLoaded", function () {
                       const rootStyle = getComputedStyle(document.documentElement);
                       const righteousFont = rootStyle.getPropertyValue('--bs-font-Righteous').trim();

                       Chart.defaults.font.family = righteousFont || 'sans-serif';
                       Chart.defaults.font.weight = '800'; // Setting the font weight to bold

                       var ctx = document.getElementById('myChart').getContext('2d');

                       var data = {
                           labels: generateTimeLabels(),
                           datasets: [{
                               data: generateRandomData(),
                               fill: 'origin',
                               borderColor: 'rgb(75, 192, 192)',
                               backgroundColor: 'rgba(75, 192, 192, 0.2)',
                               tension: 0.3,
                               pointRadius: 0,
                               borderWidth: 3
                           }]
                       };

                       var options = {
                           plugins: {
                               legend: {
                                   display: false
                               },
                               tooltip: {
                                   enabled: false
                               }
                           },
                           scales: {
                               y: {
                                   min: 0,
                                   max: 100,
                                   grid: {
                                       display: false
                                   }
                               },
                               x: {
                                   grid: {
                                       display: false
                                   }
                               }
                           }
                       };

                       new Chart(ctx, {
                           type: 'line',
                           data: data,
                           options: options
                       });

                       function generateTimeLabels() {
                           var timeLabels = [];
                           var date = new Date();

                           // Subtract 24 hours from the current time
                           date.setHours(date.getHours() - 24);
                           date.setMinutes(0);  // Reset minutes

                           for (var i = 0; i < 24 * 12; i++) {  // 24 hours * 12 five-minute intervals
                               date.setMinutes(date.getMinutes() + 5);  // Increment by 5 minutes
                               var hh = String(date.getHours()).padStart(2, '0');
                               var mm = String(date.getMinutes()).padStart(2, '0');
                               timeLabels.push(hh + ':' + mm);
                           }

                           return timeLabels;
                       }

                       function generateRandomData() {
                           var data = [];
                           for (var i = 0; i < 24 * 12; i++) {  // 24 hours * 12 five-minute intervals
                               data.push(Math.floor(Math.random() * 55));
                           }
                           return data;
                       }
                   });

               </script>
               <div class="card-body d-flex justify-content-between flex-column ">
                  <canvas id="myChart" height="100"></canvas>
               </div>
            </div>
         </div>
         <div class="col-xl-12">
            <div class="card shadow-sm">
               <div class="card-header pt-1">
                  <h3 class="card-title align-items-start text-center flex-column">
                     <span class="card-label fw-bold fs-3 mb-1">Quantum</span>
                     <span class="text-muted mt-1 fw-bold fs-7">Network</span>
                  </h3>
                  <div class="card-toolbar">
                     <div class="symbol symbol-square symbol-60px w-60px me-3">
                        <span class="symbol-label bg-lighten">
                           <div class="d-flex flex-column flex-center fw-bold">
                              <span class="text-gray-800 fs-5"><?php echo (int)$ALogs->LogsDataMethodRunning('3')['Count']; ?></span>
                              <span class="text-gray-500">Run</span>
                           </div>
                        </span>
                     </div>
                     <div class="symbol symbol-square symbol-60px w-60px me-3">
                        <span class="symbol-label bg-lighten">
                           <div class="d-flex flex-column flex-center fw-bold">
                              <span class="text-gray-800 fs-5"><?php echo (int)$Api->ApiSlotsL7Method('Quantum'); ?></span>
                              <span class="text-gray-500">Total</span>
                           </div>
                        </span>
                     </div>
                  </div>
               </div>
               <script>
                   document.addEventListener("DOMContentLoaded", function () {
                       const rootStyle = getComputedStyle(document.documentElement);
                       const righteousFont = rootStyle.getPropertyValue('--bs-font-Righteous').trim();

                       Chart.defaults.font.family = righteousFont || 'sans-serif';
                       Chart.defaults.font.weight = '800'; // Setting the font weight to bold

                       var ctx = document.getElementById('myChart1').getContext('2d');

                       var data = {
                           labels: generateTimeLabels(),
                           datasets: [{
                               data: generateRandomData(),
                               fill: 'origin',
                               borderColor: 'rgb(75, 192, 192)',
                               backgroundColor: 'rgba(75, 192, 192, 0.2)',
                               tension: 0.3,
                               pointRadius: 0,
                               borderWidth: 3
                           }]
                       };

                       var options = {
                           plugins: {
                               legend: {
                                   display: false
                               },
                               tooltip: {
                                   enabled: false
                               }
                           },
                           scales: {
                               y: {
                                   min: 0,
                                   max: 100,
                                   grid: {
                                       display: false
                                   }
                               },
                               x: {
                                   grid: {
                                       display: false
                                   }
                               }
                           }
                       };

                       new Chart(ctx, {
                           type: 'line',
                           data: data,
                           options: options
                       });

                       function generateTimeLabels() {
                           var timeLabels = [];
                           var date = new Date();

                           // Subtract 24 hours from the current time
                           date.setHours(date.getHours() - 24);
                           date.setMinutes(0);  // Reset minutes

                           for (var i = 0; i < 24 * 12; i++) {  // 24 hours * 12 five-minute intervals
                               date.setMinutes(date.getMinutes() + 5);  // Increment by 5 minutes
                               var hh = String(date.getHours()).padStart(2, '0');
                               var mm = String(date.getMinutes()).padStart(2, '0');
                               timeLabels.push(hh + ':' + mm);
                           }

                           return timeLabels;
                       }

                       function generateRandomData() {
                           var data = [];
                           for (var i = 0; i < 24 * 12; i++) {  // 24 hours * 12 five-minute intervals
                               data.push(Math.floor(Math.random() * 78));
                           }
                           return data;
                       }
                   });
               </script>
               <div class="card-body d-flex justify-content-between flex-column ">
                  <canvas id="myChart1" height="100"></canvas>
               </div>
            </div>
         </div>
      </div>
      <!--end::Row-->
      <!--end::Container-->
   </div>
   <!--end::Content-->
</div>
<?php
include_once('global/public/footer.php');
?>
