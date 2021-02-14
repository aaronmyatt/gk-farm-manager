<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields;
use Laravel\Nova\Http\Requests\NovaRequest;

class Measurements extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Measurements::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

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
            Fields\DateTime::make('Created At', 'created_at'),
            Fields\DateTime::make('Updated At', 'updated_at'),
            Fields\BelongsTo::make(__('Tank'), 'tank', '\App\Nova\Tanks')->sortable(),
            Fields\Number::make(__('PH'), 'ph'),
            Fields\Number::make(__('alkalinity'), 'alkalinity'),
            Fields\Number::make(__('nh3'), 'nh3'),
            Fields\Number::make(__('no2'), 'no2'),
            Fields\Number::make(__('no3'), 'no3'),
            Fields\Number::make(__('fe'), 'fe'),
            Fields\Number::make(__('temperature'), 'temperature'),
            Fields\Number::make(__('salinity'), 'salinity'),
            Fields\TextArea::make(__('Remark'), 'remark'),
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
