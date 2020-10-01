<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersPermissionsController extends Controller
{
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->permissions()->detach();
        if( $request->filled('permissions'))
        {
            $user->givePermissionTo($request->permissions);
        }
        return back()->withFlash('Permisos actualizados.');
    }

}
