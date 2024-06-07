<?php
namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResepController extends Controller
{
    public function index()
    {
        $reseps = Resep::all();
        return view('reseps.index', compact('reseps'));
    }

    public function create()
    {
        return view('reseps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $resep = new Resep;
        $resep->title = $request->input('title');
        $resep->description = $request->input('description');
        $resep->image = $fileNameToStore;
        $resep->save();

        return redirect('/reseps')->with('success', 'Resep Created');
    }

    public function show($id)
    {
        $resep = Resep::find($id);
        return view('reseps.show', compact('resep'));
    }

    public function edit($id)
    {
        $resep = Resep::find($id);
        return view('reseps.edit', compact('resep'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        $resep = Resep::find($id);
        $resep->title = $request->input('title');
        $resep->description = $request->input('description');

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            $resep->image = $fileNameToStore;
        }

        $resep->save();

        return redirect('/reseps')->with('success', 'Resep Updated');
    }

    public function destroy($id)
    {
        $resep = Resep::find($id);
        if ($resep->image != 'noimage.jpg') {
            Storage::delete('public/images/'.$resep->image);
        }
        $resep->delete();
        return redirect('/reseps')->with('success', 'Resep Removed');
    }
}
