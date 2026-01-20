<x-app-layout>
    <form action="{{ route('template.update', $templateMail) }}" method="POST">
        @csrf
        @method('PUT') <div>
            <label class="text-white">Nome:</label>
            <input type="text" name="name" value="{{ old('name', $templateMail->name) }}">
        </div>

        <div>
            <label class="text-white">Corpo:</label>
            <textarea name="body">{{ old('body', $templateMail->body) }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white p-2">Salvar Alterações</button>
    </form>
</x-app-layout>
