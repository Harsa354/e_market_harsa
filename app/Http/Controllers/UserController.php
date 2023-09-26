<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Exception;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;
use PDOException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['users'] = User::orderBy('created_at', 'DESC')->get();
            return view('user.index')->with($data);
        } catch (QueryException | Expectation | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
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
    public function store(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            DB::table('users')->insert($validated);
            DB::commit();
            // dd($request->input('nama_user'));
            return redirect('user')->with('success', 'Input data berhasil');
        } catch (QueryException | Exception | PDOException $error) {
            // DB::rollBack();
            // return $this->failResponse($error->getMessage(), $error->getCode());
            // dd($this->failResponse($error->getMessage(), $error->getCode()));
            return redirect()->back()->withErrors(['massage' => 'error']);
        }

        // return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request,  $user)
    {
        try {

            DB::beginTransaction();
            $validated = $request->validated();
            DB::table('users')->where('id', $user)->update($validated);
            DB::commit();
            // dd($request->input('nama_user'));
            return redirect('user')->with('success', 'Data berhasil diubah');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            // dd($this->failResponse($error->getMessage(), $error->getCode()));
            return redirect()->back()->withErrors(['message' => 'salahhh']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect('user')->with('success', 'Data berhasil di hapusssssss');
        } catch (QueryException | Expectation | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
