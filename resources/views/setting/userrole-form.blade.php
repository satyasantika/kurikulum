@extends('layouts.setting-form')

@push('header')
    Edit Roles untuk {{ $user->name }}
    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm float-end">kembali</a>
@endpush

@push('body')
<form id="formAction" action="{{ route('userroles.update',$user->id) }}" method="post">
    @csrf
    @if ($user->id)
        @method('PUT')
    @endif
    <div class="row mb-2">
        @foreach ($roles as $role)
            <div class="col-md-3">
                <div class="input-group mb-2">
                    <div class="input-group-text light">
                        <input
                            type="checkbox"
                            name="roles[]"
                            value="{{ $role->name }}"
                            class="form-check-input mt-0"
                            @checked(in_array($role->name, $userRoles))
                        >
                    </div>
                    <input type="text" class="form-control" value="{{ $role->name }}" aria-label="Text input with checkbox">
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm">Close</a>
        </div>
    </div>
</form>
@endpush
