<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    function index() {
        $siswa = DB::table('t_siswa')->orderBy('nama_lengkap', 'asc')->get();
        return view('learn', compact('siswa'));
    }

    // function index() {
    //     $siswa = DB::table('t_siswa')->where('golongan_darah','A')->get();
    //     return view('learn', compact('siswa'));
    // }

    function create() {
        return view('siswa.form');
    } 

    function store(Request $request){
        $request->validate([
            // 'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jk' => 'required',
            'golongan_darah' => 'required',
        ]);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_siswa')->insert($input);
        if ($status) {
            return redirect('/siswa')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('/siswa/create')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    function edit(Request $request, $id) {
        $siswa = DB::table('t_siswa')->find($id);
        return view('siswa.form', compact('siswa'));
    }

    function update(Request $request, $id) {
        $request->validate([
            // 'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jk' => 'required',
            'golongan_darah' => 'required',
        ]);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $status = DB::table('t_siswa')->where('id', $id)->update($input);
        if ($status) {
            return redirect('/siswa')->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect('/siswa/edit/'.$id)->with('error', 'Data Gagal Diubah');
        }
    }

    function destroy($id) {
        $status = DB::table('t_siswa')->where('id', $id)->delete();
        if ($status) {
            return redirect('/siswa')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('/siswa')->with('error', 'Data Gagal Dihapus');
        }
    }
    // function laravel() {
    //     $pet = "dragon";
    //     $jk = "Male";
    //     return view('vel', compact('pet','jk'));
    //}
}
