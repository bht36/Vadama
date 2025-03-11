<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Banner;

class BannerCntroller extends Controller
{
    public function index(Request $request)
    {
        $query = Banner::query();
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('slug')) {
            $query->where('slug', 'like', '%' . $request->slug . '%');
        }
        $banner = $query->orderBy('name', 'asc')->paginate(10);
        $parent_nav = 'item';
        $child_nav = 'banner';
        return view("admin.banner.index",compact("parent_nav","child_nav","banner"));
    }

    public function add()
    {
        $parent_nav = 'item';
        $child_nav = 'banner';
        return view("admin.banner.add",compact('parent_nav','child_nav'));    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/|unique:banner,slug',
            'meta_description' => 'nullable|string|max:500',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048|',
        ], [
            'main_image.dimensions' => "The image size must be larger than 1280px x 685px.",
        ]);
        $main_image = null;

        // Handle Main Image Upload
        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $filename_to_store = time() . '_' . $main_image->getClientOriginalName();
            $path = public_path('storage/uploads/banner/main_image/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $main_image->move($path, $filename_to_store); // Store the main image
        }
        Banner::create([
            'name' => $validatedData['name'] ?? '',
            'slug' => Str::slug($validatedData['slug'] ?? ''),
            'description' => $validatedData['description'] ?? '',
            'meta_description' => $validatedData['meta_description'] ?? '',
            'main_image' => $main_image ?  $filename_to_store : null,
        ]);
        return redirect()->route('admin.banner.index')->with('success', 'Banner added successfully!');
    }
    public function edit($id)
    {
        $parent_nav = 'item';
        $child_nav = 'banner';
        $banner = Banner::findOrFail($id);
        return view("admin.banner.edit",compact('parent_nav','child_nav','banner'));    
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255,' . $banner->id, 
            'meta_description' => 'nullable|string|max:500',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'main_image.dimensions' => "The image size must be larger than 1280px x 685px.",
        ]);
        // Handle Main Image Upload
        $main_image = $banner->main_image; // Keep existing main_image if no new image is uploaded
        if ($request->hasFile('main_image')) {
            // Remove old main image if it exists
            if (File::exists(public_path('storage/uploads/banner/main_image/' . $main_image))) {
                File::delete(public_path('storage/uploads/banner/main_image/' . $main_image));
            }

            // Upload new main image
            $main_image_file = $request->file('main_image');
            $filename_to_store = time() . '_' . $main_image_file->getClientOriginalName();
            $path = public_path('storage/uploads/banner/main_image/');
            
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $main_image_file->move($path, $filename_to_store);
            $main_image = $filename_to_store;
        }

        // Update banner details
        $banner->update([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'meta_description' => $validatedData['meta_description'] ?? '',
            'main_image' => $main_image, // Updated or kept existing image
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner updated successfully!');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        if ($banner->main_image) {
            $main_image_path = public_path('storage/uploads/banner/main_image/' . $banner->main_image);
            if (File::exists($main_image_path)) {
                File::delete($main_image_path);
            }
        }

        if ($banner->mobile_image) {
            $mobile_image_path = public_path('storage/uploads/banner/mobile_image/' . $banner->mobile_image);
            if (File::exists($mobile_image_path)) {
                File::delete($mobile_image_path);
            }
        }

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner deleted successfully!');
    }
}
