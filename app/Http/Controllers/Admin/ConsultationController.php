<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultations;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $curentDate = date('Y-m-d');
        $newConsultations = Consultations::where('status', config('global.consultation_status.new'))->get();
        if(count($newConsultations) != 0) {
            foreach($newConsultations as $new) {
                if(strtotime($curentDate) != strtotime($new->created_at->format('Y-m-d'))) {
                    $new->update(['status' => config('global.consultation_status.unread')]);
                }
            }
        }

        $page = $request->has('page') ? $request->page : 1;
        $soft = ($request->has('soft') && $request->soft != "all") ? $request->soft : 'all';
       
        $created = $request->has('created') ? $request->created : 'all';
        $keyword = $request->keyword != 'none' ? $request->keyword : '';
        
        $paginate = 12;
       
        if(isset($soft) && $soft == 'new') {
            if($created != 'all') {
                $consultations = Consultations::orderBy('created_at', 'DESC')
                ->where('status', config('global.consultation_status.new'))
                ->whereDate('created_at', '=', date('Y-m-d', strtotime($created)))
                ->where("email", "like", "%$keyword%")
                ->paginate($paginate);
            }
            else {
                $consultations = Consultations::orderBy('created_at', 'DESC')
                ->where('status', config('global.consultation_status.new'))
                ->where("email", "like", "%$keyword%")
                ->paginate($paginate);
            }   
        }
        elseif(isset($soft) && $soft == 'unread') {
            if($created != 'all') {
                $consultations = Consultations::orderBy('created_at', 'DESC')
                ->where('status', config('global.consultation_status.unread'))
                ->whereDate('created_at', '=', date('Y-m-d', strtotime($created)))
                ->where("email", "like", "%$keyword%")
                ->paginate($paginate);
            }
            else {
                $consultations = Consultations::orderBy('created_at', 'DESC')
                ->where('status', config('global.consultation_status.unread'))
                ->where("email", "like", "%$keyword%")
                ->paginate($paginate);
            }  
        }
        elseif(isset($soft) && $soft == 'read') {
            if($created != 'all') {
                $consultations = Consultations::orderBy('created_at', 'DESC')
                ->where('status', config('global.consultation_status.read'))
                ->whereDate('created_at', '=', date('Y-m-d', strtotime($created)))
                ->where("email", "like", "%$keyword%")
                ->paginate($paginate);
            }
            else {
                $consultationts = Consultations::orderBy('created_at', 'DESC')
                ->where('status', config('global.consultation_status.read'))
                ->where("email", "like", "%$keyword%")
                ->paginate($paginate);
            }  
        }
        else {
            if($created != 'all') {
                $consultations = Consultations::orderBy('created_at', 'DESC')
                ->whereDate('created_at', '=', date('Y-m-d', strtotime($created)))
                ->where("email", "like", "%$keyword%")
                ->paginate($paginate);
            }
            else {
                $consultations = Consultations::orderBy('created_at', 'DESC')
                ->where("email", "like", "%$keyword%")
                ->paginate($paginate);
            }
        }
        
        return view('admin.consultation.index', compact('consultations', 'page', 'soft', 'created', 'keyword'));
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
    public function show(Consultations $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultations $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $consultation = Consultations::where('id', $request->id)->first();
        if($request->status == "read") {
            $consultation->update(['status' => config('global.consultation_status.read'), 'updated_at' => date('Y-m-d H:i:s')]);
        }
        return response('Cập nhật thành công !', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $consultation = Consultations::where('id', $id)->first();
        $consultation->delete();
        return response('Xóa thành công !', 200);
    }
}
