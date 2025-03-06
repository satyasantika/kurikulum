@extends('layouts.setting-form')

@push('header')
    Edit Permission untuk {{ $user->name }}
    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm float-end">kembali</a>
@endpush

@push('body')
<form id="formAction" action="{{ route('userpermissions.update',$user->id) }}" method="post">
    @csrf
    @if ($user->id)
        @method('PUT')
    @endif

    {{-- cek kecocokan setiap permission yang langsung dari user tanpa melalui Role --}}
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>
                            <input
                                type="checkbox"
                                name="permissions[]"
                                value="{{ $permission->name }}"
                                id="{{ $permission->id }}"
                                {{-- @disabled(in_array($permission->name, $via_roles)) --}}
                                @checked(in_array($permission->name, $all_permission))
                            >
                            <label for="{{ $permission->id }}">{{ $permission->name }}</label>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm">Close</a>
        </div>
    </div>
</form>
@endpush
