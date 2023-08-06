<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layouts.head')

    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <style>

        .filepond--panel-root {
            height: 50px !important;
            /*width: 100px !important;*/
        }
        .filepond--item {
            height: 100px;
            font-size: 24px !important;
        }
        .filepond--file {
            color: white;
        }
        .filepond--drop-label {
            color: #555;
            font-size: 20px !important;
        }
    </style>
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
	@include('admin.layouts.header')
	@include('admin.layouts.sidebar')
  @include('admin.layouts.alerts')
	@section('content')
		@show
	@include('admin.layouts.footer')
<script src="{{ asset('admin/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
</div>


<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

<script>
    FilePond.registerPlugin(FilePondPluginImagePreview);
    // Get a reference to the file input element
    const inputElement = document.querySelector('#imgfile');
    const pond = FilePond.create(inputElement);


    pond.setOptions({
        server: {
            headers:{
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            process: {
                url: '{{route('owner.tmpUpload')}}',
                method: 'POST',
            },
            revert: '{{route('owner.tmpDelete')}}'
        },

    });

    pond.processFile(1).then((file) => {
        // File has been processed
        console.log(file);
    });
</script>

{{-- toaster --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script>
@if(Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}";
switch(type){
  case 'info':
  toastr.info("{{ Session::get('message') }}");
  break;

  case 'warning':
  toastr.warning("{{ Session::get('message') }}");
  break;

  case 'success':
  toastr.success("{{ Session::get('message') }}");
  break;

  case 'error':
  toastr.error("{{ Session::get('message') }}");
  break;
}
@endif
</script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/app.min.js') }}"></script>
<!-- DataTables -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script>
var url = window.location;
{{--// for sidebar menu but not for treeview submenu--}}
$('ul.sidebar-menu a').filter(function() {
    return this.href == url;
}).parent().siblings().removeClass('active').end().addClass('active');
{{--for treeview which is like a submenu--}}
$('ul.treeview-menu a').filter(function() {
    return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active').end().addClass('active');
</script>

</body>
</html>
