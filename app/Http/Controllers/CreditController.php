<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Credit;
use App\Models\User;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credit = Credit::all();
        return view('credit.index', compact('credit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('credit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createcredit(Request $request)
    {
        $credit = credit::create([
            'user_id' => Auth::user()->id,
            'credit_type' => $request->credit_type,
            'name' => $request->name,
            'status' => $request->status,
            'total_credit' => $request->total_credit,
            'total_transaction' => $request->total_transaction,
            'tenor' => date('Y-m-d H:i:s', strtotime($request->tenor)),
            'item' => $request->item,
            'attribute' => $request->attribute,
        ]);

        return redirect()->route('credit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $credit=credit::find($id);
        return view('credit.edit',compact('credit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editcredit(Request $request, $id)
    {
        Credit::where('id',$id)->update([
            'status' => $request->status,
        ]);

        return redirect()->route('credit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $credit= Credit::where('id',$id);
        $credit->delete();
        return back();
    }
}
