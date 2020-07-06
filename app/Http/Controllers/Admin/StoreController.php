<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Store;
use App\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{

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
        $this->middleware(['UserHasStore']);
        $users = User::all(['id', 'name']);
        return view('admin.store.create', ['users' => $users]);
    }

    public function store(StoreRequest $request)
    {
        $data = $this->request->all();
        $user = auth()->user();
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

        $store = Store::find($id);
        $store->update($request->all());
        flash('Loja atualizado com sucesso')->success();
        return redirect()->route('stores.index');
    }
    public function destroy($id)
    {

        $store = Store::find($id);
        $store->delete();
        flash('Loja deletada com sucesso')->success();
        return redirect()->route('stores.index');
    }
}
