<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PropertyGallery;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Crypt;
class ProductController extends Controller
{
    public function product()
    {
        $products = Product::get();
        
        return view('agent.allproducts',compact('products'));

    }

    public function add_product()
    {
        return view('agent.addproducts');
    }

    public function add_new_product(Request $request)
    {
        $request->validate([
                'product_name'=> 'required',
                'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'price'       => 'required',
                'discription' => 'required|string',
                'area'        => 'required',
                'bathrooms'   => 'required',
                'bedrooms'    => 'required',
            ]);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('product_images/'), $imageName);
        $user_id = Auth::user()->id;

            $product = Product::create([
                'product_name'          =>  $request->product_name,
                'agent_id'              =>  $user_id,
                'product_price'         =>  $request->price,
                'product_discription'   =>  $request->discription,
                'area'                  =>  $request->area,
                'no_of_bathrooms'       =>  $request->bathrooms,
                'no_of_bedrooms'        =>  $request->bedrooms,
                'product_image'         =>  'product_images/' .$imageName,
                'property_for'          =>  $request->property,
            ]);
            Alert::success('Property Listed', 'Your Property Is Now Being Listed In The Market');
            return redirect()->back()->with('success','Product added Successfully !');
    }
   public function property_buy()
    {
        return view('front_page.pages.buy');
    }

    public function gallery(Request $request,$id)
    {
        $property_id = Crypt::decrypt($id)['id'];
        $property = Product::where('id','=',$property_id)->first();
        $gallery = PropertyGallery::where('product_id', '=',$property_id)->get();
        // dd($gallery);
        return view ('agent.gallery',compact('property','gallery')); 
        
    }

    public function property_gallery_update(Request $request, $id)
    {
        try {
                $property_id = Crypt::decrypt($id)['id'];

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $imageName = time() . '.'.rand(). '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('property_gallery/'), $imageName);
                        try {
                            PropertyGallery::create([
                                'product_id' => $property_id,
                                'image' =>'property_gallery/'. $imageName,
                            ]);
                        } catch (\Exception $e) {
                            \Log::error('Error during database insertion: ' . $e->getMessage());
                            
                        }
                    }
                }

                Alert::success('Gallery Updated', 'Your Property Gallery Is Being Updated Successfully');
                return redirect()->back();
            } catch (\Exception $e) {
                \Log::error('General error: ' . $e->getMessage());
            }   

    }

    public function delete_image(Request $request)
    {
        $id = $request->id;
        $image = PropertyGallery::where('id','=',$id)->first();
        if ($image) {
            $image->delete();
            Alert::success('200' ,'Image Is Being Deleted Successfully!');
            return response()->json();
        } else {
            return response()->json();
            Alert::error('404', 'Image Not Found');
        }
        
    }

    public function test()
    {
        return view('test');
    }
}
