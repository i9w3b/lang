<?php $localeMenu = session()->get('locale')??config('app.locale');
$arrLang = I9w3b\Lang\Lang::languages(); ?>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        @foreach($arrLang as $key => $lang)
        @if($lang == $localeMenu)
        <img src="{{ I9w3b\Lang\Lang::checkFlag($lang) }}"> {{ ucfirst(I9w3b\Lang\Lang::checkLang(str_replace('-', '_', $lang))) }}
        @else
        <?php
            $fileDataOff[] = $lang;
        ?>
        @endif
        @endforeach
        <span class="caret"></span>
    </a>
    @if(count($arrLang) > 1)
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        @foreach($fileDataOff as $keyLang => $langOff)
        <a class="dropdown-item" href="{{ url('lang') }}/{{ $langOff }}">
            <img src="{{ I9w3b\Lang\Lang::checkFlag($langOff) }}">
            {{ ucfirst(I9w3b\Lang\Lang::checkLang(str_replace('-', '_', $langOff))) }}
        </a>
        @endforeach
    </div>
    @endif
</li>
