<x-layout page="Create Task">

    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-white1">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">

        <h1>Criar Tarefa</h1>
        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('task.create_action') }}">
            @csrf {{-- autenticação token pra enviar formulario --}}
            <x-form.text_input name="title" label="Titulo da tarefa:" placeholder="Digite o título" />
            <x-form.text_input name="due_date" label="Data de realização:" type="datetime-local" />
            <x-form.select_input name="category_id" label="Categoria:">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </x-form.select_input>
            <x-form.text_area_input name="description" label="Descrição:" placeholder="Digite a descrição" />
            <div class="large-btn">
                <x-button.form_button submitTxt="Criar tarefa"></x-button.form_button>
            </div>
        </form>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let dueDateInput = document.querySelector('input[name="due_date"]');
            let now = new Date();
            now.setHours(now.getHours() - 3); //Ajusta o horário para GMT-3
            let formattedDate = now.toISOString().slice(0, 16); //Formata a data no formato YYYY-MM-DDTHH:MM
            dueDateInput.value = formattedDate;
        });
    </script>

</x-layout>
