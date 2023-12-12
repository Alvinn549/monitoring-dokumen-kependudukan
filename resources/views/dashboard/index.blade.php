@extends('dashboard.layouts.main')
<!-- Section -->
@section('content')
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <p class="text-center">Total Monitoring</p>
                    <p class="text-center display-5 fw-bold">{{$totalKartuMonitoring}}</p>
                </div>

            </div>
        </div>
    </div>
@endsection
