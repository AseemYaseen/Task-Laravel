<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users= User::all();
        return view('Admin.usersTable', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.userCreate');
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
        ]);
    
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->input('password'));
    
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // If an image file is provided, store and save it
            $photoName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/image', $photoName);
            $newUser->image = $photoName;
        }
    
        $newUser->save();
    
        return redirect()->route('users.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
       

       $UserEdit = User::findorFail($id);
     
   
       return view('Admin.userEdit', compact('UserEdit'));

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'in:user,admin',
        ]);
    
        $UserEdit = User::findOrFail($id);
        $UserEdit->name = $request->input('name');
        $UserEdit->email = $request->input('email');
    
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $photoName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/image', $photoName);
            $UserEdit->image = $photoName;
        }
    
        if ($request->filled('password')) {
            $UserEdit->password = Hash::make($request->input('password'));
        }
    
        $UserEdit->is_admin = ($request->input('role') === 'admin') ? 1 : 0;
    
        $UserEdit->save();
    
        return redirect()->route('users.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->is_admin) {
            $user->delete();
        }else{
             User::destroy($id);
        }
       
        return redirect()->route('users.index');


        // Or i can make a soft delete 

    }
    
}
