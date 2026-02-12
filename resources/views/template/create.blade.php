<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <a href="{{ route('templates.index') }}"
               class="text-gray-400 hover:text-gray-600 dark:hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Voltar') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 dark:border-gray-700">
                <div class="p-8">
                    <form action="{{route('templates.store')}}" method="POST"  class="space-y-6" id="editorForm">
                        @csrf

                        <div>
                            <label for="title"
                                   class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                {{ __('Título do Template') }}
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition"
                                placeholder="Ex: Newsletter Semanal"
                                value="{{ old('name') }}"
                                required
                            />
                            @error('title')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="editor">
                            <label for="body" class="block mb-2 text-sm font-semibold text-gray-700 dark:test-gray-300">
                                {{__('Conteúdo do Template') }}
                            </label>

                            <div id="editor-container" style="height: 300px;"></div>
                            <input type="hidden" name="body" id="quill-content-input" value="{{ old('content') }}">
                        </div>


                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit"
                                    class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-3 text-center transition-all shadow-md shadow-blue-200 dark:shadow-none">
                                {{ __('Criar') }}
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

    {{-- Provide initial Quill content (e.g. after validation error) to the front-end JS --}}
    <script>
        window.__quillInitialContent = {!! json_encode(old('content') ?? '') !!};
    </script>
</x-app-layout>
