<?php
$page = 'API Manager';
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
            <!--begin::Col-->
            <div class="col-xl-12">
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span class="path1"></span>
                        <span class="path2"></span><span class="path3"></span></i>        <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 ">
                        <!--begin::Content-->
                        <div class=" fw-bold">
                            <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                            <div class="fs-6 text-gray-700 ">Read the documentation before using the api service</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
            <div class="col-xl-12">
                <div class="card mb-1">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                            <!--begin::Image-->
                            <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                                <img class="mw-50px mw-lg-75px" src="/assets/media/logos/logo.png" alt="image">
                            </div>
                            <!--end::Image-->
                            <!--begin::Wrapper-->
                            <div class="flex-grow-1">
                                <!--begin::Head-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::Details-->
                                    <div class="d-flex flex-column col-xl-12">
                                        <!--begin::Title-->
                                        <div class="d-flex align-items-center mb-1">
                                            <span class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">API Dashboard</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Head-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap justify-content-start">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="min-w-50px py-1 px-4 me-2 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                <span class="svg-icon svg-icon-muted svg-icon-2 m-2">
                                                                 <svg width="24" height="24" viewBox="0 0 24 24"
                                                                      fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                      <path opacity="0.3"
                                                                            d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                                            fill="currentColor"/>
                                                                      <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM12 16.8C11 16.8 10.2 16.4 9.5 15.8C8.8 15.1 8.5 14.3 8.5 13.3C8.5 12.8 8.59999 12.3 8.79999 11.9L10 13.1V10.1C10 9.50001 9.6 9.10001 9 9.10001H6L7.29999 10.4C6.79999 11.3 6.5 12.2 6.5 13.3C6.5 14.8 7.10001 16.2 8.10001 17.2C9.10001 18.2 10.5 18.8 12 18.8C12.6 18.8 13 18.3 13 17.8C13 17.2 12.6 16.8 12 16.8ZM16.7 16.2C17.2 15.3 17.5 14.4 17.5 13.3C17.5 11.8 16.9 10.4 15.9 9.39999C14.9 8.39999 13.5 7.79999 12 7.79999C11.4 7.79999 11 8.19999 11 8.79999C11 9.39999 11.4 9.79999 12 9.79999C12.9 9.79999 13.8 10.2 14.5 10.8C15.2 11.5 15.5 12.3 15.5 13.3C15.5 13.8 15.4 14.3 15.2 14.7L14 13.5V16.5C14 17.1 14.4 17.5 15 17.5H18L16.7 16.2Z"
                                                                            fill="currentColor"/>
                                                                      <path opacity="0.3"
                                                                            d="M12 16.8C11 16.8 10.2 16.4 9.5 15.8C8.8 15.1 8.5 14.3 8.5 13.3C8.5 12.8 8.59999 12.3 8.79999 11.9L7.29999 10.4C6.79999 11.3 6.5 12.2 6.5 13.3C6.5 14.8 7.10001 16.2 8.10001 17.2C9.10001 18.2 10.5 18.8 12 18.8C12.6 18.8 13 18.3 13 17.8C13 17.2 12.6 16.8 12 16.8Z"
                                                                            fill="currentColor"/>
                                                                      <path opacity="0.3"
                                                                            d="M15.5 13.3C15.5 13.8 15.4 14.3 15.2 14.7L16.7 16.2C17.2 15.3 17.5 14.4 17.5 13.3C17.5 11.8 16.9 10.4 15.9 9.39999C14.9 8.39999 13.5 7.79999 12 7.79999C11.4 7.79999 11 8.19999 11 8.79999C11 9.39999 11.4 9.79999 12 9.79999C12.9 9.79999 13.8 10.2 14.5 10.8C15.1 11.5 15.5 12.4 15.5 13.3Z"
                                                                            fill="currentColor"/>
                                                                 </svg>
                                                            </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-4 fw-bold"><?php echo $Api->UsersApiDataUserID($User->UserData()['id'], 0)['Count']; ?></div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400 first-upperchase">Active API</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="min-w-50px py-1 px-4 me-2 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                <span class="svg-icon svg-icon-muted svg-icon-2 m-2">
                                                                 <svg width="24" height="24" viewBox="0 0 24 24"
                                                                      fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                      <path opacity="0.3"
                                                                            d="M21 10.7192H3C2.4 10.7192 2 11.1192 2 11.7192C2 12.3192 2.4 12.7192 3 12.7192H6V14.7192C6 18.0192 8.7 20.7192 12 20.7192C15.3 20.7192 18 18.0192 18 14.7192V12.7192H21C21.6 12.7192 22 12.3192 22 11.7192C22 11.1192 21.6 10.7192 21 10.7192Z"
                                                                            fill="currentColor"/>
                                                                      <path d="M11.6 21.9192C11.4 21.9192 11.2 21.8192 11 21.7192C10.6 21.4192 10.5 20.7191 10.8 20.3191C11.7 19.1191 12.3 17.8191 12.7 16.3191C12.8 15.8191 13.4 15.4192 13.9 15.6192C14.4 15.7192 14.8 16.3191 14.6 16.8191C14.2 18.5191 13.4 20.1192 12.4 21.5192C12.2 21.7192 11.9 21.9192 11.6 21.9192ZM8.7 19.7192C10.2 18.1192 11 15.9192 11 13.7192V8.71917C11 8.11917 11.4 7.71917 12 7.71917C12.6 7.71917 13 8.11917 13 8.71917V13.0192C13 13.6192 13.4 14.0192 14 14.0192C14.6 14.0192 15 13.6192 15 13.0192V8.71917C15 7.01917 13.7 5.71917 12 5.71917C10.3 5.71917 9 7.01917 9 8.71917V13.7192C9 15.4192 8.4 17.1191 7.2 18.3191C6.8 18.7191 6.9 19.3192 7.3 19.7192C7.5 19.9192 7.7 20.0192 8 20.0192C8.3 20.0192 8.5 19.9192 8.7 19.7192ZM6 16.7192C6.5 16.7192 7 16.2192 7 15.7192V8.71917C7 8.11917 7.1 7.51918 7.3 6.91918C7.5 6.41918 7.2 5.8192 6.7 5.6192C6.2 5.4192 5.59999 5.71917 5.39999 6.21917C5.09999 7.01917 5 7.81917 5 8.71917V15.7192V15.8191C5 16.3191 5.5 16.7192 6 16.7192ZM9 4.71917C9.5 4.31917 10.1 4.11918 10.7 3.91918C11.2 3.81918 11.5 3.21917 11.4 2.71917C11.3 2.21917 10.7 1.91916 10.2 2.01916C9.4 2.21916 8.59999 2.6192 7.89999 3.1192C7.49999 3.4192 7.4 4.11916 7.7 4.51916C7.9 4.81916 8.2 4.91918 8.5 4.91918C8.6 4.91918 8.8 4.81917 9 4.71917ZM18.2 18.9192C18.7 17.2192 19 15.5192 19 13.7192V8.71917C19 5.71917 17.1 3.1192 14.3 2.1192C13.8 1.9192 13.2 2.21917 13 2.71917C12.8 3.21917 13.1 3.81916 13.6 4.01916C15.6 4.71916 17 6.61917 17 8.71917V13.7192C17 15.3192 16.8 16.8191 16.3 18.3191C16.1 18.8191 16.4 19.4192 16.9 19.6192C17 19.6192 17.1 19.6192 17.2 19.6192C17.7 19.6192 18 19.3192 18.2 18.9192Z"
                                                                            fill="currentColor"/>
                                                                 </svg>
                                                            </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-4 fw-bold"><?php echo $User->UserData()['id']; ?></div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400 first-upperchase">User ID</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Details-->
                        <div class="separator"></div>
                        <!--begin::Nav-->
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6 active" data-bs-toggle="tab"
                                   href="#Create">Create API</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab" href="#Active">Active
                                    API</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab" href="#Docs">Docs
                                    API</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab" href="#Methods">Methods
                                    API</a>
                            </li>
                            <!--end::Nav item-->
                        </ul>
                        <!--end::Nav-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5 g-xl-8 mb-xl-5 mb-5">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div id="message_empty"></div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="Create" role="tabpanel">
                                <form method="POST" id="CreateApi">
                                    <div class="col-xl-12">
                                        <!--begin::Input group-->
                                        <label class="form-label fw-bold">Concurrents</label>
                                        <div class="input-group input-group-solid input-group-sm mb-5">
                                                       <span class="input-group-text">
                                                            <i class="ki-duotone ki-flash-circle fs-1">
                                                                 <i class="path1"></i>
                                                                 <i class="path2"></i>
                                                            </i>
                                                       </span>
                                            <input type="text" class="form-control fw-bold"
                                                   placeholder="Max Concurrents for API" name="slots">
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-xl-12">
                                        <!--begin::Input group-->
                                        <label class="form-label fw-bold">Max Boot Time</label>
                                        <div class="input-group input-group-solid input-group-sm mb-5">
                                                       <span class="input-group-text">
                                                            <i class="ki-duotone ki-time fs-1">
                                                                 <i class="path1"></i>
                                                                 <i class="path2"></i>
                                                            </i>
                                                       </span>
                                            <input type="text" class="form-control fw-bold"
                                                   placeholder="Max Boot Time for API" name="duration">
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-xl-12">
                                        <!--begin::Input group-->
                                        <label class="form-label fw-bold">IP Connection</label>
                                        <div class="input-group input-group-solid input-group-sm mb-5">
                                                       <span class="input-group-text">
                                                            <i class="ki-duotone ki-tablet-text-down fs-1">
                                                                 <i class="path1"></i>
                                                                 <i class="path2"></i>
                                                                 <i class="path3"></i>
                                                                 <i class="path4"></i>
                                                            </i>
                                                       </span>
                                            <textarea type="text" class="form-control fw-bold"
                                                      placeholder="127.0.0.1&#10;127.0.0.2&#10;127.0.0.3"
                                                      name="ip-address"></textarea>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="card-footer pt-1 pb-0 d-flex justify-content-center">
                                        <button type="button" onclick="GenerateApi()"
                                                class="btn btn-sm btn-light-primary fs-5 fw-bold py-1 mt-3">
                                                       <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                 <path opacity="0.3"
                                                                       d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                                       fill="currentColor"/>
                                                                 <path opacity="0.3"
                                                                       d="M10.3 15.3L11 14.6L8.70002 12.3C8.30002 11.9 7.7 11.9 7.3 12.3C6.9 12.7 6.9 13.3 7.3 13.7L10.3 16.7C9.9 16.3 9.9 15.7 10.3 15.3Z"
                                                                       fill="currentColor"/>
                                                                 <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM11.7 16.7L16.7 11.7C17.1 11.3 17.1 10.7 16.7 10.3C16.3 9.89999 15.7 9.89999 15.3 10.3L11 14.6L8.70001 12.3C8.30001 11.9 7.69999 11.9 7.29999 12.3C6.89999 12.7 6.89999 13.3 7.29999 13.7L10.3 16.7C10.5 16.9 10.8 17 11 17C11.2 17 11.5 16.9 11.7 16.7Z"
                                                                       fill="currentColor"/>
                                                            </svg>
                                                       </span>
                                            Create API
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="Active" role="tabpanel">
                                <div class="card-body p-0">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed table-row-gray-300"
                                               id="kt_api_keys_table">
                                            <!--begin::Thead-->
                                            <thead class="border-gray-200 fs-5 fw-bold">
                                            <tr>
                                                <th class="min-w-250px">API</th>
                                                <th class="min-w-250px">Attack Time</th>
                                                <th class="min-w-250px">Slots</th>
                                                <th class="min-w-125px">Action</th>
                                            </tr>
                                            </thead>
                                            <!--end::Thead-->
                                            <!--begin::Tbody-->
                                            <tbody class="fs-6 text-gray-600 fw-bold">
                                            <?php foreach ($Api->UsersApiDataUserID($User->UserData()['id'], 0)['Response'] as $Sk => $Sv) { ?>
                                                <tr>
                                                    <td data-bs-target="key"
                                                        class="ps-0"><?php echo $Secure->SecureTxt($Sv['api_key']); ?></td>
                                                    <td>
                                                        <span class="badge badge-light-warning"><?php echo (int)$Secure->SecureTxt($Sv['AttackTime']); ?>s</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-warning"><?php echo (int)$Secure->SecureTxt($Sv['Slots']); ?></span>
                                                    </td>
                                                    <td>
                                                        <form method="POST" id="DeleteApi<?php echo $Sv['api_key']; ?>">
                                                            <input type="hidden" name="id" value="<?php echo $Sv['api_key']; ?>">
                                                            <input type="hidden" id="_csrf" value="<?php echo $csrftoken; ?>">

                                                            <button type="button" class="btn btn-icon btn-sm btn-light-danger" onclick="DeleteApi('<?php echo $Sv['api_key']; ?>')">
                                                                <i class="ki-duotone ki-trash-square fs-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                </i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                            <!--end::Tbody-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Docs" role="tabpanel">
                                <!--begin::Accordion-->
                                <div class="accordion accordion-icon-toggl" id="kt_accordion_1">
                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                            <button class="accordion-button fs-7 fw-bold collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1"
                                                    aria-expanded="false" aria-controls="kt_accordion_1_body_1">
                                                Layer 4
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse"
                                             aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                            <div class="accordion-body">
                                                            <span class="m-3">
                                                                 <input class="form-control" disabled
                                                                        value="https://api.<? echo $domain ?>/start?api_key=">
                                                            </span>
                                                <div class="table-responsive no-footer">
                                                    <table class="table table-row-bordered gy-5 fw-bold">
                                                        <thead>
                                                        <tr class="fs-6 text-muted">
                                                            <th>Parameter</th>
                                                            <th>Type</th>
                                                            <th>Description</th>
                                                            <th>Values</th>
                                                            <th>Required</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>user</td>
                                                            <td>int</td>
                                                            <td>User ID used to authenticate the API</td>
                                                            <td>See Main API page</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>api_key</td>
                                                            <td>string</td>
                                                            <td>Private Key used to authenticate the API</td>
                                                            <td>See Active API page</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>target</td>
                                                            <td>string</td>
                                                            <td>The target IPs to be stress tested</td>
                                                            <td>0.0.0.0, 0.0.0.0/24</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>time</td>
                                                            <td>int</td>
                                                            <td>Time the stress test will be executed for in seconds
                                                            </td>
                                                            <td>200</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>port</td>
                                                            <td>int</td>
                                                            <td>The target Port to be stress tested, set port to 0 for
                                                                randomized ports
                                                            </td>
                                                            <td>range: 0-65536</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>method</td>
                                                            <td>string</td>
                                                            <td>Method used to stress test the target</td>
                                                            <td>ntp</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_2">
                                            <button class="accordion-button fs-7 fw-bold collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2"
                                                    aria-expanded="false" aria-controls="kt_accordion_1_body_2">
                                                Layer 7
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_2" class="accordion-collapse collapse"
                                             aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                                            <div class="accordion-body">
                                                            <span class="m-3">
                                                                 <input class="form-control" disabled
                                                                        value="https://api.<? echo $domain ?>/start?api_key=">
                                                            </span>
                                                <div class="table-responsive no-footer">
                                                    <table class="table table-row-bordered gy-5 fw-bold">
                                                        <thead>
                                                        <tr class="fs-6 text-muted">
                                                            <th>Parameter</th>
                                                            <th>Type</th>
                                                            <th>Description</th>
                                                            <th>Values</th>
                                                            <th>Required</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>user</td>
                                                            <td>int</td>
                                                            <td>User ID used to authenticate the API</td>
                                                            <td>See Main API page</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>api_key</td>
                                                            <td>string</td>
                                                            <td>Private Key used to authenticate the API</td>
                                                            <td>See Active API page</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>target</td>
                                                            <td>string</td>
                                                            <td>The target URL to be stress tested</td>
                                                            <td>https://example.com</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>time</td>
                                                            <td>int</td>
                                                            <td>Time the stress test will be executed for in seconds
                                                            </td>
                                                            <td>200</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                           <td>ratelimit</td>
                                                           <td>int</td>
                                                           <td>Request per seconds
                                                           </td>
                                                           <td>64</td> 
                                                           <td>
                                                              <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                 <i class="path1"></i>
                                                                 <i class="path2"></i>
                                                              </i>
                                                           </td>
                                                        </tr>
                                                        <tr>
                                                            <td>method</td>
                                                            <td>string</td>
                                                            <td>Method used to stress test the target</td>
                                                            <td>HTTPFLOOD</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>requestmethod</td>
                                                            <td>string</td>
                                                            <td>Optional type of request</td>
                                                            <td>GET,POST</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>postdata</td>
                                                            <td>string</td>
                                                            <td>Optional postdata for post request method</td>
                                                            <td>%RAND%</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-secondary fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_3">
                                            <button class="accordion-button fs-7 fw-bold collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3"
                                                    aria-expanded="false" aria-controls="kt_accordion_1_body_3">
                                                Stop Attack
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_3" class="accordion-collapse collapse"
                                             aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                                            <div class="accordion-body">
                                                            <span class="m-3">
                                                                 <input class="form-control" disabled
                                                                        value="https://api.<? echo $domain ?>/stop?api_key=">
                                                            </span>
                                                <div class="table-responsive no-footer">
                                                    <table class="table table-row-bordered gy-5 fw-bold">
                                                        <thead>
                                                        <tr class="fs-6 text-muted">
                                                            <th>Parameter</th>
                                                            <th>Type</th>
                                                            <th>Description</th>
                                                            <th>Values</th>
                                                            <th>Required</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>user</td>
                                                            <td>int</td>
                                                            <td>User ID used to authenticate the API</td>
                                                            <td>See Main API page</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>api_key</td>
                                                            <td>string</td>
                                                            <td>Private Key used to authenticate the API</td>
                                                            <td>See Active API page</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>stopper</td>
                                                            <td>int</td>
                                                            <td>The unique number that was received after sending the
                                                                attack
                                                            </td>
                                                            <td>000000</td>
                                                            <td>
                                                                <i class="ki-duotone ki-questionnaire-tablet text-success fs-1">
                                                                    <i class="path1"></i>
                                                                    <i class="path2"></i>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Accordion-->
                            </div>
                            <div class="tab-pane fade" id="Methods" role="tabpanel">
                                <!--begin::table-->
                                <div class="table-responsive no-footer">
                                    <table class="table table-row-bordered gy-5">
                                        <thead>
                                        <tr class="fs-6 text-muted">
                                            <th>Name</th>
                                            <th>Layer</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody class="fw-bold">
                                        <?php foreach ($Methods->MethodsDataAll()['Response'] as $Mk => $Mv) { ?>
                                            <tr>
                                                <td>
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6"><?php echo $Secure->SecureTxt($Mv['apiname']); ?></span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light-warning">L<?php echo $Secure->SecureTxt($Mv['layer']); ?></span>
                                                </td>
                                                <td>
                                                    <span class="fs-7"><?php echo $Mv['description']; ?></span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::table-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
</div>
<?php
include_once('global/public/footer.php');
?>
