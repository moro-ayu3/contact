<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
  <script src="http://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
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
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="fullname" value="{{ old('fullname') }}" />
              <p class="form__example">例）山田</p>
              <input type="text" name="fullname" value="{{ old
                ('fullname') }}" />
              <p class="form__example">例）太郎</p>
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
            <span class="form__label--item">性別</span>
            <span class ="form__label--required">※</span>
          </div>
          <div class="form__group--content">
            <div class="form__input--radio">
                <input type="radio" id="1" name="gender" value="1" value="{{ old('like','gender') == 'male' ? 'checked' : '' }}" /><label for="male">男性</label>
                <input type="radio" id="2" name="gender" value="2" value="{{ old('gender') }}" /><label for="female">女性</label>
                <input type="hidden" name="id" value="id">
            </div>
            <div class="form__error">
              @error('gender')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" value="{{ old('email') }}" />
              <p class="form__example">例）test@example.com</p>
            </div>
            <div class="form__error">
              @error('email')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">郵便番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              〒<input type="text" name="postcode" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2address(this,'','address','address');" value="{{ old('postcode') }}" />
              <p class="form__example">例）123-4567</p>
            </div>
            <div class="form__error">
              @error('postcode')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" size="60" value="{{ old('address') }}" />
              <p class="form__example">例）東京都渋谷区千駄ヶ谷1-2-3</p>
            </div>
            <div class="form__error">
              @error('address')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
           <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <input type="text" name="building_name" />
            <p class="form__example">例）千駄ヶ谷マンション101</P>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">ご意見</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="option" class="form-textarea"></textarea>
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

