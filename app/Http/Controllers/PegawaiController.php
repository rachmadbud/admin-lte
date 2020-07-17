<?php

namespace App\Http\Controllers;

use App\User;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Worker::all();
        // dd($data);
        return view ('index', compact('data'));
    }

    public function dashboard()
    {
        return view ('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = new Worker;

        $foto->posisi = $request->input('posisi');
        $foto->nama = $request->input('nama');
        $foto->alamat = $request->input('alamat');
        $foto->notelpon = $request->input('notelpon');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img', $filename);
            $foto->foto = $filename;
        }else {
            return $request;
            $foto->image;
        }

        $foto->save();
            
        Alert::success('Success', 'Data Berhasil Di Input');
        return redirect('/karyawan')->with('status','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $datas)
    {
        return view ('crud.profile', compact('datas'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $datas)
    {
        return view ('crud.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $datas)
    {
        Worker::where('id', $datas->id)
            ->update([
                'posisi' => $request->posisi,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'notelpon' => $request->notelpon
            ]);

        Alert::success('Success', 'Data Berhasil Di Edit');
        return redirect('/karyawan')->with('status','Data berhasil Diedit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $datas)
    {
        Worker::destroy($datas->id);
        Alert::success('Success Title', 'Data Berhasil di Hapus');
        return redirect('/karyawan');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $title = $_GET['keyword'];

        $data = Worker::where([ 
            ['nama', 'LIKE', '%' . $title . '%'],
        ])->get();

            // mengirim data pegawai ke view index
        return view('index', compact('data'));
    }
}
