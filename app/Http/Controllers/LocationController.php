<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Location;
use App\Http\Resources\Location as LocationResource;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations = Location::paginate(15);


        return LocationResource::collection($locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = $request->isMethod('put') ? Location::findOrFail($request->location_id) : new Location;

        $location->id = $request->input('location_id');
        $location->name = $request->input('name');
        $location->zipcode = $request->input('zipcode');
        $location->number = $request->input('number');
        $location->city = $request->input('city');

        if ($location->save()) {
          return new LocationResource($location);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get Location
        $location = Location::findOrFail($id);

        return new LocationResource($location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get Location
        $location = Location::findOrFail($id);

        if ($location->delete()) {
          return new LocationResource($location);
        }
    }
}
