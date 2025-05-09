<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Property;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $banner = Banner::all(); 

        $houses = Property::with(['images'])
            ->where('type', 'house')
            ->where('status', 'available')
            ->take(4)
            ->get();

        $rooms = Property::with(['images'])
            ->where('type', 'room')
            ->where('status', 'available')
            ->take(4)
            ->get();

        $apartments = Property::with(['images'])
            ->where('type', 'apartment')
            ->where('status', 'available')
            ->take(4)
            ->get();

        return view("vadama.index", compact('banner','houses', 'rooms', 'apartments'));
    }

    public function signup(Request $request)
    {
        return view("vadama.signup");
    }
    public function login(Request $request)
    {
        return view("vadama.login");
    }
    public function forgetpassword(Request $request)
    {
        return view("vadama.forgetpassword");
    }
    public function forgetconfirmation(Request $request)
    {
        return view("vadama.forgetconfirmation");
    }
    public function dashboard(Request $request)
    {
        return view("vadama.dashboard");
    }
    public function aboutus(Request $request)
    {
        return view("vadama.aboutus");
    }
    public function contacts(Request $request)
    {
        return view("vadama.contacts");
    }
     public function article(Request $request)
    {
        return view("vadama.article");
    }
    public function housing($id)
{
    $property = Property::with('images')->findOrFail($id);

    $selectedAmenities = json_decode($property->amenities, true); // This is just: ["wifi", "kitchen", "tv"]

    $amenitiesList = [
        ['id' => 'wifi', 'icon' => 'bi-wifi', 'label' => 'Wifi'],
        ['id' => 'workspace', 'icon' => 'bi-laptop', 'label' => 'Dedicated workspace'],
        ['id' => 'parking', 'icon' => 'bi-p-circle', 'label' => 'Free parking'],
        ['id' => 'ac', 'icon' => 'bi-snow', 'label' => 'Air conditioning'],
        ['id' => 'kitchen', 'icon' => 'bi-cup-hot', 'label' => 'Kitchen'],
        ['id' => 'washer', 'icon' => 'bi-water', 'label' => 'Washer'],
        ['id' => 'tv', 'icon' => 'bi-tv', 'label' => 'TV'],
        ['id' => 'heating', 'icon' => 'bi-thermometer-half', 'label' => 'Heating'],
    ];

    return view('vadama.housing', compact('property', 'amenitiesList', 'selectedAmenities'));
}
public function searchlist(Request $request)
{
    $search = $request->input('search');

    $properties = Property::where('title', 'like', '%' . $search . '%')->get();

    return view("vadama.searchlist", compact('search', 'properties'));
}
    public function filterpropertyhouse(Request $request)
    {
        $properties = Property::where('type', 'house')->get();

        return view('vadama.searchlist', compact('properties'));
    }
    public function filterpropertyroom(Request $request)
    {
        $properties = Property::where('type', 'room')->get();

        return view('vadama.searchlist', compact('properties'));
    }
    public function filterpropertyapartment(Request $request)
    {
        $properties = Property::where('type', 'apartment')->get();

        return view('vadama.searchlist', compact('properties'));
    }

public function housingList(Request $request)
{
    $sort = $request->query('sort');

    $query = Property::query();

    if ($sort == 'high') {
        $query->orderBy('price_per_month', 'desc');
    } elseif ($sort == 'low') {
        $query->orderBy('price_per_month', 'asc');
    }

    $properties = $query->get();

    return view('vadama.searchlist', compact('properties', 'sort'));
}


}
