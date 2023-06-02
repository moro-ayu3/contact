<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/search.css') }}" />
  <link rel="prev" href="/seaches/3">
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
              @if($contact)
              <input type="text" name="keyword" class="fullname" value="{{ $contact['last_name'] }}" value="{{ $contact['first_name'] }}" />
              @endif
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">性別</h3>
          </div>
          <div class="form__group--content">
            <div class="form__input--radio">
                  @if($contact)
                  <input type="radio" class="gender" id="全て" name="value" value="全て" value="{{ $contact['gender'] }}"checked/>
                  <label class="label__all" for="全て">全て
                  </label>
                  <input type="radio" class="gender" id="男性" name="value" value="男性" value="{{ $contact['gender'] }}" />
                  <label class="label__male" for="男性">男性</label>
                  <input type="radio" class="gender" id="女性" name="value" value="女性" value="{{ $contact['gender'] }}"/>
                  <label class="label__female" for="女性">女性</label>
                  @endif
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">登録日</h3>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
                @if($contact)
                <input type="date" name="date" class="created_at" value="{{ $contact['created_at'] }}" />
                ~<input type="date" name="date" class="created_at" value="{{ $contact['created_at'] }}" />
                @endif
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">メールアドレス</h3>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              @if($contact)
              <input type="email" name="keyword" value="{{ $contact['email']}}" class="email" />
              @endif
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
          <a href="/searches/3" class="pagination__prev" rel="prev">
            <span class="visuallyhidden">Previous Page</span>
          </a>
          <ul class="pagination__items">
            <li class="is-active"><a href="/seraches">1</a></li>
            <li><a href="/searches/2" class="link">2</li>
            <li><a href="/seraches/3" rel="prev" class="link">3</a></li>
            <li><a href="/seraches/4" remote="false" class="link">4</a></li>
          </ul>
          <a href="" class="pagination__next" rel="next">
            <span class="visuallyhidden">Next Page</span>
          </a>
        </nav>
      </div>
      @if(isset($contacts))($contacts as $contact)
      <table>
        <tr class="form__database-list">
          <th class="form__database-title">ID</th>
          <th class="form__database-title">お名前</th>
          <th class="form__database-title">性別</th>
          <th class="form__database-title">メールアドレス</th>
          <th class="form__database-title">ご意見</th>
        </tr>
        <tr class="form__database-list">
            <td class="form__database-content">
              <p class="form__database-content-p">{{ $contact['id'] }}{{ $contact['fullname'] }}{{ $contact['gender'] }}{{ $contact['email'] }}{{ $contact['option'] }}</p></td>
            <td class="form__database-content">
             <p class="option:hover">{{ $contact['option'] }}</p>
            </td>
            <td class="form__database-content">
              <form class="delete-form__button" action="/searches/delete" method="post">
                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
              </form>
            </td>
            <td class="form__database-content">
              <p class="form__database-content-p">{{ $contact['id'] }}{{ $contact['fullname'] }}{{ $contact['gender'] }}{{ $contact['email'] }}{{ $contact['option'] }}</p></td>
            <td class="form__database-content">
             <p class="option:hover">{{ $contact['option'] }}</p>
            </td>
            <td class="form__database-content">
              <form class="delete-form__button" action="/searches/delete" method="post">
                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
              </form>
            </td>
            <td class="form__database-content">
              <p class="form__database-content-p">{{ $contact['id'] }}{{ $contact['fullname'] }}{{ $contact['gender'] }}{{ $contact['email'] }}{{ $contact['option'] }}</p></td>
            <td class="form__database-content">
             <p class="option:hover">{{ $contact['option'] }}</p>
            </td>
            <td class="form__database-content">
              <form class="delete-form__button" action="/searches/delete" method="post">
                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
              </form>
            </td>
            <td class="form__database-content">
              <p class="form__database-content-p">{{ $contact['id'] }}{{ $contact['fullname'] }}{{ $contact['gender'] }}{{ $contact['email'] }}{{ $contact['option'] }}</p></td>
            <td class="form__database-content">
             <p class="option:hover">{{ $contact['option'] }}</p>
            </td>
            <td class="form__database-content">
              <form class="delete-form__button" action="/searches/delete" method="post">
                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
              </form>
            </td>
            <td class="form__database-content">
              <p class="form__database-content-p">{{ $contact['id'] }}{{ $contact['fullname'] }}{{ $contact['gender'] }}{{ $contact['email'] }}{{ $contact['option'] }}</p></td>
            <td class="form__database-content">
             <p class="option:hover">{{ $contact['option'] }}</p>
            </td>
            <td class="form__database-content">
              <form class="delete-form__button" action="/searches/delete" method="post">
                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
              </form>
            </td>
            <td class="form__database-content">
              <p class="form__database-content-p">{{ $contact['id'] }}{{ $contact['fullname'] }}{{ $contact['gender'] }}{{ $contact['email'] }}{{ $contact['option'] }}</p></td>
            <td class="form__database-content">
             <p class="option:hover">{{ $contact['option'] }}</p>
            </td>
            <td class="form__database-content">
              <form class="delete-form__button" action="/searches/delete" method="post">
                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
              </form>
            </td>
            <td class="form__database-content">
              <p class="form__database-content-p">{{ $contact['id'] }}{{ $contact['fullname'] }}{{ $contact['gender'] }}{{ $contact['email'] }}{{ $contact['option'] }}</p></td>
            <td class="form__database-content">
             <p class="option:hover">{{ $contact['option'] }}</p>
            </td>
            <td class="form__database-content">
              <form class="delete-form__button" action="/searches/delete" method="post">
                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
              </form>
            </td>
            <td class="form__database-content">
              <p class="form__database-content-p">{{ $contact['id'] }}{{ $contact['fullname'] }}{{ $contact['gender'] }}{{ $contact['email'] }}{{ $contact['option'] }}</p></td>
            <td class="form__database-content">
             <p class="option:hover">{{ $contact['option'] }}</p>
            </td>
            <td class="form__database-content">
              <form class="delete-form__button" action="/searches/delete" method="post">
                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
              </form>
            </td>
            <td class="form__database-content">
              <p class="form__database-content-p">{{ $contact['id'] }}{{ $contact['fullname'] }}{{ $contact['gender'] }}{{ $contact['email'] }}{{ $contact['option'] }}</p></td>
            <td class="form__database-content">
             <p class="option:hover">{{ $contact['option'] }}</p>
            </td>
            <td class="form__database-content">
              <form class="delete-form__button" action="/searches/delete" method="post">
                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
              </form>
            </td>
            <td class="form__database-content">
              <p class="form__database-content-p">{{ $contact['id'] }}{{ $contact['fullname'] }}{{ $contact['gender'] }}{{ $contact['email'] }}{{ $contact['option'] }}</p></td>
            <td class="form__database-content">
             <p class="option:hover">{{ $contact['option'] }}</p>
            </td>
            <td class="form__database-content">
              <form class="delete-form__button" action="/searches/delete" method="post">
                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
              </form>
            </td>
            {{ $contacts->links()}}
        </tr>
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

