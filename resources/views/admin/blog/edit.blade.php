@extends('admin.layouts.app')
@section('title', 'Редагування Новини')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редагування Новини</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Головна</a>
                        </li>
                        {{--                        <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">Пользователи</a></li>--}}
                        <li class="breadcrumb-item active">Редагування</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Left Column (larger) -->
                            <div class="col-md-8">

                                <!-- Назва -->
                                <div class="form-group">
                                    <label for="name">Назва</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $blog->name ?? old('name') }}" required>
                                </div>

                                <!-- Аліас -->
                                <div class="form-group">
{{--                                    <label for="slug">Аліас</label>--}}
                                    <input type="hidden" id="slug" name="slug" class="form-control" value="{{ $blog->slug ?? old('slug') }}" >
                                </div>


{{--                                <!-- Короткий опис -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="short_content">Короткий опис</label>--}}
{{--                                    <textarea id="short_content" name="short_content" class="form-control" >{{ $blog->short_content ?? old('short_content') }}</textarea>--}}
{{--                                </div>--}}

{{--                                <!-- Опис -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="content">Опис</label>--}}
{{--                                    <textarea id="content" name="content" class="form-control" >{{ $blog->content ?? old('content') }}</textarea>--}}
{{--                                </div>--}}

{{--                                <!-- Meta-Title -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="meta_title">Meta-Title</label>--}}
{{--                                    <input type="text" id="meta_title" name="meta_title" class="form-control" value="{{ $blog->meta_title ?? old('meta_title') }}">--}}
{{--                                </div>--}}

{{--                                <!-- Meta-Опис -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="meta_description">Meta-Description</label>--}}
{{--                                    <textarea id="meta_description" name="meta_description" class="form-control" required>{{ $blog->meta_description ?? old('meta_description') }}</textarea>--}}
{{--                                </div>--}}

