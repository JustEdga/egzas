<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Country;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Carbon\Carbon;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hotel = Hotel::all();

        return view('back.hotel.index', ['hotel' => $hotel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::all()->sortBy('country');

        return view('back.hotel.create', [
            'country' => $country
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = new Hotel;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            
            // $manager = new ImageManager(['driver' => 'GD']);
            // $image = $manager->make($photo);
            // $image->crop(400, 200);
            // $image->save(public_path().'/hotels/'.$file);

            $photo->move(public_path(). '/hotels', $file);
            $hotel->photo = '/hotels/'. $file; 
        }

        $start = Carbon::parse($request->check_in);
        $end = Carbon::parse($request->check_in)->addDays($request->duration);


        $hotel->start = $start;
        $hotel->end = $end;
        
        $hotel->name = $request->name;
        $hotel->price = $request->price;
        $hotel->duration = $request->duration;
        $hotel->country = $request->country;
        
        $hotel->save();
        return redirect()->route('hotel-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $country = Country::all()->sortBy('country');

        return view('back.hotel.edit', [
            'hotel' => $hotel,
            'country' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHotelRequest  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $hotel->country = $request->country;
        $hotel->name = $request->name;
        $hotel->price = $request->price;
        $hotel->duration = $request->duration;
        $hotel->save();

        return redirect()->route('hotel-index')->with('ok', 'Hotel updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotel-index')->with('ok', 'Hotel removed');
    }
}