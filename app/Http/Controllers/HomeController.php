<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\inquiry;
use App\Models\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    
    

    public function index()
    {
        return view('home');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    public function adminAgent()
    {
        $user = new User;
        $agent = $user->getAllAgents(); 
        return view('adminlayout.agents',compact('agent'));
    }

    public function adminuser()
    {
        $user = new User;
        $user_data = $user->getAllUsers(); 
        return view('adminlayout.user_data',compact('user_data'));
    }

    public function updateUserStatus(Request $request)
    {
         $request->validate([
            'userId' => 'required|integer',
            'status' => 'required',
        ]);
         try {
            $user = User::findOrFail($request->userId);
            $user->update(['is_admin' => $request->status ? 2 : 0]);

           return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }



    public function agent()
    {
        return view ('agent.index');
    }

    public function agent_profile()
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id',$user_id)->first();
        return view('agent.admin_profile',compact('profile'));
    }

    public function update_profile(Request $request)
    {
        $user_id = Auth::user()->id;
        $profile = Profile::updateOrCreate(
            ['user_id' => $user_id],
        [
            'surname'   => $request->surname,
            'contact'   => $request->contact,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'postcode'  => $request->postcode,
            'state'     => $request->state,
            'Area'      => $request->area,
            'education' => $request->education,
            'country'   => $request->country,
        ]
    );

    return redirect()->back();
    }

    public function profile_pic(Request $request)
    {
        $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        $user_id =$request->user_id;
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('profile/profile_pic/'), $imageName);
        $user_profile = Profile::find($user_id);
        if (isset($user_profile)) {
            $user_profile->profile_pic = 'profile/profile_pic/' . $imageName;
        } else{
            return redirect()->back()->with('Error, No Profile For this User Was Found');
        }
        $user_profile->save();
        return redirect()->back()->with('Success', 'Profile Pic Updated Successfully');
    }

    public function send_inquiry()
    {
        return view('inquries.send_inquiry');
    }

    public function inquiry(Request $request)
    {
        
        $user_id = Auth::user()->id;
        $inquiry= new inquiry;
        $inquiry->user_id  = $user_id;
        $inquiry->agent_id = '3';
        $inquiry->name     = $request->name;
        $inquiry->email    = $request->email;
        $inquiry->contact  = $request->contact;
        $inquiry->message  = $request->message;
        if ($request->checkbox=='on') {
            $inquiry->whatsapp_updates='1';
        }else{
            $inquiry->whatsapp_updates='0';
        }
        $inquiry->save();
        return redirect()->back()->with('Success, Inquiry Sent Successfully ! ');
    }


    public function fetchMessages(Request $request)
    {
        $message = new inquiry;
        $agent_id = Auth::user()->id;
        $messages=$message->getMessagesByAgentId($agent_id);
        return response()->json($messages);
    }

    public function update_response_status(Request $request)
    {
        $messageId = $request->input('messageId');
        $newResponseStatus = $request->input('newResponseStatus');
        try{
            $message = inquiry::find($messageId);
            if ($message) {
                $message->update(['response_status' => $newResponseStatus]);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['error' => 'Message not found'], 404);
            }
        }catch(Exception $e){
            return response()->json(['error' => 'Error updating response status'], 500);
        }
    }

}
