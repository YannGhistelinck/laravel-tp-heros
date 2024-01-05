<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Hero;
use App\Models\User;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts/app', function ($view) {
            $contributors = Hero::groupBy('user_id')
                ->selectRaw('user_id, count(user_id) as occurrences')
                ->orderByDesc('occurrences')
                ->get();

            $allUsers = User::all();

            $userMap = $allUsers->pluck('firstname', 'id', )->toArray();
            $descriptionMap = $allUsers->pluck('description', 'id', )->toArray();

            $contributors = $contributors->map(function ($contributor) use ($userMap, $descriptionMap) {
                $contributor->firstname = $userMap[$contributor->user_id] ?? null;
                $contributor->description = $descriptionMap[$contributor->user_id] ?? null;
                return $contributor;
            });

            $view->with('contributors', $contributors);
        });
    }
}
