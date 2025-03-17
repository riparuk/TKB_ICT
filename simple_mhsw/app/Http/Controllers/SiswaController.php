<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class SiswaController extends Controller
{
    /**
     * API: Get all students
     */
    public function apiIndex()
    {
        return response()->json(Siswa::all(), 200);
    }

    /**
     * API: Store a new student
     */
    public function apiStore(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:siswas|digits:16',
            'nama' => 'required|string|max:100',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'alamat' => 'required',
            'hobi' => 'required|array',
            'foto' => 'nullable|image|max:2048',
        ]);
    
        $fotoPath = $request->file('foto') ? $request->file('foto')->store('uploads', 'public') : null;
    
        $siswa = Siswa::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'hobi' => json_encode($request->hobi),
            'foto' => $fotoPath,
        ]);
    
        return response()->json($siswa, 201);
    }

    /**
     * API: Get a specific student
     */
    public function apiShow(string $id)
    {
        return response()->json(Siswa::findOrFail($id), 200);
    }

    /**
     * API: Update a student
     */
    public function apiUpdate(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nik' => 'required|digits:16|unique:siswas,nik,' . $id,
            'nama' => 'required|string|max:100',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'alamat' => 'required',
            'hobi' => 'required|array',
            'foto' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads', 'public');
            $siswa->foto = $fotoPath;
        }
    
        $siswa->update($request->except('foto'));
    
        return response()->json($siswa, 200);
    }

    /**
     * API: Delete a student
     */
    public function apiDestroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        
        if ($siswa->foto) {
            Storage::disk('public')->delete($siswa->foto);
        }
        
        $siswa->delete();
    
        return response()->json(['message' => 'Siswa berhasil dihapus'], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswas.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:siswas|digits:16',
            'nama' => 'required|string|max:100',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'alamat' => 'required',
            'hobi' => 'required|array',
            'foto' => 'nullable|image|max:2048',
        ]);
    
        $fotoPath = $request->file('foto') ? $request->file('foto')->store('uploads', 'public') : null;
    
        Siswa::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'hobi' => json_encode($request->hobi),
            'foto' => $fotoPath,
        ]);
    
        try {
            return redirect()->route('siswas.index')->with('success', 'Siswa berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('siswas.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswas.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik' => 'required|digits:16|unique:siswas,nik,'.$id,
            'nama' => 'required|string|max:100',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'alamat' => 'required',
            'hobi' => 'required|array',
            'foto' => 'nullable|image|max:2048',
        ]);
    
        $siswa = Siswa::findOrFail($id);
    
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads', 'public');
            $siswa->foto = $fotoPath;
        }
    
        $siswa->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'hobi' => json_encode($request->hobi),
        ]);
    
        return redirect()->route('siswas.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        
        // Hapus foto jika ada
        if ($siswa->foto) {
            Storage::disk('public')->delete($siswa->foto);
        }
        
        $siswa->delete();
    
        return redirect()->route('siswas.index')->with('success', 'Siswa berhasil dihapus!');
    }

    public function generatePdf(string $id)
    {
        try {
            // Ambil data siswa berdasarkan ID
            $siswa = Siswa::findOrFail($id);
            // dd($siswa); // Cek apakah data siswa ditemukan

            // Load tampilan PDF dengan data siswa
            $pdf = Pdf::loadView('siswas.pdf', compact('siswa'));

            // Set nama file PDF yang akan diunduh
            $fileName = 'SISWA_' . $siswa->nik . '.pdf';

            // Return PDF untuk diunduh
            return $pdf->download($fileName);
        } catch (\Exception $e) {
            return redirect()->route('siswas.index')->with('error', 'Terjadi kesalahan dalam pembuatan PDF: ' . $e->getMessage());
        }
    }
}
