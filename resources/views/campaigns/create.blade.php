<form action="{{route('campaigns.store', $tab)}}" method="POST" class="space-y-4"
      @submit.prevent="submitForm">
    @csrf
    @if($tab === 'groups')
    <div>
        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Name</label>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"
               type="text"
               name="name"
               id="name"
               value="{{$value ?? ''}}">
        <p x-show="showError" class="mt-2 text-red-600 text-sm">Este campo é obrigatório!</p>
    </div>
    @else
    <div>
        <label for="body" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Body</label>
        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                  name="body"
                  id="body"
                  rows="5">{{$value ?? ''}}</textarea>
        <p x-show="showError" class="mt-2 text-red-600 text-sm">Este campo é obrigatório!</p>
    </div>
    @endif

    <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors">
        {{$btn}}
    </button>
</form>

