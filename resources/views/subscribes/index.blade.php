<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Assinantes') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Lista de inscritos para este e-mail.</p>
            </div>

            <div class="flex items-center gap-2">
                <span
                    class="inline-flex items-center bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                    {{ $subscribes->count() }} {{ $subscribes->count() === 1 ? 'assinante' : 'assinantes' }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5 ">
                        <div class="flex items-center justify-start gap-3">
                            <a
                                href="{{ route('subscribes.create', $mail) }}"
                                class="group inline-flex items-center px-4 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-indigo-500/30 transition-all duration-200 active:scale-95"
                            >
                                <svg class="w-5 h-5 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span class="ml-2">Criar novo assinante</span>
                            </a>
                        </div>
                    </div>

                    <div class="w-full md:w-72">
                        <form action="{{ route('subscribes.index', $mail) }}" method="GET" class="w-full">
                            <label for="search" class="sr-only">Pesquisar assinante</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                                    </svg>
                                </div>
                                <input
                                    id="search"
                                    name="search"
                                    type="search"
                                    value="{{ request('search') }}"
                                    placeholder="Pesquisar assinante..."
                                    class="w-full pl-10 pr-3 py-2 rounded-md border border-gray-300 bg-white text-sm text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                />
                            </div>
                        </form>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4 w-16">#</th>
                            <th scope="col" class="px-6 py-4">Nome</th>
                            <th scope="col" class="px-6 py-4">E-mail</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                            <th scope="col" class="px-6 py-4">Criado em</th>
                            <th scope="col" class="px-6 py-4">Deletar</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($subscribes as $subscribe)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $subscribe->id ?? '—' }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $subscribe->name ?? '—' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $subscribe->email ?? '—' }}
                                </td>
                                <td class="px-6 py-4">
                                    @php($isActive = isset($subscribe->status) ? (bool) $subscribe->status : true)
                                    @if($isActive)
                                        <span
                                            class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                                Ativo
                                            </span>
                                    @else
                                        <span
                                            class="inline-flex items-center bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                                <span class="w-2 h-2 me-1 bg-gray-500 rounded-full"></span>
                                                Inativo
                                            </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ optional($subscribe->created_at)->format('d/m/Y H:i') ?? '—' }}
                                </td>

                                <td>
                                    <div class="flex justify-center">
                                        <form action="{{route('subscribes.destroy', [$mail, $subscribe])}}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-gray-400 hover:text-red-600 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>

                                        <a href="{{route('subscribes.edit', $subscribe)}}" class="text-gray-400 hover:text-yellow-500 transition-colors"
                                           title="Editar">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-14 h-14 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <p class="text-gray-500 dark:text-gray-400 text-base">Nenhum assinante
                                            encontrado.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
