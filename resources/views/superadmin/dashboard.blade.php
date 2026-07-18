@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 pt-3">
<div class="page-header">
  <h3 class="page-title">Dashboard</h3>
</div>


<div class="row">
  <div class="col-md-3 grid-margin">
    <div class="card card-statistics">
      <div class="card-body text-center">
        <p style="font-size: 1.15rem; font-weight: 500;"><i class="icon-sm fa fa-user mr-2"></i> Total Question</p>
        <h2 class="display-5 font-weight-bold">{{ $total_questions }}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-3 grid-margin">
    <div class="card card-statistics">
      <div class="card-body text-center">
        <p style="font-size: 1.15rem; font-weight: 500;"><i class="icon-sm fas fa-hourglass-half mr-2"></i> ⁠Total Agnecy</p>
        <h2 class="display-5 font-weight-bold">{{ $total_roles }}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-3 grid-margin">
    <div class="card card-statistics">
      <div class="card-body text-center">
        <p style="font-size: 1.15rem; font-weight: 500;"><i class="icon-sm fas fa-cloud-download-alt mr-2"></i> Total Users</p>
        <h2 class="display-5 font-weight-bold">{{ $total_users }}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-3 grid-margin">
    <div class="card card-statistics">
      <div class="card-body text-center">
        <p style="font-size: 1.15rem; font-weight: 500;"><i class="icon-sm fas fa-check-circle mr-2"></i> Total case</p>
        <h2 class="display-5 font-weight-bold">{{ $total_cases }}</h2>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-3 grid-margin">
    <div class="card card-statistics">
      <div class="card-body text-center">
        <p style="font-size: 1.15rem; font-weight: 500;"> </p>
        <h2 class="display-5 font-weight-bold"></h2>
      </div>
    </div>
  </div>
  <div class="col-md-3 grid-margin">
    <div class="card card-statistics">
      <div class="card-body text-center">
        <p style="font-size: 1.15rem; font-weight: 500;">  </p>
        <h2 class="display-5 font-weight-bold"></h2>
      </div>
    </div>
  </div>
  <div class="col-md-3 grid-margin">
    <div class="card card-statistics">
      <div class="card-body text-center">
        <p style="font-size: 1.15rem; font-weight: 500;">  </p>
        <h2 class="display-5 font-weight-bold"></h2>
      </div>
    </div>
  </div>
  <div class="col-md-3 grid-margin">
    <div class="card card-statistics">
      <div class="card-body text-center">
        <p style="font-size: 1.15rem; font-weight: 500;">  </p>
        <h2 class="display-5 font-weight-bold"></h2>
      </div>
    </div>
  </div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br>
@endsection