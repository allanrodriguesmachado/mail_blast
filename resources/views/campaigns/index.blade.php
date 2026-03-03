<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Sucesso!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="p-8">
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
                            <button @click="selectedTab = 'groups'" :aria-selected="selectedTab === 'groups'"
                                    :tabindex="selectedTab === 'groups' ? '0' : '-1'"
                                    :class="selectedTab === 'groups' ? 'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' : 'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'"
                                    class="h-min px-4 py-2 text-sm" type="button" role="tab"
                                    aria-controls="tabpanelGroups">
                                Groups
                            </button>
                            <button @click="selectedTab = 'likes'" :aria-selected="selectedTab === 'likes'"
                                    :tabindex="selectedTab === 'likes' ? '0' : '-1'"
                                    :class="selectedTab === 'likes' ? 'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' : 'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'"
                                    class="h-min px-4 py-2 text-sm" type="button" role="tab"
                                    aria-controls="tabpanelLikes">Likes
                            </button>
                        </div>

                        <div class="px-2 py-4 text-neutral-600 dark:text-neutral-300">
                            <div x-show="selectedTab === 'groups'" x-cloak id="tabpanelGroups" role="tabpanel" aria-label="groups">
                                <form action="{{ route('campaigns.store', 'groups') }}" method="POST" class="space-y-4">
                                    @csrf
                                    <div class="grid grid-cols-2 gap-3">
                                        <div >
                                            <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Name</label>
                                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                                                   type="text"
                                                   name="name"
                                                   id="name"
                                                   value="{{ $campaignsSession['name'] ?? '' }}"
                                                   required
                                                   placeholder="Nome da campanha"
                                            >
                                        </div>

                                        <div >
                                            <label for="subject" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">subject</label>
                                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                                                   type="text"
                                                   name="subject"
                                                   id="subject"
                                                   value="{{ $campaignsSession['subject'] ?? '' }}"
                                                   required
                                                   placeholder="Assunto da campanha"
                                            >
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <label for="mail_id" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Selecione um Email</label>
                                            <select name="mail_id" id="mail_id"
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                                                    required>
                                                <option value="">-- Escolha um email --</option>
                                                @foreach($mail as $m)
                                                    <option value="{{ $m['id'] }}" {{ ($campaignsSession['mail_id'] ?? '') == $m['id'] ? 'selected' : '' }}>
                                                        {{ $m['title'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="flex  justify-end">
                                        <button type="submit"
                                                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors px-4 py-2.5 leading-5">
                                            Próximo →
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div x-show="selectedTab === 'likes'" x-cloak id="tabpanelLikes" role="tabpanel" aria-label="likes">
                                <form action="{{ route('campaigns.store', 'likes') }}" method="POST" class="space-y-4">
                                    @csrf
                                    <div>
                                        <label for="body" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Body</label>
                                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                                                  name="body"
                                                  id="body"
                                                  rows="5"
                                                  required>{{ $campaignsSession['body'] ?? '' }}</textarea>
                                    </div>

                                    <div class="flex  justify-end ">
                                        <button type="submit"
                                                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                                            Finalizar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
