<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Notes') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
        <form action="{{ route('notes.store')}}" method="post">
          @csrf
          <x-text-input type="text" name="title" placeholder="件名" class="w-full" autocomplete="off"></x-text-input>
          <x-textarea name="text" rows="10" placeholder="入力してください。" class="w-full mt-6"></x-textarea>
          <x-button class="mt-6">メモを保存</x-button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>