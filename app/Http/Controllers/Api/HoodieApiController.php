<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hoodie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HoodieApiController extends Controller
{
    public function getHoodies(Request $request)
    {
        try {
            // Pull all hoodie data
            $hoodies = Hoodie::all();

            // Check if any hoodies were found
            if ($hoodies->isEmpty()) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'No hoodies found.',
                        'data' => null,
                    ],
                    404
                );
            }

            // Initialize an empty array to store hoodie data
            $data = [];

            // Loop through each hoodie and fetch its individual data fields
            foreach ($hoodies as $hoodie) {
                $data[] = [
                    'id' => $hoodie->id,
                    'name' => $hoodie->name,
                    'slug' => $hoodie->slug,
                    'description' => $hoodie->description,
                    'meta_description' => $hoodie->meta_description,
                    'main_image' => $hoodie->main_image,
                    'mobile_image' => $hoodie->mobile_image,
                ];
            }

            // Return the response with all hoodie data
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Hoodies fetched successfully!',
                    'data' => $data,
                ],
                200
            );
        } catch (ModelNotFoundException $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not found!',
                    'data' => null,
                ],
                404
            );
        } catch (\Exception $e) {
            // Return error if there is an exception
            return response()->json(
                [
                    'status' => false,
                    'message' => 'An error occurred while fetching hoodies.',
                    'data' => null,
                ],
                500
            );
        }
    }
}
