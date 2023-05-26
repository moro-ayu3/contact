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
            <h3 class="form__label--item">お名前</h3>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
           <div class="form__input">
            <div class="form__input--text">
              <input type="text" name="fullname" class="fullname" value="{{ old('fullname', $contact->fullname) }}" />
            </div>
            <div class="form__input--text-1">
              <input type="text" name="fullname" class="fullname" value="{{ old
                ('fullname', $contact->fullname) }}" />
            </div>
           </div>
            <p class="form__example">例）山田</p>
            <p class="form__example-1">例）太郎</p>
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
            <span class ="form__label--required">※</span>
          </div>
          <div class="form__group--content">
            <div class="form__input--radio">
                <input type="radio" class="radio" id="1" name="gender" value="1" value="{{ old('like','gender', $contact->gender) == 'male' ? 'checked' : '' }}"checked /><label for="male" class="label__male">男性</label>
                <input type="radio" class="radio" id="2" name="gender" value="2" value="{{ old('gender', $contact->gender) }}" /><label for="female" class="label__female">女性</label>
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
            <h3 class="form__label--item">メールアドレス</h3>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" value="{{ old('email', $contact->email) }}" />
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
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              〒<input type="text" name="postcode" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2address(this,'','address','address');" value="{{ old('postcode', $contact->postcode) }}" />
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
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" required autocomplete="text" size="60" value="{{ old('address', $contact->address) }}" />
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
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="option" class="form-textarea">{{ old('option', $contact->option) }}</textarea>
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

