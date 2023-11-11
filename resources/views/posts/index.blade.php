<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
             <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full flex mt-1 mb-6">
                    <button type="button" class="w-auto inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        <a href="{{ route('posts.create')}}"> New Post </a>
                    </button>
                </div>
                <div class="w-full flex" style="width: 100%;display: flex;flex-wrap: wrap;flex-direction: row;justify-content: space-between;">
                   
                        @foreach($posts as $post)
                            <div class="rounded overflow-hidden" style="width: 30%; margin:5px 0;">
                                <img class="w-full post-cover" src="{{$post->url_cover}}" alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{$post->title}}</div>
                                <p class="text-gray-700 text-base">
                                    {{ Str::words($post->body, 10, '...') }}
                                </p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                                </div>
                            </div>
                       
                        @endforeach

                    
                    {{-- @include('profile.partials.update-profile-information-form') --}}
                </div>
            </div>

            {{--<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>