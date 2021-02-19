<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields;
use Laravel\Nova\Http\Requests\NovaRequest;

class Livestock extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = '\App\Models\Livestock';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    public static function label() {
        return 'Livestock';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'tank',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Fields\ID::make(__('#'), 'id'),
            Fields\DateTime::make('Recorded On', 'recorded_at'),
            Fields\BelongsTo::make(__('Tank'), 'tank', '\App\Nova\Tanks')->sortable(),
            Fields\Select::make(__('Gender'))->options([
                'female' => "Female",
                'male' => "Male",
            ])->default('female'),
            Fields\Number::make(__('Body Wight (g)'), 'body_weight_grams')->default(40),
            Fields\Number::make(__('Number of'), 'number_of_pieces')->nullable(),
            Fields\Number::make(__('Mortality'), 'mortality')->nullable(),
            Fields\BelongsTo::make('Created By', 'creator', 'App\Nova\User')->default($request->user()->getKey()),
            Fields\BelongsTo::make('Updated By', 'updater', 'App\Nova\User')->default($request->user()->getKey()),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
