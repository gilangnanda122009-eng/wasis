<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::latest()->get();
        return view('hero.index', compact('heroes'));
    }

    public function create()
    {
        return view('hero.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('heroes', $fileName, 'public');

        Hero::create([
            'name' => $request->name,
            'file' => $fileName,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('hero.index');
    }

    public function edit(string $id)
    {
        $hero = Hero::findOrFail($id);
        return view('hero.edit', compact('hero'));
    }

    public function update(Request $request, string $id)
    {
        $hero = Hero::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
        ]);

        $hero->name = $request->name;
        $hero->is_active = $request->has('is_active');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('heroes', $fileName, 'public');
            $hero->file = $fileName;
        }

        $hero->save();

        return redirect()->route('hero.index');
    }

    public function destroy(string $id)
    {
        $hero = Hero::findOrFail($id);
        $hero->delete();

        return redirect()->route('hero.index');
    }
}