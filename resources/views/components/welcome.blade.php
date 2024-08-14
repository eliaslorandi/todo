<div class="body-welcome">


    <x-layout>
        <section class="section_welcome">
            <h1>Bem-vindo ao ToDo Project</h1>
            <p>Organize suas tarefas de forma eficiente e acompanhe o progresso em tempo real.</p>
            <div class="button_welcome">
                <x-button.button type="link" :href="route('register')" class="btn-white1">
                    Criar conta
                </x-button.button>
                <x-button.button type="link" :href="route('login')" class="btn-white1">
                    Já possuo conta
                </x-button.button>
            </div>
        </section>
    </x-layout>
    <footer>
        <div class="footer_content">
            <p>
                Desenvolvido por Elias Lorandi.
            </p>

            <ul class=link_welcome>
                <li>
                    <a href="https://www.linkedin.com/in/elias-lorandi-a967b6240/"><img
                            src="/assets/images/linkedin.png" /></a>
                </li>
                <li>
                    <a href="https://github.com/eliaslorandi"><img src="/assets/images/github.png" /></a>
                </li>
                <li>
                    <a href="https://eliaslorandi.github.io/Portfolio-Online/"><img src="/assets/images/www.png" /></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/elias.lorandi/"><img src="/assets/images/instagram.png" /></a>
                </li>
            </ul>

        </div>
    </footer>
</div>
