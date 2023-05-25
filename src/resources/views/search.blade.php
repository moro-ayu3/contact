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
      <form class="form" action="/searches/search" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">お名前</h3>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="keyword" class="fullname" value="{{ old('keyword') }}" />
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">性別</h3>
          </div>
          <div class="form__group--content">
            <div class="form__input--radio">
              @foreach($form_data as $value)
                <input type="radio" class="radio" id="0" name="{{ $value[1] }}" value="{{ $value[2] }}" value="{{ old('like','$value[1]') == $value[2] ? 'checked' : '' }}"checked/><label class="label__all">
                全て{{ $value[0] }}</label>
                <input type="radio" class="radio" id="1" name="{{ $value[1] }}" value="{{ $value[2] }}" value="{{ old('$value[1]') == $value[2] ? 'checked' : '' }}" /><label for="male" class="label__male">男性{{ $value[0] }}</label>
                <input type="radio" class="radio" id="2" name="{{ $value[1] }}" value="2" value="{{ old('$value[1]') == $value[2] ? 'checked' : ''}}"/><label for="female" class="label__female">女性{{ $value[0] }}</label>
                <input type="hidden" name="id" value="id">
              @endforeach
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">登録日</h3>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
                <input type="date" name="date" value="{{ old('created_at')->format('Y/m/d H:i:s') ?? null }}" />
                ~<input type="date" name="date" value="{{ old('created_at')->format('Y/m/d H:i:s') ?? null }}" />
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">メールアドレス</h3>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="keyword" value="{{ old('keyword') }}" class="email" />
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
        <ul class="data-list">
          <li><input type="checkbox" name="<" class="checkbox"></li>
          <li><input type="checkbox" name="1" class="checkbox"></li>
          <li><input type="checkbox" name="2" class="checkbox"></li>
          <li><input type="checkbox" name="3" class="checkbox"></li>
          <li><input type="checkbox" name="4" class="checkbox"></li>
          <li><input type="checkbox" name=">" class="checkbox"></li>
        </ul>
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
            <td class="form__database-content">{{ $contact['gender'] }}{{ $value->gender }}</td>
            <td class="form__database-content">{{ $contact['email'] }}</td>
            <td class="form__database-content">{{ $contact['option'] }}</td>
             <p class="option:hover">{{ $contact['option'] }}</p>
            {{ $contacts->links() }}
            <form class="delete-form__button" action="/searches/delete" method="post">
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
      </div>
    </div>
  </main>
</body>

</html>

