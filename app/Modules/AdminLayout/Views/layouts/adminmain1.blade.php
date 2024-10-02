<!DOCTYPE html>
<html>
<head>
    <title> @yield('title', 'Crystawall Technologies LLC')</title>
    <!-- Add your CSS links here -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('assest/images/logo.png')}}">

    <link rel="stylesheet" href="{{asset('assest/css/bootstrap.min.css')}}" type="text/css" media="all"/>
    @yield('styles')
</head>
<body>
   @include('adminlayout::partials.adminheader')
    <div class="container mt-4">
<section class="main">
    @yield('content')
    </section>
    </div>
    <script src="{{asset('assest/tinymce/tinymce.min.js')}}"></script>
    @yield('scripts')
    <script>
    tinymce.init({
    selector: '#myeditor',
    height: 400,
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
     image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: 'sliding',
    contextmenu: "link image imagetools table",
});
</script>

    </body>
    </html>