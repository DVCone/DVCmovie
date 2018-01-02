@extends('layout.default')

@section('tittle', 'guest') 

@section('content')

<div class="container">
  <div class="col-4">
    <div class="list-group mt-5" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action list-group-item-danger" id="list-home-list" data-toggle="list" href="{{ route('guest.home') }}" role="tab" aria-controls="home">Home</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="{{ route('guest.list') }}" role="tab" aria-controls="data">List Movie</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#" role="tab" aria-controls="profile">Rent list</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
    </div>
  </div>
</div>

<footer style="background-color:#9B1D20; padding: 20px 0; position: absolute; bottom: 0; right: 0; left: 0;" class="text-center">
    <span class="text-white small">@2017. All Rights Reserved</span>
</footer>
@stop