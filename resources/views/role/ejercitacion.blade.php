<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RicardoPermission\Models\Role;
use App\RicardoPermission\Models\Permission;

class RoleController extends Controllers
{
    public function index()
    {
        $roles = Role::orderBy('id','Desc')->paginate(2);

        return view('role.index', compact('roles'));
    }

  public function create()
  {
      $permissions = Permission::get();

      return view('role.create', compact('permissions'));
  }

  public function store(Request $request)
  {
      $request->validate([
          'name'        => 'required|max:50|unique:role,name',
          'slug'        => 'required|max|unique:roless,slug',
          'full-access' => 'required|in:yes,no'
      ]);

      $role = Role::create($request->all());

      if($request->get('permission')){
          $role->permissions()->sync($request->get('permission'));
      }
      return redirect()->route('role.index')
      ->with('status_success','Role saved successfully');

      return redirect()->route('role.index')
      ->with('status_success','Role saved successfullY');
  }


}


