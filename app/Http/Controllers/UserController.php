<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
        ]);

        Alert::toast('<p style="color: white; margin-top: 10px;">' . $user->name . ' berhasil disimpan</p>', 'success')
            ->toHtml()
            ->background('#212529')
            ->position($position = 'bottom-right');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.pages.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email,' . $user->id,
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
        ]);

        if ($request->password) {
            $validate = $request->validate([
                'password' => 'required|string|min:8',
                'confirm_password' => 'required|same:password',
            ]);

            $newPassword = bcrypt($request->password);
            $user->update([
                'password' => $newPassword,
            ]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        Alert::toast('<p style="color: white; margin-top: 10px;">' . $user->name . ' berhasil disimpan</p>', 'success')
            ->toHtml()
            ->background('#212529')
            ->position($position = 'bottom-right');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == auth()->user()->id) {
            Alert::warning('Peringatan', 'Saat ini anda masih login ! ');
            return redirect()->route('users.index');
        }

        $user->delete();

        Alert::toast('<p style="color: white; margin-top: 10px;">' . $user->name . ' berhasil di hapus</p>', 'success')
            ->toHtml()
            ->background('#212529')
            ->position($position = 'bottom-right');

        return redirect()->route('users.index');
    }
}
