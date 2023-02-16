<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            <a href="{{ route('todo.create') }}">
                Tarefas <ion-icon name="add-circle-outline" class="text-2xl"></ion-icon>
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="border">
                        <thead>
                            <th>Tarefa</th>
                            <th>Concluída</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td class="p-2"> {{ $todo->task }} </td>
                                    <td class="p-2 text-center">{{ $todo->completed ? 'Sim' : 'Não' }}</td>
                                    <td class="p-2"><a class="p-2" href="{{ route('todo.edit', $todo->id) }}">
                                            <ion-icon name="pencil-outline"></ion-icon>
                                        </a></td>
                                    <td class="p-2">
                                        <form id="myForm{{ $todo->id }}"
                                            action="{{ route('todo.destroy', $todo->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"
                                                onclick="document.getElementById('myForm{{ $todo->id }}').submit();">
                                                <ion-icon name="close-circle-outline" class="text-red-400"></ion-icon>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $todos->links() }}
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
