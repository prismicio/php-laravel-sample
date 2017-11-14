<header class="site-header l-grid-container dark">
    <a href="/{!! $currentLang !!}">
        <div class="logo">{!! $menu->getText('menu.title') !!}</div>
    </a>
    <nav>
        <ul>
            @foreach($menu->getGroup('menu.menuLinks')->getArray() as $item)
                <?php
                $link = $item->getLink('link');
                $label = $item->getText('label');
                ?>
                @if($link && $label)
                    <li>
                        <a href="{!! $link->getUrl($linkResolver) !!}">{!! $label !!}</a>
                    </li>
                @endif
            @endforeach
            <li>
                <div class="language-select-wrapper">
                    <select class="language-select" id="language-select">
                        @foreach(config('i18n.languages') as $language)
                            <?php
                            $lang = $language['key'];
                            $isCurrentLang = $lang === $currentLang;
                            if ($isCurrentLang) {
                                $link = $linkResolver($document);
                            } else {
                                $link = $linkResolver($document->getAlternateLanguage($lang));
                            }
                            ?>
                            <option
                                value="{!! $lang !!}"
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
