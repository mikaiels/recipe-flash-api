<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Validator;
use App\Models\Ingredient;
use App\Http\Resources\Ingredients;



class IngredientsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ingredient::latest()->get();
        return response()->json([Ingredients::collection($data), 'Programs fetched.']);
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
            'color' => 'required',
            'img' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $Ingredient = Ingredient::create([
            'name' => $request->name,
            'color' => $request->color,
            'img' => $request->img
         ]);


        
        return response()->json(['recipes created successfully.', new Ingredients($Ingredient)]);
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $Ingredient = Ingredients::find($id);
        if (is_null($Ingredient)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new Ingredients($recipe)]);
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredients $Ingredient)
    {
        $Ingredient->delete();

        return response()->json('recipe deleted successfully');
    }
}
