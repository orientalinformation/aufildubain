<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use App\Models\Store;

class StoreWidget extends AbstractWidget
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
        $count = Store::all()->count();
        $string = trans_choice('Magasins', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-company',
            'title'  => "{$count} {$string}",
            'text'   => 'Vous avez '.$count.' magasins enregistrées. Cliquez sur le bouton ci-dessous pour afficher toutes les magasins.',
            'button' => [
                'text' => 'Voir tous les magasins',
                'link' => route('voyager.stores.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/06.jpg'),
        ]));
    }
}
