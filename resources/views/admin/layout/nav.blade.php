<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Panel
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
<style>
input[type="checkbox"][readonly] {
  pointer-events: none;
}
</style>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="" class="simple-text logo-normal">
          Admin Panel
        </a></div>
<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
?>      
      <div class="sidebar-wrapper">
        <ul class="nav">
        @can('draft-view')
          <li class="nav-item @if($uri_segments[2]=='draft'){{'active'}}@endif ">
            <a class="nav-link" href="{{ route('admin.drafts') }}">
              <i class="material-icons">content_paste</i>
              <p>Drafts</p>
            </a>
          </li>
          @endcan
          @can('approved-view')
          <li class="nav-item @if($uri_segments[2]=='approved'){{'active'}}@endif ">
            <a class="nav-link" href="{{ route('admin.approved') }}">
              <i class="material-icons">check_circle_outline</i>
              <p>Approved</p>
            </a>
          </li>
          @endcan
          @can('rejected-view')
          <li class="nav-item @if($uri_segments[2]=='rejected'){{'active'}}@endif ">
            <a class="nav-link" href="{{ route('admin.rejected') }}">
              <i class="material-icons">cancel</i>
              <p>Rejected</p>
            </a>
          </li>
          @endcan
          @can('subadmin-view')
          <li class="nav-item @if($uri_segments[2]=='subadmin'){{'active'}}@endif ">
            <a class="nav-link" href="{{ route('admin.subadmins') }}">
              <i class="material-icons">person</i>
              <p>Sub Admins</p>
            </a>
          </li>
          @endcan
          @can('role-view')
          <li class="nav-item @if($uri_segments[2]=='roles'){{'active'}}@endif ">
            <a class="nav-link" href="{{ route('admin.roles') }}">
              <i class="material-icons">bubble_chart</i>
              <p>Roles</p>
            </a>
          </li>
          @endcan
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="{{ url('/admin/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                </a>

                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
@yield('content')
@include('admin.layout.footer')
