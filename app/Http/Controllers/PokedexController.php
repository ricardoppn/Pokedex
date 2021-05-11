<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;
use GuzzleHttp\Client;

class PokedexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = 'https://pokeapi.co/api/v2/pokedex/1/';
        $Client = new Client([
            'base_uri' => $url,
            'verify' => false
        ]);
        $res = $Client->get($url);
        $content = (string) $res->getBody();
        $content = json_decode($content);
        $species = $content->pokemon_entries;
        $arrayPokemon = [];
        foreach ($species as $key => $specie) {
            $Pokemon = new Pokemon();
            $Pokemon->setId($specie->entry_number);
            $Pokemon->setName($specie->pokemon_species->name);
            $Pokemon->setImagem("https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$specie->entry_number.png");
            array_push($arrayPokemon, $Pokemon);
        }
        return view('pokedex.index', compact('arrayPokemon'));
    }

    public function Detalhe(Request $request)
    {

        $Pokemon = new Pokemon();
        $imagem = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$request->id.png";
        $detalhes = "https://pokeapi.co/api/v2/pokemon/$request->id/";
        $Pokemon->setId($request->id);
        $Pokemon->setImagem($imagem);
        $detalhes = $Pokemon->consultaAPI($detalhes);
        $Pokemon->setDetalhes($detalhes);
        $Pokemon->setName($detalhes->forms[0]->name);
        return view('pokedex.detalhe', compact('Pokemon'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function consutaDetalhe($species)
    {
        $arrayPokemon = [];
        foreach ($species as $key => $specie) {
            $Pokemon = new Pokemon();
            $imagem = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$specie->entry_number.png";
            //$detalhes = "https://pokeapi.co/api/v2/pokemon/$specie->entry_number/";
            $Pokemon->setId($specie->entry_number);
            $Pokemon->setImagem($Pokemon->consultaAPI($imagem));
            //$Pokemon->setDetalhes($Pokemon->consultaAPI($detalhes));
            array_push($arrayPokemon, $Pokemon);
        }

    }
}