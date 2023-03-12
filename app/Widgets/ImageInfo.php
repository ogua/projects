<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use Arrilot\Widgets\AbstractWidget;
use App\Models\Photos;
class ImageInfo extends AbstractWidget
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

        $count = Photos::all()->count();
        $string = trans_choice('Uploaded Images', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-camera',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} uploaded images. Click on button below to view all images.",
            'button' => [
                'text' => __('View all images'),
                'link' => route('voyager.photos.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Photos::class));
    }
}
