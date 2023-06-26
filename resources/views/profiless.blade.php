@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>User Report <small>Activity report</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings 1</a>
                <a class="dropdown-item" href="#">Settings 2</a>
              </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="col-md-3 col-sm-3  profile_left">
          <div class="profile_img">
            <div id="crop-avatar">
              <!-- Current avatar -->
              <img class="img-responsive avatar-view" src="resources/images/Logo.png" alt="Avatar" title="Change the avatar">
            </div>
          </div>
          <h3>Samuel Doe</h3>

          <ul class="list-unstyled user_data">
            <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
            </li>

            <li>
              <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
            </li>

            <li class="m-top-xs">
              <i class="fa fa-external-link user-profile-icon"></i>
              <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
            </li>
          </ul>

          <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
          <br />


  @endsection
