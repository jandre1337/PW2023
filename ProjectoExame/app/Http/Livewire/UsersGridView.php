<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\GridView;

class UsersGridView extends GridView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;
    public $maxCols = 3;
    public $withBackground = true;
    /**
     * Sets the data to every card on the view
     *
     * @param $model Current model for each card
     */
    public function card($model)
    {
        return [
            'title' => $model->name,
            'subtitle' => $model->email,
            'description' => $model->cc
        ];
    }

    public function onCardClick(User $model)
    {
    }
}
