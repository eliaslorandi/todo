<x-layout page="Login">

    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Registrar
        </a>
    </x-slot:btn>

    Tela de login
    <a  href="{{route('home')}}">
        Home
    </a>
</x-layout>