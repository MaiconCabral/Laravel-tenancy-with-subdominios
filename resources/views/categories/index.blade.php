<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('warning'))
                <div class="px-6 py-6 text-left text-white bg-red-500 rounded-md border" role="alert">
                    {{ session('warning') }}
                </div>
            @endif
            @if (session('message'))
                <div class="px-6 py-6 text-left text-white bg-gray-800 rounded-md border" role="alert">
                    {{ session('message') }}
                </div>
            @endif

             <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full flex mt-1 mb-6">
                    <button type="button" class="w-auto inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-500 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        <a href="{{ route('categories.create')}}"> New Category </a>
                    </button>
                </div>
                <div class="w-full flex" style="width: 100%;display: flex;flex-wrap: wrap;flex-direction: row;justify-content: space-between;">
                   
                        @foreach($categories as $category)
                            <div class="rounded overflow-hidden" style="width: 30%; margin:5px 0;">
                                <img class="w-full post-cover" src="{{$category->cat_cover}}" alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{$category->name}}</div>
                                <p class="text-gray-700 text-base">
                                    {{ Str::words($category->description, 10, '...') }}
                                </p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                                </div>
                            </div>
                       
                        @endforeach
                    
                </div>
            </div>

        </div>
    </div>
</x-app-layout>