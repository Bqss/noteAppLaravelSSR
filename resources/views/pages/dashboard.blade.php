<x-app-layout title="Dashboard">
    @if (session("msg"))
        <x-toast title="Succes" :msg="session('msg')" :type="2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </x-toast>
    @endif
    <div class="mt-6" x-data="modal">
        <div class="flex items-end justify-between">
            <button @click="showModal" class="bg-blue-600 text-base font-medium px-4 py-2 rounded-md text-text-dark">Add
                Notes</button>
            <form action="">
                <div class="relative">
                    <input type="text" id="search"
                        class=" text-sm text-text-light focus:pl-5 transition-all peer dark:text-text-dark bg-white dark:bg-secondary-dark  px-5 py-2 pl-10  border outline-none rounded-md border-gray-300 dark:border-transparent  focus:border-blue-500  dark:focus:border-blue-500 "
                        name="search" value="{{$search_key ?? ''}}" placeholder="Search by title">
                    <label for="search"
                        class="absolute left-2 top-1/2 -translate-y-1/2 cursor-text peer-focus:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="stroke-black dark:stroke-white" stroke-width="1.5" width="20" height="20">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </label>
                </div>
            </form>
        </div>
        <div class=" text-text-dark  z-10 absolute inset-0 grid place-items-center backdrop-blur-sm " x-show="show"
            x-init="@if ($errors->any()) showModal @endif" x-transition>
            <div class="w-11/12 max-w-2xl p-6 pt-8 rounded-lg bg-white -mt-10 bg-gray-white text-black dark:text-white dark:bg-[#1A1B1E]"
                @click.outside="hide">
                <div class="flex justify-between">
                    <span>Create New Note</span>
                    <button @click="hide">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form action="/" method="post" class="mt-10">
                    @csrf
                    <div class="mb-2">
                        <label for="title " class="text-sm">Title*</label>
                        <input type="text"
                            class="w-full rounded-md bg-white dark:bg-secondary-dark text-sm p-2 px-5 border ring-1 ring-transparent border-gray-300 dark:border-gray-700 outline-none  transition-color duration-150  @error('title')  border-red-500 dark:border-red-500 focus:border-red-500 dark:focus:border-red-500 focus:ring-red-300/60 @enderror focus:ring-blue-300/50 focus:border-blue-500  dark:focus:border-blue-500 "
                            name="title" id="title">
                        <small class="text-xs text-red-500 mt-1">{{ $errors->first('title') ?? null }}</small>
                    </div>
                    <div class="">
                        <label for="body" class="text-sm">Body*</label>
                        <textarea name="body" id="body"
                            class="w-full rounded-md resize-none bg-white dark:bg-secondary-dark text-sm p-2 px-5 border ring-1 ring-transparent border-gray-300 dark:border-gray-700 outline-none transition-color duration-150   @error('body') border-red-500 dark:border-red-500  focus:border-red-500 dark:focus:border-red-500 focus:ring-red-300/60 @enderror focus:ring-blue-300/50  focus:border-blue-500 dark:focus:border-blue-500"
                            rows="10"></textarea>
                        <small class="text-xs text-red-500 mt-1">{{ $errors->first('body') ?? null }}</small>
                    </div>
                    <input type="submit"
                        class="w-full bg-blue-600  text-white dar rounded-md py-3 text-sm mt-2 hover:bg-blue-500"
                        role="button" value="Add Note">
                </form>
            </div>

        </div>
        @if ( count($notes)>0)
            <div class="grid items-start mt-6 grid-cols-1 max-h-[70vh] scrollbar-thin scrollbar-track-black  scrollbar-thumb-gray-400 hover:scrollbar-thumb-gray-100  scrollbar-thumb-rounded-md   overflow-y-scroll sm:grid-cols-2 lg:grid-cols-3 gap-6 ">
                @foreach ($notes as $note)
                   <x-note  :data="$note"></x-note> 
                @endforeach
            </div>
        @else
            <p class="text-center rounded-lgf bg-white dark:bg-secondary-dark py-24 mt-8 ">There's no active note</p>
        @endif
    </div>
</x-app-layout>
