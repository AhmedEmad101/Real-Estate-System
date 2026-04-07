<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    
    public function create()
    {
        return view('Advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'area' => 'required',
            'price' => 'required',
            'location' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images/advertisements'), $imageName);

        $advertisement = Advertisement::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $imageName,
            'area' => $validatedData['area'],
            'price' => $validatedData['price'],
            'location' => $validatedData['location'],
        ]);

        return redirect('/advertisements')->with('success', 'Advertisement has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);

        return view('advertisements.show', compact('advertisement'));
    }


    public function search(Request $request)
    {
        $location = $request->location;
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;

        $advertisements = Advertisement::where('location', 'LIKE', '%'.$location.'%')
            ->whereBetween('price', [$minPrice, $maxPrice])
            ->get();

        return view('advertisements.index', compact('advertisements'));
    }
}
