<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 dark:text-white">{{ $template->name }}</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Criado em {{ $template->created_at?->format('d/m/Y \à\s H:i') }}
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 shadow-sm">
                    <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider">Template ID</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">#{{ $template->id }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 shadow-sm">
                    <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider">Última Atualização</p>
                    <p class="text-sm text-gray-900 dark:text-white mt-1 font-medium">{{ $template->updated_at?->diffForHumans() }}</p>
                </div>
            </div>

            <!-- Main Content -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <!-- Content Header -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 px-8 py-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-blue-100 dark:bg-blue-900/50">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Prévia do Template</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Visualização completa do seu conteúdo</p>
                        </div>
                    </div>
                </div>

                <div class="px-8 py-12">
                    <div class="bg-white  dark:bg-gray-900 rounded-xl p-8 border border-gray-200 dark:border-gray-700 template-preview prose prose-sm dark:text-gray-200 dark:prose-invert max-w-none overflow-auto max-h-96 sm:max-h-full">
                        {!! $template->body !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .template-preview h1, .template-preview h2, .template-preview h3, .template-preview h4, .template-preview h5, .template-preview h6 {
            @apply text-gray-900 dark:text-white font-bold;
        }
        .template-preview p {
            @apply text-gray-700 dark:text-gray-300;
        }
        .template-preview a {
            @apply text-blue-600 dark:text-blue-400 hover:underline;
        }
        .template-preview strong {
            @apply font-bold text-gray-900 dark:text-white;
        }
    </style>
</x-app-layout>
