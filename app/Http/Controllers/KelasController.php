<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = DB::table('t_kelas')->get();
        return view('index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string',
            'jurusan' => 'required|string',
            'lokasi_ruangan' => 'required|string',
            'nama_wali_kelas' => 'required|string',
        ]);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_kelas')->insert($input);

        if ($status) {
            return redirect('/kelas')->with('success', 'Data Kelas Berhasil Ditambahkan');
        } else {
            return redirect('/kelas/create')->with('error', 'Data Kelas Gagal Ditambahkan');
        }
    }

    public function edit($id)
    {
        $kelas = DB::table('t_kelas')->find($id);
        return view('kelas.form', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string',
            'jurusan' => 'required|string',
            'lokasi_ruangan' => 'required|string',
            'nama_wali_kelas' => 'required|string',
        ]);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);

        $status = DB::table('t_kelas')->where('id', $id)->update($input);

        if ($status) {
            return redirect('/kelas')->with('success', 'Data Kelas Berhasil Diubah');
        } else {
            return redirect('/kelas/edit/'.$id)->with('error', 'Data Kelas Gagal Diubah');
        }
    }

    public function destroy($id)
    {
        $status = DB::table('t_kelas')->where('id', $id)->delete();

        if ($status) {
            return redirect('/kelas')->with('success', 'Data Kelas Berhasil Dihapus');
        } else {
            return redirect('/kelas')->with('error', 'Data Kelas Gagal Dihapus');
        }
    }
}
