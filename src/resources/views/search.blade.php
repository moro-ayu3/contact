<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/search.css') }}" />
  <link rel="next" href="/seaches/2">
</head>

<body>
  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>管理システム</h2>
      </div>
      <form class="form" action="/searches/search" method="get">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">お名前</h3>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="keyword" class="fullname"  />
              <input type="text" name="keyword" class="fullname" />
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">性別</h3>
          </div>
          <div class="form__group--content">
            <div class="form__input--radio">
                  <input type="radio" class="gender" id="全て" name="value" value="全て" checked/>
                  <label class="label__all" for="全て">全て
                  </label>
                  <input type="radio" class="gender" id="男性" name="value" value="男性"  />
                  <label class="label__male" for="男性">男性</label>
                  <input type="radio" class="gender" id="女性" name="value" value="女性" />
                  <label class="label__female" for="女性">女性</label>
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">登録日</h3>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
                <input type="date" name="date" class="created_at" />
                ~<input type="date" name="date" class="created_at" />
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">メールアドレス</h3>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="keyword" class="email" />
            </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit" value="送信">検索</button>
        </div>
        <div class="form__return">
          <a class="return" href="/searches">リセット</a>
        </div>
      </form>
      <div class="form__database-check">
        <p class="data-1">全35件中 11~20件</p>
        <nav class="pagination">
          <a href="" class="pagination__prev">
            <span class="visuallyhidden">Previous Page</span>
          </a>
          <ul class="pagination__items">
            <li class="is-active"><a href="/seraches" remote="false" class="link">1</a></li>
            <li><a href="/seraches/2" rel="next" class="link">2</a></li>
            <li><a href="/searches/3" class="link">3</a></li>
            <li><a href="/seraches/4" class="link">4</a></li>
          </ul>
          <a href="/seraches/2" class="pagination__next" rel="next">
            <span class="visuallyhidden">Next Page</span>
          </a>
        </nav>
      </div>
      @if(isset($contacts))
      <table>
        <tr class="form__database-list">
          <th class="form__database-title">ID</th>
          <th class="form__database-title">お名前</th>
          <th class="form__database-title">性別</th>
          <th class="form__database-title">メールアドレス</th>
          <th class="form__database-title">ご意見</th>
        </tr>
        @foreach($contacts as $contact)
        <tr class="form__database-list">
            <td class="form__database-content">
              <p class="form__database-content-p">{{ $contact['id'] }}{{ $contact['last_name'] }}{{ $contact['first_name'] }}{{ $contact['gender'] }}{{ $contact['email'] }}
              <input id="swich" class="swich_seetting" type="checkbox">
              <label class="tooltip" for="swich">{{ $contact['option'] }}<span class="option:hover">{{ $contact['option'] }}</span></label></p></td>
            <td class="form__database-content">
              <form class="delete-form__button" action="/searches/delete" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
              </form>
            </td>
        </tr>
        @endforeach
      </table>
      <div class="option__alert">
        @if(session('message'))
          <div class="option__alert--message">
           {{ session('message') }}
          </div>
        @endif
      </div>
      @endif
    </div>
  </main>
</body>

</html>

