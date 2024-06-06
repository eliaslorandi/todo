<x-layout>
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

            <div class="task">
                <div class="title">
                    <input type="checkbox">
                    <div class="task_title"> Titulo da Tarefa </div>
                </div>
                <div class="priority">
                    <div class="sphere"></div>
                    <div> Titulo da Tarefa </div>
                </div>

                <div class="actions">
                    <a href="#">
                        <img src="/assets/images/edit_icon.png">
                    </a>
                    <a href="#">
                        <img src="/assets/images/trash_icon.png">
                    </a>
                </div>
            </div>

        </div>

    </section>
</x-layout>