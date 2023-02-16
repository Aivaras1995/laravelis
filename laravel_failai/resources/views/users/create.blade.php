@extends('layouts.admin.main')

@section('title', 'Kuriame vartotoją')
@php
    $user = $user ?? null;
@endphp

@section('content')
    <h1>Creating user</h1>
    <span>Creating</span>
    <form action="{{route('users.store')}}" method="post">
        <input type="text" name="name" placeholder="Name" value="{{old('name') ?? $user?->name}}"><br>
        <input type="text" name="email" placeholder="Email" value="{{old('email') ?? $user?->email}}"><br>        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="password_confirmation" placeholder="Password confirmation"><br>
        @csrf
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Create">
    </form>
@endsection
