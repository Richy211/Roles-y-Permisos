@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h2>Create Role</h2> </div>

                <div class="card-body">
                    @include('custom.message')

                        <form action="{{ route('role.store')}}" method="POST">
                        @csrf

                            <div class="container">
                                <h3>Requiere data</h3>

                                <div class="form-group">
                                     <input type="text" class="form-control" id="name" 
                                     name="name" placeholder="name" value="{{ old('name')}}">
                                 </div>

                                 <div class="form-group">
                                     <input type="text" class="form-control" id="slug"  
                                     name="slug" placeholder="slug" value="{{ old('slug')}}">
                                 </div>
                               
                            </div>

                            <div class="form-group">  
                                    <textarea class="form-control" id="description" 
                                    name="description" rows="3">
                                    {{ old('description')}}
                                    </textarea>
                            </div>
                            <hr>

                            <h3 class="mt-3">Full Acces</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes" 
                                @if(old('full-access')=="yes")
                                    checked
                                @endif
                                >

                                <label class="custom-control-label" for="fullaccessyes">yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" 
                                @if(old('full-access')=="no")
                                    checked
                                @endif
                                @if(old('full-access')===null)
                                    checked
                                @endif
                                >

                                <label class="custom-control-label" for="fullaccessno">no</label>
                            </div>

                            <hr>
                            <h3 class="mt-3">Permission List</h3>

                            @foreach($permissions as $permission)

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" 
                                id="permission_{{$permission->id}}" 
                                value="{{$permission->id}}"
                                name="permission[]"
                                @if( is_array(old('permission')) 
                                && in_array("$permission->id", old ('permission')) )
                                checked
                                @endif
                                >
                                <label class="custom-control-label" for="permission_{{$permission->id}}">
                                {{ $permission->id }}
                                -
                                {{ $permission->name }}
                                <em>( {{ $permission->description }} )</em>
                                </label>
                            </div>
                            
                            @endforeach
                                <hr>
                                <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
