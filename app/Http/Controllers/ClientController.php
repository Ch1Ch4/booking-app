<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientController extends Controller
{
    public function index(): JsonResource
    {
        return ClientResource::collection(Client::all());
    }

    public function show(Client $client): JsonResource
    {
        return new ClientResource($client);
    }
}
