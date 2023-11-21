<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
             <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full flex mt-1 mb-6">
                    <button class="w-auto inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-500 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        <a href="{{ route('categories.index') }}">Back</a>
                    </button>
                </div>
                <div class="w-full flex" style="width: 100%;display: flex;flex-wrap: wrap;flex-direction: row;justify-content: space-between;">
                   
                    <form method="post" action="{{ route('categories.store') }}" class="w-full flex-collum mt-6 space-y-6 px-6 " enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for=""> Title</label>
                            <input class="mt-1 block w-full" type="text" name="name" id="">
                        </div>
                        <div>
                            <label for=""> Content</label>
                            {{-- <input class="mt-1 block w-full" type="text" name="" id=""> --}}
                            <textarea class="mt-1 block w-full"  name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div>
                            <label for=""> Cover</label>
                            <input class="mt-1 block w-full" type="file" type="file" name="cover" accept="image/*" id="">
                        </div>
                       
                        <div>
                            <button type="submit" class="w-auto inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" value="save"> save</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>