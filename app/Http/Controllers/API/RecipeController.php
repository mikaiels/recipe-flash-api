<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\recipe;
use App\Http\Resources\Recipes;

class RecipeController extends Controller
{ 
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = recipe::latest()->get();
        return response()->json([Recipes::collection($data), 'Programs fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'description' => 'required',
            'author_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $recipe = recipe::create([
            'name' => $request->name,
            'description' => $request->description,
            'author_id' => $request->author_id
         ]);


        
        return response()->json(['recipes created successfully.', new Recipes($recipe)]);
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $recipe = Recipes::find($id);
        if (is_null($recipe)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new Recipes($recipe)]);
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipes $recipe)
    {
        $recipe->delete();

        return response()->json('recipe deleted successfully');
    }
}