{{--                                <!-- Meta-Keywords -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="meta_keywords">Meta-Keywords</label>--}}
{{--                                    <textarea id="meta_keywords" name="meta_keywords" class="form-control" required>{{ $blog->meta_keywords ?? old('meta_keywords') }}</textarea>--}}
{{--                                </div>--}}


                            </div>

                            <!-- Right Column (smaller) -->
                            <div class="col-md-4">

                                <!-- Image -->
{{--                                <div class="form-group">--}}
{{--                                    <label for="image_path">Image</label>--}}
{{--                                    <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*">--}}
{{--                                    <div id="image-preview" class="mt-2"></div> <!-- Контейнер для миниатюр -->--}}
{{--                                </div>--}}

                                <!-- Поле для загрузки изображения -->
                                <div class="form-group">
                                    <label for="image_path">Image, Розмір: 338Х260 </label>
                                    <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*">

                                    <!-- Показать текущую миниатюру, если есть -->
                                    @if($blog->image_path)
                                        <img src="{{ Storage::disk('blog')->url($blog->image_path) }}" id="current-image" class="img-fluid mt-2" alt="Current Image">
                                    @endif

                                    <div id="image-preview" class="mt-2"></div> <!-- Контейнер для миниатюры -->
                                </div>

{{--                                <!-- Посилання на відео -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="video_link">Посилання на відео</label>--}}
{{--                                    <input type="text" id="video_link" name="video_link" class="form-control" value="{{ $blog->video_link ?? old('video_link') }}">--}}
{{--                                </div>--}}

{{--                                <!-- Позиція -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="position">Позиція</label>--}}
{{--                                    <input type="number" id="position" name="position" class="form-control" min="1" value="{{ $blog->position ?? old('position') }}" required>--}}
{{--                                </div>--}}

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="draft" {{ (old('status') ?? $blog->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ (old('status') ?? $blog->status) == 'published' ? 'selected' : '' }}>Published</option>
                                    </select>

{{--                                    <select class="form-control" id="status" name="status">--}}
{{--                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>--}}
{{--                                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>--}}
{{--                                    </select>--}}
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Створити</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

{{--    <section class="content">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}
{{--                        <!-- Назва -->--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="name">Назва</label>--}}
{{--                            <input type="text" class="form-control" id="name" name="name" value="{{ $blog->name ?? old('name') ?? '' }}" required>--}}
{{--                        </div>--}}
{{--                        <!-- Позиція -->--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="position">Позиція</label>--}}
{{--                            <input type="number" id="position" name="position" class="form-control" min="1" value="{{ $blog->position ?? old('position') }}" required>--}}
{{--                        </div>--}}

{{--                        <!-- Короткий опис -->--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="short_content">Короткий опис</label>--}}
{{--                            <textarea id="short_content" name="short_content" class="form-control" required>{{ $blog->short_content ?? old('short_content') }}</textarea>--}}
{{--                        </div>--}}

{{--                        <!-- Опис -->--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="description">Опис</label>--}}
{{--                            <textarea id="description" name="description" class="form-control" required>{{ $blog->description ?? old('description') }}</textarea>--}}
{{--                        </div>--}}

{{--                        <!-- Колір -->--}}
{{--                        --}}{{--                        <div class="form-group">--}}
{{--                        --}}{{--                            <label for="color">Колір</label>--}}
{{--                        --}}{{--                            <input type="text" id="color" name="color" class="form-control" value="{{ $blog->color ?? old('color') }}" style="background-color: {{ $blog->color  ?? '#fff' }}" oninput="updateColor(this)">--}}
{{--                        --}}{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="color">Колір</label>--}}
{{--                            <div style="display: flex; align-items: center;">--}}
{{--                                <!-- Квадрат для отображения цвета -->--}}
{{--                                <div id="colorPreview" style="width: calc(2.25rem + 2px); height: calc(2.25rem + 2px); border: 1px solid #ccc; margin-right: 10px; background-color: {{ $blog->color ?? '#fff' }};"></div>--}}

{{--                                <!-- Поле ввода -->--}}
{{--                                <input type="text" id="color" name="color" class="form-control" value="{{ $blog->color ?? old('color') }}" style="flex: 1;">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- SVG код -->--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="svg_code">SVG код</label>--}}
{{--                            <textarea id="svg_code" name="svg_code" class="form-control" rows="5">{{ $blog->svg_code ?? old('svg_code') }}</textarea>--}}
{{--                        </div>--}}
{{--                        <!-- Поле для загрузки изображения -->--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="image_path">Image</label>--}}
{{--                            <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*">--}}

{{--                            <!-- Показать текущую миниатюру, если есть -->--}}
{{--                            @if($blog->image_path)--}}
{{--                                <img src="{{ Storage::disk('blogs')->url($blog->image_path) }}" id="current-image" class="img-fluid mt-2" alt="Current Image">--}}
{{--                            @endif--}}

{{--                            <div id="image-preview" class="mt-2"></div> <!-- Контейнер для миниатюры -->--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary">Зберегти зміни</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const colorInput = document.getElementById("color");
        const colorPreview = document.getElementById("colorPreview");

        // Обновляем отображение при загрузке страницы и при изменении значения в инпуте
        updateColorPreview();
        colorInput.addEventListener("input", updateColorPreview);


        document.getElementById("image_path").addEventListener("change", function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById("image-preview");

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Создаем или заменяем миниатюру
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("img-fluid");
                    preview.innerHTML = "";
                    preview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        });

        // Функция для обновления отображения цвета
        function updateColorPreview() {
            const colorCode = colorInput.value.substring(0, 7);
            const isValidColor = /^#[0-9A-F]{6}$/i.test(colorCode);

            // Если цвет валиден, показать его в квадрате
            if (isValidColor) {
                colorPreview.style.backgroundColor = colorCode;
            } else {
                colorPreview.style.backgroundColor = "#ffffff"; // Возвращаем белый фон, если цвет некорректен
            }
        }
    });
</script>