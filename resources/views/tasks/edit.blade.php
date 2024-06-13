<x-layout page="Edit Task">

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Editar Tarefa</h1>
        <form method="POST" action="{{route('task.edit_action')}}">
            @csrf {{--autenticação token pra enviar formulario --}}
            <input type="hidden" name="id" value="{{$task->id}}" />

            <x-form.checkbox_input 
            name="is_done" 
            label="Tarefa concluída?" 
            checked="{{$task->is_done}}"
            />

            <x-form.text_input 
            name="title" 
            label="Titulo da tarefa:" 
            placeholder="Digite o título" 
            value="{{$task->title}}"
            />

            <x-form.text_input 
            name="due_date" 
            label="Data de realização:" 
            type="datetime-local" 
            value="{{$task->due_date}}"
            />
            {{-- {{$task->due_date}}  para debugar / foi trocado o type para aceitar tbm hora --}}
            
            <x-form.select_input 
            name="category_id" 
            label="Categoria:">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if ($category->id == $task->category_id)
                            selected
                        @endif
                        >{{$category->title}}</option>
                @endforeach
            </x-form.select_input>
            <x-form.text_area_input 
            name="description" 
            label="Descrição:" 
            placeholder="Digite a descrição" 
            value="{{$task->description}}"
            />
            
            <x-form.form_button 
            submitTxt="Atualizar tarefa" 
            resetTxt="Limpar">
            </x-form.form_button>

        </form>
    </section>
   
</x-layout>