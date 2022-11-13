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
        <div class="flex items-end justify-end  ">
       
            <form action="/archive" method="get">
                <div class="relative">
                    <input type="text" id="search"
                        class=" text-sm text-text-light focus:pl-5 transition-all peer dark:text-text-dark bg-white dark:bg-secondary-dark  px-5 py-2 pl-10  border outline-none rounded-md border-gray-300 dark:border-transparent  focus:border-blue-500  dark:focus:border-blue-500 "
                        name="search" value="{{$search_key ?? ""}}" placeholder="Search by title">
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
       
        @if (isset($notes) && count($notes)>0)
            <div class="grid items-start mt-6 grid-cols-1 h-[70vh] scrollbar-thin scrollbar-track-black  scrollbar-thumb-gray-400 hover:scrollbar-thumb-gray-100  scrollbar-thumb-rounded-md   overflow-y-scroll sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($notes as $note)
                   <x-note  :data="$note"></x-note> 
                @endforeach
            </div>
        @else
            <p class="text-center rounded-lgf bg-white dark:bg-secondary-dark py-24 mt-8 ">There's no active note</p>
        @endif
    </div>
</x-app-layout>
