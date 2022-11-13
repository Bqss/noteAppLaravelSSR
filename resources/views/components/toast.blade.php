   <div aria-live="assertive" class="fixed inset-0  flex items-start px-4 py-6 pointer-events-none sm:p-6 sm:items-start"
       x-data="toast">
       <div class="w-full flex flex-col items-center space-y-4 sm:items-end" x-show="isShow"
           x-transition:leave="transition linear duration-[1000ms]" x-transition:leave-start="opacity-100 translate-x-0"
           x-transition:leave-end="opacity-0 translate-x-full" x-init="init()">
           <div @class([
               'w-11/12 max-w-sm shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden',
               'bg-red-500' => $type === 0,
               'bg-yellow-500' => $type === 1,
               'bg-green-500' => $type === 2,
           ])>
               <div class="p-4">
                   <div class="flex items-center">
                       <div class="flex-shrink-0">
                           <!-- Heroicon name: outline/check-circle -->
                           {{ $slot }}
                       </div>
                       <div class="flex w-full items-center">
                           <div class="ml-3  flex-1 pt-0.5">
                               <p class="text-base font-medium text-black dark:text-white">{{ $title }}</p>
                               <p class="mt-1 text-sm text-black dark:text-white ">{{ $msg }}</p>
                           </div>
                           <button
                               class="bg-white rounded-md inline-flex ml-auto text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 group"
                               @click="hide">
                               <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                   fill="currentColor" aria-hidden="true">
                                   <path fill-rule="evenodd"
                                       d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                       clip-rule="evenodd" />
                               </svg>
                           </button>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
