<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
<form action="{{route('user.store')}}" method="post">
    @csrf
        {{__('name')}}
        <input name="name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        {{__('email')}}
        <input name="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    
    	<button class="mt-3 w-full hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">
            {{__('save')}}
        </button>
</form>
</div>