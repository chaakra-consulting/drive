</div>
		<!-- main-content closed -->
	<!-- Footer opened -->
		<div class="main-footer ht-40">
			<div class="container-fluid pd-t-0-f ht-100p">
				<span>Copyright © 2022 <a href="https://www.chaakra-consulting.com">Chaakra Consulting</a>
					All rights reserved.</span>
			</div>
		</div>
		<!-- Footer closed -->

	</div>
	<!-- End Page -->

	<!-- Back-to-top -->
	<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
	<!-- JQuery min js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap Bundle js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/bootstrap/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Ionicons js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/ionicons/ionicons.js"></script>
	<!-- Moment js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/moment/moment.js"></script>
	<!-- P-scroll js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/perfect-scrollbar/p-scroll.js"></script>
	<!-- Sticky js -->
	<script src="<?= base_url(); ?>/assets-themes/js/sticky.js"></script>
	<!-- Rating js-->
	<script src="<?= base_url(); ?>/assets-themes/plugins/rating/jquery.rating-stars.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/rating/jquery.barrating.js"></script>
	<!-- Sidebar js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/side-menu/sidemenu.js"></script>
	<!-- Right-sidebar js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/sidebar/sidebar.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/sidebar/sidebar-custom.js"></script>
	<!-- eva-icons js -->
	<script src="<?= base_url(); ?>/assets-themes/js/eva-icons.min.js"></script>
	<!-- custom js -->
	<script src="<?= base_url(); ?>/assets-themes/js/custom.js"></script>
	<!-- Internal Data tables -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/datatable/datatables.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/datatable/js/dataTables.bootstrap5.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/datatable/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/datatable/js/jszip.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/datatable/js/buttons.html5.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/datatable/js/buttons.print.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/datatable/js/buttons.colVis.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/datatable/pdfmake/pdfmake.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/datatable/pdfmake/vfs_fonts.js"></script>
	<!--Internal  Datatable js -->
	<script src="<?= base_url(); ?>/assets-themes/js/table-data.js"></script>	
	<!-- Internal Modal js-->
	<script src="<?= base_url(); ?>/assets-themes/js/modal.js"></script>
	<!--Internal  Datepicker js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
	<!-- Internal Select2 js-->
	<script src="<?= base_url(); ?>/assets-themes/plugins/select2/js/select2.min.js"></script>
	<!-- Internal Select2.min js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/select2/js/select2.min.js"></script>
	<!--Internal Ion.rangeSlider.min js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
	<!--Internal  jquery-simple-date time picker js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
	<script src="<?= base_url(); ?>/assets-themes/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
	<!--Internal  pickerjs js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/pickerjs/picker.min.js"></script>
	<!--Internal  jquery.maskedinput js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>
	<!--Internal  spectrum-colorpicker js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/spectrum-colorpicker/spectrum.js"></script>
	<!-- Internal Form-editor js -->
	<script src="<?= base_url(); ?>/assets-themes/js/form-editor.js"></script>
	<!--Internal quill js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/quill/quill.min.js"></script>
	<!--Internal  Perfect-scrollbar js -->
	<script src="<?= base_url(); ?>/assets-themes/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

	<script src="<?= base_url(); ?>/assets-themes/plugins/ckeditor/ckeditor.js') ?>"></script>

	<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
  quill.on('text-change', function(delta, oldDelta, source) {
    document.querySelector("input[name='nama_proyek']").value = quill.root.innerHTML;
  });
	</script>
</body>

</html>