<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
// use App\Models\Barang;
// use App\Models\Pemasok;
use Illuminate\Database\QueryException;
use Mockery\Expectation;
use PDOException;
class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        try {
            //  $data['pembelian'] = Pembelian::orderBy('created_at', 'DESC')->get();
            $lastId = Pembelian::select('kode_masuk')->orderBy('created_at', 'desc')->first();
            $data['kode'] = ($lastId == null ? 'P00000001' : sprintf('P%08d', substr($lastId->kode_masuk, 1) + 1));
            // $data['pemasok'] = Pemasok::get();
            // $data['barang'] = Barang::get();
        } catch (QueryException | Expectation | PDOException $error) {
            // $this->failResponse($error->getMessage(), $error->getCode());
            return redirect()->back()->withErrors(['message' => 'Data anda error saat proses']);
        }
        return view('pembelian.index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembelianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}

