<div class="task {{ $data['is_done'] ? 'task_done' : 'task_pending' }}">
    <div class="title">
        <input type="checkbox" onchange="taskUpdate(this)" data-id="{{ $data['id'] }}" {{ $data['is_done'] ? 'checked' : '' }} />
        <div class="task_title"> {{ $data['title'] ?? '' }}</div>
    </div>
    <div class="priority">
        <div class="sphere"></div>
        <div> {{ $data['category']->title ?? '' }} </div>
    </div>
    <div class="actions">
        <a href="{{ route('task.edit', ['id' => $data['id']]) }}">
            <img src="/assets/images/edit_icon.png">
        </a>
        <a href="{{ route('task.delete', ['id' => $data['id']]) }}" onclick="return confirmDelete()">
            <img src="/assets/images/trash_icon.png">
        </a>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm("Deseja excluir a tarefa?");
    }
</script>
