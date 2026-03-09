<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Material;
use App\Models\News;
use App\Models\Review;

class SiteController extends Controller
{
    public function index()
    {
        // 1. Отримуємо послуги та групуємо їх за полем 'category'
        // Це дозволить у Blade зробити красиві заголовки для кожного розділу
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('category');

        // 2. Отримуємо матеріали, які є в наявності
        $materials = Material::where('in_stock', true)
            ->latest()
            ->get();

        // 3. Останні 3 новини для блоку новин
        $news = News::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // 4. Тільки схвалені (модеровані) відгуки
        $reviews = Review::where('is_moderated', true)
            ->latest()
            ->get();

        // Передаємо всі дані в шаблон welcome.blade.php
        return view('welcome', compact('services', 'materials', 'news', 'reviews'));
    }
}
