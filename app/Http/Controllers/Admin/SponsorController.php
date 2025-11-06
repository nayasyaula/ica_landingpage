<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::orderBy('tier')->orderBy('name')->get();
        return view('admin.sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        $tiers = [
            'platinum' => 'Platinum',
            'gold' => 'Gold', 
            'silver' => 'Silver',
            'bronze' => 'Bronze'
        ];
        
        return view('admin.sponsors.create', compact('tiers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tier' => 'required|in:platinum,gold,silver,bronze',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Upload logo
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('sponsors', 'public');
        }

        Sponsor::create([
            'name' => $request->name,
            'tier' => $request->tier,
            'logo' => $logoPath
        ]);

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'Sponsor berhasil ditambahkan.');
    }

    public function edit(Sponsor $sponsor)
    {
        $tiers = [
            'platinum' => 'Platinum',
            'gold' => 'Gold',
            'silver' => 'Silver', 
            'bronze' => 'Bronze'
        ];

        return view('admin.sponsors.edit', compact('sponsor', 'tiers'));
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tier' => 'required|in:platinum,gold,silver,bronze',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'tier' => $request->tier
        ];

        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($sponsor->logo && Storage::disk('public')->exists($sponsor->logo)) {
                Storage::disk('public')->delete($sponsor->logo);
            }
            $data['logo'] = $request->file('logo')->store('sponsors', 'public');
        }

        $sponsor->update($data);

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'Sponsor berhasil diperbarui.');
    }

    public function destroy(Sponsor $sponsor)
    {
        // Delete logo file
        if ($sponsor->logo && Storage::disk('public')->exists($sponsor->logo)) {
            Storage::disk('public')->delete($sponsor->logo);
        }

        $sponsor->delete();

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'Sponsor berhasil dihapus.');
    }

    // Helper function untuk debug
    public function checkStorage()
    {
        $sponsors = Sponsor::all();
        foreach ($sponsors as $sponsor) {
            echo "Sponsor: " . $sponsor->name . "<br>";
            echo "Logo Path: " . $sponsor->logo . "<br>";
            echo "Storage Exists: " . (Storage::disk('public')->exists($sponsor->logo) ? 'Yes' : 'No') . "<br>";
            echo "Public URL: " . Storage::url($sponsor->logo) . "<br><br>";
        }
    }
}