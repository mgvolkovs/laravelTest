<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DocumentRepository;
use App\Http\Requests\DocumentRequest;
use App\Http\Resources\DocumentGetResource;
use App\Http\Resources\DocumentShowResource;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DocumentGetResource::collection(Document::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        $documentRepository = new DocumentRepository();

        return $documentRepository->saveWithChildren($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new DocumentShowResource(Document::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
}
