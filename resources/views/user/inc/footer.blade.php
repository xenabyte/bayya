<!-- Footer -->
<div class="copyright row">
    <div class="col-md-6 text-left">
        &copy; Copyright {{date('Y')}} {{env('APP_NAME')}}.
    </div>
</div><!-- / .copyright -->
<!-- / Footer -->

</div><!-- / .page-container -->

</main><!-- / .main-content -->

</div><!-- / .page-wrapper -->
<!-- / Wrapper Arround The Page -->
<!-- Scripts -->
<script src="{{asset('assets/js/vendor.js')}}"></script>


<script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/vendor/amcharts/amcharts.js')}}"></script>
<script src="{{asset('assets/vendor/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/vendor/morrisjs/morris.min.js')}}"></script>
<script src="{{asset('assets/vendor/ari_d/js-list-manager/js-list-manager.js')}}"></script>
<script src="{{asset('assets/vendor/peity/jquery.peity.min.js')}}"></script>

<script src="{{asset('assets/layout-1/js/app.js')}}"></script>


<script src="{{asset('assets/js/pages/index.js')}}"></script>
<script src="{{asset('assets/js/pages/applications/file-manager.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-table/bootstrap-table.js')}}"></script>
<script src="{{asset('assets/vendor/switchery/switchery.js')}}"></script>
<script src="{{ asset('assets/vendor/ckeditor/ckeditor-classic.js') }}"></script>
<script src="{{ asset('assets/js/pages/applications/chat/chat-3.js') }}"></script>


<script>
    ClassicEditor.create(document.querySelector("#classic-editor"), {
    }).then( (editor) => {
        window.editor = editor ;
    }
    ).catch((error) => {
        console.error( error ) ;
    }) ;
</script>

<!-- / Scripts -->
</body>

</html>
