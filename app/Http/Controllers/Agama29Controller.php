<?php

namespace App\Http\Controllers;

use App\Models\Agama29;
use Illuminate\Http\Request;

class Agama29Controller extends Controller
{
    public function agamaPage29()
    {
        $agama = Agama29::all();

        return view('agama', ['all_agama' => $agama]);
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

    public function createAgama29(Request $request)
    {
        $request->validate([
            'nama_agama' => 'required'
        ]);

        $createAgama = Agama29::create([
            'nama_agama' => $request->nama_agama
        ]);

        if ($createAgama) {
            return back()->with('success', 'Barang berhasil ditambahkan');
        } else {
            return back()->with('error', 'Barang gagal ditambahkan');
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
}
