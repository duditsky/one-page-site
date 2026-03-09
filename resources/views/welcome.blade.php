<!DOCTYPE html>
<html lang="uk" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BuildMaster Premium — Інженерна Досконалість</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top shadow-sm py-2 bg-white">
        <div class="container">
            <a class="navbar-brand fs-3 fw-800" href="#">BUILD<span style="color:var(--accent, #ff9f1c)">MASTER</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 d-flex gap-3">
                    <li class="nav-item">
                        <a class="nav-link nav-btn-custom px-6" href="#services">Послуги</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-btn-custom px-6" href="#materials">Матеріали</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-btn-custom px-6" href="#insights">Новини</a>
                    </li>
                </ul>

                <div class="d-none d-lg-flex align-items-center">
                    <a href="tel:+380991994774" class="text-decoration-none text-dark fw-bold me-4 small contact-link">
                        <i class="fas fa-phone text-warning me-2"></i> +38 (099) 199 47 74
                    </a>
                    <a href="#contact" class="btn btn-dark rounded-0 px-4 py-2 fw-bold small text-uppercase shadow-sm">
                        Замовити розрахунок
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <header class="hero text-white">
        <div class="container" data-aos="fade-up">
            <h1 class="display-1 fw-800 mb-4 text-uppercase">Технології<br><span class="text-gradient">надійності</span></h1>
            <p class="lead mb-5 opacity-75 col-lg-5">Професійне будівництво та постачання сертифікованих матеріалів для ваших проектів.</p>
            <div class="d-flex gap-3 hero-btns">
                <a href="#services" class="btn btn-outline-light px-5 py-3 rounded-0 fw-bold text-uppercase">Наші послуги</a>
                <a href="#materials" class="btn btn-outline-light px-5 py-3 rounded-0 fw-bold text-uppercase">Матеріали</a>
            </div>
        </div>
    </header>

    <section id="services" class="py-5">
        <div class="container py-5">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-lg-7">
                    <span class="text-warning fw-bold text-uppercase small" style="letter-spacing: 2px;">// Напрямки роботи</span>
                    <h2 class="display-4 fw-800 mt-2">Будівельні послуги</h2>
                </div>
            </div>

            <div class="row g-4">
                @foreach($services as $category => $items)
                @php
                $bg = 'Загальнобудівельні роботи.png';
                if(Str::contains($category, 'Покрівельні')) $bg = 'Покрівельні послуги.png';
                elseif(Str::contains($category, ['Оздоблення', 'Фасад'])) $bg = 'Оздоблення та Фасади.png';
                elseif(Str::contains($category, 'Інженерні')) $bg = 'Інженерні комунікації.png';
                @endphp
                <div class="col-lg-6" data-aos="zoom-in-up">
                    <div class="category-card position-relative overflow-hidden rounded-0"
                        style="background: url('{{ asset("images/categories/" . $bg) }}') center/cover no-repeat;">
                        <div class="category-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                        <div class="position-relative h-100 p-4 p-md-5 d-flex flex-column justify-content-end text-white">
                            <h3 class="display-6 fw-900 mb-4 text-uppercase">{{ $category }}</h3>
                            <div class="services-list mb-4 border-start border-warning border-3 ps-4">
                                @foreach($items as $service)
                                <div class="mb-2 opacity-90 small fw-medium"><i class="fas fa-check text-warning me-2"></i> {{ $service->title }}</div>
                                @endforeach
                            </div>
                            <button onclick="fillOrder('{{ $category }}')" class="btn btn-premium w-fit rounded-0 px-4 py-3 text-uppercase fw-bold shadow-lg">
                                Розрахувати вартість <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="materials" class="py-5 bg-light border-top">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-md-6 text-md-start text-center">
                    <h2 class="display-4 fw-800 m-0">Матеріали</h2>
                </div>

            </div>
            <div class="row g-4">
                @foreach($materials as $material)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"> {{-- d-flex тут вирівнює висоту колонок --}}
                    <div class="material-card shadow-sm bg-white p-0 d-flex flex-column w-100"> {{-- flex-column дозволяє керувати внутрішнім простором --}}
                        <div class="img-container">
                            <img src="{{ asset('images/materials/' . $material->image) }}"
                                alt="{{ $material->name }}"
                                class="w-100 object-fit-cover"
                                style="height: 200px;"
                                onerror="this.src='https://via.placeholder.com/300'">
                        </div>

                        <div class="p-4 d-flex flex-column flex-grow-1"> {{-- flex-grow-1 заповнює вільний простір --}}
                            <h5 class="fw-800 text-uppercase mb-2" style="min-height: 3rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $material->name }}
                            </h5>

                            <p class="text-muted small mb-4">
                                {{ Str::limit($material->description, 80) }}
                            </p>

                            {{-- mt-auto — це магія, яка штовхає цей блок до самого низу картки --}}
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top mt-auto">
                                <div>
                                    <span class="d-block small text-muted text-uppercase fw-bold" style="font-size: 0.65rem;">Ціна</span>
                                    <span class="fs-4 fw-800 text-dark">{{ number_format($material->price, 0, '.', ' ') }} ₴</span>
                                </div>
                                <button onclick="fillOrder('{{ $material->name }}')" class="btn btn-dark rounded-0 px-4 fw-bold small text-uppercase">Купити</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="insights" class="py-5 bg-white border-top">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="d-flex align-items-center mb-4">
                        <span class="text-warning fw-bold text-uppercase small me-3" style="letter-spacing: 2px;">// Журнал</span>
                        <h2 class="h1 fw-800 m-0">Новини</h2>
                    </div>

                    <div class="news-scroll-container">
                        @foreach($news as $article)
                        @if($article->is_published)
                        <div class="news-item-minimal mb-4">
                            <div class="d-flex align-items-baseline border-start border-warning border-3 ps-4 transition-all py-2">
                                <div class="date-badge me-4 text-center">
                                    <span class="d-block fw-800 fs-4 lh-1">{{ \Carbon\Carbon::parse($article->published_at)->format('d') }}</span>
                                    <span class="text-uppercase small fw-bold opacity-50" style="font-size: 0.65rem;">{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('M') }}</span>
                                </div>

                                <div class="news-content">
                                    <h4 class="fw-800 text-uppercase h6 mb-1 letter-spacing-1">
                                        <a href="/news/{{ $article->slug }}" class="text-dark text-decoration-none hover-orange">
                                            {{ $article->title }}
                                        </a>
                                    </h4>
                                    <p class="text-muted small mb-2 lh-sm opacity-75">
                                        {{ Str::limit(strip_tags($article->content), 110) }}
                                    </p>
                                    <a href="/news/{{ $article->slug }}" class="btn-read-more">
                                        Детальніше <i class="fas fa-chevron-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-5 border-start-lg" data-aos="fade-left">
                    <div class="ps-lg-4">
                        <div class="d-flex align-items-center mb-4">
                            <span class="text-warning fw-bold text-uppercase small me-3" style="letter-spacing: 2px;">// Репутація</span>
                            <h2 class="h1 fw-800 m-0">Відгуки</h2>
                        </div>

                        <div class="reviews-stack">
                            @foreach($reviews as $review)
                            @if($review->is_moderated)
                            <div class="review-mini p-4 bg-light mb-4 position-relative">
                                <i class="fas fa-quote-left text-warning opacity-25 position-absolute top-0 start-0 m-3 fs-2"></i>

                                <div class="mb-2 text-warning small">
                                    @for($i = 0; $i < 5; $i++)
                                        <i class="fa-star {{ $i < $review->rating ? 'fas' : 'far' }}"></i>
                                        @endfor
                                </div>

                                <p class="small fw-medium italic mb-3">"{{ Str::limit($review->text, 150) }}"</p>

                                <div class="d-flex align-items-center">
                                    @if($review->photo)
                                    <img src="{{ asset('storage/' . $review->photo) }}" class="rounded-circle me-3" style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3 small fw-bold" style="width: 40px; height: 40px;">
                                        {{ mb_substr($review->client_name, 0, 1) }}
                                    </div>
                                    @endif
                                    <div>
                                        <h6 class="fw-800 mb-0 small text-uppercase">{{ $review->client_name }}</h6>
                                        <span class="text-muted" style="font-size: 0.7rem;">{{ $review->client_status }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-5 bg-dark text-white border-top border-warning">
        <div class="container py-5">
            <div class="row justify-content-between">
                <div class="col-lg-5" data-aos="fade-right">
                    <h2 class="display-3 fw-900 mb-4 text-uppercase text-white">Отримайте<br><span class="text-warning">кошторис</span></h2>
                    <p class="opacity-50 mb-5">Підготуємо пропозицію протягом 12 годин.</p>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <form id="contactForm" class="p-5 bg-white bg-opacity-5 border border-warning">
                        @csrf
                        <div class="mb-4"><input type="text" name="name" class="form-control" placeholder="ВАШЕ ІМ'Я" required></div>
                        <div class="mb-4"><input type="text" name="phone" class="form-control" placeholder="НОМЕР ТЕЛЕФОНУ" required></div>
                        <div class="mb-5"><textarea name="message" id="messageField" class="form-control" rows="2" placeholder="ОПИШІТЬ ВАШ ЗАПИТ"></textarea></div>
                        <button type="submit" class="btn btn-warning btn-lg w-100 fw-bold text-dark">ВІДПРАВИТИ ЗАПИТ</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 bg-white text-center border-top border-dark">
        <p class="small fw-bold text-uppercase m-0">© 2026 BUILDMASTER ENGINEERING.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>