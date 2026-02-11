{{--<x-app-layout>--}}

{{--    <form action="{{route('subscribes.store',[$mail_id])}}" method="post">--}}
{{--        @csrf--}}
{{--        <input type="text" name="name" >--}}

{{--        <input type="text" name="email">--}}

{{--        <button type="submit">Salvar</button>--}}
{{--    </form>--}}
{{--</x-app-layout>--}}


<x-app-layout>
    <div class="mt-2 bg-gray-100 dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="p-8">

                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Criar Usuario
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Atualize o título da sua mensagem de forma rápida.
                        </p>
                    </div>

                    <form action="{{route('subscribes.store',[$mail_id])}}" method="post" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Nome
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                                placeholder="Ex: Relatório Mensal de Vendas"
                            >

                            @error('name')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                               E-mail
                            </label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                                placeholder="Ex: mail@mail.com.br"
                            >

                            @error('name')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div
                            class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ url()->previous() }}"
                               class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition">
                                Cancelar
                            </a>
                            <button
                                type="submit"
                                class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-md hover:shadow-lg focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 active:transform active:scale-95"
                            >
                                Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
