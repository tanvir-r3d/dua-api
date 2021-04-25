<script src="/assets/js/codebase.core.min.js"></script>
<script src="/assets/js/codebase.app.min.js"></script>
<script src="/assets/js/pages/be_pages_dashboard.min.js"></script>
<script src="/assets/js/plugins/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/izitoast/dist/css/iziToast.min.css">
<script src="/assets/izitoast/dist/js/iziToast.min.js" type="text/javascript"></script>
@yield('script')
<script>
      @foreach($errors -> all() as $error)
    iziToast.warning({
        title: "Warning"
        , message: "{{ $error }}"
        , position: 'topRight'
    , });
    @endforeach
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type') }}";
    switch (type) {
        case 'info':
            iziToast.info({
                title: "{{ Session::get('title') }}"
                , message: "{{ Session::get('message') }}"
                , position: 'topRight'
            , });
            break;
        case 'warning':
            iziToast.warning({
                title: "{{ Session::get('title') }}"
                , message: "{{ Session::get('message') }}"
                , position: 'topRight'
            , });
            break;
        case 'success':
            iziToast.success({
                title: "{{ Session::get('title') }}"
                , message: "{{ Session::get('message') }}"
                , position: 'topRight'
            , });
            break;
        case 'error':
            iziToast.error({
                title: "{{ Session::get('message') }}"
                , message: "{{ Session::get('message') }}"
                , position: 'topRight'
            , });
            break;
    }
    @endif

</script>
