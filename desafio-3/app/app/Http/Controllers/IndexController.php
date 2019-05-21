<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\Usuario::all();
        return view('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('add');
    }

    public function storeUsers()
    {
        $user = new Usuario();

        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->added_on = request('add_on');

        $user->save();

        return redirect('/index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toEdit($id)
    {
        $user = Usuario::find($id);
        return view('edit', compact('user'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeEdit($id)
    {
        $user = Usuario::find($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->added_on = request('add_on');

        $user->save();
        return redirect('/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Usuario::find($id);
        $user->delete();

        return redirect('/index');
    }
}
