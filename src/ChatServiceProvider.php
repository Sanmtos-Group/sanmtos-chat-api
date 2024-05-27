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

        // $this->publishes([
        //     __DIR__.'/../database/migrations/0001_01_01_000000_create_users_table.php' => database_path('migrations/0001_01_01_000000_create_users_table.php'),
        // ], 'jetstream-migrations');

        $this->publishesMigrations([
            __DIR__.'/../database/migrations/2024_05_27_044729_create_conversations_table.php' => database_path('migrations/2024_05_27_044729_create_conversations_table.php'),
            __DIR__.'/../database/migrations/2024_05_27_044746_create_chats_table.php' => database_path('migrations/2024_05_27_044746_create_chats_table.php'),
        ], 'chat-migrations');

        $this->publishes([
            __DIR__.'/../routes/api.php' => base_path('routes/chat_api.php'),
        ], 'chat-api-routes');
        $this->publishes([
            __DIR__.'/../routes/web.php' => base_path('routes/chat_web.php'),
        ], 'chat-web-routes');

    }

}
