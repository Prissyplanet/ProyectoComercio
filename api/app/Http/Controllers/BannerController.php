<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
   
    public function index()
    {
        $banners = Banner::all();
        return response()->json($banners);
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'required|url',
            'link' => 'nullable|url'
        ]);

        $banner = Banner::create($request->all());

        return response()->json($banner, 201);
    }

   
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return response()->json($banner);
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'title' => 'string|max:255',
            'image_url' => 'url',
            'link' => 'nullable|url'
        ]);

        $banner->update($request->all());

        return response()->json($banner);
    }

 
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return response()->json(['message' => 'Banner eliminado']);
    }
}
