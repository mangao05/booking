<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUs;
class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['filter'])){
             if($_GET['filter'] == null || $_GET['filter'] == 'all'  ){
                return ContactUs::latest()->paginate(5);
             }else{
                return ContactUs::where('status',$_GET['filter'])->latest()->paginate(5);     
             }
               
        }else{
            return ContactUs::latest()->paginate(5);
        }
           
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
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|string|max:255|email',
            'contact_number' => 'required',
            'message'=> 'required'
            
        ]);

        $contact =  ContactUs::create($request->all());

        // if($contact){
        //    return redirect()->back();  
        // }

    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ContactUs::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$status)
    {
        if($status == '0'){
            $request['status'] = '1';
        }

        return ContactUs::find($id)->update($request->only(['status']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ContactUs::find($id)->delete();
        return redirect()->back();  
    }

    public function filterContact($val){
        return ContactUs::where('status',$val)->latest()->paginate(5);
    }
    public function contactAllCount(){
        return ContactUs::all();
    }
}
