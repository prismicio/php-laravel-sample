<?php

namespace App;

use Prismic\LinkResolver as PrismicLinkResolver;

/**
 * The link resolver is the code building URLs for pages corresponding to
 * a Prismic document.
 *
 * If you want to change the URLs of your site, you need to update this class
 * as well as the routes in routes/web.php.
 */
class LinkResolver extends PrismicLinkResolver
{
    /**
     * This function will be used to generate links to Prismic.io documents
     * As your project grows, you should update this function according to your routes
     *
     * @param  object  $link
     * @return string
     */
    public function resolve($link)
    {
        if (isset($link) === false || property_exists($link, 'isBroken') && $link->isBroken === true) {
            return '/404';
        }
        if ($link->type === 'homepage') {
            return '/' . $link->lang;
        }
        if ($link->type === 'page') {
            return '/' . $link->lang . '/page/' . $link->uid;
        }
        return '/';
    }
}
