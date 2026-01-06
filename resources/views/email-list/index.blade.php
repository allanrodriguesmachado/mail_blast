<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Minhas Listas de E-mail') }}
            </h2>
            <a href="{{route('list.create')}}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                + Nova Lista
            </a>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end" >
                <form action="{{route('list')}}" method="POST">
                    @csrf
                    @method('GET')

                    <input type="search" placeholder="Pesquisar"  name="search" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                </form>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                @forelse($emptyList as $list)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $list->name }}</h3>
                            <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Ativo</span>
                        </div>

                        <h5 class="text-gray-600 font-bold dark:text-gray-400 text-lg mb-4">
                            Titulo: {{ $list->title }}
                        </h5>

                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                            Criada em: {{ $list->created_at->format('d/m/Y') }}
                        </p>

                    </div>

                @empty
                    <div class="col-span-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-12 text-center">
                        <div class="flex flex-col items-center">
                            <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Nenhuma lista encontrada</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Comece criando sua primeira lista de contatos para seus e-mails.</p>

                            <div class="mt-6">
                                <a href="{{route('list.create')}}"  class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                                    Criar E-mail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
