<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Adicionar nova Tarefa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('todo.store') }}" method="POST">
                        @csrf
                        <label class=""> Tarefa
                            <input type="text" name="task" class="p-2 text-black">
                        </label>
                        <input type="hidden" name="completed" value="0">
                        <input type="submit" value="Submit" class="py-2 border">
                    </form>
                    <a href="{{ route('todo.index') }}" class="">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
