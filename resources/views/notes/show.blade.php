<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Notes') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex">
        <p class="opacity-70">
          <strong>作成日： </strong> {{ $note->created_at->diffForHumans() }}
        </p>
        <p class="opacity-70 ml-8">
          <strong>更新日： </strong> {{ $note->updated_at->diffForHumans() }}
        </p>
        <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-auto">メモを編集</a>
        <form action="{{ route('notes.destroy', $note) }}" method="post">
          @method('delete')
          @csrf
          <button type="submit" class="btn btn-danger ml-4" onClick="return confirm('このメモを本当に削除しますか？')">メモを削除</button>
        </form>
      </div>
      <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg mt-6">
        <h2 class="font-bold text-2xl">
          {{ $note->title }}
        </h2>
        <p class="mt-2">
          {{ $note->text }}
        </p>
      </div>
    </div>
  </div>
</x-app-layout>