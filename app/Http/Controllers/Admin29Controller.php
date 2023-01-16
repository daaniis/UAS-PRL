<?php

namespace App\Http\Controllers;

use App\Models\Agama29;
use App\Models\User;
use Illuminate\Http\Request;

class Admin29Controller extends Controller
{

    public function dashboardPage29()
    {
        $user = User::where('role', 'user')->get();
        $agama = Agama29::all();

        return view('dashboard', ['data' => $user, 'agama' => $agama]);
    }

    public function detailPage29(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);

        if (!$user) {
            return redirect('/dashboard29')->with('error', 'User tidak ditemukan');
        }

        $agama = Agama29::all();

        $detail = $user->detail;
        $data = array_merge($user->toArray(), $detail->toArray());

        return view('profile', ['user' => $data, 'agama' => $agama, 'is_preview' => true]);
    }

    public function updateUserStatus29(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);

        if (!$user) {
            return redirect('/dashboard29')->with('error', 'User tidak ditemukan');
        }

        $updateStatus = $user->update([
            'is_active' => $user->is_active == 1 ? 0 : 1
        ]);

        if ($updateStatus) {
            return redirect('/dashboard29')->with('success', 'Status berhasil diubah');
        } else {
            return redirect('/dashboard29')->with('error', 'Status gagal diubah');
        }
    }

    public function deleteUser29(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);

        if (!$user) {
            return redirect('/dashboard29')->with('error', 'User tidak ditemukan');
        }

        $deleteUser = $user->delete();

        if ($deleteUser) {
            return redirect('/dashboard29')->with('success', 'User berhasil dihapus');
        } else {
            return redirect('/dashboard29')->with('error', 'User gagal dihapus');
        }
    }

    public function agamaPage29()
    {
        $agama = Agama29::all();

        return view('agama', ['all_agama' => $agama]);
    }

    public function createAgama29(Request $request)
    {
        $request->validate([
            'nama_agama' => 'required'
        ]);

        $createAgama = Agama29::create([
            'nama_agama' => $request->nama_agama
        ]);

        if ($createAgama) {
            return redirect('/agama29')->with('success', 'Barang berhasil ditambahkan');
        } else {
            return redirect('/agama29')->with('error', 'Barang gagal ditambahkan');
        }
    }

    public function editAgamaPage29(Request $request)
    {

        $id = $request->id;

        $agama = Agama29::find($id);

        if (!$agama) {
            return back()->with('error', 'Barang tidak ditemukan');
        }

        $all_agama = Agama29::all();

        return view('agama', ['all_agama' => $all_agama, 'agama' => $agama]);
    }


    public function updateUserAgama29(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);

        if (!$user) {
            return redirect('/dashboard29')->with('error', 'User tidak ditemukan');
        }

        $request->validate([
            'agama' => 'required|exists:agama29,id'
        ]);

        $user->detail->id_agama = $request->agama;
        $updateAgama = $user->detail->save();

        if ($updateAgama) {
            return redirect('/dashboard29')->with('success', 'Barang berhasil diubah');
        } else {
            return redirect('/dashboard29')->with('error', 'Barang gagal diubah');
        }
    }


    public function deleteAgama29(Request $request)
    {
        $id = $request->id;
        $agama = Agama29::find($id);

        if (!$agama) {
            return redirect('/agama29')->with('error', 'Barang tidak ditemukan');
        }

        $deleteAgama = $agama->delete();


        if ($deleteAgama) {
            return redirect('/agama29')->with('success', 'Barang berhasil dihapus');
        } else {
            return redirect('/agama29')->with('error', 'Barang gagal dihapus');
        }
    }

    public function updateAgama29(Request $request)
    {
        $id = $request->id;
        $agama = Agama29::find($id);

        if (!$agama) {
            return redirect('/agama29')->with('error', 'Barang tidak ditemukan');
        }

        $request->validate([
            'nama_agama' => 'required'
        ]);

        $updateAgama = $agama->update([
            'nama_agama' => $request->nama_agama
        ]);

        if ($updateAgama) {
            return redirect('/agama29')->with('success', 'Barang berhasil diubah');
        } else {
            return redirect('/agama29')->with('error', 'Barang gagal diubah');
        }
    }

}
