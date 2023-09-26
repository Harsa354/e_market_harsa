<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;
use Exception;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;
use PDOException;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['pemasok'] = Pemasok::orderBy('created_at', 'DESC')->get();
            // dd($data);
        } catch (QueryException | Expectation | PDOException $error) {
            // $this->failResponse($error->getMessage(), $error->getCode());
        }
        return view('pemasok.index')->with($data);
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
    public function store(StorePemasokRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            DB::table('pemasok')->insert($validated);
            DB::commit();
            // dd($request->input('nama_pemasok'));
            return redirect('pemasok')->with('success', 'Input data berhasil');
        } catch (QueryException | Exception | PDOException $error) {
            // DB::rollBack();
            // return $this->failResponse($error->getMessage(), $error->getCode());
            // dd($this->failResponse($error->getMessage(), $error->getCode()));
            return redirect()->back()->withErrors(['massage' => 'error']);
        }

        // return redirect('pemasok');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasok $pemasok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemasokRequest $request,  $pemasok)
    {
        try {

            DB::beginTransaction();
            $validated = $request->validated();
            DB::table('pemasok')->where('id',$pemasok)->update($validated);
            DB::commit();
            // dd($request->input('nama_pemasok'));
            return redirect('pemasok')->with('success', 'Data berhasil diubah');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            // dd($this->failResponse($error->getMessage(), $error->getCode()));
            return redirect()->back()->withErrors(['message' => 'salahhh']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasok $pemasok)
    {
        try {
            $pemasok->delete();
            return redirect('pemasok')->with('success', 'Data berhasil di hapusssssss');
        } catch (QueryException | Expectation | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
