@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h2>Edit User</h2> </div>

                <div class="card-body">
                    @include('custom.message')

                        <form action="{{ route('user.update', $user->id )}}" method="POST">
                        @csrf
                        @method('PUT')

                            <div class="container">
                                <h3>Requiere data</h3>

                                <div class="form-group">
                                     <input type="text" class="form-control" id="name" 
                                     name="name" placeholder="name" 
                                     value="{{ old('name', $user->name)}}" disabled>
                                     
                                 </div>

                                 <div class="form-group">
                                     <input type="text" class="form-control" id="email"  
                                     name="email" 
                                     value="{{ old('email', $user->email)}}" disabled>
                                     
                                 </div>

                                 <div class="form-group">
                                    <select  disabled name="roles" id="roles" class="form-control">
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}"
                                     @isset($user->roles[0]->name)
                                        @if($role->name == $user->roles[0]->name)
                                        selected
                                        @endif
                                        @endisset
                                    
                                    > {{ $role->name }} </option>
                                    @endforeach
                                    </select>
                                 </div>
                               
                            </div>

                                <input type="submit" class="btn btn-primary" value="Save">
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
