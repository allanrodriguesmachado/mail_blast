<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight">
                    {{ __('Listas de Templates') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Gerencie seus templates</p>
            </div>

            <div class="flex items-center gap-3 mt-4 md:mt-0">
                <form action="{{ route('mail.index') }}" method="GET" class="relative hidden sm:block">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 ps-10 p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                           placeholder="Buscar template...">
                </form>

                <a href="{{ route('templates.create') }}"
                   class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 transition-all">
                    <svg class="w-5 h-5 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Novo
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

{{--                    <div class="mb-6 flex justify-between items-center">--}}
{{--                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">--}}
{{--                            Mostrando <span class="text-gray-900 dark:text-white font-bold">{{ $mail->count() }}</span>--}}
{{--                            registros--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div
                        class="bg-white dark:bg-gray-800 shadow-sm border border-gray-200 dark:border-gray-700 sm:rounded-xl overflow-hidden">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700/50 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-4 font-bold">ID</th>
                                <th class="px-6 py-4 font-bold">Título da Lista</th>
                                <th class="px-6 py-4 font-bold text-center">Assinantes</th>
                                <th class="px-6 py-4 text-right">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($templates as $template)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors">
                                    <td class="px-6 py-4 font-mono text-xs text-gray-400">
                                        #{{ $template->id }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $template->name }}</div>
                                        <div class="text-xs text-gray-400">Criado em {{ $template->created_at?->format('d/m/Y') }}</div>
                                    </td>
{{--                                    <td class="px-6 py-4">--}}
{{--                                        <div class="flex justify-end items-center gap-4">--}}
{{--                                            <a href="{{ route('subscribes.index', $listMail->id) }}"--}}
{{--                                               class="text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors"--}}
{{--                                               title="Ver Assinantes">--}}
{{--                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"--}}
{{--                                                     viewBox="0 0 24 24">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                          stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                          stroke-width="2"--}}
{{--                                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>--}}
{{--                                                </svg>--}}
{{--                                            </a>--}}

{{--                                            <a href="{{route('mail.edit', $listMail)}}"--}}
{{--                                               class="text-gray-400 hover:text-yellow-500 transition-colors"--}}
{{--                                               title="Editar">--}}
{{--                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"--}}
{{--                                                     viewBox="0 0 24 24">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                          stroke-width="2"--}}
{{--                                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>--}}
{{--                                                </svg>--}}
{{--                                            </a>--}}

{{--                                            <form action="{{ route('mail.destroy', $listMail->id) }}" method="POST"--}}
{{--                                                  onsubmit="return confirm('Deseja excluir esta lista?')">--}}
{{--                                                @csrf @method('DELETE')--}}
{{--                                                <button class="text-gray-400 hover:text-red-600 transition-colors">--}}
{{--                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"--}}
{{--                                                         viewBox="0 0 24 24">--}}
{{--                                                        <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                              stroke-width="2"--}}
{{--                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>--}}
{{--                                                    </svg>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="max-w-sm mx-auto">
                                            <div
                                                class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700 mb-4">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Nenhuma lista
                                                encontrada</h3>
                                            <p class="text-sm text-gray-500 mt-1 mb-6">Comece criando sua primeira lista
                                                de contatos para suas campanhas.</p>
                                            <a href="{{ route('templates.create') }}"
                                               class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors">Criar
                                                Lista</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $templates->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
