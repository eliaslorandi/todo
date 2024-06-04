<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            Logo
        </div>
        <div class="content">
            <nav>
                <a href="#" class="btn btn-primary">
                    Nova Tarefa
                </a>
            </nav>
            <main>
                <section class="graph">
                    <div class="graph_header">
                        <h2> Progresso </h2>
                        <hr class="line_header" />
                        data
                    </div>
                    <div class="graph_header-subtitle">
                        Tarefas: <b> 3/6 </b>
                    </div>
                    <div class="graph_placeholder">

                    </div>
                    <p class="graph_header-remaining_tasks"> Restam 3 Tarefas </p>
                </section>
                <section class="list">
                    <div class="list_header">
                        <select class="list_header-select">
                            <option value="1">
                                Todas as Tarefas
                            </option>
                        </select>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>

</html>
