<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 mt-3">
                @if(count($khotbas)==0)
                <center>
                    <h2 style="font-family: 'Helvetica Neue'; color: orange;">لايوجد</h2>
                </center>
                @else
                <div>
                    @foreach($khotbas as $khotba)
                    <center>
                        <a href="{{route('khotba.show',$khotba->id)}}">{{$khotba->title}}</a>
                        <div>
                            <small>خطبة الجمعة {{$khotba->hijri_day}} {{$khotba->hijri_month}} {{$khotba->hijri_year}} هجري</small>
                        </div>
                    </center>
                    <div class="center mt-3">

                        <a href="{{asset('storage/'.$khotba->pdf_file_url)}}">
                            <img class="px-5 display-img-icon" src="{{asset('img/icon/pdf.png')}}" alt="" width="30">
                        </a>

                        <a href="{{asset('storage/'.$khotba->word_file_url)}}">
                            <img class="px-5 display-img-icon" src="{{asset('img/icon/word.png')}}" alt="" width="20">
                        </a>
                        
                    </div>
                    <hr>
                    @endforeach
                </div>
                {{$khotbas->links()}}
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
