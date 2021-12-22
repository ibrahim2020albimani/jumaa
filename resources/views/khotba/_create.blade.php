    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl">
       رفع ملفات الخطب
    </div>

    <form method="post" action="{{route('khotba.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mt-3 text-gray-700 text-sm font-bold">{{__('hijri_date')}}</div>
        <div class="input-group">
            <select name="hijri_day" class="">
                @for($num=1; $num<=30;$num++)
                <option value="{{$num}}">{{$num}}</option>
                @endfor
            </select>
            <select name="hijri_month" class="">
                <option value="محرم">مُحَرَّم</option>
                <option value="صفر">صَفَر‎</option>
                <option value="ربيع الأول">رَبِيع ٱلْأَوَّل‎</option>
                <option value="ربيع الثاني">رَبِيع ٱلثَّانِي</option>
                <option value="جمادى الأولى">جُمَادَىٰ ٱلْأُولَىٰ</option>
                <option value="جمادى الثانية">جُمَادَىٰ ٱلثَّانِيَة‎</option>
                <option value="رجب">رَجَب‎</option>
                <option value="شعبان">شَعْبَان‎</option>
                <option value="رمضان">رَمَضَان‎</option>
                <option value="شوال">شَوَّال‎</option>
                <option value="ذو القعدة">ذُو ٱلْقَعْدَة</option>
                <option value="ذو الحجة">ذُو ٱلْحِجَّة</option>
            </select>
            <select name="hijri_year" class="">
                @for($num=1444; $num>=1430;$num--)
                <option value="{{$num}}">{{$num}}</option>
                @endfor
            </select>
        </div>
        <div class="mt-3 text-gray-700 text-sm font-bold">{{__('pdf_file')}}</div>
        <input name="pdf_file" type="file" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

        <div class="mt-3 text-gray-700 text-sm font-bold">{{__('word_file')}}</div>
        <input name="word_file" type="file" class=" appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

        <div class="mt-3 text-gray-700 text-sm font-bold">{{__('title')}}</div>
        <input name="title" class=" appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

        <button class="mt-3 w-full hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">
            {{__('save')}}
        </button>
    </form>
     </div>