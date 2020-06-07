  <footer class="main-footer">
        <div class="footer-left">
          <a href="#">Hitachi MGRM Net Limited</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>  


  <!-- start Vertically Center -->
      <div class="modal fade" id="modal_center" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              add content here..
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
function myOnloadFunc() {
	$('#myModal').modal('show');
}
// When the user clicks on <span> (x), close the modal



setTimeout(function(){
	 $(".alert-with-icon").hide();
}, 10000);
  </script>
  <!-- General JS Scripts -->
  <script src="{{ url('assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
   <script src="{{ url('assets/bundles/datatables/datatables.min.js') }}"></script>
  <script src="{{ url('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <!--<script src="{{ url('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>-->
   <script src="{{ url('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ url('assets/js/page/datatables.js') }}"></script>
  <!-- Page Specific JS File -->
  <!--<script src="{{ url('assets/js/page/index.js') }}"></script>-->
   <!-- JS Libraies -->
  <script src="{{ url('assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ url('assets/js/page/toastr.js') }}"></script>
<!-- JS Libraies -->
  <script src="{{ url('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ url('assets/js/page/sweetalert.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ url('assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ url('assets/js/custom.js') }}"></script>
  
