<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Minhas Listas de E-mail') }}
            </h2>
            <a href="{{ route('list.create') }}"
               class="w-full md:w-auto inline-flex justify-center items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nova Lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6 flex justify-end">
                <form action="{{ route('list') }}" method="GET" class="relative w-full md:w-72">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Pesquisar listas..."
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg text-sm">
                </form>
            </div>

            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="overflow-x-auto">
                    <table class="w-full text-center text-sm ">
                        <thead
                            class="bg-gray-50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-300 uppercase text-xs font-bold">
                        <tr>
                            <th scope="col" class="px-6 py-4">Nome da Lista</th>
                            <th scope="col" class="px-6 py-4">Criado em</th>
                            <th scope="col" class="px-6 py-4">Qtd</th>
                            <th scope="col" class="px-6 py-4 ">Ações</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($emptyList as $list)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $list->title }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                    {{ $list->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                    {{ $list->subscript_count }}
                                </td>
                                <td class="px-6 py-4  space-x-2 text-center">
                                    <a href="{{route('list.subscribers', $list->id)}}"
                                       class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 font-semibold">Editar</a>
                                    <a href="{{route('destroy.subscribers', $list->id)}}"
                                       class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 font-semibold">Excluir</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                        </svg>
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Nenhuma lista
                                            encontrada</h3>
                                        <p class="text-gray-500 dark:text-gray-400">Comece criando sua primeira lista de
                                            contatos.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                @if($emptyList->hasPages())
                    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-200 dark:border-gray-700">
                        {{ $emptyList->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
