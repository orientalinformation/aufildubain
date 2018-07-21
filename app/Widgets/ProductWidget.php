<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use App\Models\Product;

class ProductWidget extends AbstractWidget
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
        $count = Product::all()->count();
        $string = trans_choice('Produits', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'fas fa-cube',
            'title'  => "{$count} {$string}",
            'text'   => 'Vous avez '.$count.' produits enregistrées. Cliquez sur le bouton ci-dessous pour afficher toutes les produits.',
            'button' => [
                'text' => 'Voir tous les produits',
                'link' => route('voyager.products.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/04.jpg'),
        ]));
    }
}
