<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Store;
use App\Traits\UploadTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create', 'store']);
    }

    public function index()
    {
        $store = auth()->user()->store;
        return view('admin.store.index', ['store' => $store]);
    }

    public function create()
    {
        $users = User::all(['id', 'name']);
        return view('admin.store.create', ['users' => $users]);
    }

    public function store(StoreRequest $request)
    {

        $data = $request->all();
        $user = auth()->user();

        if($request->has('logo')){
        $data['logo'] = $this->imageUpload($request->file('logo'));
        }


        $user->store()->create($data);

        flash('Loja criada com sucesso')->success();
        return redirect()->route('stores.index');
    }

    public function edit($id)
    {
        $store = Store::find($id);
        return view('admin.store.edit', ['store' => $store]);
    }

    public function update(StoreRequest $request, $id)
    {
        $data = $request->all();
        $store = Store::find($id);

        if($request->has('logo')){
            if (Storage::disk('public')->exists($store->logo)) {
                Storage::delete($store->logo);            
            }
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }

        $store->update($data);
        flash('Loja atualizado com sucesso')->success();
        return redirect()->back();
    }
    public function destroy($id)
    {

        $store = Store::find($id);
        $store->delete();
        flash('Loja deletada com sucesso')->success();
        return redirect()->route('stores.index');
    }
}
