<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\Peminjaman;
use App\Models\Persetujuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyetujus = User::where('role','persetujuan')->get();
        $persetujuans = Persetujuan::all();
        $drivers = Driver::all();
        $peminjamans = Peminjaman::all();
        return view('notif',compact('peminjamans','penyetujus','drivers','persetujuans'));
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
        Peminjaman::create($request->all());
        return redirect()->back()->with('success','Peminjaman berhasil diajukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $pinjam)
    {
        if($request->has('setuju')){
            $pinjam->update([
                "driver" => $request->driver,
            ]);
            Persetujuan::create([
                "id_peminjaman" => $request->id,
                "level" => 1,
                "tanggal" => now(),
                "status" => "disetujui",
            ]); 
            return redirect('dashboard');
            } else{
            $pinjam->update([
                "status" => $request->tolak,
            ]);
            return redirect('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {

    }

    public function export()
    {
        // $data = Peminjaman::all();
        // return view('dashboard',compact('data'));
    }
}
