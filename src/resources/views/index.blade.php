<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
  <script src="https://yubinbango.github.io/yubinbango.js" charset="UTF-8"></script>
</head>

<body>
  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
      </div>
      <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">お名前</h3>
            <label class="form__label--required">※</label>
          </div>
          <div class="form__group-content">
           <div class="form__input">
            <div class="form__input--text">
              <input type="text" name="last_name" class="fullname" value="{{ old('last_name') }}" />
            </div>
            <div class="form__input--text-1">
              <input type="text" name="first_name" class="fullname" value="{{ old
                ('first_name') }}" />
            </div>
           </div>
           <div class="example">
            <p class="form__example-1">例）山田</p>
            <p class="form__example-2">例）太郎</p>
           </div>
            <div class="form__error">
              @error('fullname')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">性別</h3>
            <label class ="form__label--required">※</label>
          </div>
          <div class="form__group--content">
            <div class="form__input--radio">
                <input type="radio" class="radio" id="男性" name="gender" value="男性" value="{{ old('like','gender') == 'male' ? 'checked' : '' }}"checked />
                <label for="male" class="label__male">男性</label>
                <input type="radio" class="radio" id="女性" name="gender" value="女性" value="{{ old('gender') }}" />
                <label for="female" class="label__female">女性</label>
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">メールアドレス</h3>
            <label class="form__label--required">※</label>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" value="{{ old('email') }}" />
            </div>
            <p class="form__example">例）test@example.com</p>
            <div class="form__error">
              @error('email')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">郵便番号</h3>
            <label class="form__label--required">※</label>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              〒<input type="text" name="postcode" size="10" maxlength="8" pattern="^[0-9]{3}-?[0-9]{4}$" value="{{ old('postcode') }}" required/>
            </div>
            <p class="form__example">例）123-4567</p>
            <div class="form__error">
              @error('postcode')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">住所</h3>
            <label class="form__label--required">※</label>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" size="60" value="{{ old('address') }}" />
            </div>
            <p class="form__example">例）東京都渋谷区千駄ヶ谷1-2-3</p>
            <div class="form__error">
              @error('address')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
           <h3 class="form__label--item">建物名</h3>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="building_name" />
            </div>
            <p class="form__example">例）千駄ヶ谷マンション101</P>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <h3 class="form__label--item">ご意見</h3>
            <label class="form__label--required">※</label>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="option" class="form-textarea">{{ old('option') }}</textarea>
            </div>
            <div class="form__error">
              @error('option')
              {{ $message }}
              @enderror
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit" value="送信">確認</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>

