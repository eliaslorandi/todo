<x-layout page="Create Category">

    <x-slot:btn>
        <a href="{{ route('authenticated') }}" class="btn-white1">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">

        <h1>Criar Categoria</h1>
        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('category.create_action') }}">
            @csrf {{-- autenticação token pra enviar formulario --}}
            <x-form.text_input name="title" label="Título:" placeholder="Título da categoria" />
            <div class="large-btn">
                <x-button.button type="submit" class="btn"> Criar categoria </x-button.button>
            </div>
            </div>
        </form>

    </section>

</x-layout>
