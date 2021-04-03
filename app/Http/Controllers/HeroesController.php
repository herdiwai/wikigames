<?php

namespace App\Http\Controllers;

use App\Models\Heroes;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hero = Heroes::with('types')->paginate(5);
        return view('admin.heroes.index', compact('hero'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::all();
        return view('admin.heroes.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'types_id' => 'required',
            'photo' => 'required'
        ]);

        if ($request->file('photo')) {
            $photo = $request->file('photo')->store('image', 'public');
        } else {
            $photo = null;
        }

        Heroes::create([
            'name' => $request->name,
            'types_id' => $request->types_id,
            'photo' => $photo
        ]);

        return redirect()->route('heroes.create')->with('success', 'Hero berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hero = Heroes::findOrFail($id);
        $type = Type::all();
        return view('admin.heroes.show', compact('hero','type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hero = Heroes::findOrFail($id);
        $type = Type::all();
        return view('admin.heroes.edit', compact('hero','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'types_id' => 'required',
            'photo' => 'required'
        ]);

        // Kondisi ketika gambar yang diupdate/ganti, gambar yg lama akan terhapus dan digantikan dengan yang baru dan juga ketika user belum update gambar 
        if ($request->file('photo'))
        {
            $photo = $request->file('photo')->store('image' , 'public');
            $data = Heroes::findOrfail($id);
            if ($data->photo) {
                Storage::delete('public/' . $data->photo);
                $data->photo = $photo;
            }else {
                $data->photo = $photo;
            }
            $data->save();
        }

        Heroes::findOrfail($id)->update([
            'name' => $request->name,
            'types_id' => $request->types_id
        ]);

        return redirect()->back()->with('success', 'Hero Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Heroes::findOrFail($id);
            if ($data->photo) {
                Storage::delete('public/' . $data->photo);
                $data->delete();
            }
        $data->delete();
        return redirect()->back()->with('success', 'Hero Berhasil dihapus!');
    }
}
