@extends('layouts.admin.main')

@section('title', __('Vartotojų sąrašas'))

@section('content')
    <h1>{{__('users.category_list')}}</h1>
    <a href="{{route('users.create')}}" class="waves-effect waves-light btn">{{__('users.add_new')}}</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>{{__('users.name')}}</th>
            <th>{{__('users.email')}}</th>
            <th>{{__('users.email_verified_at')}}</th>
            <th>{{__('messages.created_at')}}</th>
            <th>{{__('messages.updated_at')}}</th>
            <th>{{__('messages.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->email_verified_at}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
