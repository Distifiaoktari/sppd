<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
       $this->User = new User();  
    }

    public function index()
    {
        $data = [
            'users' => $this->User->allData(),

        ];
        return view('user/index', $data);
    }
    public function add()
    {
        $karyawan = Karyawan::all();
        return view ('user/add_user', compact('karyawan'));
    }

    public function insert(Request $request)
    {
        $request->validate
        ([
            'karyawan_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_user' => 'required',
        ],[
            'karyawan_id.required' => 'karyawan harus diisi!',
            'email.required' => 'email harus diisi!',
            'password.required' => 'password harus diisi!',
            'role_user.required' => 'role user harus diisi!',
        ]);

        $data = [
            'karyawan_id' => request()->karyawan_id,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            'role_user' => request()->role_user,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $this->User->addData($data);
        Alert::success('Berhasil!', 'Data user berhasil disimpan!');
        return redirect()->route('user');

    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        Alert::success('Berhasil!', 'Data user berhasil dihapus!');
        return redirect('user');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::all();
        $user = DB::table('users')->find($id);
        return view('user/edit_user',compact('karyawan') , ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::table('karyawan')
        //     ->updateOrInsert(
        //         ['nama_karyawan' => $request->nama_karyawan,
        //          'alamat' => $request->alamat,
        //          'no_hp' => $request->no_hp]
        //     );

        $affected = DB::table('users')
              ->where('id', $id)
              ->update(['karyawan_id' => $request->karyawan_id,
                        'email' => $request->email,
                        'password' => $request->password,
                        'role_user' => $request->role_user
                        ]);

            Alert::success('Berhasil!', 'Data user berhasil diupdate!');
            return redirect('/user');
    }

}
