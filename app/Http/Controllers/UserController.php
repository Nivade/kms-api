<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Paginate 15 users.
      $users = User::paginate(15);

      return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = $request->isMethod('put') ? User::findOrFail($request->user_id) : new User;

      $user->id = $request->input('user_id');
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->code = $request->input('code');
      $user->address = $request->input('address');
      $user->password = $request->input('password');

      if ($user->save()) {
        return new UserResource($user);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get Location
        $user = User::findOrFail($id);

        if ($user->delete()) {
          return new UserResource($location);
        }
    }
}
