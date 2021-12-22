<x-guest-layout>
	<form method="post" action="{{route('khotba.update',$khotba->id)}}" enctype="multipart/form-data">
		@csrf
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
	                            <div class="mt-3 text-gray-700 text-sm font-bold">{{__('pdf_file')}}</div>
				        <input name="pdf_file" type="file" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

				        <div class="mt-3 text-gray-700 text-sm font-bold">{{__('word_file')}}</div>
				        <input name="word_file" type="file" class=" appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

				        <div class="mt-3 text-gray-700 text-sm font-bold">{{__('title')}}</div>
				        <input name="title" class=" appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

				        <button class="mt-3 w-full hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">
				            {{__('update')}}
				        </button>
	                    
	                </div>
	            </div>
	        </div>
    	</div>
    </div>
    </form>
</x-guest-layout>
