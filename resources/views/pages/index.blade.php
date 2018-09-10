@extends('layouts.site')
@section('content')
    <div class="style-bg-content ">
        <div class="content-bg-top">
            <div class="element-desing-1">
                <img src="../img/elements/elem-1.png" alt="">
            </div>
            <div class="element-desing-2">
                <img src="../img/elements/elem-2.png" alt="">
            </div>
            <div class="element-desing-3">
                <img src="../img/elements/elem-3.png" alt="">
            </div>
        </div>
        <div class="contentLeft @if(isset($game)){{ $game.'-img' }}@endif">
            <div class="segment-rek-top">
                <div class="bg-ramka-rek"></div>
                <a href=""><img src="../img/rk/bn468.png" alt=""></a>
            </div>
            <div class="top-server-list">
                <div class="title-list-server">
                    <div class="filterTitleMain">
                        <label>Сортировать по:</label>
                        <select onchange="location = this.value;">
                            @sortablelink('rating', 'Рейтингу')
                            @sortablelink('name', 'Имени')
                            @sortablelink('reviews', 'Отзывам')
                            @sortablelink('votes', 'Голосам')
                            @sortablelink('online', 'Онлайну')
                        </select>
                    </div>
                    @if(isset($game) and $game == 'my') <h1><i class="ico-title"></i>Список
                        ваших игровых серверов</h1>
                    @elseif(isset($game)) <h1><i class="ico-title"><img
                                    src="../img/elements/{{ $game }}.png" alt="{{ $game }}"></i>Рейтинг
                        игровых серверов {{ $gameTitle }}</h1>
                    @else <h1><i class="ico-title"></i>Рейтинг всех игровых серверов</h1>
                    @endif
                    <div class="clear"></div>
                </div>
            </div>
            @foreach($allServers as $i => $server)
                @php($i++)
                <div class="item-top @if($i == 1)no-bg @endif">
                    <div class="title-item-top @if($i == 1) first @endif">
                        <a href="{{ route('voteServer', $server->link ?? $server->id) }}"
                           class="btn-golos"><i><img src="../img/icon/i-1.png" alt=""></i>
                            Проголосовать</a>
                        <div class="number-top-server silverNumber">
                            {{ $i }}
                        </div>
                        <p class="name-server"><a class="link-full-info"
                                                  href="{{ route('serverPage', $server->link ?? $server->id) }}">{{ $server->name }}</a>
                            <a class="link-server" href="{{ $server->site }}" noindex><i
                                        class="lang-server flag-icon flag-icon-{{ $server->country }}"></i> {{ $server->site }}
                            </a></p>
                        <div class="clear"></div>
                    </div>
                    <div class="info-item-server">

                        <div class="rating-block @if($i == 1) flag @endif">
                            @if($i == 1)
                                <a href="{{ route('voteServerVip', $server->link ?? $server->id) }}">
                                    <div class="vip"></div>
                                </a>
                                <p>
                                    {{ number_format($server->rates,0,",",".") }}
                                    <br> Голосов
                                </p>
                            @else
                                @if($server->rating != 0)
                                <div class="coll-rating">
                                    {{ substr($server->rating, 0, -1) }}
                                    <span class="litle-text">,{{ substr($server->rating, -1) }}</span>
                                </div>
                                @else
                                    <div class="coll-rating">0<span class="litle-text">,0</span></div>
                                @endif
                                <p>
                                    {{ number_format($server->rates,0,",",".") }}
                                    <br> Голосов
                                </p>
                            @endif
                        </div>
                        <p class="text-info-server">
                            {{--<span class="infoText-right">--}}
                            {{--<span class="segment-info">Тип: <span class="rightText">Комплекс</span></span>--}}
                            {{--<span class="segment-info">Хроники: <span--}}
                                        {{--class="rightText colorOrange">{{ $server->version }}</span></span>--}}
                                {{--@if($server->online != 0)--}}
                                    {{--<span class="segment-info">Онлайн: <span--}}
                                                {{--class="rightText">{{ $server->online }} +</span></span>--}}
                                {{--@endif--}}
                                {{--@if($server->max_online != 0)--}}
                                    {{--<span class="segment-info">Макс.онлайн: <span--}}
                                                {{--class="rightText">{{ $server->max_online }}</span></span>--}}
                                {{--@endif--}}
                                {{--@if(isset($server->worlds))--}}
                                    {{--<span class="segment-info">Рейты: <span class="rightText">--}}
                                    {{--@foreach($server->worlds as $world)--}}
                                                {{--x{{ $world->rate }} @if (!$loop->last)/@endif--}}
                                            {{--@endforeach--}}
                                {{--</span></span>--}}
                                {{--@endif--}}
                            {{--</span>--}}
                            @if(isset($server->worlds))
                                @foreach($server->worlds as $world)
                                    <span class="rateServ hint--right hint--large hint--bounce @if($i == 1) first @endif" aria-label="{{ $world->description }}">
                                x{{ $world->rate }}
                            </span>
                                @endforeach
                            @endif
                            <span class="info-text-main-top">
                             {{ $server->description }}
                           </span>

                            <span class="linkStat-and-comment">
                                <a href="">
                                <i><img src="../img/icon/i-2.png"></i> Статистика
                            </a>
                                <a href="{{ route('serverPage', $server->id) }}#comments">
                                <i><img src="../img/icon/i-3.png"></i> {{ $server->reviews }} Комментариев
                            </a>
                            </span>
                        </p>
                        <div class="clear"></div>
                    </div>
                    @if(\MMORATE\Privilege::where('user_id', $server->user_id)->where('action', \MMORATE\Privilege::PRIVILEGE_BANNER)->where('status', '1')->first())
                        <div class="segment-rek-item">
                            <div class="bg-ramka-item"></div>
                            <a href=""><img src="../img/rk/bn700.png" alt=""></a>
                        </div>
                    @endif
                </div>
            @endforeach


            {{--{{ $allServers->links() }}--}}
            {!! $allServers->appends(\Request::except('page'))->render() !!}
        </div>
@endsection