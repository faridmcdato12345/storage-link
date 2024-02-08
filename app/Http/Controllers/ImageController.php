<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20048'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('images', $imageName, 'public');

        return response()->json(['image_url' => asset('storage/images/' . $imageName)], 200);
    }
}
