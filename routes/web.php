<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\RicardoPermission\Models\Role;
use App\RicardoPermission\Models\Permission;
use Illuminate\Support\Facades\Gate;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
 Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');  



Route::get('/test', function() {

  
    $user = User::find(3);

    Gate::authorize('haveaccess', 'role.show');
     return $user; 
});

Route::resource('/role', 'RoleController')->names('role'); 

Route::resource('/user', 'UserController', ['except'=>['create','store']])->names('user');

/* Route::resource('/user', 'UserController', ['except'=>['create','store']])->names('user'); */



/* 
Route::get('/test', function(){ */
/*  return 'Hola'; */

  /*  return Role::create([
        'name' => 'Admin',
        'slug' => 'admin'
        'description' => 'Administrator',
        'full-access' => 'yes'
    ]); */

   /*  return Role::create([
        'name' => 'Guest',
        'slug' => 'guest',
        'description' => 'guest',
        'full-access' => 'no'
    ]); */


 /*    return Role::create([
        'name' => 'Test',
        'slug' => 'test',
        'description' => 'test',
        'full-access' => 'no'
    ]); */

  /*   $user = User::find(1); */

    //$user->roles()->attach([1,2,3]);
    //$user->roles()->detach([3]);
/*     $user->roles()->sync([1,2]);

    return $user->roles;
 */
/* return Permission::create([
    'name' => 'List product',
    'slug' => 'product.index',
    'description' => 'A user can list permissions',

]); */

 /*    $role = Role::find(2);

     $role->permissions()->sync([1,2]); 

    return $role->permissions;



}); */