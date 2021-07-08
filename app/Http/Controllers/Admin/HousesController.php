<?php

namespace App\Http\Controllers\Admin;

use App\Models\User; 
use App\Models\House; 
use App\Models\Image; 

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Flash; 
use Auth; 

class HousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
    	// build up arguments for view
        $user_id = Auth::user()->id;

    	$houses = House::where('user_id', $user_id)->orderby('id', 'desc')
    	   	->when($request->get('s'), function ($query) use ($request) {
                return $query->where('id', 'LIKE', '%' . $request->get('s') . '%')
                    ->orWhere('name', 'LIKE', '%' . $request->get('s') . '%');
            })
            ->paginate(100)->appends($request->query());


    	return view('admin.houses.index', [ 
    		'houses' => $houses,
    		'search' => $request->get('s') 
    	]); 
    }

    public function create(Request $request)
    {
        $house = new House; 
        $types = [
            'rijtjeshuis',
            'appartement',
            'vrijstaand',
            'villa'
        ]; 

        $statuses = [
            'in verkoop',
            'in optie/ verkocht onder voorbehoud',
            'verkocht',
        ];


        return view('admin.houses.create')
            ->with('house', $house)
            ->with('types', $types)
            ->with('statuses', $statuses); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'], 
            'type' => ['required'],
            'surface' => ['nullable', 'string', 'max:255'],
            'rooms' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'status' => ['required']
        ]);

        // create new house
        $house = new House; 

        // assign house properties based on input
        $house->user_id = Auth::user()->id; 
        $house->name = $request->input('name');
        $house->type = $request->input('type');
        $house->surface = $request->input('surface');
        $house->rooms = $request->input('rooms');
        $house->price = $request->input('price');
        $house->status = $request->input('status');
        
        // save house first before handling image input
        $house->save();

        // handle image file inputs
        if ($request->hasFile('images')){
            $images = $request->file('images');
            foreach ($images as $image) {
                if($image->isValid()){
                    if ($house->images->count() < 3){
                        $new_filename = md5($house->id . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
                        $metadata = ['original_name' => $image->getClientOriginalName(), 'original_extension' => $image->getClientOriginalExtension(), 'mimetype' => $image->getMimeType(),];
                        $image->move(storage_path() . '/app/public/houses/' . $house->id . '/', $new_filename);

                        $image = new Image;
                        $image->house_id = $house->id;
                        $image->location = $new_filename; 
                        $image->save(); 
                    }
                }
            }
        }

        Flash::success('Huis succesvol opgeslagen.');

        return redirect(route('admin.houses.index'));
    }

    public function show(House $house)
    {
        return view('admin.houses.edit')->with('house', $house); 
    }

    public function edit(House $house)
    {
        $types = [
            'rijtjeshuis',
            'appartement',
            'vrijstaand',
            'villa'
        ]; 

        $statuses = [
            'in verkoop',
            'in optie/ verkocht onder voorbehoud',
            'verkocht',
        ];


        return view('admin.houses.edit')
            ->with('house', $house)
            ->with('types', $types)
            ->with('statuses', $statuses); 
    }

    public function update(Request $request, House $house)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'], 
            'type' => ['required'],
            'surface' => ['nullable', 'string', 'max:255'],
            'rooms' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'status' => ['required']
        ]);
        
        // assign input to house properties
        $house->user_id = Auth::user()->id; 
        $house->name = $request->input('name');
        $house->type = $request->input('type');
        $house->surface = $request->input('surface');
        $house->rooms = $request->input('rooms');
        $house->price = $request->input('price');
        $house->status = $request->input('status');
        
        // handle image file inputs
        if ($request->hasFile('images')){
            $images = $request->file('images');
            foreach ($images as $image) {
                if($image->isValid()){
                    if ($house->images->count() < 3){
                        $new_filename = md5($house->id . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
                        $metadata = ['original_name' => $image->getClientOriginalName(), 'original_extension' => $image->getClientOriginalExtension(), 'mimetype' => $image->getMimeType(),];
                        $image->move(storage_path() . '/app/public/houses/' . $house->id . '/', $new_filename);

                        $image = new Image;
                        $image->house_id = $house->id;
                        $image->location = $new_filename; 
                        $image->save(); 
                    }
                }
            }
        }

        $house->save();

        Flash::success('Huis succesvol aangepast'); 

        return redirect(route('admin.houses.edit', [$house])); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        // delete house from database
        $house->delete();

        Flash::success('Huis succesvol verwijderd.');

        return redirect(route('admin.houses.index'));
    }

    public function deletePicture(House $house, Image $image)
    {
        // find image path in storage folder
        $image_path = storage_path() .'/app/public/houses/'. $house->id . '/' . $image->location; 

        // check if file is deleted from storage folder
        if (unlink($image_path)){

            // delete image from database 
            $image->delete();

            Flash::success('Afbeelding verwijderd.');

            return redirect(route('admin.houses.edit', [$house]));  
        }   
    }
}
