<x-app-layout>
    <div>
        <form action="{{route('template.store')}}" method="POST">
            @csrf

            <div>
                <label for="name">Nome</label>
                <input type="text" name="name" placeholder="Digite o nome">
            </div>

            <div>
                <label for="body">Conteudo</label>
                <input type="text" name="body" placeholder="Conteudo">
            </div>

            <div class="button">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</x-app-layout>
