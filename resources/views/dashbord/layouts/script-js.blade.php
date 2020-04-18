@include('dashbord.layouts.success')
<!-- scripts -->
<script src="{{url('js/jquery-3.2.1.js')}}"></script>
<script src="{{url('js/popper.min.js')}}"></script>
<script src = "{{url('js/noty.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>
<script src="{{url('js/ckeditor/ckeditor/ckeditor.js')}}"></script>
<script>
    /* img perview **/
    /* ckdeditor script */
    CKEDITOR.config.language = '{{app()->getLocale()}}';
    /* ckdeditor script */
</script>
<!-- scripts -->
