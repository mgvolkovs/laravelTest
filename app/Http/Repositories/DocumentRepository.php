<?php

namespace App\Http\Repositories;

use App\Http\Requests\DocumentRequest;
use App\Http\Resources\DocumentShowResource;
use App\Models\Document;
use App\Models\DocumentConfiguration;

class DocumentRepository {
    public function saveWithChildren(DocumentRequest $request){

        $validatedRequest=$request->validated();

        $document = new Document;
        $document->document_name=$validatedRequest['document_name'];
        $document->created_at=date("Y-m-d H:i:s");
        $document->save();

        $decodedFormValues=json_decode($validatedRequest['form_values']);

        foreach ($decodedFormValues as $field){
            $docConfig=new DocumentConfiguration;
            $docConfig->document_id=$document->id;
            $docConfig->field_seq=$field->field_seq;
            $docConfig->is_mandatory=$field->is_mandatory;
            $docConfig->field_type=$field->field_type;
            $docConfig->field_name=$field->field_name;
            $docConfig->select_values=json_encode($field->select_values);
            $docConfig->save();
        }


        return new DocumentShowResource($document);
    }
}
