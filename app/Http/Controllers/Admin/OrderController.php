<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:'.config('global.order_permissions.view_orders'))->only('index');
        $this->middleware('permission:'.config('global.order_permissions.update_order'))->only('update');
        // $this->middleware('permission:'.config('global.order_permissions.create_order'))->only('store');
        // $this->middleware('permission:'.config('global.order_permissions.delete_order'))->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginate = 24;
        $orders = Order::orderBy('created_at', 'DESC')->paginate($paginate);
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        if($request->status != $order->status) {
            $order->update([
                'status' => $request->status, 
            ]);

            return redirect()->route('order.edit',$order->id)->with(['msg' => 'Cập nhật trạng thái đơn hàng '.$order->order_code.' thành công !']);
        }
        else {
            return redirect()->route('order.edit',$order->id)->with(['error' => 'Không có thông tin cập nhật !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
