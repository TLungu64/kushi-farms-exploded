<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize('isAdmin');

        // returns the latest user info and constricts the page to entries
        return User::latest()->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->authorize('isAdmin');

        //validation of selected fields
        $this->validate($request, [
            'firstname' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($request->photo) {

            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('images/profilePics/').$name);

            $request->merge(['photo' => $name]);
        }

        // function creates an array of the fields in the form
        return User::create([
            'firstname'=> $request['firstname'],
            'lastname'=> $request['lastname'],
            'email'=> $request['email'],
            'type'=> $request['type'],
            'bio'=> $request['bio'],
            'photo'=> $request['photo'],
            'organisation'=> $request['organisation'],
            'password'=> Hash::make($request['password']),
        ]);
    }
    
    public function updateProfile(Request $request) {

        $user = auth('api')->user();

        $this->validate($request, [
            'firstname' => 'required|string|max:191',
            'lastname' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|string|min:6',
        ]);

        $currentPhoto = $user->photo;
            
        if($request->photo != $currentPhoto) {
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('images/profilePics/').$name);

            $request->merge(['photo' => $name]);

            $userPhoto = public_path('images/ProfilePics/').$currentPhoto;

            if(file_exists($userPhoto)) {
                @unlink($userPhoto);
            }
        }

        if(!empty($request->password)) {
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        $user->update($request->all());
    }

    public function profile() {
        return auth('api')->user();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {   

        $this->authorize('isAdmin');

        $user = User::FindOrFail($id);

        $this->validate($request,[
            'firstname' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6',
        ]);

        $user -> update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');

        $user = User::FindOrFail($id);

        // Delete the user

        $user -> delete();

        return ['message' => 'User Deleted'];
    }

    public function search() {

        $this->authorize('isAdmin');

        if ($search = \Request::get('q')) {

            $users = User::where(function($query) use ($search){

                $query->where('firstname','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%");
            })->paginate(20);
        } else {

            $users = User::latest()->paginate(5);
        }

        return $users;
    }
}
