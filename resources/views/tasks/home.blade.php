<x-layout>

    <x-slot:btn>
        <div class="nav-links">
            <a href="{{ route('task.create') }}" class="btn btn-white1">Criar Tarefa</a>
            <a href="{{ route('logout') }}" class="btn btn-white1">Sair</a>
        </div>
    </x-slot:btn>

    <section class="calendar">

        <div class="calendar_header">
            <h2> Progresso </h2>
            <div class="calendar_header-date">
                <a href="{{ route('home', ['date' => $datePrevButton]) }}">
                    <img src="/assets/images/prev-icon.png" alt="">
                </a>
                {{ $dateAsString }}
                <a href="{{ route('home', ['date' => $dateNextButton]) }}">
                    <img src="/assets/images/next-icon.png" alt="">
                </a>
            </div>
        </div>
        <div class="calendar_header-subtitle">
            Tarefas concluídas: <b id="doneTasksCount"> {{ $done_tasks_count }}/{{ $tasks_count }} </b>
        </div>
        <div class="calendar_placeholder">
            <div id="calendar"></div>
        </div>
        {{-- <div class="calendar_header-tasks_left_footer">
            <img src="/assets/images/info_icon.png">
            Restam {{$undone_tasks_count}} tarefa(s)
        </div> --}}

    </section>

    <section class="list">

        <div class="list_header">
            <select class="list_header-select" onChange="taskStatusFilter(this)">
                <option value="all_task"> Todas as Tarefas </option>
                <option value="task_pending"> Tarefas Pendentes </option>
                <option value="task_done"> Tarefas Realizadas </option>
            </select>
        </div>

        <div class="task_list">
            @foreach ($tasks as $task)
                <x-task :data=$task /> {{--  o ":" indica que passamos uma variavel php para o componente --}}
            @endforeach
        </div>

    </section>

    <script>
        async function taskUpdate(element) {
            let status = element.checked; //coleta de dados
            let taskId = element.dataset.id;
            let url = '{{ route('task.update') }}';

            try {
                let rawResult = await fetch(url, { //requisição
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

                let result = await rawResult.json(); //resposta da requisição

                if (result.success) { //sucesso, é atualizado o status e chama funções auxiliares
                    updateTaskInUI(taskId, status);
                    alert('Task atualizada');
                    updateTaskCounters(status);
                    filterTask();
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

        function updateTaskInUI(taskId, status) { //atualiza o css para exibir a tarefa em seu filtro atual
            let taskElement = document.querySelector(`[data-id='${taskId}']`).closest('.task');
            if (status) {
                taskElement.classList.remove('task_pending');
                taskElement.classList.add('task_done');
            } else {
                taskElement.classList.remove('task_done');
                taskElement.classList.add('task_pending');
            }
        }

        function updateTaskCounters(status) { //atualiza o contador de tarefas
            let doneTasksCountElement = document.getElementById('doneTasksCount');
            let doneTasksText = doneTasksCountElement.innerText;
            let [done, total] = doneTasksText.split('/').map(Number);

            if (status) {
                done += 1;
            } else {
                done -= 1;
            }

            doneTasksCountElement.innerText = `${done}/${total}`;
        }

        function taskStatusFilter(element) { //filtro de tarefas
            showAllTask();
            if (element.value == 'task_pending') {
                document.querySelectorAll('.task_done').forEach(function(element) {
                    element.style.display = 'none';
                });
            } else if (element.value == 'task_done') {
                document.querySelectorAll('.task_pending').forEach(function(element) {
                    element.style.display = 'none';
                });
            }
        }

        function showAllTask() {
            document.querySelectorAll('.task').forEach(function(task) {
                task.style.display = 'flex';
            });
        }

        function filterTask() {
            let filter = document.querySelector('.list_header-select').value;
            taskStatusFilter({
                value: filter
            });
        }
    </script>


</x-layout>
