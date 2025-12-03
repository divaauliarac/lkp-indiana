<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->input('search');
        $subjects = Subject::where('name', 'like', "%{$cari}%")->orderBy('name', 'asc')->paginate(10);
        return view('subject.index', compact('subjects'));
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        $data = [
            'name' => $request->name
        ];

        Subject::create($data);
        return redirect()->route('subject.index')->with('success', 'Subject berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $subjects = Subject::findOrfail($id);
        return view('subject.show', compact('subjects'));
    }

    public function edit(string $id)
    {
        $subjects = Subject::findOrfail($id);
        return view('subject.edit', compact('subjects'));
    }

    public function update(Request $request, string $id)
    {
        $subjects = Subject::findOrfail($id);

        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        $subjects->name = $request->name;
        $subjects->save();
        return redirect()->route('subject.index')->with('success', 'Subject berhasil diupdate');
    }

    public function destroy(Subject $subjects)
    {
        $subjects->delete();
        return redirect()->route('subject.index')->with('delete', 'Subject berhasil dihapus');
    }
}
