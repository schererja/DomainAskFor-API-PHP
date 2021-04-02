<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class SynonymController extends Controller
{
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

        $response = Http::get('https://dictionaryapi.com/api/v3/references/thesaurus/json/' . $id . '?key=634b384f-1274-4745-8fdb-bdeb34876d9f');
        $dictionaryResponse = json_decode($response, true);
        $synonyms = [];
        foreach ($dictionaryResponse as $element) {
            //echo var_dump($element["meta"]["syns"]);
            foreach ($element["meta"]["syns"] as $synonymsArray) {
                foreach ($synonymsArray as $synonym) {
                    array_push($synonyms, $synonym);
                }
            }
        }
        return response()->json(array("synonyms" => $synonyms), Response::HTTP_ACCEPTED);
    }
}
