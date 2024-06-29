<?php
namespace Sanmtos\Chat;

use Illuminate\Support\ServiceProvider;

class ChatServiceProvider extends ServiceProvider
{
     /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/chat.php', 'chat');
    }

     /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'sanmtos-chat');
        $this->loadFactoriesFrom(__DIR__ . '/../database/factories');

        $this->configurePublishing();

    }


    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/chat.php' => config_path('chat.php'),
        ], 'chat-config');

        $this->publishes([
            __DIR__.'/../database/migrations/2024_05_27_044729_create_sc_conversations_table.php' => database_path('migrations/2024_05_27_044729_create_sc_conversations_table.php'),
            __DIR__.'/../database/migrations/2024_05_27_044746_create_sc_chats_table.php' => database_path('migrations/2024_05_27_044746_create_sc_chats_table.php'),
        ], 'chat-migrations');


        $this->publishes([
            __DIR__.'/../phpunit.xml' => base_path('phpunit.chat.xml'),
        ], 'chat-phpunit');

    }

}
