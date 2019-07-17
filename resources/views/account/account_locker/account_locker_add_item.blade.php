@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('build/main.css') }}">
</head>

<section class="main add-product-title py-5">
    <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h1 class="logo pt-3"><a href="#">LOGOTYPE</a></h1>
                </div>
                <div class="col-md">
                    <h3 class="pt-3">Получить приложение для iPhone и Android</h3>
                    <h6>Самая большая коллекция новой и популярной моды в вашем кармане.</h6>
                </div>

                <div class="col-md">
                    <p class="title p-3">Поделитесь своей ссылкой</p>
                    <form class="form-inline d-flex">
                        <div class="form-group flex-grow-1">
                            <label for="staticEmail2" class="sr-only">Email</label>
                            <input type="text" class="form-control w-100" id="staticEmail2" value="(___)-___-__-__">
                        </div>
                        <button type="submit" class="btn btn-secondary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
</section>

<section class="main add-product-list py-5">
    <div class="container">
        <div class="row">
            <h2 class="col">Список предметов</h2>
        </div>
        <hr />
        <div class="row my-5">
            <div class="col-md-2">
                <h4>ТИП ЭЛЕМЕНТА</h4>
                <h6>Какой тип предмета вы перечисляете?</h6>
            </div>
            <div class="col-md">
                <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                    <a class="nav-link rounded-0 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Женская одежда</a>
                    <a class="nav-link rounded-0" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Мужская одежда</a>
                    <a class="nav-link rounded-0" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Детская одежда</a>
                </div>

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="d-flex">
                            <form class="py-3">
                                <div class="form-group radio-group d-flex flex-row">
                                    <div class="form-check wear-type">
                                        <input class="form-check-input d-none" type="radio" name="wears" id="wear-dress" value="dress" checked>
                                        <label class="form-check-label py-1 px-3 h-100" for="wear-dress">
                                            <img src="{{ asset('/images/dress.svg') }}" alt="">
                                            <span>Одежда</span>
                                        </label>
                                    </div>
                                    <div class="form-check wear-type">
                                        <input class="form-check-input d-none" type="radio" name="wears" id="high-heels" value="high-heels">
                                        <label class="form-check-label py-1 px-3 h-100" for="high-heels">
                                            <img src="{{ asset('/images/high-heels.svg') }}" alt="">
                                            <span>Обувь</span>
                                        </label>
                                    </div>
                                    <div class="form-check wear-type">
                                        <input class="form-check-input d-none" type="radio" name="wears" id="purse" value="purse">
                                        <label class="form-check-label py-1 px-3 h-100" for="purse">
                                            <img src="{{ asset('/images/purse.svg') }}" alt="">
                                            <span>Сумки</span>
                                        </label>
                                    </div>
                                    <div class="form-check wear-type">
                                        <input class="form-check-input d-none" type="radio" name="wears" id="sunglasses" value="sunglasses">
                                        <label class="form-check-label py-1 px-3 h-100" for="sunglasses">
                                            <img src="{{ asset('/images/sunglasses.svg') }}" alt="">
                                            <span>Аксесуары</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group rounded-0">
                                    <label for="exampleFormControlSelect1"></label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Какой тип одежды</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="d-flex">
                            <form class="py-3">
                                <div class="form-group radio-group d-flex flex-row">
                                    <div class="form-check wear-type">
                                        <input class="form-check-input d-none" type="radio" name="wears-men" id="wear-coat" value="coat" checked>
                                        <label class="form-check-label py-1 px-3 h-100" for="wear-coat">
                                            <img src="{{ asset('/images/coat.svg') }}" alt="">
                                            <span>Одежда</span>
                                        </label>
                                    </div>
                                    <div class="form-check wear-type">
                                        <input class="form-check-input d-none" type="radio" name="wears-men" id="sneakers" value="sneakers">
                                        <label class="form-check-label py-1 px-3 h-100" for="sneakers">
                                            <img src="{{ asset('/images/sneakers.svg') }}" alt="">
                                            <span>Обувь</span>
                                        </label>
                                    </div>
                                    <div class="form-check wear-type">
                                        <input class="form-check-input d-none" type="radio" name="wears-men" id="hand-bag" value="hand-bag">
                                        <label class="form-check-label py-1 px-3 h-100" for="hand-bag">
                                            <img src="{{ asset('/images/hand-bag.svg') }}" alt="">
                                            <span>Сумки</span>
                                        </label>
                                    </div>
                                    <div class="form-check wear-type">
                                        <input class="form-check-input d-none" type="radio" name="wears-men" id="sunglasses-1" value="sunglasses1">
                                        <label class="form-check-label py-1 px-3 h-100" for="sunglasses-1">
                                            <img src="{{ asset('/images/sunglasses-1.svg') }}" alt="">
                                            <span>Аксесуары</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group rounded-0">
                                    <label for="exampleFormControlSelect2"></label>
                                    <select class="form-control" id="exampleFormControlSelect2">
                                        <option>Какой тип одежды</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="d-flex">
                            <form class="py-3">
                                <div class="form-group radio-group d-flex flex-row">
                                    <div class="form-check wear-type">
                                        <input class="form-check-input d-none" type="radio" name="wears-child" id="wear-girl" value="wear-girl" checked>
                                        <label class="form-check-label py-1 px-3 h-100" for="wear-girl">
                                            <img src="{{ asset('/images/smiling-girl.svg') }}" alt="">
                                            <span>Одежда</span>
                                        </label>
                                    </div>
                                    <div class="form-check wear-type">
                                        <input class="form-check-input d-none" type="radio" name="wears-child" id="wear-boy" value="wear-boy">
                                        <label class="form-check-label py-1 px-3 h-100" for="wear-boy">
                                            <img src="{{ asset('/images/boy-broad-smile.svg') }}" alt="">
                                            <span>Обувь</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group rounded-0">
                                    <label for="exampleFormControlSelect3"></label>
                                    <select class="form-control" id="exampleFormControlSelect3">
                                        <option>Какой тип одежды</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <h5>Часто задаваемые вопросы о списках торговцев</h5>
                <ul>
                    <li>- Листинг на 100% бесплатный</li>
                    <li>- Продайте столько вещей, сколько захотите</li>
                    <li>- Установите свою цену</li>
                    <li>- Ваш список остается активным, пока не продаст</li>
                </ul>
                <a href="#">Учить больше</a>
            </div>
        </div>
        <hr/>
        <div class="row my-5">
            <div class="col-md">
                <h4>ФОТО</h4>
                <p>
                    Загрузите как минимум 3 фотографии Вы можете загрузить до 12 фотографий Минимум Размеры изображения: 800x800 пикселей
                </p>
                <h4>Фото советы</h4>
                <ul>
                    <li>- Используйте естественный свет и не отвлекающий фон</li>
                    <li>- Используйте вешалку или манекен</li>
                    <li>-Утюг или пар по метке</li>
                    <li>- Используйте ленту или валик для ворса, чтобы удалить пух</li>
                    <li>- Покажите свой товар точно</li>
                    <li>- не используйте стоковые фотографии</li>
                </ul>

            </div>
            <div class="col-md-9 py-4">
                <ul class="gallery list-unstyled">
                    <li class="media grid2">
                        <img src="{{ asset('holder.js/300x300') }}" class="img-thumbnail" alt="">
                    </li>
                    <li class="media grid">
                        <img src="{{ asset('holder.js/150x150') }}" class="img-thumbnail" alt="">
                    </li>
                    <li class="media grid">
                        <img src="{{ asset('holder.js/150x150') }}" class="img-thumbnail" alt="">
                    </li>
                    <li class="media grid">
                        <img src="{{ asset('holder.js/150x150') }}" class="img-thumbnail" alt="">
                    </li>
                    <li class="media grid">
                        <img src="{{ asset('holder.js/150x150') }}" class="img-thumbnail" alt="">
                    </li>
                    <li class="media grid">
                        <img src="{{ asset('holder.js/150x150') }}" class="img-thumbnail" alt="">
                    </li>
                    <li class="media grid">
                        <img src="{{ asset('holder.js/150x150') }}" class="img-thumbnail" alt="">
                    </li>
                    <li class="media grid">
                        <img src="{{ asset('holder.js/150x150') }}" class="img-thumbnail" alt="">
                    </li>
                    <li class="media grid">
                        <img src="{{ asset('holder.js/150x150') }}" class="img-thumbnail" alt="">
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>

@endsection