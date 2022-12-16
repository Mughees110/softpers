<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Http\Request;
use App\Models\User;

class users implements ToCollection
{
    public $documentId; 
    
    public function __construct($documentId){
        $this->documentId=$documentId;
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        

        foreach ($collection as $key => $value) {
            
            if($value->filter()->isNotEmpty()){
                if($key!=0){
                    $user=new User;
                    $user->name=$value[0];
                    $user->rollNumber=$value[1];
                    $user->class=$value[2];
                    $user->department=$value[3];
                    $user->title=$value[4];
                    $user->document_id=$this->documentId;
                    $user->save();
                }
            }       

        }
        
    }
}
