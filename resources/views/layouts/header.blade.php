<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @switch(request()->route()->getName())
      @case('top')
        <title>W-Apartment</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.min.css" integrity="sha512-q54FvbV+gGBn+NvgaD4gpJ7w4wrO00DgW7Rx503PIhrf0CuMwLOwbS+bXgOBFSob+6GVy1HDPfaRLJ8w2jiS4g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @break

      @case('feature')
        <title>W-Apartment - 特徴</title>
        @break

      @case('house')
        <title>W-Apartment - 商品住宅</title>
        @break

      @case('contact')
        <title>W-Apartment - お問い合わせ</title>
        @break

      @case('contact-done')
        <title>W-Apartment - お問い合わせ送信完了</title>
        @break

      @case('document-request')
        <title>W-Apartment - 資料請求</title>
        @break

      @case('document-request-done')
        <title>W-Apartment - 資料請求送信完了</title>
        @break

      @case('company')
        <title>W-Apartment - 会社概要</title>
        @break

      @case('case-study')
        <title>W-Apartment - 事例</title>
        @break

      @case('case-study-single')
        <title>W-Apartment - 事例 - </title>
        @break

      @case('blog')
        <title>W-Apartment - ブログ</title>
        @break

      @case('blog-single')
        <title>W-Apartment - ブログ - </title>
        @break

      @case('blog-recommend')
        <title>W-Apartment - ブログ - おすすめ記事</title>
        @break

      @case('blog-single')
        <title>W-Apartment - ブログ - </title>
        @break

      @case('philosophy')
        <title>W-Apartment - 理念</title>
        @break

      @case('news')
        <title>W-Apartment - News</title>
        @break

      @case('news-single')
        <title>W-Apartment - News - </title>
        @break

      @default
        <title>W-apartment</title>
    @endswitch
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <!-- Site fevicon icons -->
    <link rel="icon" href="{{ URL::asset('images/favicon.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ URL::asset('images/favicon.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('images/favicon.png') }}" />
    <meta name="msapplication-TileImage" content="{{ URL::asset('images/favicon.png') }}" />
    <script>
      (function(d) {
        var config = {
          kitId: 'phz1yyq',
          scriptTimeout: 3000,
          async: true
        },
        h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
      })(document);
    </script>
  </head>
  <body>
    <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    @switch(request()->route()->getName())

      @case('feature')
        <header class="header feature-header">
        @break

      @case('house')
        <header class="header lineup-header">
        @break

      @case('contact')
        <header class="header request-header">
        @break

      @case('contact-done')
        <header class="header request-header">
        @break

      @case('document-request')
        <header class="header request-header">
        @break

      @case('document-request-done')
        <header class="header request-header">
        @break
      
      @case('company')
        <header class="header request-header">
        @break
      
      @case('case-study')
        <header class="header works-header">
        @break
      
      @case('case-study-single')
        <header class="header works-header">
        @break

      @case('blog')
        <header class="header works-header">
        @break
        
      @case('blog-single')
        <header class="header works-header">
        @break
        
      @case('blog-category')
        <header class="header works-header">
        @break
      
      @case('blog-recommend')
        <header class="header works-header">
        @break

      @case('philosophy')
        <header class="header about-header">
        @break

      @case('news')
        <header class="header news-header">
        @break

      @case('news-single')
        <header class="header news-header">
        @break

      @default
        <header class="header">
    @endswitch
      <h1 class="logo"><a href="{{ url('/') }}"><img src="{{ URL::asset('images/logo.png') }}" alt="" id="logo"></a></h1>
      <div class="header-aside" id="aside_left">
        <div class="menu-btn" id="menu_btn">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <div class="line"></div>
        <div id="num" class="slide-number">
          @switch(request()->route()->getName())
            @case('feature')
              FEATURE
              @break

            @case('house')
              LINEUP
              @break

            @case('contact')
              REQUEST
              @break

            @case('contact-done')
              REQUEST
              @break

            @case('document-request')
              REQUEST
              @break

            @case('document-request-done')
              REQUEST
              @break
              
            @case('company')
              COMPANY
              @break

            @case('case-study')
              WORKS
              @break
              
            @case('case-study-single')
              WORKS
              @break

            @case('blog')
              BLOG
              @break

            @case('blog-single')
              BLOG
              @break

            @case('blog-category')
              BLOG
              @break

            @case('blog-recommend')
              BLOG
              @break

            @case('philosophy')
              ABOUT
              @break

            @case('news')
              NEWS
              @break

            @case('news-single')
              NEWS
              @break

            @default
              01
          @endswitch
        </div>
      </div>
      <div class="header-aside" id="aside_right">
        <a href="{{'/admin'}}" class="login-btn"><img src="{{ URL::asset('images/ico_login.png') }}" alt="" id="login_img"></a>
        <div class="header-aside-txt">
          <span class="btn">説明会情報</span>
          <img src="{{ URL::asset('images/side_link.png') }}" alt="" id="side_link">
          <span class="btn">資料請求</span>
        </div>
        <div class="copyright">
          © W-APARTMENT
        </div>
        <div class="line"></div>
      </div>        
      <button id="moveDown" class="btn scroll-btn">
        SCROLL
        <img src="{{ URL::asset('images/ico_arrow_down.png') }}" alt="">
      </button>
      @if(request()->route()->getName() == 'top')
      <button id="moveLeft" class="ctr-btn btn"><img src="{{ URL::asset('images/ico_prev.png') }}" alt="">PREV</button>
      <button id="moveRight" class="ctr-btn btn">NEXT<img src="{{ URL::asset('images/ico_next.png') }}" alt=""></button>
      @endif
      <div class="site-menu" id="site_menu">
        <div class="site-menu-left">
          <ul>
            <li><a href="{{url('/philosophy')}}" class="btn"><span>01</span>理念</a></li>
            <li><a href="{{url('/#support')}}" class="btn"><span>02</span>住宅/経営支援</a></li>
            <li><a href="{{url('/philosophy')}}" class="btn"><span>03</span>部材共有</a></li>
            <li><a href="{{url('/house')}}" class="btn"><span>04</span>商品住宅</a></li>
            <li><a href="{{url('/feature')}}" class="btn"><span>05</span>特徴</a></li>
            <li><a href="{{url('/#philosophy')}}" class="btn"><span>06</span>料金</a></li>
            <li><a href="{{url('/case-study')}}" class="btn"><span>07</span>施工実績</a></li>
            <li><a href="{{url('/#flow')}}" class="btn"><span>08</span>プロモーション</a></li>
            <li><a href="{{url('/news')}}" class="btn"><span>09</span>NEWS</a></li>
            <li><a href="{{url('/company-profile')}}" class="btn"><span>10</span>会社概要</a></li>
          </ul>
        </div>
        <div class="menu-content-line"></div>
        <div class="site-menu-right">
          <ul>
            <li><span>CONTACT</span></li>
            <li><a href="{{url('/contact')}}">お問い合わせ</a></li>
            <li><a href="{{url('/document-request')}}">資料請求</a></li>
          </ul>
          <div class="phone">
            <a href="tel: 0123-456-7890" class="btn"><img src="{{ URL::asset('images/ico_phone.png') }}" alt="">0123-456-7890</a>
            <div>平日 00:00-00:00</div>
          </div>
        </div>
      </div>
    </header>