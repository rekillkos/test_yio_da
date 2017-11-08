<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Test</title>
  <link rel="stylesheet" href="./css/main.css">
</head>
<body>
  <div class="wrapper">
    <main class="main-content">
      <div class="my-profile">
        <h2 class="heading">Мой профиль</h1>
        <div class="profile">
          <div class="avatar">
            <img src="{{ $user->avatar }}" alt="Аватар" class="avatar__pic">
          </div>
          <div class="information">
            <div class="nickname">{{ $user->nickname }}</div>
            <div class="user-name">
              <span class="name">{{ $user->firstname }}</span>
              <span class="surname">{{ $user->lastname }}</span>
            </div>
            <a href='tel:{{ $user->phone_raw }}' class="phone">{{ $user->phone }}</a>
          </div>
        </div>
        @if(session()->get('message'))
            <p class="text-success">{{ session()->get('message') }}</p>
        @endif
      </div>
      <div class='edit-profile'>
        <h2 class="heading">Редактировать профиль</h1>
        <form class='form' id='form' method='POST' enctype='multipart/form-data'>
            {{ csrf_field() }}
          <ul class="form__list">
            <li class="form__item">
              <label class='form__label' for="nickname">Никнейм:</label>
              <input class='form__input' id='nickname' type="text" name="nickname" value="{{ old('nickname') ?: @$user->nickname }}">
            </li>
            <li class="form__item">
              <label class='form__label' for="name">Имя:</label>
              <input class='form__input' id='firstname' type="text" name="firstname" value="{{ old('firstname') ?: @$user->firstname }}">
            </li>
            <li class="form__item">
              <label class='form__label' for="surname">Фамилия:</label>
              <input class='form__input' id='lastname' type="text" name="lastname" value="{{ old('lastname') ?: @$user->lastname }}">
            </li>
            <li class="form__item">
              <label class='form__inline-label' for="avatar">Аватар:</label>
              <input class='form__inline-input' id='avatar' type="file" name="avatar" value='image/jpeg,image/png'>
            </li>
            <li class="form__item">
              <label class='form__label' for="phone">Телефон:</label>
              <input class='form__input' id='phone' type="text" name="phone" value="{{ old('phone') ?: @$user->phone }}">
            </li>
            <li class="form__item">
              <div class="form__title">Пол:</div>
              <label class='form__inline-label' for="male">Мужской</label>
              <input class='form__inline-input' name='sex' id='male' type="radio" value="0" {!! setChecked($user->sex == 0) !!}>
              <label class='form__inline-label' for="female">Женский</label>
              <input class='form__inline-input' name='sex' id='female' type="radio" value="1" {!! setChecked($user->sex == 1) !!}>
            </li>
            <li class="form__item">
              <label class='form__inline-label' for="showPhone">Я согласен получать email-рассылку</label>
              <input type="hidden" name="spam" value="0">
              <input class='form__inline-input' id='showPhone' type="checkbox" name="spam" {!! setChecked($user->spam) !!}>
            </li>
            <li class="form__item">
              <button class='form__button' type="submit">Отправить</button>
            </li>
          </ul>
        </form>
      </div>
    </main>
  </div>
</body>
</html>