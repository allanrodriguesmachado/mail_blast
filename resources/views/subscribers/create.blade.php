<form action="{{route('subscriber.store', $listMail->id)}}" method="POST">
    @csrf

    <label for="name">Nome:</label>
    <input type="text" name="name" placeholder="Nome">

    <label for="email"></label>
    <input type="text" name="email">

    <button type="submit">Enviar</button>
</form>
