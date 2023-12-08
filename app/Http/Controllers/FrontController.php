<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\inquiry;
use App\Models\PropertyGallery;
use Crypt;  
use RealRashid\SweetAlert\Facades\Alert;

class FrontController extends Controller
{

    public function property_buy()
    {
        $products = Product::where('property_for','=', '1')->get();
        return view('front_page.pages.buy',compact('products'));
    }

    public function property_rent()
    {
        $products = Product::where('property_for','=', '2')->get();
        return view('front_page.pages.rent',compact('products'));
    }

     public function contact()
    {
        return view('front_page.pages.contact');
    }

    public function property_inquiry(Request $request,$id)
    {
        if (Auth::user() != null) {
            $pro_id = Crypt::decrypt($id);
            $products = Product::where('id','=',$pro_id)->first();
            return view('front_page.pages.property_inquiry',compact('products'));
        }else{
            Alert::error('Login Required', 'Please Login To Send An Inquiry');
            return redirect()->route('login');
        }
    }

    public function send_pro_spec_inquiry(Request $request)
    {
        try {
            $inquiry= new inquiry;
            $inquiry->user_id     = Auth::user()->id;
            $inquiry->agent_id    = $request->agent_id;
            $inquiry->product_id  = $request->product_id;
            $inquiry->name        = $request->name;
            $inquiry->email       = Auth::user()->email;
            $inquiry->contact     = $request->number;
            $inquiry->message     = $request->message;
            $inquiry->save();
            Alert::success('Inquiry Sent', 'Your Inquiry Is Being Sent Successfully');
            return redirect()->back();   
        } catch (Exception $e) {
              Alert::error('Error' , ' '.$e);
            return redirect()->back();
        }
    }

    public function details(Request $request,$id)
    {
        $property_id = Crypt::decrypt($id);
        $products = Product::where('id','=',$property_id)->first();
        $property_gallery = PropertyGallery::where('product_id','=',$property_id)->get();
        return view('front_page.pages.details',compact('products','property_gallery'));
    }

}