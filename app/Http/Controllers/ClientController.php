<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Client;
use App\Http\Resources\Client as ClientResource;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Paginate 15 users.
      $clients = Client::paginate(15);

      return ClientResource::collection($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = $request->isMethod('put') ? Client::findOrFail($request->client_id) : new Client;

        $client->id = $request->input('client_id');
        $client->user_id = $request->input('user_id');
        $client->name = $request->input('name');
        $client->address = $request->input('address');

        if ($client->save()) {
          return new ClientResource($client);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);

        return new ClientResource($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Get Location
      $client = Client::findOrFail($id);

      if ($client->delete()) {
        return new ClientResource($client);
      }
    }
}
