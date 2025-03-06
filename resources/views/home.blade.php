@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @includeWhen(auth()->user()->can('access dashboard dosen'),'dashboard.dosen')
                    @includeWhen(auth()->user()->can('access dashboard prodi'),'dashboard.prodi')
                    @includeWhen(auth()->user()->can('access dashboard admin'),'dashboard.admin')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
