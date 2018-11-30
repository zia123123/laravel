<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;
use App\Providers\SweetAlertServiceProvider;
use UxWeb\SweetAlert\SessionStore;
use UxWeb\SweetAlert\SweetAlertNotifier;
use Alert;



class ShareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $shares = Share::all();

        return view('home', compact('shares'));
    }

    public function create(){
        return view('shares.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'share_name'=>'required',
            'share_price'=> 'required',
            'share_qty' => 'required',
            'ip' => 'required',
            'url' => 'required'
          ]);
          $share = new Share([
            'share_name' => $request->get('share_name'),
            'share_price'=> $request->get('share_price'),
            'share_qty'=> $request->get('share_qty'),
            'ip' => $request->get('ip'),
            'url' => $request->get('url')

          ]);
          $share->save();
          return redirect('/')->with('success', 'Stock has been added');
    }
    public function show($id)
    {
        $share = Share::find($id);
        return view('shares.show',compact('share'));
    }
    public function edit($id)
    {
        $share = Share::find($id);

        return view('shares.edit', compact('share'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'share_name'=>'required',
            'share_price'=> 'required|integer',
            'share_qty' => 'required|integer',
            'ip' => 'required',
            'url' => 'required',
            'status' => 'required'


          ]);

          $share = Share::find($id);
          $share->share_name = $request->get('share_name');
          $share->share_price = $request->get('share_price');
          $share->share_qty = $request->get('share_qty');
          $share->ip = $request->get('ip');
          $share->url = $request->get('url');
          $share->status = $request->get('status');
          $share->save();
          session()->flash('status', 'Task was successful!');
          return redirect('/shares')->with('success', 'Stock has been updated');
    }
    public function destroy($id)
    {
        $share = Share::find($id);
        $share->delete();

        return redirect('/shares')->with('success', 'Stock has been deleted Successfully');
    }

}
