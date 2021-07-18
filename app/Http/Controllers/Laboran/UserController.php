<?php

namespace App\Http\Controllers\Laboran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  private $user;

  public function __construct()
  {
    $this->user = new User;
  }
  
  public function index()
  {
    $user = $this->user->all();
    return view('laboran/user', ['user' => $user]);
  }
  
  public function create()
  {
    return view('admin/tambahUser');
  }
  
  public function store(Request $request)
  {
    // Validate the request...

    $this->user->no_induk = $request->no_induk;
    $this->user->nama     = $request->nama;
    $this->user->username = $request->username;
    $this->user->password = Hash::make($request->password);
    $this->user->jabatan  = $request->jabatan;
    $this->user->no_telp  = $request->no_telp;
    $this->user->role     = $request->role;
    $this->user->alamat   = $request->alamat;

    $this->user->save();

    return redirect('/admin/manajemen_user')->with('status', 'Berhasil tambah user.');
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
    
    public function edit($id)
    {
      $user = $this->user->find($id);
      return view('admin/editUser', $user);
    }
    
    public function update(Request $request, $id)
    {
      $user_baru = $this->user->find($id);

      $user_baru->no_induk = $request->no_induk;
      $user_baru->nama     = $request->nama;
      $user_baru->username = $request->username;
      if ($request->password) {
        $user_baru->password = Hash::make($request->password);
      }
      $user_baru->jabatan  = $request->jabatan;
      $user_baru->no_telp  = $request->no_telp;
      $user_baru->role     = $request->role;
      $user_baru->alamat   = $request->alamat;

      $user_baru->save();

      return redirect('/admin/manajemen_user')->with('status', 'Berhasil edit user.');
    }
    
  public function destroy($id)
  {
    $user = $this->user->find($id);
    $user->delete();
    return back()->with('status', 'Berhasil hapus user.');
  }
}
