<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class instructorController extends Controller
{
    /**
     * Display a listing of instructors.
     */
    public function index(Request $request)
    {
        $cari = $request->input('search');
        $instructor = instructor::where('name', 'like', "%{$cari}%")->orderBy('name', 'asc')->paginate(10);
        return view('instructor.index', compact('instructor'));
    }

    /**
     * Show the form for creating a new instructor.
     */
    public function create()
    {
        return view('instructor.create');
    }

    /**
     * Store a newly created instructor in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'gender' => 'required',
            'expertise' => 'required',
            'phone' => 'required|regex:/^[0-9]+$/|digits_between:8,15',
            'address' => 'required',
            'photo' => 'required|image'
        ]);

        // Upload photo
        $photo = $request->file('photo');
        $photoName = time() . '_' . str_replace(' ', '-', strtolower($request->name)) . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('assets/img/instructor/'), $photoName);

        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'expertise' => $request->expertise,
            'phone' => $request->phone,
            'address' => $request->address,
            'photo' => $photoName
        ];

        Instructor::create($data);
        return redirect()->route('instructor.index')->with('success', 'Instructor berhasil ditambahkan');
    }

    /**
     * Display the specified instructor.
     */
    public function show($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('instructor.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified instructor.
     */
    public function edit($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('instructor.edit', compact('instructor'));
    }

    /**
     * Update the specified instructor in storage.
     */
    public function update(Request $request, $id)
    {
        $instructor = Instructor::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:50',
            'gender' => 'required',
            'expertise' => 'required',
            'phone' => 'required|regex:/^[0-9]+$/|digits_between:8,15',
            'address' => 'required|string|max:100',
            'photo' => 'image'
        ]);

        $photo = $request->file('photo');
        $oldPhoto = $instructor->photo;
        $folder = public_path('assets/img/instructor/');
        $newname = time() . '_' . str_replace(' ', '-', strtolower($request->name));

        if ($photo) {
            if ($oldPhoto && file_exists($folder . $oldPhoto)) {
                unlink(($folder . $oldPhoto));
            }

            $photoName = $newname . '.' . $photo->getClientOriginalExtension();
            $photo->move($folder, $photoName);
        } else {
            $ext = pathinfo($oldPhoto, PATHINFO_EXTENSION);
            $namePhoto = $newname . '.' . $ext;
            $oldPath = $folder . $oldPhoto;
            $newPath = $folder . $namePhoto;

            if (
                $request->name !== $instructor->name && file_exists($oldPath) && is_file($oldPath)
            ) {
                rename($oldPath, $newPath);
            }
        }


        $instructor->name = $request->name;
        $instructor->gender = $request->gender;
        $instructor->expertise = $request->expertise;
        $instructor->phone = $request->phone;
        $instructor->address = $request->address;
        $instructor->photo = $photoName;
        $instructor->save();


        return redirect()->route('instructor.index')->with('success', 'Instructor berhasil diupdate');
    }

    /**
     * Remove the specified instructor from storage.
     */
    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);
        $path = public_path('assets/img/foto-siswa/' . $instructor->photo);

        if ($instructor->photo && file_exists($path) && is_file($path)) {
            unlink($path);
        }

        $instructor->delete();
        return redirect()->route('instructor.index')->with('delete', 'Instructor berhasil dihapus');
    }

    public function export()
    {
        $instructor = Instructor::orderBy('name', 'asc')->get();

        $pdf = Pdf::loadView('instructor.export', compact('instructor'));
        return $pdf->stream('data-instructor.pdf');
    }
}
