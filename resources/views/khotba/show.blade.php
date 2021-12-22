<x-guest-layout>
    <div class="py-12">
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
	                    @auth
	                    @if(auth()->user()->hasPermission($khotba->id))
	                    <div style="display:flex;justify-content: space-around;margin-top: 50px;">
	                    	<a href="{{route('khotba.edit',$khotba->id)}}">{{__('edit')}}</a>
	                    	<a onclick="return confirm('هل متأكد؟')" href="{{route('khotba.destroy',$khotba->id)}}" class="text-danger">{{__('destroy')}}</a>
	                    </div>
	                    @endif
	                    <small><i>بواسطة:</i> {{$khotba->user->name}}</small>
	                    @endauth
	                </div>
	            </div>
	        </div>
    	</div>
    </div>
</x-guest-layout>
