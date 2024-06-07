<x-layout>

    <x-slot:btn>
        <a href="#" class="btn btn-primary">
            Criar Tarefa
        </a>
    </x-slot:btn>

    <section class="graph">

        <div class="graph_header">
            <h2> Progresso </h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">
                <img src="/assets/images/prev-icon.png" alt="">
                06 de Jun
                <img src="/assets/images/next-icon.png" alt="">
            </div>
        </div>
        <div class="graph_header-subtitle">
            Tarefas: <b> 3/6 </b>
        </div>
        <div class="graph_placeholder">

        </div>
        <div class="graph_header-tasks_left_footer">
            <img src="/assets/images/info_icon.png">
            Restam 3 tarefas
        </div>

    </section>


    <section class="list">

        <div class="list_header">
            <select class="list_header-select">
                <option value="1">
                    Todas as tarefas
                </option>
            </select>
        </div>

        <div class="task_list">

            @php
                $tasks = [
                    ['done' => false, 'title' => 'Minha primeira task', 'category' => 'Categoria 1'],
                    ['done' => true, 'title' => 'Minha segunda task', 'category' => 'Categoria 2'],
                    ['done' => false, 'title' => 'Minha terceira task', 'category' => 'Categoria 1'],
                ]
            @endphp

            <x-task :data=$tasks[0]/>
            <x-task :data=$tasks[1]/>
            <x-task :data=$tasks[2]/>

        </div>

    </section>
</x-layout>
