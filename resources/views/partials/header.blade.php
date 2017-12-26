<?php
use Prismic\Dom\RichText;
use Prismic\Dom\Link;

function getAlternateLangage($languages, $langKey) {
   foreach ($languages as $language) {
       if ($language->lang === $langKey) {
           return $language;
       }
   }
   return null;
}
?>

<header class="site-header l-grid-container dark">
    <a href="/{!! $currentLang !!}">
        <div class="logo">{!! RichText::asText($menu->data->title) !!}</div>
    </a>
    <nav>
        <ul>
            @foreach ($menu->data->menuLinks as $item)
                @if ($item->link && $item->label)
                    <li>
                        <a href="{!! Link::asUrl($item->link, $linkResolver) !!}">{!! $item->label !!}</a>
                    </li>
                @endif
            @endforeach
            <li>
                <div class="language-select-wrapper">
                    <select class="language-select" id="language-select">
                        @foreach (config('i18n.languages') as $language)
                            <?php
                            $langKey = $language['key'];
                            $isCurrentLang = $langKey === $currentLang;
                            if ($isCurrentLang) {
                                $link = $linkResolver($document);
                            } else {
                                $link = $linkResolver(getAlternateLangage($document->alternate_languages, $langKey));
                            }
                            ?>
                            <option
                                value="{!! $langKey !!}"
                                href="{!! $link !!}"
                                {!! $isCurrentLang ? 'selected' : false !!}
                            >
                                {!! $language['label'] !!}
                            </option>
                        @endforeach
                    </select>
                </div>
            </li>
        </ul>
    </nav>
</header>
