<?php

namespace App\Http\Controllers\Admin\BlogGroup;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('admin/blog/index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image_path')) {
            // Сохранение изображения в кастомный диск 'stages'
            $imagePath = $request->file('image_path')->store('images', 'blog');
            $data['image_path'] = $imagePath;
        }

        // Если slug не заполнен, генерируем его на основе названия
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name'], '-');
        }

        // Логируем данные для проверки
        // \Log::info($data); // Это поможет увидеть, какие данные сохраняются

        Blog::create($data);
        // Очистка кеша
        Cache::forget('recent_blogs');

        return redirect()->route('blogs.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        // Валидация данных
        $data = $request->validated();

        // Проверяем, загрузил ли пользователь новое изображение
        if ($request->hasFile('image_path')) {
            // Удаляем старое изображение, если оно существует
            if ($blog->image_path) {
                Storage::disk('blog')->delete($blog->image_path);
            }

            // Сохраняем новое изображение
            $imagePath = $request->file('image_path')->store('images', 'blog');
            $data['image_path'] = $imagePath;
        }

        // Обновляем запись
        $blog->update($data);

        // Очистка кеша
        Cache::forget('recent_blogs');

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Проверяем, есть ли изображение у записи
        if ($blog->image_path) {
            // Удаляем изображение с диска 'stages'
            Storage::disk('blog')->delete($blog->image_path);
        }

        // Удаляем запись из базы данных
        $blog->delete();

        // Очистка кеша
        Cache::forget('recent_blogs');

        // Возвращаем пользователя на список с сообщением об успехе
        return redirect()->route('blogs.index')->with('success', 'Blog and associated image deleted successfully!');
    }
}
