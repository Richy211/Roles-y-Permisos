@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h2>Edit Role</h2> </div>

                <div class="card-body">
                    @include('custom.message')

                        <form action="{{ route('role.update', $role->id )}}" method="POST">
                        @csrf
                        @method('PUT')

                            <div class="container">
                                <h3>Requiere data</h3>

                                <div class="form-group">
                                     <input type="text" class="form-control" id="name" 
                                     name="name" placeholder="name" 
                                     value="{{ old('name', $role->name)}}" 
                                     readonly>
                                 </div>

                                 <div class="form-group">
                                     <input type="text" class="form-control" id="slug"  
                                     name="slug" placeholder="slug" 
                                     value="{{ old('slug', $role->slug)}}" readonly>
                                 </div>
                               
                            </div>

                            <div class="form-group">  
                                    <textarea  readonly class="form-control" id="description" name="description" rows="3"> {{ old('description', $role->description)}}</textarea>
                            </div>
                            <hr>

                            <h3 class="mt-3">Full Acces</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input disabled type="radio" id="fullaccessyes" name="full-access" 
                                class="custom-control-input" value="yes" 
                                @if( $role['full-access']=="yes")
                                    checked
                                @elseif (old('full-access')=="yes")
                                    checked 
                                @endif
                                >

                                <label class="custom-control-label" for="fullaccessyes">yes</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input disabled type="radio" id="fullaccessno" name="full-access" 
                                class="custom-control-input" value="no" 
                                @if( $role['full-access']=="no")
                                    checked
                                @elseif (old('full-access')=="no")
                                    checked 
                                @endif
                                
                                >

                                <label class="custom-control-label" for="fullaccessno">no</label>
                            </div>

                            <hr>
                            <h3 class="mt-3">Permission List</h3>

                            @foreach($permissions as $permission)

                            <div class="custom-control custom-checkbox mb-3">
                                <input  disabled type="checkbox" class="custom-control-input" 
                                id="permission_{{$permission->id}}" 
                                value="{{$permission->id}}"
                                name="permission[]"

                                @if( is_array(old('permission'))  && in_array("$permission->id", old('permission')) )
                                checked

                                @elseif( is_array($permission_role) && in_array("$permission->id", $permission_role))
                                checked
                                
                                @endif

                                >
                                <label class="custom-control-label" 
                                for="permission_{{$permission->id}}">
                                {{ $permission->id }}
                                -
                                {{ $permission->name }}
                                <em>( {{ $permission->description }} )</em>
                                </label>
                            </div>
                            
                            @endforeach
                                <hr>

                                <a class="btn btn-success" href="{{route('role.edit' ,$role->id)}}">Edit</a>
                                <a class="btn btn-danger" href="{{route('role.index')}}">Back</a>
                              
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
