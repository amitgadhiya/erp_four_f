<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="nofollow">
    <meta name="googlebot" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
      @yield('title') - Four F ERP

      </title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset(Config::get('vars.adminFolder').'/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset(Config::get('vars.adminFolder').'/vendors/css/vendor.bundle.base.css')}}">

    <link rel="stylesheet" href="{{ asset(Config::get('vars.adminFolder').'/vendors/css/vendor.bundle.addons.css')}}">
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- endinject -->

    <!-- plugin css for this page -->

    <!-- End plugin css for this page -->

    <!-- inject:css -->

    <link rel="stylesheet" href="{{ asset(Config::get('vars.adminFolder').'/css/style.css')}}">

    <!-- endinject -->

    <link rel="shortcut icon" href="{{ asset(Config::get('vars.adminFolder').'/images/favicon.png')}}" />

  </head>
