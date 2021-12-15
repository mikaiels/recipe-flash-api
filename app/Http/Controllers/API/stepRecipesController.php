<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\stepRecipe;
use App\Http\Resources\step_recipe;

//recipe = model
//Recipes = resource

class stepRecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = stepRecipe::latest()->get();
        return response()->json([step_recipe::collection($data), 'Programs fetched.']);
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
            'recipe_id' => 'required',
            'step_number' => 'required',
            'description' => 'required',
            'timer' => 'required',
            'image' => 'required'
            
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $stepRecipe = stepRecipe::create([
            'recipe_id' => $request->recipe_id,
            'step_number' => $request->step_number,
            'description' => $request->description,
            'timer' => $request->timer,
            'image' => $request->image
         ]);


        
        return response()->json(['recipes created successfully.', new step_recipe($stepRecipe)]);
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $stepRecipe = step_recipe::find($id);
        if (is_null($stepRecipe)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new step_recipe($stepRecipe)]);
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(stepRecipe $stepRecipe)
    {
        $stepRecipe->delete();

        return response()->json('recipe deleted successfully');
    }
}
