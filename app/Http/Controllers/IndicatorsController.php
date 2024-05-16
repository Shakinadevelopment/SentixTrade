<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicator;
use App\Models\Stock;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\File;

class IndicatorsController extends Controller
{
    public function index()
    {
        $indicators = Indicator::all();
        $stocks = Stock::all();
        return view('indicator.index', compact('indicators','stocks'));

    }

    public function list()
    {
        $indicators = Indicator::all();
        if (!$indicators) 
        {
            return view('layouts.error',compact('indicators'));

        }
        return view('indicator.list',compact('indicators'));
    }


    public function create()
    {
        $indicators = Indicator::all();
        // dd($indicators);
        $stocks = Stock::all();
        return view('indicator.create', compact('indicators','stocks'));
    }

    public function getData($id)
    {
        $user = Indicator::find($id);
        return response()->json($user);
    }

    public function show($slug)
    {
        $indicator = Indicator::all();
        $indicators = Indicator::where('slug', $slug)->firstOrFail();

        if (!$indicators) {
            // return response()->json(['error' => 'Not found'], 404);
            return view('layouts.error',compact('indicators','indicator'));

        }
        return view('indicator.show',compact('indicators','indicator'));

    }

    public function store(Request $request)
    {
        if($request->hasFile('images') && $request->has('title') && $request->has('link') && $request->has('price') 
        && $request->has('brand')  && $request->has('manufacture')  && $request->has('description')) 
        {
            $title = $request->input('title');
            $link = $request->input('link');
            $price = $request->input('price');
            $brand = $request->input('brand');
            $manufacture = $request->input('manufacture');
            $relatedInput = $request->input('related');
            $images = $request->file('images');
            $description = $request->input('description');
            $relatedInput = !empty($relatedInput) ? implode(',', $relatedInput) : NULL;
            $imagePaths = [];
        
            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('/uploads/indicators'),$imageName);
                $imagePaths[] = 'public/uploads/indicators/'.$imageName;
            }
        
            $imageUpload = new Indicator();
            $imageUpload->title = $title; 
            $imageUpload->link = $link; 
            $imageUpload->price = $price; 
            $imageUpload->brand = $brand; 
            $imageUpload->manufacture = $manufacture; 
            $imageUpload->related = $relatedInput; 
            $imageUpload->description = $description; 
            $imageUpload->image_path = json_encode($imagePaths);
            $imageUpload->save();
            
            session()->flash('success', 'Indicator has been added successfully!');
            return redirect()->route('indicator.index');
        
        } else {
        
            session()->flash('error', 'Error occurred while adding Indicator!');
            return redirect()->route('indicator.index');
        }
    
        
    }

    public function edit($id)
    {
        // Fetch all indicators
        $allIndicators = Indicator::all(); 

        // Fetch the selected indicators
        $indicators = Indicator::find($id);
        
        // Explode the comma-separated IDs into an array
        $selectedIndicatorIds = explode(',', $indicators->id);

        // Filter the allIndicators collection to only include selected indicators
        $selectedIndicators = $allIndicators->whereIn('id', $selectedIndicatorIds);

        return view('indicator.edit', compact('allIndicators', 'selectedIndicators', 'indicators'));
    }

    public function update(Request $request, $id)
    {
        $indicator = Indicator::find($id);

        if (!$indicator) {
            session()->flash('error', 'Indicator not found!');
            return redirect()->route('indicator.index');
        }

        if ($request->filled(['title', 'link', 'price', 'brand', 'manufacture', 'description'])) {
            // Handle uploaded images
            if ($request->hasFile('images')) {
                $imagePaths = [];
                foreach ($request->file('images') as $image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move(public_path('/uploads/indicators'), $imageName);
                    $imagePaths[] = 'public/uploads/indicators/' . $imageName;
                }
                // Append uploaded images to existing images
                $existingImages = json_decode($indicator->image_path, true) ?? [];
                $imagePaths = array_merge($existingImages, $imagePaths);
                $indicator->image_path = json_encode($imagePaths);
            }

            // Handle deleted images
            if ($request->has('deleted_images')) {
                $deletedImages = $request->input('deleted_images');
                $existingImages = json_decode($indicator->image_path, true) ?? [];
                // Remove deleted images from existing images
                foreach ($deletedImages as $deletedImage) {
                    if (($key = array_search($deletedImage, $existingImages)) !== false) {
                        unset($existingImages[$key]);
                        // Delete the image file
                        $imagePath = public_path('/uploads/indicators/' . $deletedImage);
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                    }
                }
                $indicator->image_path = json_encode(array_values($existingImages));
            }

            // Update other fields
            $indicator->title = $request->input('title');
            $indicator->link = $request->input('link');
            $indicator->price = $request->input('price');
            $indicator->brand = $request->input('brand');
            $indicator->manufacture = $request->input('manufacture');
            $indicator->related = implode(',', $request->input('related'));
            $indicator->description = $request->input('description');

            $indicator->save();

            session()->flash('success', 'Indicator has been updated successfully!');
            return redirect()->route('indicator.index');
        } else {
            session()->flash('error', 'Error occurred while updating Indicator!');
            return redirect()->route('indicator.index');
        }
    }


    public function destroy($id)
    {
        $indicator = Indicator::find($id);
        $destination = 'public/uploads/indicators/'.$indicator->photo;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $indicator->delete();
        session()->flash('success', 'Indicators Deleted Successfully!');
        return redirect()->route('indicator.index');
    }



    
}
