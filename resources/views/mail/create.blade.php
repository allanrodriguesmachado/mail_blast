<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <a href="{{ route('mail.index') }}"
               class="text-gray-400 hover:text-gray-600 dark:hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nova Lista de E-mail') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 dark:border-gray-700">
                <div class="p-8">
                    <form action="{{route('mail.store')}}" method="POST" enctype="multipart/form-data"
                          class="space-y-6">
                        @csrf

                        <div>
                            <label for="title"
                                   class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                {{ __('Título da Campanha') }}
                            </label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition"
                                placeholder="Ex: Newsletter Semanal - Clientes VIP"
                                value="{{ old('title') }}"
                                required
                            />
                            @error('title')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                {{ __('Importar Assinantes (CSV)') }}
                            </label>

                            <div class="flex items-center justify-center w-full">
                                <label for="attachment"
                                       class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:border-gray-700 dark:hover:border-gray-600 transition">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 font-medium">Clique para
                                            fazer upload ou arraste</p>
                                        <p class="text-xs text-gray-400">Apenas arquivos .CSV</p>
                                    </div>
                                    <input id="attachment" name="attachment" type="file" accept=".csv" class="hidden"/>
                                </label>
                            </div>
                            @error('attachment')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit"
                                    class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-3 text-center transition-all shadow-md shadow-blue-200 dark:shadow-none">
                                {{ __('Criar e Enviar') }}
                            </button>

                            <a href="{{ route('mail.index') }}"
                               class="w-full text-gray-600 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 font-bold rounded-lg text-sm px-5 py-3 text-center transition-all">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
