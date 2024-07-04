<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gestion des véhicules</title>
        <!--Links css-->
        @include('layouts.links.links_css')
        <!--Links css-->
    </head>
    <body id="page-top">
        <!-- Navigation-->
        @include('layouts.nav')
        <!-- Navigation-->
        <!-- Nouveau véhicule-->
        @yield('content')
        <!-- vehicule-->
        <!-- Footer-->
        @include('layouts.footer')
        <!--Footer-->
        <!--Link js-->
        @include('layouts.links.links_js')
        <!--Link js-->
    </body>
</html>
