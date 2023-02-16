@extends('layouts.admin.main')

@php
    $person = $person ?? null;
@endphp
@section('title', $person ? 'Editing person' : 'Create new person')

@section('content')
    <h1>
        @if($person)
            Editing {{$person->name}}
        @else
            Creating new person
        @endif
    </h1>
    <span>
        @if($person)
            Redagavimo forma
        @else
            Sukūrimo forma
        @endif
    </span>

    <form action="{{route('person.store')}}" method="post">

        <input type="text" name="name" placeholder="Name" value="{{old('name') ?? $person?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="surname" placeholder="Surname" value="{{old('surname') ?? $person?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="personal_code" placeholder="Personal Code" value="{{old('personal_code') ?? $person?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="email" placeholder="Email" value="{{old('email') ?? $person?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="phone" placeholder="Phone" value="{{old('phone') ?? $person?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="user_id" placeholder="User ID" value="{{old('user_id') ?? $person?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="address_id" placeholder="Address ID" value="{{old('address_id') ?? $person?->name}}"
               class="@error('name') is-invalid @enderror"><br>
        <input type="submit" class="waves-effect waves-light btn" value="Sukurti naują įrašą">
        @csrf
    </form>
@endsection
