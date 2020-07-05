<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class StoreController extends Controller
{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $stores = Store::paginate(10);
        return view('admin.store.index', ['stores' => $stores]);
    }

    public function create()
    {
        $users = User::all(['id', 'name']);
        return view('admin.store.create', ['users' => $users]);
    }

    public function store()
    {
        $data = $this->request->all();
        $user = User::find($data['user']);
        flash('Loja criada com sucesso')->success();
        return $user->store()->create($data);
    }

    public function edit($id)
    {
        $store = Store::find($id);
        return view('admin.store.edit', ['store' => $store]);
    }

    public function update($id)
    {

        $store = Store::find($id);
        $store->update($this->request->all());
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
