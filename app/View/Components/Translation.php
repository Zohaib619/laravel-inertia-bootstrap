<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class Translation extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $locale = app()->getLocale();

        $translations = Cache::rememberForever("translations_$locale", function () use($locale) {
            $phpTranslations = [];
            $jsonTranslations = [];
            if(File::exists(resource_path("lang/$locale"))){
                $phpTranslations = collect(File::allFiles(resource_path("lang/$locale")))
                ->filter(function($file){
                    return $file->getExtension() == "php";
                })->flatMap(function($file){
                    return Arr::dot(File::getRequire($file->getRealPath()));
                })->toArray();
            }
            if(File::exists(resource_path("lang/$locale.json"))){
                $jsonTranslations = json_decode(File::get(resource_path("lang/$locale.json")), true);
            }
            return array_merge($phpTranslations, $jsonTranslations);
        });

        return view('components.translation', compact("translations"));
    }
}
