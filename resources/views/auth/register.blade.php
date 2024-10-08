<x-layout>
    <section id="task_section">

        <h1>Registre-se</h1>
        
        @if ($errors->any())
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('user.register_action') }}">
            @csrf {{-- autenticação token pra enviar formulario --}}
            <x-form.text_input name="name" label="Nome:" placeholder="Digite seu nome" />
            <x-form.text_input name="email" label="Email:" type="email" placeholder="Digite seu email" />
            <x-form.text_input name="password" label="Senha:" type="password" placeholder="Digite sua senha" />
            <x-form.text_input name="password_confirmation" label="Confirmar senha:" type="password" placeholder="Confirme sua senha" />
            <div class="large-btn">
                <x-form.button type="submit" class="btn"> Registrar </x-form.button>
            </div>
            <div class="group">
                <a href="{{route('login')}}"> Já tenho conta </a>
            </div>
        </form>
    </section>
</x-layout>
