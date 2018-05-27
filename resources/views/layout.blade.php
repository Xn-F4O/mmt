<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/libs.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" />
    <title>MMORATE - @yield('title')</title>
</head>

<body>
    <div class="nav-game">
        <div class="content-main">
            <a href="{{ route('aion') }}" class="item-link-game">
            <i><img src="/img/elements/ico-1.png" alt=""></i> Aion
        </a>
            <a href="{{ route('jade') }}" class="item-link-game">
            <i><img src="/img/elements/ico-2.png" alt=""></i> Jade Dynasty
        </a>
             {{--<a href="" class="item-link-game active-game-nav">--}}
            <a href="{{ route('lineage') }}" class="item-link-game">
            <i><img src="/img/elements/ico-3.png" alt=""></i> Lineage 2
        </a>
            <a href="{{ route('mu') }}" class="item-link-game">
            <i><img src="/img/elements/ico-4.png" alt=""></i> Mu Online
        </a>
            <a href="{{ route('perfect') }}" class="item-link-game">
            <i><img src="/img/elements/ico-5.png" alt=""></i> Perfect World
        </a>
            <a href="{{ route('rf') }}" class="item-link-game">
            <i><img src="/img/elements/ico-6.png" alt=""></i> RF Online
        </a>
            <a href="{{ route('wow') }}" class="item-link-game">
            <i><img src="/img/elements/ico-7.png" alt=""></i> World Of Warcraft
        </a>
            <a href="#" class="item-link-game">
             Online Games
        </a>
        </div>
    </div>
    <div class="nav-main">
        <div class="content-main">
            <a href="{{ route('about') }}" class="menu-item"><span class="line-menu"></span>О проекте</a>
            <a href="{{ route('rules') }}" class="menu-item"><span class="line-menu"></span>Правила</a>
            <a href="{{ route('contacts') }}" class="menu-item"><span class="line-menu"></span>Контакты</a>
            <a href="{{ route('support') }}" class="menu-item"><span class="line-menu"></span>Техническая поддержка</a>
            <a href="{{ route('faq') }}" class="menu-item"><span class="line-menu"></span>Вопросы и ответы</a>
        </div>
    </div>
