<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>

@if($khotba)
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="app-card">
                    <h3><center>( بِسْمِ اللَّـهِ الرَّحْمَـٰنِ الرَّحِيمِ )</center></h3>
                    <center class="title">{{$khotba->title}}</center>
                    <center>
                        <small>خطبة الجمعة {{$khotba->hijri_day}} {{$khotba->hijri_month}} {{$khotba->hijri_year}} هجري</small>
                    </center>
                    <div class="center mt-3">
                        <a href="{{asset('storage/'.$khotba->pdf_file_url)}}">
                            <img class="px-5 display-img-icon" src="{{asset('img/icon/pdf.png')}}" alt="" width="45">
                        </a>
                        <a href="{{asset('storage/'.$khotba->word_file_url)}}">
                            <img class="px-5 display-img-icon" src="{{asset('img/icon/word.png')}}" alt="" width="35">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="app-card">
                    @foreach($khotbas as $khotba)
                    <center>
                        {{$khotba->title}}
                        <div>
                            <small>خطبة الجمعة {{$khotba->hijri_day}} {{$khotba->hijri_month}} {{$khotba->hijri_year}} هجري</small>
                        </div>
                    </center>

                    @auth
                    <div>
                        <a href="{{route('khotba.destroy',$khotba->id)}}" class="text-danger">حذف</a>
                    </div>
                    @endauth

                    <hr>
                    @endforeach
                    <form action="{{route('khotba.search')}}" method="post">
                        @csrf
                        <div class="flex-container" >
                            <button type="submit" class="btn btn-secondary flex-item">{{__('search')}}</button>
                            <input placeholder="السنة أو العنوان" name="search" class="form-control flex-item mx-3" style="direction: rtl;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <center>
                    <a href="{{route('khotba.search')}}">
                        عرض الكل
                    </a>
                </center>
            </div>
        </div>
    </div>


</x-guest-layout>