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
                        <a class="nav-link nav-btn-custom px-4" href="#services">Послуги</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-btn-custom px-4" href="#materials">Матеріали</a>
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
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="material-card shadow-sm bg-white p-0">
                        <div class="img-container">
                            <img src="{{ asset('images/materials/' . $material->image) }}" alt="{{ $material->name }}" onerror="this.src='https://via.placeholder.com/300'">
                        </div>
                        <div class="p-4">
                            <h5 class="fw-800 text-uppercase mb-2">{{ $material->name }}</h5>
                            <p class="text-muted small mb-4">{{ Str::limit($material->description, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <div>
                                    <span class="d-block small text-muted text-uppercase fw-bold">Ціна</span>
                                    <span class="fs-4 fw-800 text-dark">{{ number_format($material->price, 2, '.', ' ') }} ₴</span>
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
    <section id="reviews" class="py-5 bg-white">
    <div class="container py-5">
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-lg-7">
                <span class="text-warning fw-bold text-uppercase small" style="letter-spacing: 2px;">// Репутація</span>
                <h2 class="display-4 fw-800 mt-2">Відгуки клієнтів</h2>
            </div>
        </div>

        <div class="row g-4">
            @foreach($reviews as $review)
                @if($review->is_moderated) {{-- Показуємо тільки модеравані --}}
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="p-4 p-md-5 border border-light shadow-sm position-relative h-100 bg-white review-card">
                        <i class="fas fa-quote-right position-absolute end-0 top-0 opacity-1 display-1 m-4 text-warning" style="opacity: 0.1;"></i>
                        
                        <div class="mb-3 text-warning">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fa-star {{ $i < $review->rating ? 'fas' : 'far' }} small"></i>
                            @endfor
                        </div>

                        <p class="fs-5 fw-medium mb-4 lh-base text-dark italic">
                            "{{ $review->text }}"
                        </p>

                        <div class="d-flex align-items-center mt-auto">
                            @if($review->photo)
                                <img src="{{ asset('storage/' . $review->photo) }}" class="rounded-circle me-3 object-fit-cover" style="width: 50px; height: 50px;" alt="{{ $review->client_name }}">
                            @else
                                <div class="bg-warning text-dark fw-800 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    {{ mb_substr($review->client_name, 0, 1) }}
                                </div>
                            @endif
                            
                            <div>
                                <h6 class="fw-800 mb-0 text-uppercase small">{{ $review->client_name }}</h6>
                                <span class="text-muted small">{{ $review->client_status ?? 'Клієнт BuildMaster' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

    <section id="contact" class="py-5 bg-dark text-white border-top border-warning">
        <div class="container py-5">
            <div class="row justify-content-between">
                <div class="col-lg-5" data-aos="fade-right">
                    <h2 class="display-3 fw-900 mb-4 text-uppercase text-white">Отримайте<br><span class="text-warning">кошторис</span></h2>
                    <p class="opacity-50 mb-5">Підготуємо пропозицію протягом 24 годин.</p>
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