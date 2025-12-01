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
            'gender' => 'required|in:male,female',
            'expertise' => 'required|string|max:100',
            'phone' => 'required|regex:/^[0-9]+$/|digits_between:8,15',
            'address' => 'required|string|max:200',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Upload photo
        $photo = $request->file('photo');
        $photoName = time() . '_' . str_replace(' ', '-', strtolower($request->name)) . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('assets/img/instructor/'), $photoName);

        Instructor::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'expertise' => $request->expertise,
            'phone' => $request->phone,
            'address' => $request->address,
            'photo' => $photoName
        ]);

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
            'gender' => 'required|in:male,female',
            'expertise' => 'required|string|max:100',
            'phone' => 'required|regex:/^[0-9]+$/|digits_between:8,15',
            'address' => 'required|string|max:200',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Upload photo jika ada
        if ($request->hasFile('photo')) {
            $oldPhoto = $instructor->photo;
            if ($oldPhoto && file_exists(public_path('assets/img/instructor/' . $oldPhoto))) {
                unlink(public_path('assets/img/instructor/' . $oldPhoto));
            }
            $photo = $request->file('photo');
            $photoName = time() . '_' . str_replace(' ', '-', strtolower($request->name)) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('assets/img/instructor/'), $photoName);
        } else {
            $photoName = $instructor->photo;
        }

        $instructor->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'expertise' => $request->expertise,
            'phone' => $request->phone,
            'address' => $request->address,
            'photo' => $photoName
        ]);

        return redirect()->route('instructor.index')->with('success', 'Instructor berhasil diupdate');
    }

    /**
     * Remove the specified instructor from storage.
     */
    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);
        $photo = $instructor->photo;
        if ($photo && file_exists(public_path('assets/img/instructor/' . $photo))) {
            unlink(public_path('assets/img/instructor/' . $photo));
        }

        $instructor->delete();
        return redirect()->route('instructor.index')->with('success', 'Instructor berhasil dihapus');
    }

    public function export()
    {
        $instructor = Instructor::orderBy('name', 'asc')->get();

        $pdf = Pdf::loadView('instructor.export', compact('instructor'));
        return $pdf->stream('data-instructor.pdf');
    }
}
