@php
    use Prismic\Dom\RichText;
    use Prismic\Dom\Link;
    use Prismic\Document;
@endphp

@if (isset($menu))

    <header class="site-header l-grid-container dark">
        <a href="/{{ $currentLang }}">
            <div class="logo">{{ RichText::asText($menu->data->title) }}</div>
        </a>
        <nav>
            <ul>
                @foreach ($menu->data->menu_links as $item)
                    @if ($item->link && $item->label)
                        <li>
                            <a href="{{ Link::asUrl($item->link, $linkResolver) }}">{{ $item->label }}</a>
                        </li>
                    @endif
                @endforeach
                @if (isset($document))
                    <li>
                        <div class="language-select-wrapper">
                            <select class="language-select" id="language-select">
                                @foreach (config('i18n.languages') as $language)
                                    @php
                                        $langKey = $language['key'];
                                        $isCurrentLang = $langKey === $currentLang;
                                        if ($isCurrentLang) {
                                            $link = $linkResolver($document);
                                        } else {
                                            $link = $linkResolver(Document::getAlternateLanguage($document, $langKey));
                                        }
                                    @endphp
                                    <option
                                        value="{{ $langKey }}"
                                        href="{{ $link }}"
                                        {{ $isCurrentLang ? 'selected' : false }}
                                    >
                                        {{ $language['label'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                @endif
            </ul>
        </nav>
    </header>

@endif
