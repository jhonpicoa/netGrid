<?php

namespace App\Http\Controllers;

use App\Helpers\ConsumeApi;
use App\Models\FavoritePokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index() 
    {
        $data = new ConsumeApi('GET','pokemon/');
        $listPokemon = $data->apiResource();
        return response()->json([
            'listPokemon' => $listPokemon
        ]);
    }
    public function show($id) 
    {
        $data = new ConsumeApi('GET', 'pokemon/' . $id);
        $DetailsPokemon = $data->apiResource();
        return response()->json([
            'DetailsPokemon' => $DetailsPokemon
        ]);
    }

    public function favoritePokemon(Request $request)
    {
        $request->validate(
            [
                'ref_api' => 'required' 
            ]
        );
        $pokemon = new FavoritePokemon;
        $pokemon->ref_api = $request->ref_api;
        $pokemon->id_usuario = auth()->user()->id;

        $pokemon->save();

        return response()->json([
            'favoritePokemon' => $pokemon
        ]);
    }
}