@yield('content')
<div class="contentRight">
    <div class="element-desing-2">
        <img src="/img/elements/elem-2.png" alt="">
    </div>
    @guest
    <div class="link-lk">
        <a href="{{ route('register') }}" class="link-lk-btn">Создать аккаунт</a>
    </div>
        @else
        <div class="menu-block-lk">
        <div class="title-menu-lk">
            Панель навигации
        </div>
{{--            @if(MMORATE\Servers::MyCount() == 0)--}}
        <a href="{{ route('addServer') }}" class="itemLkMenu @if(Request::is('addServer')) lkMenuActive @endif">
            <span class="vnutItemMenu" style="border-top: 0;"><span class="arrMenu">› </span>Добавить сервер</span>
        </a>
        <a href="" class="itemLkMenu @if(Request::is('profile')) lkMenuActive @endif">
            <span class="vnutItemMenu"><span class="arrMenu">› </span>Редактировать профиль</span>
        </a>
            {{--@else--}}
                {{--<a href="" class="itemLkMenu @if(Request::is('profile')) lkMenuActive @endif">--}}
                    {{--<span class="vnutItemMenu" style="border-top: 0;"><span class="arrMenu">› </span>Редактировать профиль</span>--}}
                {{--</a>--}}
            {{--@endif--}}
        <a href="" class="itemLkMenu @if(Request::is('editServer')) lkMenuActive @endif">
            <span class="vnutItemMenu"><span class="arrMenu">› </span>Редактировать сервер</span>
        </a>
        <a href="" class="itemLkMenu @if(Request::is('statistic')) lkMenuActive @endif">
            <span class="vnutItemMenu"><span class="arrMenu">› </span>Статистика</span>
        </a>
        <a href="{{ route('changePassword') }}" class="itemLkMenu @if(Request::is('changePasswordPage')) lkMenuActive @endif">
            <span class="vnutItemMenu"><span class="arrMenu">› </span>Сменить пароль</span>
        </a>
        <a href="{{ route('banners') }}" class="itemLkMenu @if(Request::is('ads')) lkMenuActive @endif">
            <span class="vnutItemMenu"><span class="arrMenu">› </span>Баннера и кнопки</span>
        </a>
        <a href="" class="itemLkMenu @if(Request::is('profileVip')) lkMenuActive @endif">
            <span class="vnutItemMenu"><span class="arrMenu">› </span>VIP Профиль</span>
        </a>
        <a href="{{ route('logout') }}" class="itemLkMenu">
            <span class="vnutItemMenu" style="border-bottom: 0;"><span class="arrMenu">› </span>Выйти</span>
        </a>
    </div>
  @endif
    <div class="segment-rek-sitebar">
        <div class="bg-ramka-sitebar"></div>
        <a href=""><img src="/img/rk/bn234.png" alt=""></a>
    </div>
    @guest
    <div class="auth-block">
      <div class="title-auth">
        Личный кабинет
      </div>
      <form method="POST" action="{{ route('login') }}">
          @csrf
        <div class="form-auth">
          <input type="text" class="inpAuth" placeholder="Введите ваш email" name="email" value="{{ old('email') }}">
          @if ($errors->has('email'))
              <span class="invalid-feedback" style="margin: 0">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
          <input type="password" class="inpAuth" placeholder="Введите пароль" name="password">
          @if ($errors->has('password'))
              <span class="invalid-feedback" style="margin: 0">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
          <div class="capcha">
            <img src="/img/bg/capha.png" alt="">
          </div>
          <button class="authBtn"></button>
          <a href="{{ route('password.request') }}">Забыли пароль?</a>
          <div class="clear"></div>
        </div>
      </form>
    </div>
  @else
    <div class="auth-block">
      <div class="title-auth">
        Личный кабинет
      </div>
      <form>
        <div class="form-auth">
          <div class="auth-autorize">
            Добро пожаловать, <span class="user-auth-name">{{ Auth::user()->name }}</span>
            <p class="line-user-uath"></p>
            <p>Предыдущий IP адрес: {{ Auth::user()->last_login_ip }}</p>
            <p>Текущий IP адрес: {{ Request::ip() }}</p>
            <p class="line-user-uath"></p>
            <p>До голосования осталось: <span class="timer-uath"> 24:00:00</span></p>
            {{--<a href="{{ route('logout') }}" class="out-btn"><i><img src="/img/icon/i-9.png" alt=""></i> Выйти</a>--}}
          </div>
        </div>
      </form>
    </div>
  @endif
    <div class="segment-rek-sitebar">
        <div class="bg-ramka-sitebar"></div>
        <a href=""><img src="/img/rk/bn234.png" alt=""></a>
    </div>
    <div class="widget-block">
        <div class="title-vk">
            Группа Вконтакте
        </div>
        <div class="widget-vk">
            <img src="/img/elements/widget.png" alt="">
        </div>
    </div>
    <div class="bottom-sitebar-vnut">
        <div class="miniRek">
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="bg-bottom-content">
    <div class="element-desing-4">
        <img src="/img/elements/elem-4.png" alt="">
    </div>
</div>
</div>
</div>
<footer>
    <div class="content-main">
        <p class="text-info-footer">
            Новые игровые сервера - открывающиеся или только что открытые игровые MMO миры.
            <br> Благодаря огромной популярности, ежедневно открываются множество серверов с различными рейтами (которые влияют на скорость повышения уровня персонажа и добычу игровых предметов) и хрониками, а так же с уникальными модификациями и дополнениями.
            <br>
            <br> Играть на данных серверах вы можете абсолютно бесплатно, так как они носят лишь ознакомительный характер и не являются официальной версией игры.
            <br>
            <br>
            <a href="">© 2018 Topmmo.com</a> - Мониторинг игровых серверов
        </p>
        <div class="social-footer">
            <a href="" class="item-social vk-ico"></a>
            <a href="" class="item-social fb-ico"></a>
            <a href="" class="item-social twit-ico"></a>
            <a href="" class="item-social mail-ico"></a>
        </div>
        <ul class="footer-menu">
            <li>
                <a href="{{ route('about') }}">О проекте</a>
            </li>
            <li>
                <a href="{{ route('rules') }}">Правила</a>
            </li>
            <li>
                <a href="{{ route('contacts') }}">Контакты</a>
            </li>
            <li>
                <a href="{{ route('support') }}">Техническая поддержка</a>
            </li>
            <li>
                <a href="{{ route('faq') }}">Вопросы и ответы</a>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
</footer>
<script type="text/javascript" src="../js/libs.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
</body>

</html>