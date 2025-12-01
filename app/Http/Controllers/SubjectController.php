<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::orderBy('name')->paginate(10);
        return view('subject.index', compact('subjects'));
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:subjects,name'
        ]);

        Subject::create(['name' => $request->name]);

        return redirect()->route('subject.index')->with('success', 'Subject berhasil ditambahkan');
    }

    public function show(Subject $subject)
    {
        return view('subject.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('subject.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:subjects,name,'
        ]);

        $subject->update(['name' => $request->name]);

        return redirect()->route('subject.index')->with('success', 'Subject berhasil diupdate');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subject.index')->with('delete', 'Subject berhasil dihapus');
    }
}
