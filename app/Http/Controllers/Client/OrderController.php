<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function checkout() {
        return view('theme.shop.checkout');
    }

    public function checkoutPost(Request $request) {
        $orderCode =  Str::upper(
            'ORD'
            .auth()->user()->id
            .'_'
            .Carbon::now()->day
            .Carbon::now()->month
            .Carbon::now()->year
            .'_'
            .time()
        );

        $newOrder = [
            'user_id' => auth()->user()->id,
            'order_code' => $orderCode,
            'total_price' => $request->total_price,
            'delivery_name' => $request->delivery_name,
            'delivery_phone' => $request->delivery_phone,
            'delivery_email' => $request->delivery_email,
            'delivery_address' => $request->delivery_address,
            'note' => empty($request->order_note) ? 'empty' : $request->order_note,
            'status' => config('global.order_status.pending'),
        ];

        $order = Order::create($newOrder);
        foreach($request->items as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);
        }

        $cart = Cart::where('user_id', auth()->user()->id)->first();
        $items = CartItem::where('session_id', $cart->id)->get();
        foreach($items as $item) {
            $item->delete();
        }

        $cart->update([
            'total_price' => 0,
            'status' => false,
        ]);

        return response('Đặt hàng thành công', 200);
    }

    public function delOrder(Request $request, $id) {
        $order = Order::where('id', $id)->first();
        $order->update([
            'status' => $request->status,
        ]);

        return response('Bạn đã hủy đơn hàng thành công', 200);
    }
}
