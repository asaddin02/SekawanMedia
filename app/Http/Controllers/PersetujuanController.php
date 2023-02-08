<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Persetujuan;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function show(Persetujuan $persetujuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Persetujuan $persetujuan)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persetujuan $persetujuan)
    {
        $pinjam = Peminjaman::where('id',$request->id);
        if($request->has('setuju')){
            $persetujuan->update([
                'level' => 2,
                'status' => 'disetujui',
            ]);
            $pinjam->update([
                'status' => 'disetujui',
            ]);
            $persetujuan->delete();
            return redirect('dashboard');
        } else{
            $persetujuan->update([
                'status' => 'ditolak',
            ]);
            $pinjam->update([
                'status' => 'ditolak',
            ]);
            $persetujuan->delete();
            return redirect('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persetujuan $persetujuan)
    {
        //
    }
}
