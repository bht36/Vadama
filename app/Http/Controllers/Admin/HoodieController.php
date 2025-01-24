<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hoodie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class HoodieController extends Controller
{
    public function index(){
        $hoodie = Hoodie::paginate(10); 
        $parent_nav = 'item';
        $child_nav = 'hoodie';
        return view("admin.hoodie.index",compact('parent_nav','child_nav','hoodie'));
    }

    public function add(){
        $parent_nav = 'item';
        $child_nav = 'hoodie';
        return view("admin.hoodie.add",compact('parent_nav','child_nav'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/|unique:hoodies,slug',
            'description' => 'required|string',
            'meta_description' => 'nullable|string|max:500',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048|',
            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048|', // mobile image validation
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
        Hoodie::create([
            'name' => $validatedData['name'] ?? '',
            'slug' => Str::slug($validatedData['slug'] ?? ''),
            'description' => $validatedData['description'] ?? '',
            'meta_description' => $validatedData['meta_description'] ?? '',
            'main_image' => $main_image ?  $filename_to_store : null,
            'mobile_image' => $mobile_image ?  $filename_to_store_mobile : null,
        ]);

        return redirect()->route('admin.hoodie.index')->with('success', 'Hoodie added successfully!');
    }

    public function edit($id){
        $parent_nav = 'item';
        $child_nav = 'hoodie';

        // Find the hoodie by its ID
        $hoodie = Hoodie::findOrFail($id);

        // Pass the hoodie data to the edit view
        return view("admin.hoodie.edit", compact('parent_nav', 'child_nav', 'hoodie'));
    }

    public function update(Request $request, $id)
    {
        $hoodie = Hoodie::findOrFail($id);

        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:hoodies,slug,' . $hoodie->id,  // Ensure unique slug for the specific hoodie
            'description' => 'required|string',
            'meta_description' => 'nullable|string|max:500',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'main_image.dimensions' => "The image size must be larger than 1280px x 685px.",
            'mobile_image.dimensions' => "The image size must be larger than 767px x 665px.",
        ]);

        // Handle Main Image Upload
        $main_image = $hoodie->main_image; // Keep existing main_image if no new image is uploaded
        if ($request->hasFile('main_image')) {
            // Remove old main image if it exists
            if (File::exists(public_path('storage/uploads/hoodie/main_image/' . $main_image))) {
                File::delete(public_path('storage/uploads/hoodie/main_image/' . $main_image));
            }

            // Upload new main image
            $main_image_file = $request->file('main_image');
            $filename_to_store = time() . '_' . $main_image_file->getClientOriginalName();
            $path = public_path('storage/uploads/hoodie/main_image/');
            
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $main_image_file->move($path, $filename_to_store);
            $main_image = $filename_to_store;
        }

        // Handle Mobile Image Upload
        $mobile_image = $hoodie->mobile_image; // Keep existing mobile_image if no new image is uploaded
        if ($request->hasFile('mobile_image')) {
            // Remove old mobile image if it exists
            if (File::exists(public_path('storage/uploads/hoodie/mobile_image/' . $mobile_image))) {
                File::delete(public_path('storage/uploads/hoodie/mobile_image/' . $mobile_image));
            }

            // Upload new mobile image
            $mobile_image_file = $request->file('mobile_image');
            $filename_to_store_mobile = time() . '_mobile_' . $mobile_image_file->getClientOriginalName();
            $path = public_path('storage/uploads/hoodie/mobile_image/');
            
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $mobile_image_file->move($path, $filename_to_store_mobile);
            $mobile_image = $filename_to_store_mobile;
        }

        // Update hoodie details
        $hoodie->update([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'description' => $validatedData['description'],
            'meta_description' => $validatedData['meta_description'] ?? '',
            'main_image' => $main_image, // Updated or kept existing image
            'mobile_image' => $mobile_image, // Updated or kept existing image
        ]);

        return redirect()->route('admin.hoodie.index')->with('success', 'Hoodie updated successfully!');
    }


    public function destroy($id){
        $hoodie = Hoodie::findOrFail($id);

        if ($hoodie->main_image) {
            $main_image_path = public_path('storage/uploads/hoodie/main_image/' . $hoodie->main_image);
            if (File::exists($main_image_path)) {
                File::delete($main_image_path);
            }
        }

        if ($hoodie->mobile_image) {
            $mobile_image_path = public_path('storage/uploads/hoodie/mobile_image/' . $hoodie->mobile_image);
            if (File::exists($mobile_image_path)) {
                File::delete($mobile_image_path);
            }
        }

        // Delete the hoodie entry from the database
        $hoodie->delete();

        return redirect()->route('admin.hoodie.index')->with('success', 'Hoodie deleted successfully!');
    }
}