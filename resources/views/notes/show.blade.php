<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ !$note->trashed() ? __('Note') : __('ゴミ') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <x-alert-success>
        {{ session('success') }}
      </x-alert-success>
      <div class="flex">
        @if(!$note->trashed())
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
            <button type="submit" class="btn btn-danger ml-4" onClick="return confirm('このメモをゴミ箱に移動しますか？')">{{__('Move to Trash')}}</button>
          </form>
        @else
          <p class="opacity-70">
            <strong>削除日： </strong> {{ $note->deleted_at->diffForHumans() }}
          </p>
          <form action="{{ route('trashed.update', $note) }}" method="post" class="ml-auto">
            @method('put')
            @csrf
            <button type="submit" class="btn-link">{{__('Restore Note')}}</button>
          </form>

          <form action="{{ route('trashed.destroy', $note) }}" method="post" class="ml-4">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger" onClick="return confirm('このメモを完全に削除しますか？この処理は取り消せません。')">{{__('Delete Forever')}}</button>
          </form>
        @endif
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