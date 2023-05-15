<!--**********************************
            Footer start
            ***********************************-->
            <div class="footer">
            	<div class="copyright">
            		<p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
            	</div>
            </div>
        <!--**********************************
            Footer end
            ***********************************-->

		<!--**********************************
           Support ticket button start
           ***********************************-->

        <!--**********************************
           Support ticket button end
           ***********************************-->


       </div>
    <!--**********************************
        Main wrapper end
        ***********************************-->

    <!--**********************************
        Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="vendor/global/global.min.js"></script>
        <script src="vendor/chart.js/Chart.bundle.min.js"></script>
        <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="js/plugins-init/sweetalert.init.js"></script>

        <!-- Daterangepicker -->
        <!-- momment js is must -->
        <script src="vendor/moment/moment.min.js"></script>
        <script src="vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- Material color picker -->
        <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
        <!-- pickdate -->
        <script src="vendor/pickadate/picker.js"></script>
        <script src="vendor/pickadate/picker.time.js"></script>
        <script src="vendor/pickadate/picker.date.js"></script>

        <!-- Apex Chart -->
        <script src="vendor/apexchart/apexchart.js"></script>

        <script src="vendor/chart.js/Chart.bundle.min.js"></script>

        <!-- Chart piety plugin files -->
        <script src="vendor/peity/jquery.peity.min.js"></script>

        <!-- Form validate init -->
        <script src="js/plugins-init/jquery.validate-init.js"></script>

        <!-- Daterangepicker -->
        <script src="js/plugins-init/bs-daterange-picker-init.js"></script>
        <!-- Clockpicker init -->
        <script src="js/plugins-init/clock-picker-init.js"></script>
        <!-- asColorPicker init -->
        <script src="js/plugins-init/jquery-asColorPicker.init.js"></script>
        <!-- Material color picker init -->
        <script src="js/plugins-init/material-date-picker-init.js"></script>
        <!-- Pickdate -->
        <script src="js/plugins-init/pickadate-init.js"></script>


        <!-- Form Steps -->
        <script src="vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
        <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

        <!-- Datatable -->
        <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="js/plugins-init/datatables.init.js"></script>

        <!-- Dashboard 1 -->
        <script src="js/dashboard/dashboard-1.js"></script>

        <script src="vendor/owl-carousel/owl.carousel.js"></script>

        <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendor/select2/js/select2.full.min.js"></script>
        <script src="vendor/lightgallery/js/lightgallery-all.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/dlabnav-init.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/styleSwitcher.js"></script>
        <script src="js/plugins-init/select2-init.js"></script>
        <script>
        	function cardsCenter()
        	{

        		/*  testimonial one function by = owl.carousel.js */



        		jQuery('.card-slider').owlCarousel({
        			loop:true,
        			margin:0,
        			nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
        	}

        	jQuery(window).on('load',function(){
        		setTimeout(function(){
        			cardsCenter();
        		}, 1000); 
        	});

        </script>
        <script>
        	$(document).ready(function(){
			// SmartWizard initialize
			$('#smartwizard').smartWizard(); 
		});
	</script>
   <script type="text/javascript">
    <?php echo $jsArray; ?>

    function changeValue(X) {
      document.getElementById('nama').value = prdName[X].nama;
      document.getElementById('harga').value = prdName[X].harga;

  };
</script>
<script type="text/javascript">
    function sum() {
      var txtFirstNumberValue = document.getElementById('jumlah_pesanan').value;
      var txtSecondNumberValue = document.getElementById('harga').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
        document.getElementById('total').value = result;
    }
}
</script>
<script type="text/javascript">
    $('bayar').keyup(function(e) {
      var jumlah_total = parseInt($('total_bayar').html());
      var bayar = parseInt($(this).val());
      var kembali = bayar - jumlah_total;
      $('kembali').html(kembali);
  })
</script>


</body>
</html>