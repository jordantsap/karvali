<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layouts.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @livewireStyles

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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('#amenities').select2({
            placeholder: 'Select an option',
            multiple: true,
            closeOnSelect: false,
            allowClear: true
        });
        // $('#amenities').on('select2:select', function (e) {
        //     var data = e.params.data.id;
        //     console.log(data);
        // });
    });
</script>
{{-- IMAGES PREVIEW SCRIPT--}}

<script>
    const imageInputIds = ['header', 'logo', 'image1', 'image2', 'image3', 'imgfile'];

    imageInputIds.forEach((inputId) => {
        const inputElement = document.getElementById(inputId);
        const imagePreview = document.getElementById(`${inputId}Preview`);

        inputElement.addEventListener('change', function(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    imagePreview.src = reader.result;
                    imagePreview.style.display = 'block';
                });

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        });
    });

    const imgfileInput = document.getElementById('imgfile');
    const selectedImagesContainer = document.getElementById('imgfilePreviewContainer');
    const maxFiles = 5; // Maximum number of files allowed

    imgfileInput.addEventListener('change', function (event) {
        const input = event.target;
        const selectedFiles = input.files;

        // Check if the number of selected files exceeds the limit
        if (selectedFiles.length > maxFiles) {
            alert(`You can only select up to ${maxFiles} files.`);
            input.value = ''; // Clear the selected files if over the limit
            return; // Exit the function, so further processing is stopped
        }

        // Clear the container before appending new images
        selectedImagesContainer.innerHTML = '';

        // Loop through selected files and display image previews
        for (const file of selectedFiles) {
            const reader = new FileReader();

            reader.addEventListener('load', function () {
                const imagePreview = document.createElement('img');
                imagePreview.src = reader.result;
                imagePreview.style.width = '150px';
                imagePreview.style.height = '150px';
                selectedImagesContainer.appendChild(imagePreview);
            });

            reader.readAsDataURL(file);
        }
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

<!-- Add this script at the end of your layout or specific view -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    // Lightbox2 configuration
    lightbox.option({
        'fadeDuration': 500,
        'resizeDuration': 700,
        'wrapAround': true,
        'disableScrolling': true, // Prevent scrolling while lightbox is open
        'positionFromTop': 50, // Adjust the distance from the top of the screen
        'fitImagesInViewport': true, // Fit images to the screen
        'maxWidth': '90%', // Set the maximum width of the lightbox image
        'maxHeight': '90%', // Set the maximum height of the lightbox image
        'showImageNumberLabel': false // Hide the image number label (1 of 3)
    });
</script>
</body>
</html>
