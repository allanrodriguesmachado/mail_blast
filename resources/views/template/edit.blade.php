<x-app-layout>

    <form action="{{route('templates.update', $template)}}" method="POST">
        @method('patch')
        @csrf
        <input type="text" value="{{$template->name}}" name="name">

        <button type="submit">Alterar</button>
    </form>

</x-app-layout>
