<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{!! asset('assets/vendors/popper/popper.min.js') !!}"></script>
<script src="{!! asset('assets/vendors/bootstrap/bootstrap.min.js') !!}"></script>
<script src="{!! asset('assets/vendors/anchorjs/anchor.min.js') !!}"></script>
<script src="{!! asset('assets/vendors/is/is.min.js') !!}"></script>
<script src="{!! asset('assets/vendors/lodash/lodash.min.js') !!}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{!! asset('assets/vendors/list.js/list.min.js') !!}"></script>
<script src="{!! asset('assets/vendors/feather-icons/feather.min.js') !!}"></script>
<script src="{!! asset('assets/vendors/dayjs/dayjs.min.js') !!}"></script>
<script src="{!! asset('assets/js/phoenix.js') !!}"></script>
<script src="{!! asset('assets/vendors/choices/choices.min.js') !!}"></script>

<!-- select 2 -->
<link href="{!! asset('assets/vendors/select2/dist/css/select2.min.css') !!}" rel="stylesheet" />
<script src="{!! asset('assets/vendors/select2/dist/js/select2.min.js') !!}"></script>
<script>
   $('.select2').select2({
      width: '100%',
      allowClear: true,
   });
</script>

{{-- tinymcy --}}
<script src="{!! asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') !!}"></script>
<script>
   var editor_config = {
      path_absolute : '/',
      selector: 'textarea.tinymcy',
      relative_urls: true,
      convert_urls: false,
      height : "380",
      plugins: "paste,lists",
      menubar: 'edit',
      paste_as_text: true,
      toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link pastetext",
   };

   tinymce.init(editor_config);
</script>

<!-- ================== toastr ================== -->
<link href="{!! asset('assets/vendors/toastr/build/toastr.css') !!}" rel="stylesheet"/>
<script src="{!! asset('assets/vendors/toastr/build/toastr.min.js') !!}"></script>
@if(Session::has('success'))
   <script>
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
      toastr.success('{!! Session::get('success') !!}');
   </script>
@endif

@if(Session::has('error'))
   <script>
		toastr.options =
		{
			"closeButton": true,
			"progressBar" : true
		}
      toastr.error('{!! Session::get('error') !!}');
   </script>
@endif

@if(Session::has('warning'))
   <script>
		toastr.options =
		{
			"closeButton": true,
			"progressBar" : true
		}
      toastr.warning('{!! Session::get('warning') !!}');
   </script>
@endif

<!-- geocomplete -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUrMDJXH_pjp46t-D6un_fRFeULSYeNAk&amp;libraries=places"></script>
<script src="{!! asset('assets/vendors/geocomplete/jquery.geocomplete.js') !!}"></script>

@livewireScripts
@yield('scripts')
