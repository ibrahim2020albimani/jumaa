<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            $user_id = auth()->user()->id;
            $request['user_id']=$user_id;
           
           $Khotba = Khotba::create($request->all());
           $Khotba->khotbaPermissions()->attach($user_id);
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
        return view('khotba.edit',compact('khotba'));
    }


    public function update(Request $request, Khotba $khotba)
    {
        
        if(!$request->pdf_file && !$request->word_file && !$request->title){
            return back()->with(['status'=>'warning','message'=>'لم يتم']);
        }

        if($request->pdf_file){
            Storage::delete($khotba->pdf_file_url);
            $pdfFilename =$request->pdf_file->getClientOriginalName();
            $pdfFileUrl = $request->file('pdf_file')->storeAs('khotbas/'.$khotba->hijri_year,$pdfFilename);
            $khotba->update(['pdf_file_url'=>$pdfFileUrl]);
        }

        if($request->word_file){
            Storage::delete($khotba->word_file_url);
            $wordFilename = $request->word_file->getClientOriginalName();
            $wordFileUrl = $request->file('word_file')->storeAs('khotbas/'.$khotba->hijri_year,$wordFilename);
            $khotba->update(['word_file_url'=>$wordFileUrl]);
        }

        if ($request->title) {
            $khotba->update(['title'=>$request->title]);
        }
        return redirect()->route('welcome_page')->with(['status'=>'success','message'=>'تم']);
    }

 
    public function destroy(Khotba $khotba)
    {
        $khotba->delete();
        Storage::delete($khotba->pdf_file_url);
        Storage::delete($khotba->word_file_url);
        $khotba->khotbaPermissions()->detach();
        return redirect()->route('khotba.show',$khotba->id)
        ->with(['status'=>'success','message'=>'تم']);
    }


    public function show(Khotba $khotba)
    {   
        return view('khotba.show',compact('khotba'));
    }


    public function dashboard()
    {   
        $khotba = Khotba::orderby('id','desc')->first();
        $users = User::orderby('id','desc')->get();
        return view('dashboard',compact('khotba','users'));
    }
    
}
