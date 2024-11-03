<?php
$page = 'Help Desk';
define('allow', TRUE);
include_once('global/public/header.php');

header('Cache-Control: public, max-age=25');
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        <div class="mb-10">
            <ol class="breadcrumb breadcrumb-line text-muted fs-6 fw-bold">
                <li class="breadcrumb-item"><a href="/home" class="">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="">Help Desk</a></li>
                <li class="breadcrumb-item text-muted">Methods</li>
            </ol>
        </div>
        <div class="row g-5 g-xl-12 mb-5">
            <div class="col-xl-6">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-header pt-1">
                        <h3 class="card-title align-items-start text-center flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">HTTP/Gamba</span>
                        </h3>
                        <div class="card-toolbar">
                            <i class="ki-duotone ki-technology-4 fs-3x text-success">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                                <span class="path7"></span>
                            </i>
                        </div>
                    </div>
                    <div class="card-body fs-6 fw-bold">
                        HTTP/Gamba - Rapid Reset: A DDoS attack technique exploiting a vulnerability in the HTTP/2
                        protocol by abusing its stream multiplexing feature, leading to substantial server workload with
                        minimal client-side effort, causing potential large-scale service disruptions.
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-header pt-1">
                        <h3 class="card-title align-items-start text-center flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">HTTP/Quantum</span>
                        </h3>
                        <div class="card-toolbar">
                            <i class="ki-duotone ki-artificial-intelligence fs-3x text-success">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                                <span class="path7"></span>
                                <span class="path8"></span>
                            </i>
                        </div>
                    </div>
                    <div class="card-body fs-6 fw-bold">
                        HTTP/Quantum - is an innovative attack technique leveraging a cutting-edge Chrome framework.
                        This framework enables the deployment of a genuine Chrome browser with minimal resource
                        consumption, making it adept at circumventing a wide range of security obstacles, including
                        JavaScript restrictions and CAPTCHA mechanisms. Furthermore, HTTP/Quantum also use a rapid reset
                        mechanism for flood.
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card card-flush h-xl-100 shadow-sm">
                    <div class="card-header pt-1">
                        <h3 class="card-title align-items-start text-center flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">HTTP/Sonne</span>
                        </h3>
                        <div class="card-toolbar">
                            <i class="ki-duotone ki-electricity fs-3x text-success">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                                <span class="path7"></span>
                                <span class="path8"></span>
                                <span class="path9"></span>
                                <span class="path10"></span>
                            </i>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-center flex-column fs-6 fw-bold">
                        This method employs the HTTP/1 protocol version, enabling it to target systems that may be
                        inaccessible via HTTP/2 connections. It effectively conducts attacks on both non-HTTPS targets,
                        exploiting the versatility of the HTTP/1 protocol to bypass restrictions associated with HTTP/2
                        connections.
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
