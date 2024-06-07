<x-layout page="Create Task">

    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="create_task_section">
        <h1>Criar Tarefa</h1>
        <form>
            <div class="inputArea">
                <label for="title">
                    Titulo da Tarefa:
                </label>
                <input id="title" name="title" placeholder="Digite o título da tarefa" required>
            </div>
            <div class="inputArea">
                <label for="due_date">
                    Data de Realização:
                </label>
                <input type="date" id="due_date" name="due_date" required>
            </div>
            <div class="inputArea">
                <label for="category">
                    Categoria:
                </label>
                <select id="category" name="category" required>
                    <option selected disable value="">
                        Selecione a categoria
                    </option>
                </select>
            </div>
            <div class="inputArea">
                <label for="title">
                    Descrição:
                </label>
                <textarea placeholder="Digite a descrição da tarefa"></textarea>
            </div>
            <div class="inputArea">
                <button type="submit" class="btn btn-primary">Criar tarefa</button>
            </div>
        </form>
    </section>

</x-layout>
