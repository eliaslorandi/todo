<x-layout>
    <section id="task_section">

        <h1>Login</h1>

        @if ($errors->any())
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('user.login_action') }}">
            @csrf {{-- autenticação token pra enviar formulario --}}
            <x-form.text_input name="email" label="Email:" type="email" placeholder="Digite seu email" />
            <x-form.text_input name="password" label="Senha:" type="password" placeholder="Digite sua senha" />
            <x-form.form_button submitTxt="Entrar" resetTxt="Limpar"></x-form.form_button>
        </form>
        <p>Ou faça <a href="{{ route('register') }}"> Cadastro </a></p>
    </section>
</x-layout>
