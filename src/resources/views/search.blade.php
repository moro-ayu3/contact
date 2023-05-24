<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/search.css') }}" />
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
              <input type="text" name="keyword" class="fullname" value="{{ $params['keyword'] ?? null }}" value="{{ old('fullname') }}" />
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">性別</h3>
          </div>
          <div class="form__group--content">
            <div class="form__input--radio">
                <input type="radio" class="radio" id="0" name="gender" value="0" value="{{ old('like','gender') == 'all' ?'checked' : '' }}" value="{{ $params['gender'] ?? null }}" /><label class="label__all">
                全て</label>
                <input type="radio" class="radio" id="1" name="gender" value="1" value="{{ old('gender') }}" value="{{ $params['gender'] ?? null }}" /><label for="male" class="label__male">男性</label>
                <input type="radio" class="radio" id="2" name="gender" value="2" value="{{ old('gender') }}" value="{{ $params['gender'] ?? null }}" /><label for="female" class="label__female">女性</label>
                <input type="hidden" name="id" value="id">
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">登録日</h3>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
                <input type="date" name="date" value="{{ old('created_at') }}"  value="{{ $params['created_at'] ?? null }}" />
                ~<input type="date" name="date" value="{{ old('created_at') }}" value="{{ $params['created_at'] ?? null }}" />
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">メールアドレス</h3>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" value="{{ old('email') }}" value="{{ $params['email'] ?? null }}" />
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
        <ol class="data-list">
          <li><input type="checkbox" name="checkbox" class="checkbox"><</li>
          <li><input type="checkbox" name="checkbox" class="checkbox">1</li>
          <li><input type="checkbox" name="checkbox" class="checkbox">2</li>
          <li><input type="checkbox" name="checkbox" class="checkbox">3</li>
          <li><input type="checkbox" name="checkbox" class="checkbox">4</li>
          <li><input type="checkbox" name="checkbox" class="checkbox">></li>
        </ol>
      </div>
      <table>
        <tr class="form__database-list">
          <th class="form__database-title">ID</th>
          <th class="form__database-title">お名前</th>
          <th class="form__database-title">性別</th>
          <th class="form__database-title">メールアドレス</th>
          <th class="form__database-title">ご意見</th>
        </tr>
        <tr class="form__database-list">
          @foreach ($contacts as $contact)
            <td class="form__database-content">{{ $contact['id'] }}</td>
            <td class="form__database-content">{{ $contact['fullname'] }}</td>
            <td class="form__database-content">{{ $contact['gender'] }}</td>
            <td class="form__database-content">{{ $contact['email'] }}</td>
            <td class="form__database-content">{{ $contact['option'] }}</td>
            <form class="delete-form__button" action="/contacts/delete" method="post">
              <input type="hidden" name="id" value="{{ $contact['id'] }}">
              <button class="delete-form__button-submit" type="submit" value="送信">削除</button>
            </form>
          @endforeach
        </tr>
      </table>
      <div class="option__alert">
        @if(session('message'))
          <div class="option__alert--message">
           {{ session('message') }}
          </div>
        @endif
        <div class="option__alert--hover">
          <p class="option_hover">{{ $contact['option'] }}</p>
        </div>
      </div>
    </div>
  </main>
</body>

</html>

