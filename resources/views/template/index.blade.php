<x-app-layout>
    <div>
        <form action="{{route('template.store')}}" method="POST">
            @csrf

            <div>
                <label for="name">Nome</label>
                <input type="text" name="name" placeholder="Digite o nome">
            </div>

            <div>
                <label for="body">Corpo</label>
                <input type="text" name="body" placeholder="Corpo do E-mail">
            </div>


            <div class="button">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>


</x-app-layout>
