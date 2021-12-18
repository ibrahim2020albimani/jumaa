<?php

namespace App\Http\Controllers;

use App\Models\Khotba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KhotbaController extends Controller
{


    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'title'=>'required',
            'pdf_file'=>'required',
            'word_file'=>'required',
            'hijri_day'=>'required',
            'hijri_month'=>'required',
            'hijri_year'=>'required'
        ]);

        if ($request->hasFile('pdf_file') && $request->hasFile('word_file')) {
            $pdfFilename =$request->pdf_file->getClientOriginalName();
            $wordFilename = $request->word_file->getClientOriginalName();
            $pdfFileUrl = $request->file('pdf_file')->storeAs('khotbas/'.$request->hijri_year,$pdfFilename);
            $wordFileUrl = $request->file('word_file')->storeAs('khotbas/'.$request->hijri_year,$wordFilename);
            $request['pdf_file_url']=$pdfFileUrl;
            $request['word_file_url']=$wordFileUrl;
           
            Khotba::create($request->all());
            return back()->with(['status'=>'success','message'=>'تم']);
        }

        return back()->with(['status'=>'success','message'=>'تم']);
    }

    public function search(Request $request) {
        // return $request->all();
        $search = Khotba::where('title', 'like', '%' . $request->search . '%')
        ->orWhere('hijri_year', 'like', '%' . $request->search . '%');
        
        $khotbas = $search->paginate(50);
        return view('search.result', compact('khotbas'));
    }


    public function edit(Khotba $khotba)
    {
        //
    }


    public function update(Request $request, Khotba $khotba)
    {
        //
    }

 
    public function destroy(Khotba $khotba)
    {
        $khotba->delete();
        Storage::delete($khotba->pdf_file_url);
        Storage::delete($khotba->word_file_url);
        return back()->with(['status'=>'success','message'=>'تم']);
    }
}
