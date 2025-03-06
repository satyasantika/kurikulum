@extends('layouts.setting-form')

@push('header')
    {{ $user->id ? 'Edit' : 'Tambah' }} {{ ucFirst(request()->segment(2)) }}
    @if ($user->id)
        <form id="delete-form" action="{{ route('users.destroy',$user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm float-end" onclick="return confirm('Yakin akan menghapus {{ $user->name }}?');">
                {{ __('delete') }}
            </button>
        </form>
    @endif
@endpush

@push('body')

<form id="formAction" action="{{ $user->id ? route('users.update',$user->id) : route('users.store') }}" method="post">
    @csrf
    @if ($user->id)
        @method('PUT')
    @endif
    <div class="card-body">
        {{-- Nama Lengkap --}}
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">Nama Lengkap</label>
            <div class="col-md-8">
                <input type="text" placeholder="Nama Lengkap (bergelar - bila ada)" value="{{ $user->name }}" name="name" class="form-control" id="name" required autofocus>
            </div>
        </div>
        {{-- Username --}}
        <div class="row mb-3">
            <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>
            <div class="col-md-8">
                <input type="text" placeholder="username" value="{{ $user->username }}" name="username" class="form-control" id="username" required>
            </div>
        </div>
        {{-- Email --}}
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">Alamat Email</label>
            <div class="col-md-8">
                <input type="email" placeholder="email" value="{{ $user->email }}" name="email" class="form-control" id="email" required>
            </div>
        </div>
        {{-- Password --}}
        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
            <div class="col-md-8">
                @if ($user->id)
                    {{-- TODO - Reset Password --}}
                    <a class="btn btn-warning btn-sm" href="#" onclick="event.preventDefault(); if (confirm('yakin direset?')){ document.getElementById('formReset').submit(); }">
                        {{ __('Reset') }}
                    </a>

                    <input type="hidden" value="{{ $user->password }}" name="password" class="form-control" id="password">
                @else
                    <input type="password" placeholder="password" value="{{ $user->password }}" name="password" class="form-control" id="password" required>
                @endif
            </div>
        </div>
        {{-- Role --}}
        <div class="row mb-3">
            <label for="role" class="col-md-4 col-form-label text-md-end">Tetapkan Role</label>
            <div class="col-md-8">
                <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required @disabled($user->id)>
                    @if ($user->id)
                    <option value="">{{ $user->getRoleNames()->implode(', ') }}</option>
                    @else
                    <option value="">-- Tanpa Role --</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role }}">{{ $role }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        {{-- NIDN --}}
        <div class="row mb-3">
            <label for="nidn" class="col-md-4 col-form-label text-md-end">NIDN</label>
            <div class="col-md-8">
                <input type="text" placeholder="" value="{{ $user->nidn }}" name="nidn" class="form-control" id="nidn" required autofocus>
            </div>
        </div>
        {{-- NIP --}}
        <div class="row mb-3">
            <label for="nip" class="col-md-4 col-form-label text-md-end">NIP</label>
            <div class="col-md-8">
                <input type="text" placeholder="" value="{{ $user->nip }}" name="nip" class="form-control" id="nip" required autofocus>
            </div>
        </div>
        {{-- Phone --}}
        <div class="row mb-3">
            <label for="phone" class="col-md-4 col-form-label text-md-end">no. WA aktif</label>
            <div class="col-md-8">
                <input type="text" placeholder="phone" value="{{ $user->phone }}" name="phone" class="form-control" id="phone">
            </div>
        </div>
        {{-- submit Button --}}
        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm">Close</a>
            </div>
        </div>
    </div>
</form>

@if ($user->id)
<form id="formReset" action="{{ route('mypassword.reset',$user->id) }}" method="POST" class="d-none">
    @csrf
</form>
@endif
@endpush
