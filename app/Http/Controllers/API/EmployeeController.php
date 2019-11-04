<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
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
        return User::latest()->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $this->validate($request,[
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            
        ]);
        if(!isset($request->photo)){
            $name = "profile.png";
        }
        if($request->photo){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('img/profile/').$name);
        } 
            $request['name'] = 'user';
            $request['status'] = "Deactivated";
            $request['photo'] = $name;
            $request['password'] = Hash::make("havendwell");
            $user = User::create($request->only(['firstname','lastname','email','password','photo','status','name']));
        
       




        // return $request->all();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
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
        
        $this->validate($request,[
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $currentphoto = User::find($id)->photo;

        if($request->photo == null){
            $request['photo'] = $currentphoto;
        }
        else
        {
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('img/profile/').$name);

            if($currentphoto != "profile.png"){
                $userPhoto = public_path('img/profile/').$currentphoto;
                if(File_exists($userPhoto)){
                    @unlink($userPhoto);
                }
            }
            $request['photo'] = $name;
        }    
        User::findOrFail($id)->update($request->only(['firstname','lastname','email','photo']));  

    }

    public function status($id){
        $status = User::findOrFail($id);

        ($status->status == "Deactivated")?$status->status = "Activated":$status->status = "Deactivated";
        $status->save();        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetchProfile(Request $request){
        return Auth::user();
    }
    public function editProfile(Request $request,$id){
  

    
    
        $this->validate($request,[
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            // 'password'=>($request->get('same:password')),
        ]);


        $currentphoto = User::find($id)->photo;
     
        if($request->photo != $currentphoto){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('img/profile/').$name);

            if($currentphoto != "profile.png"){
                $userPhoto = public_path('img/profile/').$currentphoto;
                if(File_exists($userPhoto)){
                    @unlink($userPhoto);
                }
            }
            $request['photo'] = $name;
        }
        
        if(Hash::check($request->old_password, User::find($id)->password)){
            $request['password'] = Hash::make($request->password);
            User::findOrFail($id)->update($request->only([
                'firstname',
                'lastname',
                'email',
                'photo',
                'password'
                ]));  

                return 'successfully Update';
        }else{
            User::findOrFail($id)->update($request->only(['firstname','lastname','email','photo',]));  
        }
       
    }

 
}
