<x-layout>

    <x-slot:btn>
        <div class="nav-links">
            <a href="{{ route('task.create') }}" class="btn btn-white1">Criar Tarefa</a>
            <a href="{{ route('logout') }}" class="btn btn-white1">Sair</a>
        </div>
    </x-slot:btn>

    <section class="graph">

        <div class="graph_header">
            <h2> Progresso </h2>
            {{-- <div class="graph_header-line"></div> --}}
            <div class="graph_header-date">
                <a href="{{ route('home', ['date' => $datePrevButton]) }}">
                    <img src="/assets/images/prev-icon.png" alt="">
                </a>
                {{ $dateAsString }}
                <a href="{{ route('home', ['date' => $dateNextButton]) }}">
                    <img src="/assets/images/next-icon.png" alt="">
                </a>
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
            <select class="list_header-select" onChange="changeTaskStatusFilter(this)">
                <option value="all_task"> Todas as Tarefas </option>
                <option value="task_pending"> Tarefas Pendentes </option>
                <option value="task_done"> Tarefas Realizadas </option>
            </select>
        </div>

        <div class="task_list">

            @foreach ($tasks as $task)
                <x-task :data=$task />
            @endforeach
        </div>

    </section>

    <script>
        function changeTaskStatusFilter(element) {
            if (element.value == 'task_pending') {
                showAllTask();
                document.querySelectorAll('.task_done').forEach(function(element) {
                    element.style.display = 'none';
                })
            } else if (element.value == 'task_done') {
                showAllTask();
                document.querySelectorAll('.task_pending').forEach(function(element) {
                    element.style.display = 'none';
                })
            } else {
                showAllTask();
            }
        }

        function showAllTask() { //irá mostrar todas as tasks
            document.querySelectorAll('.task').forEach(function(element) {
                element.style.display = 'block';
            })
        }
    </script>

    <script>
        async function taskUpdate(element) {
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = '{{ route('task.update') }}';

            try {
                let rawResult = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json', // Ajuste para 'Content-Type'
                        'Accept': 'application/json', // Ajuste para 'Accept'
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token
                    },
                    body: JSON.stringify({
                        status,
                        taskId
                    })
                });

                let result = await rawResult.json();

                if (result.success) {
                    alert('Task atualizada');
                } else {
                    element.checked = !status;
                    alert('Erro ao atualizar a tarefa');
                }
            } catch (error) {
                element.checked = !status;
                alert('Erro ao atualizar a tarefa');
                console.error('Erro:', error);
            }
        }
    </script>


</x-layout>
