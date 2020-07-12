<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(Request $request)
    {

        $records = Client::where(function ($query) use($request){
            if ($request->input('keyword'))
            {
                $query->where(function ($query) use($request){
                    $query->where('name','like','%'.$request->keyword.'%');
                    $query->orWhere('phone','like','%'.$request->keyword.'%');
                    $query->orWhere('email','like','%'.$request->keyword.'%');
                    $query->orWhereHas('city',function ($city) use($request){
                        $city->where('name','like','%'.$request->keyword.'%');
                    });
                });
            }

            if ($request->input('blood_type_id'))
            {
                $query->where('blood_type_id',$request->blood_type_id);
            }
        })->paginate(20);

        return view('dashboard.clients.index',compact('records'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $record = Client::find($id);
        if (!$record) {
            return response()->json([
                    'status' => 0,
                    'message' => 'تعذر الحصول على البيانات',
                ]);
        }


        if ($record->requests()->count() || $record->contacts()->count()) {
            return response()->json([
                    'status' => 0,
                    'message' => 'يوجد عمليات مرتبطة بهذا العميل',
                ]);
        }

        $record->delete();
        return response()->json([
            'status' => 1,
            'message' => 'تم الحذف بنجاح',
            'id' => $id,
        ]);
    }

    public function activate($id)
    {
        $client = Client::findOrFail($id);
        $client->update(['is_active' => 1]);
        flash()->success('تم التفعيل');
        return back();
    }

    public function deactivate($id)
    {
        $client = Client::findOrFail($id);
        $client->update(['is_active' => 0]);
        flash()->success('تم إلغاء التفعيل');
        return back();
    }

    public function toggleActivation($id)
    {
        $client = Client::findOrFail($id);
        $msg = 'تم التفعيل';
        if ($client->is_active)
        {
            $msg = 'تم إلغاء التفعيل';
            $client->update(['is_active' => 0]);
        }else{
            $client->update(['is_active' => 1]);
        }
        //flash()->success('تم');
        return back();
    }
}
