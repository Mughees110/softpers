<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Document;
use DB;
use Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\users;


class AdminController extends Controller
{
    public function documents(){
        $documents=Document::all();
        return view('admin-panel.documents.index',compact('documents'));
    }
    public function documentsStore(Request $request){
        //Creating new document and passing its id for importing
        $document=new Document;
        $document->name=$request->file('file')->getClientOriginalName();
        $document->save();
        $documentId=$document->id;

        Excel::import( new users($documentId),$request->file('file'));
        if($request->session()->has('message2')){
            return redirect()->back();
        }
        if(!$request->session()->has('message2')){
            return redirect()->back()->with('message','Imported successfully');
        }
    }
    public function documentsCreate(){
        return view('admin-panel.documents.create');
    }
    public function viewDocument($id){
        $document=Document::find($id);
        return view('admin-panel.documents.view',compact('document'));
    }
}
