@push('title')
    Dashboard ADMIN
@endpush
<h3>Selamat datang, {{ auth()->user()->name }}</h3>
<div class="row">
    <div class="col-auto">
        <div class="card">
            <div class="card-header">Manajemen Kurikulum</div>
            <div class="card-body">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">user</a>
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">role</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-primary">permission</a>
                <br>
                <hr>
            </div>
        </div>
    </div>
</div>
