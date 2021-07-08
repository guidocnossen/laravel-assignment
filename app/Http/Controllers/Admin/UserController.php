<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Endownment;
use App\Models\FamilyMember; 
use App\Models\UserDevice; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Flash; 
use Hash; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
    	// build up arguments for view
       	$users = User::orderBy('id', 'desc')
            ->when($request->get('s'), function ($query) use ($request) {
                return $query->where('email', 'LIKE', '%' . $request->get('s') . '%')
                    ->orWhere('first_name', 'LIKE', '%' . $request->get('s') . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $request->get('s') . '%')
                    ->orWhere('id', 'LIKE', '%' . $request->get('s') . '%'); 
            })
            ->paginate(100)->appends($request->query());

	    return view('admin.users.index', [
	    	'users' => $users,
	    	'search' => $request->get('s')
		]); 
    }

    public function create(Request $request)
    {
        $user = new User; 

        return view('admin.users.create')->with('user', $user); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'min:8', 'max:11'], 
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = new User;

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone_number'); 
        $user->role = $request->input('role'); 
    
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password')); 
        }
        
        $user->save();

        Flash::success('Gebruiker succesvol opgeslagen.');

        return redirect(route('admin.users.edit', [$user]));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit')->with('user', $user); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255', 
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'phone_number' => ['nullable', 'string', 'min:8', 'max:11'], 
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone_number'); 
        $user->role = $request->input('role'); 
    
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password')); 
        }
        
        $user->save();

        Flash::success('Gebruiker succesvol aangepast!');

        return redirect(route('admin.users.edit', [$user]));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Endownment  $user
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $user)
    {
        $user->delete();

        Flash::success('Gebruiker succesvol verwijderd.');

        return redirect(route('admin.users.index'));
    }
}
