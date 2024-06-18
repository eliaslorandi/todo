<x-layout>

    <x-slot:btn>
        <a href="{{ route('task.create') }}" class="btn btn-primary">
            Criar Tarefa
        </a>
        <a href="{{ route('logout') }}" class="btn btn-primary">
            Sair
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

            @foreach ($tasks as $task)
                <x-task :data=$task />
            @endforeach
        </div>

    </section>

    <script>
        async function taskUpdate(element) {
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = '{{ route('task.update') }}';

            try {
                let rawResult = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',  // Ajuste para 'Content-Type'
                        'Accept': 'application/json',        // Ajuste para 'Accept'
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
