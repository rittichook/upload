<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {

    }

public function store(Request $request)
{
    $request->validate([

        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ]);

    try {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $baseUrl = config('app.url');
        $imageUrl = $baseUrl . '/images/' . $imageName;

        return response()->json(['image' => $imageUrl], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Image upload failed'], 500);
    }
}
    public function update(Request $request, $imagePath)
    {


    }

    public function destroy($imagePath)
    {
            $imagePath = public_path('images') . '/' . $imagePath;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }



