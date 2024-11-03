<?php
 if (!defined ('allow')) {
  header ("HTTP/1.0 404 Not Found");
 }
?>
<!--begin::Footer-->
<div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
     <!--begin::Container-->
     <div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
          <!--begin::Copyright-->
          <div class="text-dark order-2 fw-bold order-md-1">
               <span class="text-muted me-1">2023&copy;</span>
               <a href="https://example.com" target="_blank" class="text-gray-800 text-hover-primary">test.com</a>
          </div>
          <!--end::Copyright-->
          <!--begin::Menu-->
          <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
               <li class="menu-item">
                    <a href="#" target="_blank" class="menu-link px-2">Support</a>
               </li>
               <li class="menu-item">
                    <a href="#" target="_blank" class="menu-link px-2">Purchase</a>
               </li>
          </ul>
          <!--end::Menu-->
     </div>
     <!--end::Container-->
</div>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
     <i class="ki-duotone ki-arrow-up">
          <span class="path1"></span>
          <span class="path2"></span>
     </i>
</div>
<!--end::Scrolltop-->
<!--begin::Javascript-->
<script src="<?php echo $assets; ?>assets/plugins/global/plugins.bundle.js"></script>

<script src="<?php echo $assets; ?>assets/js/scripts.bundle.js"></script>
<script src="<?php echo $assets; ?>assets/js/custom/admin.js"></script>
<script src="<?php echo $assets; ?>assets/js/custom/page.js"></script>
<script src="<?php echo $assets; ?>assets/js/custom/tinymce.js"></script>

<script src="<?php echo $assets; ?>assets/plugins/custom/tinymce/tinymce.bundle.js"></script>
<script src="<?php echo $assets; ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Javascript-->
</body>
</html>