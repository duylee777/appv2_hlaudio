<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use App\Models\SettingWeb;
use Illuminate\Http\Request;

class SettingWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $listBestSellers = json_decode(SettingWeb::where('type', 'list_best_seller')->first()->value);
        // $bestSellerProducts = Product::whereIn('code', $listBestSellers)->where('is_active', true)->get();
        // dd($bestSellerProducts); die;
        $products = Product::where(['is_active' => true])->orderBy('name', 'ASC')->get();
        $discountSalesArr = Discount::where('discount_percent','>',  0)->where('is_active', true)->pluck('id')->all();
        $productSales = Product::where(['is_active' => true])->whereIn('discount_id', $discountSalesArr)->orderBy('name', 'ASC')->get();
        $settingWebs = SettingWeb::all();
        return view('admin.setting-web.index', compact('products', 'settingWebs', 'productSales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where(['is_active' => true])->orderBy('name', 'ASC')->get();
        $discountSalesArr = Discount::where('discount_percent','>',  0)->where('is_active', true)->pluck('id')->all();
        $productSales = Product::where(['is_active' => true])->whereIn('discount_id', $discountSalesArr)->orderBy('name', 'ASC')->get();
        return view('admin.setting-web.create', compact('products', 'productSales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request); die;
        if ($request->type == "sale_offer") {
            $arrSaleOffer = array(
                ['code' => $request->nameValue1, 
                'description' => $request->productDes1,
                'timeSale' => $request->dateSale1],
                ['code' => $request->nameValue2, 
                'description' => $request->productDes2,
                'timeSale' => $request->dateSale2]
            );
            $valueSetting = json_encode( $arrSaleOffer);
            // dd(array_column($arrSaleOffer, 'code')); die;
            // dd(date("Y-m-d H:i:s", strtotime($arrSaleOffer[0]['timeSale']))); die;  
        }

        if ($request->type == "best_seller") {
            $valueSetting = json_encode(explode(",",$request->nameValue3));
        }
        
        $newRecordSetting = [
            'name' => $request->name,
            'type' => $request->type,
            'value' => $valueSetting
        ];
        SettingWeb::create($newRecordSetting);
        return response('done');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $type)
    {
        // dd($request); die;
        if ($type == "sale_offer") {
            $arrSaleOffer = array(
                ['code' => $request->nameValue1, 
                'description' => $request->productDes1,
                'timeSale' => $request->dateSale1],
                ['code' => $request->nameValue2, 
                'description' => $request->productDes2,
                'timeSale' => $request->dateSale2]
            );
            $valueSetting = json_encode( $arrSaleOffer);
        }
        if ($type == "best_seller") {
            $valueSetting = json_encode(explode(",",$request->nameValue3));
        }
        $settingRecord = SettingWeb::where('type', $type)->first();
        if ($settingRecord->value == $valueSetting) {
            return redirect()->route('setting-web.index')->with(['msg'=>'Không có gì thay đổi!']); 
        } else {
            $settingRecord->update(['value' => $valueSetting]);
            return redirect()->route('setting-web.index')->with(['msg'=>'Cập nhật thành công!']); 
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
