<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
    public function index()
    {
        $wls = collect();
        if(Auth::check()){
            $user_id = Auth()->user();
            $wishlists = Wishlist::where('user_id',$user_id->id)->get();
            foreach ($wishlists as $key => $item) {
                $product = Product::find($item->product_id);
                $temp = [
                    'id'=> $item->id,
                    'product_id' => $item->product_id,
                    'code' => $item->code,
                    'slug' => $product->slug,
                    'image' => $product->image,
                    'name' => $product->name,
                    'odd_price' => $product->odd_price,
                    'updated_at' => $product->updated_at
                ];
                
                $wls->push($temp);
            } 
        }
        return view('theme.wishlist', compact('wls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function checkWishlist($wishlist)
    {
        $isExist = Wishlist::select("*")->where($wishlist);
        return $isExist;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function addToWishlist($product_id)
    {
        if (Auth::check()) {
            $user_id = auth()->user()->id;
            $user_wishlist = [
                'user_id' => $user_id,
                'product_id' => $product_id
            ];
            $check = $this->checkWishlist($user_wishlist);
            if (!$check->exists()) {
                Wishlist::create($user_wishlist);
                return response('Đã thêm vào yêu thích',200);
            }
            else{
                $this->destroy($check->first()->id);
                return response('Đã xóa khỏi yêu thích',200);
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $temp = Wishlist::find($id);
        $temp->delete();
        return response('Đã xóa khỏi yêu thích',200);
    }

    public function destroy_selected(Request $request)
    {
        $user_id = auth()->user()->id;
        $product_ids = $request->product_ids;
        foreach ($product_ids as $product_id) {
            $temp = Wishlist::select("*")->where(['user_id'=> $user_id, 'product_id' => $product_id]);
            $temp -> delete();
        }

        return response('Đã xóa khỏi yêu thích',200);
    }
}
