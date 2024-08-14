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
            <div class="large-btn">
                <x-button.button type="submit" class="btn"> Entrar </x-button.button>
            </div>
            <div class="group">
                <a href="{{ route('register') }}"> Crie uma conta </a>
                {{-- <p><a href="{{ route('login') }}"> Esqueci minha senha </a></p> --}}
            </div>
        </form>
    </section>
</x-layout>
