<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FormatApi;
use App\Models\Agama29;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Agama29Controller extends Controller
{
    public function getAgama29(Request $request)
    {
        $agama = Agama29::all();

        return new FormatApi(true, 'Berhasil mendapatkan data Barang', $agama);
    }

    public function getDetailAgama29(Request $request, $id)
    {
        $agama = Agama29::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Barang tidak ditemukan', null);
        }

        return new FormatApi(true, 'Berhasil mendapatkan data Barang', $agama);
    }

    public function postAgama29(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_agama' => 'required',
        ]);

        if ($validator->fails()) {
            return new FormatApi(false, 'Validasi gagal', $validator->errors()->all());
        }

        $createUser = Agama29::create([
            'nama_agama' => $request->nama_agama,
        ]);

        if ($createUser) {
            return new FormatApi(true, 'Berhasil menambahkan data Barang', $createUser);
        } else {
            return new FormatApi(false, 'Gagal menambahkan data Barang', null);
        }
    }

    public function putAgama29(Request $request, $id)
    {
        $agama = Agama29::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Barang tidak ditemukan', null);
        }

        $validator = Validator::make($request->all(), [
            'nama_agama' => 'required',
        ]);

        if ($validator->fails()) {
            return new FormatApi(false, 'Validasi gagal', $validator->errors()->all());
        }

        $agama->update([
            'nama_agama' => $request->nama_agama,
        ]);

        return new FormatApi(true, 'Berhasil mengubah data Barang', null);
    }

    public function deleteAgama29(Request $request, $id)
    {
        $agama = Agama29::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Barang tidak ditemukan', null);
        }

        $agama->delete();

        return new FormatApi(true, 'Berhasil menghapus data Barang', null);
    }
}
