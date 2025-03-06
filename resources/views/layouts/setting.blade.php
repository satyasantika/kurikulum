@extends('layouts.app')
@push('title')
    {{ isset($title) ? $title : '' }}
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    {{ ucFirst(request()->segment(1)) }} > {{ ucFirst(request()->segment(2)) }}
                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm float-end">kembali</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    @if (isset($add_route))
                        <a href="{{ route($add_route) }}" class="btn btn-success btn-sm">+ {{ ucFirst(request()->segment(2)) }}</a>
                    @endif
                    <div class="table-responsive">
                        {{ $dataTable->table() }}
                    </div>
                    @stack('body')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
