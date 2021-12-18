<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <h3>آخر الخطب</h3>

                @if($khotba)
                <div class="mt-4">
                    {{$khotba->title}}
                    <div>
                        <small>خطبة الجمعة {{$khotba->hijri_day}} {{$khotba->hijri_month}} {{$khotba->hijri_year}} هجري</small>
                    </div>
                </div>
                @else
                    <div class="mt-4">
                    لايوجد
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
