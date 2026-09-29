<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::latest()->get();

        return view('promosi.index', compact('promotions'));
    }

    public function create()
    {
        return view('promosi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'poster' => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
            'link' => 'nullable|url|max:255',
        ]);

        $poster = $request->file('poster');
        $posterName = time() . '_' . $poster->getClientOriginalName();
        $poster->storeAs('promotions', $posterName, 'public');

        Promotion::create([
            'poster' => $posterName,
            'link' => $request->link,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('promosi.index');
    }

    public function edit(string $id)
    {
        $promotion = Promotion::findOrFail($id);

        return view('promosi.edit', compact('promotion'));
    }

    public function update(Request $request, string $id)
    {
        $promotion = Promotion::findOrFail($id);

        $request->validate([
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'link' => 'nullable|url|max:255',
        ]);

        $promotion->link = $request->link;
        $promotion->is_active = $request->has('is_active');

        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');
            $posterName = time() . '_' . $poster->getClientOriginalName();
            $poster->storeAs('promotions', $posterName, 'public');
            $promotion->poster = $posterName;
        }

        $promotion->save();

        return redirect()->route('promosi.index');
    }

    public function destroy(string $id)
    {
        $promotion = Promotion::findOrFail($id);

        $promotion->delete();

        return redirect()->route('promosi.index');
    }
}