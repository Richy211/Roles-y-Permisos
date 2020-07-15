@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8"></div>
    <div class="card">
        <div class="card-header"><h2>List of users</h2></div>

        <div class="card-body"></div>
        
        @include('custom.message')
        
        <table>
            <theade>
                <tr>
                    <td>#</td>
                    <td>name</td>
                    <td>email</td>
                    <td>Role</td>
                    <td></td>
                </tr>
            </theade>
            <tbody>
                @foreach($users as $user)
                <tr>
                <th> {{ $user->id }}</th>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email }}</td>
                <td> 
                    @isset( $user->roles[0]->name)
                        {{ $user->roles[0]->name }}
                    @endisset

                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links()}}
       

    </div>
    </div>
</div>
@endsection