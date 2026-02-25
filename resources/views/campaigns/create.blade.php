<form action="{{route('campaigns.store')}}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Name</label>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"
               type="text"
               name="name"
               id="name"
               value="{{$value ?? ''}}">
    </div>

    <input type="hidden" name="next_tab" value="likes">

    <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors">
        Próximo →
    </button>
</form>

