<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use App\Models\Trend;

class TrendWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Trend::all()->count();
        $string = trans_choice('Tendances', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'fas fa-chart-line',
            'title'  => "{$count} {$string}",
            'text'   => 'Vous avez '.$count.' tendances enregistrées. Cliquez sur le bouton ci-dessous pour afficher toutes les tendances.',
            'button' => [
                'text' => 'Voir tous les tendances',
                'link' => route('voyager.trends.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/05.jpg'),
        ]));
    }
}
