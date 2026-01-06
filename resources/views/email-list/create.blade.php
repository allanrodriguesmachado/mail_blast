<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900  overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-900">

                <h2 class="text-lg font-medium text-gray-500 mb-4">
                    {{ __('Criar Nova Lista') }}
                </h2>

                <form action="{{ route('list.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input
                            id="title"
                            name="title"
                            type="text"
                            class="mt-1 block w-full"
                            placeholder="Digite o título aqui..."
                            required
                            autofocus
                        />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div>
                        <label class="block mb-2.5 text-sm font-medium text-heading" for="file">Upload file</label>
                        <input class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body" id="file" name="file" accept=".text/csv, .csv" type="file">
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button title="{{__('Enviar')}}" />

                        @if (session('status') === 'list-created')
                            <p class="text-sm text-gray-600">{{ __('Salvo com sucesso.') }}</p>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
