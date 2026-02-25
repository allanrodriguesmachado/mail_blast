<form action="{{route('campaigns.store', $lab)}}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="body" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Body</label>
        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-700"
                  name="body"
                  id="body"
                  rows="5">{{$value ?? ''}}</textarea>
    </div>

    <!-- Sem next_tab porque é o último step -->
    <button type="submit"
            class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg transition-colors">
        ✓ Finalizar
    </button>
</form>

