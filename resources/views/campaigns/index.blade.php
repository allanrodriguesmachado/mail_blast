<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Mensagem de sucesso -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Sucesso!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="p-8">
                    <!-- Cabeçalho com título e botão cancelar -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Nova Campanha</h2>
                        @if(session('campaigns::create'))
                            <form action="{{ route('campaigns.cancel') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm">
                                    🗑️ Cancelar e Recomeçar
                                </button>
                            </form>
                        @endif
                    </div>

                    <div x-data="{ selectedTab: '{{ $activeTab ?? 'groups' }}' }" class="w-full">
                        <div class="flex gap-2 overflow-x-auto border-b border-neutral-300 dark:border-neutral-700"
                             role="tablist" aria-label="tab options">
                            <button x-on:click="selectedTab = 'groups'" x-bind:aria-selected="selectedTab === 'groups'"
                                    x-bind:tabindex="selectedTab === 'groups' ? '0' : '-1'"
                                    x-bind:class="selectedTab === 'groups' ? 'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' : 'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'"
                                    class="h-min px-4 py-2 text-sm" type="button" role="tab"
                                    aria-controls="tabpanelGroups">
                                Groups
                            </button>
                            <button x-on:click="selectedTab = 'likes'" x-bind:aria-selected="selectedTab === 'likes'"
                                    x-bind:tabindex="selectedTab === 'likes' ? '0' : '-1'"
                                    x-bind:class="selectedTab === 'likes' ? 'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' : 'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'"
                                    class="h-min px-4 py-2 text-sm" type="button" role="tab"
                                    aria-controls="tabpanelLikes">Likes
                            </button>
                        </div>
                        <div class="px-2 py-4 text-neutral-600 dark:text-neutral-300">
                            <div x-cloak x-show="selectedTab === 'groups'" id="tabpanelGroups" role="tabpanel"
                                 aria-label="groups">

                                    @include('campaigns.create', ['value' => $campaignsSession['name'] ?? ''])
                            </div>
                            <div x-cloak x-show="selectedTab === 'likes'" id="tabpanelLikes" role="tabpanel"
                                 aria-label="likes">
                                @include('campaigns.create-two', ['lab' => 'likes', 'value' => $campaignsSession['body'] ?? ''])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
