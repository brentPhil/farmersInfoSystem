<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;
use App\Models\Barangay;
use App\Models\Archives;

class ArchivesController extends Controller
{
    public function index()
    {
        $archives = Archives::all();
        foreach ($archives as $archive) {
            $archive->data = json_decode($archive->data, true);
        }

        return view('archives.index', compact('archives'));
    }

    public function restore($id)
    {
        $archives = Archives::findOrFail($id);

        Farmer::create(json_decode($archives->data, true));

        $archives->delete();

        return redirect()->route('archives.index')->with('success', 'Farmer restored successfully.');
    }

    public function destroy($id)
    {
        $archives = Archives::findOrFail($id);
        $archives->delete();

        return redirect()->route('archives.index')->with('success', 'Archived farmer deleted successfully.');
    }
}
