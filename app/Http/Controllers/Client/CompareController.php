<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Product;

class CompareController extends Controller
{
    public function storeSession(Request $request){
        $ses = $request->products;
        session()->put('sess',[]);
        session()->push('sess',$ses);
        $pro = session('sess');
        return response('hihi',200);
    }

    public function showCompare(){
        $pro = session('sess');
        if ($pro == null) {
            $compare_list = null;
            return view('theme.compare',compact('compare_list'));
        }
        $list_id = [];
        foreach ($pro[0] as $key => $product) {
            array_push($list_id, $product['id']);
        }
        $compare_list = Product::whereIn('id',$list_id)->get();

        return view('theme.compare',compact('compare_list'));
    }
}
