@extends('layouts.admin.main')

@section('title', __('People list'))

@section('content')
    <h1>{{__('People list')}}</h1>
    <a href="{{route('person.create')}}" class="waves-effect waves-light btn">{{__('Add new person')}}</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>{{__('Name')}}</th>
            <th>{{__('Surname')}}</th>
            <th>{{__('Personal_code')}}</th>
            <th>{{__('Email')}}</th>
            <th>{{__('Phone number')}}</th>
            <th>{{__('User')}}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($persons as $person)
            <tr>
                <td>{{$person->id}}</td>
                <td>{{$person->name}}</td>
                <td>{{$person->surname}}</td>
                <td>{{$person->personal_code}}</td>
                <td>{{$person->email}}</td>
                <td>{{$person->phone}}</td>
                <td>{{$person->user->name}}</td>
                <td>
                    <a href="{{route('person.edit', $person->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('person.destroy', $person->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
