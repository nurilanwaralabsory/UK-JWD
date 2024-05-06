<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->get('search');
        $penerbit = Penerbit::Paginate(5);

        $no = 5 * ($penerbit->currentPage() - 1);
        return view('penerbit.index', compact('penerbit', 'no', 'cari'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'kode' => 'required|min:4|max:20|unique:penerbit,kode',
            'nama' => 'required|min:3|max:20|unique:penerbit,nama',
            'alamat' => 'required|min:3',
            'kota' => 'required|min:3|max:100',
            'telepon' => 'required|min:3|max:12|unique:penerbit,telepon',
        ];

        $this->validate($request, $rules);

        Penerbit::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('penerbit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $penerbit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = Penerbit::find($id);

        $update->kode = $request->kode;
        $update->nama = $request->nama;
        $update->telepon = $request->telepon;

        if (!$update->isDirty()) {
            Alert::success('Maaf', 'Data tidak di Update');
            return redirect()->route('penerbit.index');
        } else {
            $rules = [
                'kode' => 'required|min:4|max:20',
                'nama' => 'required|min:3|max:20',
                'alamat' => 'required|min:3',
                'kota' => 'required|min:3|max:100',
                'telepon' => 'required|min:3|max:12',
            ];
            $this->validate($request, $rules);

            $update->kode = $request->kode;
            $update->nama = $request->nama;
            $update->alamat = $request->alamat;
            $update->kota = $request->kota;
            $update->telepon = $request->telepon;

            $update->save();
            Alert::success('Alhamdulillah', 'Data Berhasil di Update');
            return redirect()->route('penerbit.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::where('penerbit', '=', $id)->count();
        $penerbit = Penerbit::find($id);

        if ($buku == 0) {
            $penerbit->delete();
            Alert::success('Alhamdulillah', 'Data Berhasil di Hapus');
        } else {
            Alert::warning('Afwan', 'Hapus data buku yang terkait dengan penerbit ini dahulu');
        }

        return redirect()->route('penerbit.index');
    }
}
