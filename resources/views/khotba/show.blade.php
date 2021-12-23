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
                            <img class="px-2 display-img-icon" src="{{asset('img/icon/pdf.png')}}" alt="" width="45">
                        </a>
                        <a href="{{asset('storage/'.$khotba->word_file_url)}}">
                            <img class="px-2 display-img-icon" src="{{asset('img/icon/word.png')}}" alt="" width="35">
                        </a>
                        
                        
                        <a target="_blank" href="https://wa.me/?text=خطبة الجمعة%20{{$khotba->hijri_day}}%20{{$khotba->hijri_month}}%20{{$khotba->hijri_year}}%20هجري%03{{$khotba->title}}%03{{route('khotba.show',$khotba->id)}}">
                            <img class="px-2 display-img-icon" src="https://static.whatsapp.net/rsrc.php/ym/r/36B424nhiL4.svg" alt="WhatsApp" width="145">
                        </a>
                        <a target="_blank" href="mailto:?subject={{$khotba->title}}&amp;body={{route('khotba.show',$khotba->id)}}"title="مشاركة الخطبة">
                          <img class="px-2 display-img-icon" src="http://png-2.findicons.com/files/icons/573/must_have/48/mail.png" width="45">
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
