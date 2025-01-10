<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class HoodieController extends Controller
{
    public function index(){
        $parent_nav = 'item';
        $child_nav = 'hoodie';
        return view("admin.hoodie.index",compact("parent_nav","child_nav"));
    }

    public function add(){
        $parent_nav = 'item';
        $child_nav = 'hoodie';
        return view("admin.hoodie.add",compact("parent_nav","child_nav"));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:hoodies,slug',
            'description' => 'required|string',
            'meta_description' => 'required|string|max:500',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048|dimensions:min_width=1280,min_height=685',
            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048|dimensions:min_width=767,min_height=665', // mobile image validation
        ], [
            'main_image.dimensions' => "The image size must be larger than 1280px x 685px.",
            'mobile_image.dimensions' => "The image size must be larger than 767px x 665px.",
        ]);

        $main_image = null;
        $mobile_image = null;

        // Handle Main Image Upload
        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $filename_to_store = time() . '_' . $main_image->getClientOriginalName();
            $path = public_path('storage/uploads/hoodie/main_image/');

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $main_image->move($path, $filename_to_store); // Store the main image
        }

        // Handle Mobile Image Upload
        if ($request->hasFile('mobile_image')) {
            $mobile_image = $request->file('mobile_image');
            $filename_to_store_mobile = time() . '_mobile_' . $mobile_image->getClientOriginalName();
            $path = public_path('storage/uploads/hoodie/mobile_image/');

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $mobile_image->move($path, $filename_to_store_mobile); // Store the mobile image
        }
// dd($request);
        // Create the Hoodie entry in the database
        // Hoodie::create([
        //     'name' => $validatedData['name'],
        //     'slug' => Str::slug($validatedData['slug']),
        //     'description' => $validatedData['description'],
        //     'meta_description' => $validatedData['meta_description'],
        //     'main_image' => $main_image ? 'uploads/hoodie/main_image/' . $filename_to_store : null,
        //     'mobile_image' => $mobile_image ? 'uploads/hoodie/mobile_image/' . $filename_to_store_mobile : null,
        // ]);

        // Redirect after successful store operation
        return redirect()->route('admin.hoodie.index')->with('success', 'Hoodie added successfully!');
    }
}
