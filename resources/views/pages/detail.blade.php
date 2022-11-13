<x-app-layout title="Detail">
    <div class="mt-6 bg-white dark:bg-secondary-dark text-text-light dark:text-text-dark   p-6 rounded-lg">
        <h3 class="">{{$note["note_title"]}}</h2>
        <p class="text-sm mt-4">{{$note['created_at']}}</p>
        <p class="text-sm mt-3">{{$note['note_text']}}</p>
    </div>
</x-app-layout>