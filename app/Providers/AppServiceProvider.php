<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale($this->app->getLocale());//app_locale já definido como pt_BR em app.php

         // Registre seus componentes personalizados
         Blade::component('components.form.text_input', 'form.text_input');
         Blade::component('components.form.checkbox_input', 'form.checkbox_input');
         Blade::component('components.form.select_input', 'form.select_input');
         Blade::component('components.form.text_area_input', 'form.text_area_input');
         Blade::component('components.button.button', 'form.button');
         Blade::component('components.button.form_button', 'form.form_button');
         Blade::component('components.navbar.navbar', 'navbar');
     }
}
