<div>
    <h1 class="text-3xl font-bold my-3">Contatos</h1>

    @if($errors->any())
    @foreach($errors->all() as $error)
    <span>{{$error}}</span><br>
    @endforeach
    @endif

    <form wire:submit.prevent="save">
        <input type="hidden" name='key' wire:model='key'>
        <input
            class="focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md p-1.5"
            type="text" name="name" placeholder="Nome" wire:model='name'>
        <input
            class="focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md p-1.5"
            type="text" name="phone" placeholder="Fone" wire:model='phone'>
        <button class="bg-indigo-800 text-white font-semibold py-1 px-4 shadow-sm  rounded" type="submit">{{$key == '' ?
            'Adicionar' :
            'Atualizar'}}</button>
    </form>

    <table class="mt-3 mx-auto w-4/5 bg-white rounded-md">
        <thead class="border-indigo-700 border-b">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Fone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $key => $contact)
            <tr>
                <td>{{$key}}</td>
                <td>{{$contact['name']}}</td>
                <td>{{$contact['phone']}}</td>
                <td>
                    <a href="#" onclick="event.preventDefault()" wire:click="edit('{{$key}}')">Editar</a>
                    <a href="#" onclick="event.preventDefault()" wire:click="del('{{$key}}')">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
