<?php
$page = 'Invoices';
define('allow', TRUE);
include_once('global/public/header.php');

$Order->CancelOrder();

if ($Order->ActiveUserOrder($User->UserData()['id'], 0)['Count'] == 0) {
    $Alert->SaveAlert('You don\'t have active invoices', 'error');
    header('Location: home');
    die();
}

?>
   <!--begin::Content-->
   <div class="content d-flex flex-column flex-column-fluid " id="kt_content">
      <!--begin::Container-->
      <div id="kt_content_container" class="container-xxl">
         <!--begin::Row-->
         <!--Begin::row-->
         <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
            <div class="col-xl-9">
               <!--begin::card-->
               <div class="card">
                  <!--begin::Header-->
                  <div class="card-header">
                     <!--begin::Title-->
                     <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Invoices</span>
                     </h3>
                     <!--end::Title-->
                  </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">
                     <!--begin::Item-->
                      <?php foreach ($Order->LastUserOrder($User->UserData()['id'], 0)['Response'] as $Ak => $Av) {
                          if ($Av['invoice_status'] != 'charge:canceled') { ?>
                             <div class="m-0 mt-3">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-grow-1 mb-5">
                                   <!--begin::Symbol-->
                                   <div class="symbol symbol-40px me-4 mt-2">
                                      <span class="symbol-label">
                                         <span class="svg-icon svg-icon-muted svg-icon-2">
                                            <svg class="rotating-element" width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                               <path opacity="0.3" d="M12 6.20001V1.20001H2V6.20001C2 6.50001 2.1 6.70001 2.3 6.90001L5.6 10.2L2.3 13.5C2.1 13.7 2 13.9 2 14.2V19.2H12V14.2C12 13.9 11.9 13.7 11.7 13.5L8.4 10.2L11.7 6.90001C11.9 6.70001 12 6.50001 12 6.20001Z" fill="currentColor"/>
                                               <path d="M13 2.20001H1C0.4 2.20001 0 1.80001 0 1.20001C0 0.600012 0.4 0.200012 1 0.200012H13C13.6 0.200012 14 0.600012 14 1.20001C14 1.80001 13.6 2.20001 13 2.20001ZM13 18.2H10V16.2L7.7 13.9C7.3 13.5 6.7 13.5 6.3 13.9L4 16.2V18.2H1C0.4 18.2 0 18.6 0 19.2C0 19.8 0.4 20.2 1 20.2H13C13.6 20.2 14 19.8 14 19.2C14 18.6 13.6 18.2 13 18.2ZM4.4 6.20001L6.3 8.10001C6.7 8.50001 7.3 8.50001 7.7 8.10001L9.6 6.20001H4.4Z" fill="currentColor"/>
                                            </svg>
                                         </span>
                                      </span>
                                   </div>
                                   <!--end::Symbol-->
                                   <script></script>
                                   <!--begin::Section-->
                                   <div class="d-flex flex-column float-right">
                                      <div class="flex-grow-1 me-0 mt-3">
                                         <span class="text-gray-800 fw-bold d-block fs-5">
                                            <div id="countdown">0</div>
                                            <script>
                                                <?php
                                                $expires = $Secure->SecureTxt($Av['invoice_expires']);
                                                $remaining = $expires - time();
                                                echo "const unixTimestamp = " . $remaining . ";";
                                                ?>
                                                const countdownElement = document.getElementById("countdown");
                                                const targetDate = new Date();
                                                targetDate.setSeconds(targetDate.getSeconds() + unixTimestamp);

                                                function updateCountdown() {
                                                    const remainingTime = targetDate - new Date();

                                                    if (remainingTime <= 0) {
                                                        clearInterval(countdownInterval);
                                                        countdownElement.textContent = "Expired";
                                                        return;
                                                    }

                                                    const minutes = Math.floor((remainingTime / 1000) / 60);
                                                    const seconds = Math.floor((remainingTime / 1000) % 60);

                                                    countdownElement.textContent = `Expire: ${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
                                                }

                                                updateCountdown();
                                                const countdownInterval = setInterval(updateCountdown, 1000);
                                            </script>

                                         </span>
                                      </div>
                                   </div>
                                   <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <div class="d-flex align-items- justify-content-between flex-row-fluid flex-wrap">
                                   <!--begin::Timeline-->
                                   <div class="timeline">
                                      <!--begin::Timeline item-->
                                      <div class="timeline-item">
                                         <!--begin::Timeline line-->
                                         <div class="timeline-line w-40px mt-6 mb-n12"></div>
                                         <!--end::Timeline line-->
                                         <!--begin::Timeline icon-->
                                         <div class="timeline-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen015.svg-->
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                  <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="currentColor"/>
                                                  <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="currentColor"/>
                                                  <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="currentColor"/>
                                               </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                         </div>
                                         <!--end::Timeline icon-->
                                         <!--begin::Timeline content-->
                                         <div class="timeline-content mt-n1">
                                            <!--begin::wallet-->
                                            <div class="m-1 d-flex flex-column mt-1">
                                               <div class="input-group input-group-solid input-group-sm mb-2">
                                                  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                     <input type="text" id="kt_clipboard_2" readonly class="form-control form-control-solid form-control-sm fw-bold text-end icon-button" value="<?php echo $Secure->SecureTxt($Av['address']); ?>">
                                                     <div class="input-group-append">
                                                        <a href="#" class="btn btn-sm btn-secondary rounded-start-0" data-clipboard="true" data-clipboard-target="#kt_clipboard_2">
                                                           <span class="svg-icon svg-icon-2">
                                                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                 <path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="currentColor"/>
                                                                 <path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="currentColor"/>
                                                              </svg>
                                                           </span>
                                                        </a>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                            <!--end::wallet-->
                                            <!--begin::coin & amount -->
                                            <div class="m-1 d-flex flex-column mt-5">
                                               <div class="input-group input-group-solid input-group-sm mb-2">
                                                  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                     <input type="text" disabled class="form-control form-control-sm form-control-solid border-radius-sm fw-bold text-uppercase" value="Currency:  <?php echo $Secure->SecureTxt($Av['currency']) ?>">
                                                  </div>
                                               </div>
                                               <div class="input-group input-group-solid input-group-sm mb-2">
                                                  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                     <input type="text" disabled class="form-control form-control-sm form-control-solid border-radius-sm fw-bold text-uppercase" value="Amount:">
                                                     <input type="text" id="kt_clipboard_1" readonly class="form-control form-control-solid form-control-sm fw-bold text-end icon-button" value="<?php echo $Secure->SecureTxt($Av['amount']) ?>">
                                                     <div class="input-group-append">
                                                        <a href="#" class="btn btn-sm btn-secondary rounded-start-0" data-clipboard="true" data-clipboard-target="#kt_clipboard_1">
                                                           <span class="svg-icon svg-icon-2">
                                                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                 <path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="currentColor"/>
                                                                 <path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="currentColor"/>
                                                              </svg>
                                                           </span>
                                                        </a>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                            <!--end::coin & amount-->
                                         </div>
                                         <!--end::Timeline content-->
                                      </div>
                                      <!--end::Timeline item-->
                                      <!--begin::Timeline item-->
                                      <div class="timeline-item align-items-center mb-7">
                                         <!--begin::Timeline line-->
                                         <div class="timeline-line w-40px"></div>
                                         <!--end::Timeline line-->
                                         <!--begin::Timeline icon-->
                                         <div class="timeline-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                  <circle fill="currentColor" cx="12" cy="12" r="8"/>
                                               </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                         </div>
                                         <!--end::Timeline icon-->
                                         <!--begin::Timeline content-->
                                         <div class="timeline-content m-0">
                                            <!--begin::Title-->
                                            <span class="fs-6 text-gray-400 fw-bold d-block">Status:</span>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column">
                                               <span class="fs-6 fw-bold text-gray-800 first-upperchase">Waiting
                                                  payment</span>
                                               <span class="fs-8 fw-bold text-gray-400">Expire:
                                                  <span class="fw-bold m-2"><?php echo date('d.m.Y H:i:s', $Secure->SecureTxt($Av['invoice_expires'])); ?></span>
                                               </span>
                                            </div>
                                            <!--end::Title-->
                                         </div>
                                         <!--end::Timeline content-->
                                      </div>
                                      <!--end::Timeline item-->
                                       <?php if ($Av['invoice_status'] == 'charge:confirmed') { ?>
                                          <!--begin::Timeline item-->
                                          <div class="timeline-item align-items-center mb-7">
                                             <!--begin::Timeline line-->
                                             <div class="timeline-line w-40px"></div>
                                             <!--end::Timeline line-->
                                             <!--begin::Timeline icon-->
                                             <div class="timeline-icon">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                <span class="svg-icon svg-icon-success svg-icon-2hx">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                      <circle fill="currentColor" cx="12" cy="12" r="8"/>
                                                   </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                             </div>
                                             <!--end::Timeline icon-->
                                             <!--begin::Timeline content-->
                                             <div class="timeline-content m-0">
                                                <!--begin::Title-->
                                                <span class="fs-6 text-gray-400 fw-bold d-block">Status:</span>
                                                <!--end::Title-->
                                                <!--begin::Title-->
                                                <span class="fs-6 fw-bold text-gray-800">Invoice has confirmed</span>
                                                <!--end::Title-->
                                             </div>
                                             <!--end::Timeline content-->
                                          </div><!--end::Timeline item-->
                                       <?php } elseif ($Av['invoice_status'] == 'PENDING') { ?>
                                          <!--begin::Timeline item-->
                                          <div class="timeline-item align-items-center mb-7">
                                             <!--begin::Timeline line-->
                                             <div class="timeline-line w-40px"></div>
                                             <!--end::Timeline line-->
                                             <!--begin::Timeline icon-->
                                             <div class="timeline-icon">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                <span class="svg-icon svg-icon-success svg-icon-2hx">
                                                   <svg class="pulse-icon" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                      <circle fill="currentColor" cx="12" cy="12" r="8"/>
                                                   </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                             </div>
                                             <!--end::Timeline icon-->
                                             <!--begin::Timeline content-->
                                             <div class="timeline-content m-0">
                                                <!--begin::Title-->
                                                <span class="fs-6 text-gray-400 fw-bold d-block">Status:</span>
                                                <!--end::Title-->
                                                <!--begin::Title-->
                                                <span class="fs-6 fw-bold text-gray-800 first-upperchase">Invoice
                                                   Processing</span>
                                                <!--end::Title-->
                                             </div>
                                             <!--end::Timeline content-->
                                          </div><!--end::Timeline item-->
                                       <?php } ?>
                                   </div>
                                   <!--end::Timeline-->
                                </div>
                             </div>
                          <?php }
                      } ?>
                     <!--end::Item-->
                  </div>
                  <!--end: Card Body-->
               </div>
               <!--end::card-->
            </div>
            <div class="col-xxl-3">
               <div class="card mb-5 mb-xl-10">
                  <!--begin::Body-->
                  <div class="card-body pt-5">
                     <!--begin::Carousel-->
                     <div id="kt_security_recent_alerts" class="carousel carousel-custom carousel-stretch slide" data-bs-ride="carousel" data-bs-interval="8000">
                        <!--begin::Heading-->
                        <div class="d-flex flex-stack align-items-center flex-wrap">
                           <h4 class="text-gray-500 fw-semibold mb-0 pe-2">
                              Recent Alerts
                           </h4>

                           <!--begin::Carousel Indicators-->
                           <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                              <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="0" class="ms-1 active"></li>
                              <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="1" class="ms-1"></li>
                              <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="2" class="ms-1"></li>
                           </ol>
                           <!--end::Carousel Indicators-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Carousel inner-->
                        <div class="carousel-inner pt-6">
                           <!--begin::Item-->
                           <div class="carousel-item active">
                              <!--begin::Wrapper-->
                              <div class="carousel-wrapper">
                                 <!--begin::Description-->
                                 <div class="d-flex flex-column flex-grow-1">
                                    <p class="text-gray-900 fs-6 fw-bold pt-3 mb-0">
                                       Send only the specified amount and no more, in other cases, your funds will be
                                       lost and will not be returned
                                    </p>
                                 </div>
                                 <!--end::Description-->

                              </div>
                              <!--end::Wrapper-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="carousel-item">
                              <!--begin::Wrapper-->
                              <div class="carousel-wrapper">
                                 <!--begin::Description-->
                                 <div class="d-flex flex-column flex-grow-1">
                                    <p class="text-gray-900 fs-6 fw-bold pt-3 mb-0">
                                       Check wallet after copying and before sending, we are not responsible for your
                                       carelessness
                                    </p>
                                 </div>
                                 <!--end::Description-->
                              </div>
                              <!--end::Wrapper-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="carousel-item">
                              <!--begin::Wrapper-->
                              <div class="carousel-wrapper">
                                 <!--begin::Description-->
                                 <div class="d-flex flex-column flex-grow-1">
                                    <p class="text-gray-900 fs-6 fw-bold pt-3 mb-0">
                                       Sending less than the specified amount will result in payment failure and will
                                       require manual confirmation.
                                    </p>
                                 </div>
                                 <!--end::Description-->
                              </div>
                              <!--end::Wrapper-->
                           </div>
                           <!--end::Item-->
                        </div>
                        <!--end::Carousel inner-->
                     </div>
                     <!--end::Carousel-->
                  </div>
                  <!--end::Body-->
               </div>
            </div>
         </div>
         <!--End::row-->
         <!--Begin::row-->
         <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
            <div class="col-xl-12 mb-xl-10">
               <div class="card">
                  <div class="card-header">
                     <div class="card-title">
                        <span class="fw-bold text-gray-400 first-upperchase">About</span>
                     </div>
                  </div>
                  <div class="card-body">
                     <!--begin::Accordion-->
                     <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
                        <!--begin::Item-->
                        <div class="mb-5">
                           <!--begin::Header-->
                           <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse" data-bs-target="#kt_accordion_2_item_1">
                              <span class="accordion-icon">
                                 <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path opacity="0.3" d="M22.9558 10.2848L21.3341 8.6398C21.221 8.52901 21.1317 8.39637 21.0715 8.24996C21.0114 8.10354 20.9816 7.94641 20.9841 7.78814V5.4548C20.9826 5.13514 20.9179 4.81893 20.7938 4.52433C20.6697 4.22973 20.4887 3.96255 20.261 3.73814C20.0333 3.51374 19.7636 3.33652 19.4672 3.21668C19.1709 3.09684 18.8538 3.03673 18.5341 3.0398H16.2008C16.0425 3.04229 15.8854 3.01255 15.739 2.95238C15.5925 2.89221 15.4599 2.80287 15.3491 2.6898L13.7158 1.0448C13.2608 0.590273 12.6439 0.334961 12.0008 0.334961C11.3576 0.334961 10.7408 0.590273 10.2858 1.0448L8.64078 2.66647C8.52999 2.77954 8.39735 2.86887 8.25094 2.92904C8.10452 2.98922 7.94739 3.01896 7.78911 3.01647H5.45578C5.13612 3.01799 4.8199 3.08266 4.5253 3.20675C4.23071 3.33085 3.96353 3.51193 3.73912 3.73959C3.51471 3.96724 3.3375 4.237 3.21766 4.53335C3.09781 4.82971 3.0377 5.14682 3.04078 5.46647V7.7998C3.04327 7.95808 3.01353 8.11521 2.95335 8.26163C2.89318 8.40804 2.80385 8.54068 2.69078 8.65147L1.04578 10.2848C0.591249 10.7398 0.335938 11.3567 0.335938 11.9998C0.335938 12.6429 0.591249 13.2598 1.04578 13.7148L2.66745 15.3598C2.78051 15.4706 2.86985 15.6032 2.93002 15.7496C2.99019 15.8961 3.01994 16.0532 3.01745 16.2115V18.5448C3.01897 18.8645 3.08363 19.1807 3.20773 19.4753C3.33182 19.7699 3.5129 20.0371 3.74056 20.2615C3.96822 20.4859 4.23798 20.6631 4.53433 20.7829C4.83068 20.9028 5.14779 20.9629 5.46745 20.9598H7.80078C7.95906 20.9573 8.11619 20.9871 8.2626 21.0472C8.40902 21.1074 8.54166 21.1967 8.65245 21.3098L10.2974 22.9548C10.7525 23.4093 11.3693 23.6646 12.0124 23.6646C12.6556 23.6646 13.2724 23.4093 13.7274 22.9548L15.3608 21.3331C15.4716 21.2201 15.6042 21.1307 15.7506 21.0706C15.897 21.0104 16.0542 20.9806 16.2124 20.9831H18.5458C19.1894 20.9831 19.8066 20.7275 20.2617 20.2724C20.7168 19.8173 20.9724 19.2001 20.9724 18.5565V16.2231C20.97 16.0649 20.9997 15.9077 21.0599 15.7613C21.12 15.6149 21.2094 15.4823 21.3224 15.3715L22.9674 13.7265C23.1935 13.5002 23.3726 13.2314 23.4944 12.9357C23.6162 12.64 23.6784 12.3231 23.6773 12.0032C23.6762 11.6834 23.6119 11.3669 23.4881 11.072C23.3643 10.7771 23.1834 10.5095 22.9558 10.2848Z" fill="currentColor"/>
                                       <path d="M12.0039 15.4998C11.7012 15.4998 11.4109 15.38 11.1969 15.1668C10.9829 14.9535 10.8626 14.6643 10.8626 14.3627V13.9382C10.8467 13.2884 10.9994 12.6456 11.306 12.0718C11.6126 11.4981 12.0627 11.013 12.6126 10.6634C12.7969 10.561 12.9505 10.4114 13.0575 10.2302C13.1645 10.049 13.221 9.84266 13.2213 9.63242C13.2213 9.31073 13.0931 9.00223 12.8648 8.77476C12.6365 8.5473 12.3268 8.41951 12.0039 8.41951C11.6811 8.41951 11.3714 8.5473 11.1431 8.77476C10.9148 9.00223 10.7865 9.31073 10.7865 9.63242C10.7865 9.93399 10.6663 10.2232 10.4523 10.4365C10.2382 10.6497 9.94792 10.7695 9.64522 10.7695C9.34253 10.7695 9.05223 10.6497 8.83819 10.4365C8.62415 10.2232 8.50391 9.93399 8.50391 9.63242C8.50763 9.02196 8.67214 8.42317 8.98099 7.89592C9.28984 7.36868 9.7322 6.93145 10.2639 6.62796C10.7955 6.32447 11.3978 6.16535 12.0105 6.16651C12.6233 6.16767 13.225 6.32908 13.7554 6.63458C14.2859 6.94009 14.7266 7.37899 15.0335 7.9074C15.3403 8.43582 15.5025 9.03522 15.5039 9.64569C15.5053 10.2562 15.3458 10.8563 15.0414 11.3861C14.7369 11.9159 14.2983 12.3568 13.7692 12.6647C13.5645 12.8132 13.4003 13.0101 13.2913 13.2378C13.1824 13.4655 13.1322 13.7167 13.1453 13.9685V14.3931C13.1373 14.6894 13.0136 14.9708 12.8004 15.1776C12.5872 15.3843 12.3014 15.4999 12.0039 15.4998Z" fill="currentColor"/>
                                       <path d="M12.0026 18.9998C12.6469 18.9998 13.1693 18.4775 13.1693 17.8332C13.1693 17.1888 12.6469 16.6665 12.0026 16.6665C11.3583 16.6665 10.8359 17.1888 10.8359 17.8332C10.8359 18.4775 11.3583 18.9998 12.0026 18.9998Z" fill="currentColor"/>
                                    </svg>
                                 </span>
                              </span>
                              <h3 class="fs-5 text-gray-800 fw-bold mb-0 ms-4">Where to buy cryptocurrency</h3>
                           </div>
                           <!--end::Header-->
                           <!--begin::Body-->
                           <div id="kt_accordion_2_item_1" class="fs-6  collapse ps-10" data-bs-parent="#kt_accordion_2">
                              <div class="d-flex flex-column">
                                 <span class="fw-bold fs-6 text-gray-500">Buying cryptocurrency is very easy and can be
                                    done within 30 minutes.</span>
                                 <a href="https://www.bestchange.com/" class="mt-2 fw-bold fs-8">https://www.bestchange.com/</a>
                                 <a href="https://bitcoin.org/en/buy" class="mt-2 fw-bold fs-8">https://bitcoin.org/en/buy</a>
                              </div>
                           </div>
                           <!--end::Body-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="mb-5">
                           <!--begin::Header-->
                           <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse" data-bs-target="#kt_accordion_2_item_2">
                              <span class="accordion-icon">
                                 <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path opacity="0.3" d="M22.9558 10.2848L21.3341 8.6398C21.221 8.52901 21.1317 8.39637 21.0715 8.24996C21.0114 8.10354 20.9816 7.94641 20.9841 7.78814V5.4548C20.9826 5.13514 20.9179 4.81893 20.7938 4.52433C20.6697 4.22973 20.4887 3.96255 20.261 3.73814C20.0333 3.51374 19.7636 3.33652 19.4672 3.21668C19.1709 3.09684 18.8538 3.03673 18.5341 3.0398H16.2008C16.0425 3.04229 15.8854 3.01255 15.739 2.95238C15.5925 2.89221 15.4599 2.80287 15.3491 2.6898L13.7158 1.0448C13.2608 0.590273 12.6439 0.334961 12.0008 0.334961C11.3576 0.334961 10.7408 0.590273 10.2858 1.0448L8.64078 2.66647C8.52999 2.77954 8.39735 2.86887 8.25094 2.92904C8.10452 2.98922 7.94739 3.01896 7.78911 3.01647H5.45578C5.13612 3.01799 4.8199 3.08266 4.5253 3.20675C4.23071 3.33085 3.96353 3.51193 3.73912 3.73959C3.51471 3.96724 3.3375 4.237 3.21766 4.53335C3.09781 4.82971 3.0377 5.14682 3.04078 5.46647V7.7998C3.04327 7.95808 3.01353 8.11521 2.95335 8.26163C2.89318 8.40804 2.80385 8.54068 2.69078 8.65147L1.04578 10.2848C0.591249 10.7398 0.335938 11.3567 0.335938 11.9998C0.335938 12.6429 0.591249 13.2598 1.04578 13.7148L2.66745 15.3598C2.78051 15.4706 2.86985 15.6032 2.93002 15.7496C2.99019 15.8961 3.01994 16.0532 3.01745 16.2115V18.5448C3.01897 18.8645 3.08363 19.1807 3.20773 19.4753C3.33182 19.7699 3.5129 20.0371 3.74056 20.2615C3.96822 20.4859 4.23798 20.6631 4.53433 20.7829C4.83068 20.9028 5.14779 20.9629 5.46745 20.9598H7.80078C7.95906 20.9573 8.11619 20.9871 8.2626 21.0472C8.40902 21.1074 8.54166 21.1967 8.65245 21.3098L10.2974 22.9548C10.7525 23.4093 11.3693 23.6646 12.0124 23.6646C12.6556 23.6646 13.2724 23.4093 13.7274 22.9548L15.3608 21.3331C15.4716 21.2201 15.6042 21.1307 15.7506 21.0706C15.897 21.0104 16.0542 20.9806 16.2124 20.9831H18.5458C19.1894 20.9831 19.8066 20.7275 20.2617 20.2724C20.7168 19.8173 20.9724 19.2001 20.9724 18.5565V16.2231C20.97 16.0649 20.9997 15.9077 21.0599 15.7613C21.12 15.6149 21.2094 15.4823 21.3224 15.3715L22.9674 13.7265C23.1935 13.5002 23.3726 13.2314 23.4944 12.9357C23.6162 12.64 23.6784 12.3231 23.6773 12.0032C23.6762 11.6834 23.6119 11.3669 23.4881 11.072C23.3643 10.7771 23.1834 10.5095 22.9558 10.2848Z" fill="currentColor"/>
                                       <path d="M12.0039 15.4998C11.7012 15.4998 11.4109 15.38 11.1969 15.1668C10.9829 14.9535 10.8626 14.6643 10.8626 14.3627V13.9382C10.8467 13.2884 10.9994 12.6456 11.306 12.0718C11.6126 11.4981 12.0627 11.013 12.6126 10.6634C12.7969 10.561 12.9505 10.4114 13.0575 10.2302C13.1645 10.049 13.221 9.84266 13.2213 9.63242C13.2213 9.31073 13.0931 9.00223 12.8648 8.77476C12.6365 8.5473 12.3268 8.41951 12.0039 8.41951C11.6811 8.41951 11.3714 8.5473 11.1431 8.77476C10.9148 9.00223 10.7865 9.31073 10.7865 9.63242C10.7865 9.93399 10.6663 10.2232 10.4523 10.4365C10.2382 10.6497 9.94792 10.7695 9.64522 10.7695C9.34253 10.7695 9.05223 10.6497 8.83819 10.4365C8.62415 10.2232 8.50391 9.93399 8.50391 9.63242C8.50763 9.02196 8.67214 8.42317 8.98099 7.89592C9.28984 7.36868 9.7322 6.93145 10.2639 6.62796C10.7955 6.32447 11.3978 6.16535 12.0105 6.16651C12.6233 6.16767 13.225 6.32908 13.7554 6.63458C14.2859 6.94009 14.7266 7.37899 15.0335 7.9074C15.3403 8.43582 15.5025 9.03522 15.5039 9.64569C15.5053 10.2562 15.3458 10.8563 15.0414 11.3861C14.7369 11.9159 14.2983 12.3568 13.7692 12.6647C13.5645 12.8132 13.4003 13.0101 13.2913 13.2378C13.1824 13.4655 13.1322 13.7167 13.1453 13.9685V14.3931C13.1373 14.6894 13.0136 14.9708 12.8004 15.1776C12.5872 15.3843 12.3014 15.4999 12.0039 15.4998Z" fill="currentColor"/>
                                       <path d="M12.0026 18.9998C12.6469 18.9998 13.1693 18.4775 13.1693 17.8332C13.1693 17.1888 12.6469 16.6665 12.0026 16.6665C11.3583 16.6665 10.8359 17.1888 10.8359 17.8332C10.8359 18.4775 11.3583 18.9998 12.0026 18.9998Z" fill="currentColor"/>
                                    </svg>
                                 </span>
                              </span>
                              <h3 class="fs-5 text-gray-800 fw-bold mb-0 ms-4">How To Create Wallet?</h3>
                           </div>
                           <!--end::Header-->
                           <!--begin::Body-->
                           <div id="kt_accordion_2_item_2" class="collapse fs-6 ps-10" data-bs-parent="#kt_accordion_2">
                              <div class="d-flex flex-column">
                                 <span class="fw-bold fs-6 text-gray-500">You can use the following wallets to store
                                    your funds</span>
                                 <a href="https://trustwallet.com/" class="fw-bold fs-8">https://trustwallet.com/</a>
                              </div>
                           </div>
                           <!--end::Body-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="mb-5">
                           <!--begin::Header-->
                           <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse" data-bs-target="#kt_accordion_2_item_3">
                              <span class="accordion-icon">
                                 <span class="svg-icon svg-icon-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path opacity="0.3" d="M22.9558 10.2848L21.3341 8.6398C21.221 8.52901 21.1317 8.39637 21.0715 8.24996C21.0114 8.10354 20.9816 7.94641 20.9841 7.78814V5.4548C20.9826 5.13514 20.9179 4.81893 20.7938 4.52433C20.6697 4.22973 20.4887 3.96255 20.261 3.73814C20.0333 3.51374 19.7636 3.33652 19.4672 3.21668C19.1709 3.09684 18.8538 3.03673 18.5341 3.0398H16.2008C16.0425 3.04229 15.8854 3.01255 15.739 2.95238C15.5925 2.89221 15.4599 2.80287 15.3491 2.6898L13.7158 1.0448C13.2608 0.590273 12.6439 0.334961 12.0008 0.334961C11.3576 0.334961 10.7408 0.590273 10.2858 1.0448L8.64078 2.66647C8.52999 2.77954 8.39735 2.86887 8.25094 2.92904C8.10452 2.98922 7.94739 3.01896 7.78911 3.01647H5.45578C5.13612 3.01799 4.8199 3.08266 4.5253 3.20675C4.23071 3.33085 3.96353 3.51193 3.73912 3.73959C3.51471 3.96724 3.3375 4.237 3.21766 4.53335C3.09781 4.82971 3.0377 5.14682 3.04078 5.46647V7.7998C3.04327 7.95808 3.01353 8.11521 2.95335 8.26163C2.89318 8.40804 2.80385 8.54068 2.69078 8.65147L1.04578 10.2848C0.591249 10.7398 0.335938 11.3567 0.335938 11.9998C0.335938 12.6429 0.591249 13.2598 1.04578 13.7148L2.66745 15.3598C2.78051 15.4706 2.86985 15.6032 2.93002 15.7496C2.99019 15.8961 3.01994 16.0532 3.01745 16.2115V18.5448C3.01897 18.8645 3.08363 19.1807 3.20773 19.4753C3.33182 19.7699 3.5129 20.0371 3.74056 20.2615C3.96822 20.4859 4.23798 20.6631 4.53433 20.7829C4.83068 20.9028 5.14779 20.9629 5.46745 20.9598H7.80078C7.95906 20.9573 8.11619 20.9871 8.2626 21.0472C8.40902 21.1074 8.54166 21.1967 8.65245 21.3098L10.2974 22.9548C10.7525 23.4093 11.3693 23.6646 12.0124 23.6646C12.6556 23.6646 13.2724 23.4093 13.7274 22.9548L15.3608 21.3331C15.4716 21.2201 15.6042 21.1307 15.7506 21.0706C15.897 21.0104 16.0542 20.9806 16.2124 20.9831H18.5458C19.1894 20.9831 19.8066 20.7275 20.2617 20.2724C20.7168 19.8173 20.9724 19.2001 20.9724 18.5565V16.2231C20.97 16.0649 20.9997 15.9077 21.0599 15.7613C21.12 15.6149 21.2094 15.4823 21.3224 15.3715L22.9674 13.7265C23.1935 13.5002 23.3726 13.2314 23.4944 12.9357C23.6162 12.64 23.6784 12.3231 23.6773 12.0032C23.6762 11.6834 23.6119 11.3669 23.4881 11.072C23.3643 10.7771 23.1834 10.5095 22.9558 10.2848Z" fill="currentColor"/>
                                       <path d="M12.0039 15.4998C11.7012 15.4998 11.4109 15.38 11.1969 15.1668C10.9829 14.9535 10.8626 14.6643 10.8626 14.3627V13.9382C10.8467 13.2884 10.9994 12.6456 11.306 12.0718C11.6126 11.4981 12.0627 11.013 12.6126 10.6634C12.7969 10.561 12.9505 10.4114 13.0575 10.2302C13.1645 10.049 13.221 9.84266 13.2213 9.63242C13.2213 9.31073 13.0931 9.00223 12.8648 8.77476C12.6365 8.5473 12.3268 8.41951 12.0039 8.41951C11.6811 8.41951 11.3714 8.5473 11.1431 8.77476C10.9148 9.00223 10.7865 9.31073 10.7865 9.63242C10.7865 9.93399 10.6663 10.2232 10.4523 10.4365C10.2382 10.6497 9.94792 10.7695 9.64522 10.7695C9.34253 10.7695 9.05223 10.6497 8.83819 10.4365C8.62415 10.2232 8.50391 9.93399 8.50391 9.63242C8.50763 9.02196 8.67214 8.42317 8.98099 7.89592C9.28984 7.36868 9.7322 6.93145 10.2639 6.62796C10.7955 6.32447 11.3978 6.16535 12.0105 6.16651C12.6233 6.16767 13.225 6.32908 13.7554 6.63458C14.2859 6.94009 14.7266 7.37899 15.0335 7.9074C15.3403 8.43582 15.5025 9.03522 15.5039 9.64569C15.5053 10.2562 15.3458 10.8563 15.0414 11.3861C14.7369 11.9159 14.2983 12.3568 13.7692 12.6647C13.5645 12.8132 13.4003 13.0101 13.2913 13.2378C13.1824 13.4655 13.1322 13.7167 13.1453 13.9685V14.3931C13.1373 14.6894 13.0136 14.9708 12.8004 15.1776C12.5872 15.3843 12.3014 15.4999 12.0039 15.4998Z" fill="currentColor"/>
                                       <path d="M12.0026 18.9998C12.6469 18.9998 13.1693 18.4775 13.1693 17.8332C13.1693 17.1888 12.6469 16.6665 12.0026 16.6665C11.3583 16.6665 10.8359 17.1888 10.8359 17.8332C10.8359 18.4775 11.3583 18.9998 12.0026 18.9998Z" fill="currentColor"/>
                                    </svg>
                                 </span>
                              </span>
                              <h3 class="fs-5 text-gray-800 fw-bold mb-0 ms-4">Contact Support</h3>
                           </div>
                           <!--end::Header-->
                           <!--begin::Body-->
                           <div id="kt_accordion_2_item_3" class="collapse fs-6 ps-10" data-bs-parent="#kt_accordion_2">
                              If you encounter an error with your purchase, please contact support.
                              <a href="https://t.me/slowaris">@slowaris</a>
                           </div>
                           <!--end::Body-->
                        </div>
                        <!--end::Item-->
                     </div>
                     <!--end::Accordion-->
                  </div>
               </div>
            </div>
         </div>
         <!--End::row-->
      </div>
      <!--End::Content container-->
   </div><!--End::Content-->
<?php
include_once('global/public/footer.php');
?>