<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Notes') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <x-alert-success>
        {{ session('success') }}
      </x-alert-success>
      <a href="{{ route('notes.create') }}" class="btn-link btn-lg mb-2">+ メモを追加</a>
      @forelse ($notes as $note)
      <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg mt-6">
        <h2 class="font-bold text-2xl">
          <a href="{{ route('notes.show', $note) }} ">{{ $note->title }}</a>
        </h2>
        <p class="mt-2">
          {{ Str::limit($note->text, 200) }}
        </p>
        <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans()}}</span>
      </div>
      @empty
      <p>メモがありません。</p>
      @endforelse

      {{ $notes->links() }}
    </div>
  </div>
</x-app-layout>