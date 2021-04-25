<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="Duah">
        <title>Duah</title>

        @include('layouts.app_css')
</head>
<body class="page-body skin-white">
<div class="page-container" id="app">
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
        @include('layouts.app_sidebar')
        @include('layouts.app_header')
        <main id="main-container">
            <div class="content">
                {{-- <div class="row invisible" data-toggle="appear"> --}}
                    @yield("main_content")
                {{-- </div> --}}
            </div>
        </main>
        @include('layouts.app_footer')
    </div>
</div>
@include('layouts.app_js')
</body>
</html>
