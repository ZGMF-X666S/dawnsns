<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- publicのjs\script.jsを読み込む -->
    <script src="js/script.js"></script>
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="/images/main_logo.png"></a></h1>
            <div id="">
                <div id="">
                    <p>{{Auth::user()->username}}さん<img src="/storage/images/{{ Auth::user()->images}}" alt="{{ Auth::user()->images}}" style="width:55px;"></p>
                <div>
                <p class="up">^</p>
                <ul>
                    <p class="text"><a href="/top">ホーム</a></p>
                    <p class="text"><a href="/profile">プロフィール</a></p>
                    <p class="text"><a href="/logout">ログアウト</a></p>
                    
                </ul>

            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{ $follow_count }}名</p>
                </div>
                <p class="btn"><a href="/followList">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{ $follower_count }}名</p>
                </div>
                <p class="btn"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>