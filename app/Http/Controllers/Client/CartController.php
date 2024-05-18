<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;

class CartController extends Controller
{
    public function showCart() {
        return view('theme.shop.shopping-cart');
    }

    public function addToCart(Request $request, Product $product) {
        $userId = auth()->user()->id;
        $cart = Cart::where('user_id',  $userId)->first();
        
        //check user has cart ?
        if(!$cart) {
            $cart = Cart::create([
                'user_id' => $userId,
                'total_price' => 0,
            ]);
        }
        else {
            $cart->update([
                'status' => true,
            ]);
        }

        //has product in cart?
        $item = CartItem::where(['session_id'=>$cart->id, 'product_id'=>$product->id])->first();
        if($item) {
            $item->update([
                'quantity' => $item->quantity + $request->quantity,
            ]);
        }
        else {
            CartItem::create([
                'session_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        $priceTotal = 0;
        foreach(CartItem::where('session_id', $cart->id)->get() as $item) {
            $productPrice = Product::find($item->product_id)->odd_price;
            $priceTotal = (double)$priceTotal + (double)(($item->quantity) * $productPrice);
        }
        $cart->update([
            'total_price' =>  $priceTotal,
        ]);

        return response('Đã thêm vào giỏ hàng',200);
    }

    public function updateCartItem(Request $request, Product $product) {
        $userId = auth()->user()->id;
        $cart = Cart::where('user_id',  $userId)->first();

        if($request->has('quantity')) {
            $item = CartItem::where(['session_id'=> $cart->id, 'product_id'=>$product->id])->first();
            $item->update([
                'quantity' => $request->quantity,
            ]);

            $priceTotal = 0;
            foreach(CartItem::where('session_id', $cart->id)->get() as $item) {
                $productPrice = Product::find($item->product_id)->odd_price;
                $priceTotal = (double)$priceTotal + (double)(($item->quantity) * $productPrice);
            }
            $cart->update([
                'total_price' =>  $priceTotal,
            ]);

            return response('Đã cập nhật số lượng sản phẩm', 200);
        }
        return response('Có lỗi xảy ra', 419);
    }

    public function removeCartTable(Product $product) {
        $userId = auth()->user()->id;
        $cart = Cart::where('user_id',  $userId)->first();

        $item = CartItem::where(['session_id'=> $cart->id, 'product_id'=>$product->id])->first();
        $item->delete();

        $priceTotal = 0;
        foreach(CartItem::where('session_id', $cart->id)->get() as $item) {
            $productPrice = Product::find($item->product_id)->odd_price;
            $priceTotal = (double)$priceTotal + (double)(($item->quantity) * $productPrice);
        }
        $cart->update([
            'total_price' =>  $priceTotal,
        ]);

        return response('Đã xóa sản phẩm khỏi giỏ hàng', 200);
    }

    public function clearCart() {
        $userId = auth()->user()->id;
        $cart = Cart::where('user_id',  $userId)->first();
        $items = CartItem::where('session_id', $cart->id)->get();
        foreach($items as $item) {
            $item->delete();
        }

        $cart->update([
            'total_price' => 0,
            'status' => false,
        ]);

        return response('Xóa giỏ hàng thành công !', 200);
    }
}
