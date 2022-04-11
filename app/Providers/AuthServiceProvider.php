<?php

namespace App\Providers;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('admin') ? true : null;
        });//для админа всё разрешено

       Gate::any(['post.edit', 'post.destroy'] ,function (User $user, Post $post){
            if($user->id == $post->user_id){
                return Response::allow();
            }

           Gate::any(['category.edit', 'category.destroy'], function (User $user) {
               return $user->hasRole('admin');
           });
        });
       Gate::any(['category.index', 'category.show', 'post.index', 'post.show'], function (User $user) {
            return $user->hasRole('user');
    });






    }
}
