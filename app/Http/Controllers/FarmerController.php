<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;
use App\Models\Barangay;
use App\Models\Archives;

class FarmerController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $farmers = Farmer::with('barangay')->get();
        $barangays = Barangay::all();

        return view('farmers.index', compact('farmers', 'barangays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'enrollment' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'surname' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'extension_name' => 'nullable|string|max:255',
            'sex' => 'required|string|max:255',
            'building_no' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'barangays_id' => 'required|exists:barangays,id',
            'municipality' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'contact_number' => 'required|string',
            'date_birth' => 'required|date',
            'place_birth' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'civil_status' => 'required|string|max:255',
            'name_spouse' => 'nullable|string|max:255'
        ]);

        $farmerData = $request->all();

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profile_images'), $filename);
            $farmerData['profile'] = $filename;
        }

        Farmer::create($farmerData);

        return redirect()->route('farmers.index')->with('success', 'Farmer added successfully.');
    }

    public function edit($id)
    {
        $farmer = Farmer::findOrFail($id);
        $barangays = Barangay::all();
        return view('farmers.edit', compact('farmer', 'barangays'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'enrollment' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'surname' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'extension_name' => 'nullable|string|max:255',
            'sex' => 'required|string|max:255',
            'building_no' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'barangays_id' => 'required|exists:barangays,id',
            'municipality' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'contact_number' => 'required|string',
            'date_birth' => 'required|date',
            'place_birth' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'civil_status' => 'required|string|max:255',
            'name_spouse' => 'nullable|string|max:255'
        ]);

        $farmer = Farmer::findOrFail($id);

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profile', $filename);

            $farmer->profile = 'profile/' . $filename;
        }

        $farmer->update($validatedData);

        return redirect()->route('farmers.index')->with('success', 'Farmer updated successfully.');
    }

    public function show($id)
    {
        $farmer = Farmer::with('barangay')->findOrFail($id);
        return view('farmers.show', compact('farmer'));
    }

    public function showArchived()
    {
        $archives = Archives::all();
        return view('archives.index', compact('archives'));
    }

    public function archive(Request $request, $id)
    {
        $farmer = Farmer::findOrFail($id);

        Archives::create([
            'data' => json_encode($farmer->toArray()),
            'farmers_id' => $farmer->id,
        ]);

        $farmer->delete();

        return redirect()->route('archives.index')->with('success', 'Farmer archived successfully.');
    }

    public function restore($id)
    {
        $archived = Archives::findOrFail($id);
        $data = json_decode($archived->data, true);

        Farmer::create($data);

        $archived->delete();

        return redirect()->route('archives.index')->with('success', 'Farmer restored successfully.');
    }

    public function destroy($id)
    {
        $archived = Archives::findOrFail($id);
        $archived->delete();

        return redirect()->route('archives.index')->with('success', 'Archived farmer deleted successfully.');
    }

    public function restoreAll()
    {
        $archives = Archives::all();
        foreach ($archives as $archived) {
            $data = json_decode($archived->data, true);
            Farmer::create($data);
            $archived->delete();
        }

        return redirect()->route('archives.index')->with('success', 'All farmers have been restored successfully.');
    }

    public function deleteAll()
    {
        Archives::query()->delete();
        return redirect()->route('archives.index')->with('success', 'All farmers have been deleted successfully.');
    }
}
