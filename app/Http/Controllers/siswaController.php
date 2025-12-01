<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use function PHPUnit\Framework\fileExists;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->input('search');
        $siswa = siswa::where('name', 'like', "%{$cari}%")->orderBy('name', 'asc')->paginate(10);
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'string|required|max:50',
            'gender' => 'required',
            'place' => 'required',
            'dateofbirth' => 'date|required',
            'address' => 'string|required|max:100',
            'phone' => 'required|regex:/^[0-9]+$/|digits_between:8,15',
            'subject' => 'required',
            'education' => 'required',
            'photo' => 'required|image'
        ]);

        //$data = $request->except('photo');
        $photo = $request->file('photo');
        $namePhoto = time() . '_' . str_replace(' ', '-', strtolower($request->name)) . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('assets/img/foto-siswa/'), $namePhoto);

        $data = [
            'name' => strtolower($request->name),
            'gender' => strtolower($request->gender),
            'place' => strtolower($request->place),
            'dateofbirth' => strtolower($request->dateofbirth),
            'address' => strtolower($request->address),
            'phone' => strtolower($request->phone),
            'subject' => strtolower($request->subject),
            'education' => strtolower($request->education),
            'photo' => $namePhoto
        ];


        siswa::create($data);
        return redirect()->route('siswa.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = siswa::findOrfail($id);

        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = siswa::findOrfail($id);

        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = siswa::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:50',
            'gender' => 'required',
            'place' => 'required',
            'dateofbirth' => 'required|date',
            'address' => 'required|string|max:100',
            'phone' => 'required|regex:/^[0-9]+$/|digits_between:8,15',
            'subject' => 'required',
            'education' => 'required',
            'photo' => 'image'
        ]);

        $photo = $request->file('photo');
        $oldPhoto = $siswa->photo;
        $folder = public_path('assets/img/foto-siswa/');
        $newname = time() . '_' . str_replace(' ', '-', strtolower($request->name));

        if ($photo) {
            if ($oldPhoto && file_exists($folder . $oldPhoto)) {
                unlink($folder . $oldPhoto);
            }

            $namePhoto = $newname . '.' . $photo->getClientOriginalExtension();
            $photo->move($folder, $namePhoto);
        } else {
            $ext = pathinfo($oldPhoto, PATHINFO_EXTENSION);
            $namePhoto = $newname . '.' . $ext;
            $oldPath = $folder . $oldPhoto;
            $newPath = $folder . $namePhoto;

            if (
                $request->name !== $siswa->name && file_exists($oldPath) && is_file($oldPath)
            ) {
                rename($oldPath, $newPath);
            }
        }

        // $oldPhoto = $siswa->photo;
        // $folderPath = public_path('assets/img/foto-siswa/');



        // if ($request->hasFile('photo')) {


        //     $photo = $request->file('photo');
        //     $namePhoto = time() . '_' . str_replace(' ', '-', strtolower($request->name)) . '.' . $photo->getClientOriginalExtension();
        //     $photo->move($folderPath, $namePhoto);

        //     $oldPath = $folderPath . $oldPhoto;
        //     if ($oldPhoto && file_exists($oldPath)) {
        //         unlink($oldPath);
        //     }

        // } 

        // else {


        //     if ($request->name != $siswa->name) {

        //         $ext = pathinfo($oldPhoto, PATHINFO_EXTENSION);
        //         $namePhoto = time() . '_' . str_replace(' ', '-', strtolower($request->name)) . '.' . $ext;

        //         // Rename file (ubah nama file fisik)
        //         rename($folderPath . $oldPhoto, $folderPath . $namePhoto);
        //     } 
        //     else {
        //         $namePhoto = $oldPhoto;
        //     }
        // }


        // UPDATE DATA
        $siswa->name = $request->name;
        $siswa->gender = $request->gender;
        $siswa->place = $request->place;
        $siswa->dateofbirth = $request->dateofbirth;
        $siswa->address = $request->address;
        $siswa->phone = $request->phone;
        $siswa->subject = $request->subject;
        $siswa->education = $request->education;
        $siswa->photo = $namePhoto;
        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'Data berhasil diupdate');
    }
           //  if($photo){
            //     $namePhoto = time() . '_' . str_replace(' ', '-', strtolower($request->name)). '.' . $photo->getClientOriginalExtension();
            //     $photo->move(public_path('assets/img/foto-siswa'), $namePhoto);
            //     unlink(public_path('assets/img/foto-siswa/' . $oldPhoto));

            // } else {
            //     $namePhoto = $oldPhoto;
            //  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = siswa::findOrFail($id);
        $path = public_path('assets/img/foto-siswa/' . $siswa->photo);

        if ($siswa->photo && file_exists($path) && is_file($path)) {
            unlink($path);
        }

        // if($siswa !==  null){
        // unlink(public_path('assets/img/foto-siswa/'.$siswa->photo));
        // }

        $siswa->delete();

        return redirect()->route('siswa.index')->with('delete', 'Data berhasil dihapus');
    }

    public function export()
    {
        $siswa = siswa::orderBy('name', 'asc')->get();

        $pdf = Pdf::loadView('siswa.export', compact('siswa'));
        return $pdf->stream('data-siswa.pdf');
    }
}
