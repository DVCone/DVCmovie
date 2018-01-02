@extends('layout.default')

@section('tittle', 'admin') 

@section('content')

<div class="container">
  <div class="col-4">
    <div class="list-group mt-5" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action list-group-item-danger" id="list-home-list" data-toggle="list" href="{{ route('admin.home') }}" role="tab" aria-controls="home">Home</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="{{ route('admin.admin') }}" role="tab" aria-controls="data">Movies Data</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="{{ route('admin.users') }}" role="tab" aria-controls="profile">Users Data</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
    </div>
  </div>
</div>

<footer style="background-color:#9B1D20; padding: 20px 0; position: absolute; bottom: 0; right: 0; left: 0;" class="text-center">
    <span class="text-white small">@2017. All Rights Reserved</span>
</footer>
@stop