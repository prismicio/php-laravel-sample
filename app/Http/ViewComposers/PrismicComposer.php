<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PrismicComposer
{
    /**
     * Create a new prismic composer.
     *
     * @param  Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        // Define the prismic.io repository API endpoint
        $this->endpoint = $request->input('endpoint');

        // Define the link resolver
        $this->linkResolver = $request->input('linkResolver');

        // Define the current language
        $this->currentLang = $request->input('currentLang');

        // Define the menu content
        $this->menu = $request->input('api')->getSingle('menu', ['lang' => $this->currentLang]);
    }

    /**
     * Bind the link resolver and the menu content to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('endpoint', $this->endpoint);
        $view->with('linkResolver', $this->linkResolver);
        $view->with('currentLang', $this->currentLang);
        $view->with('menu', $this->menu);
    }
}
