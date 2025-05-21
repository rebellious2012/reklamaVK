@extends('admin.layouts.app')
@section('title', 'Створення Новини')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Створення Новини</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Главная</a>
                        </li>
                        {{--                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Пользователи</a></li>--}}
                        <li class="breadcrumb-item active">Створення Новини</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Назва -->
                        <div class="form-group">
                            <label for="name">Назва</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <!-- Аліас -->
                        <div class="form-group">
{{--                            <label for="slug">Аліас</label>--}}
                            <input type="hidden" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" >
                        </div>

{{--                        <!-- Короткий опис -->--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="short_content">Короткий опис</label>--}}
{{--                            <textarea id="short_content" name="short_content" class="form-control" >{{ old('short_content') }}</textarea>--}}
{{--                        </div>--}}

{{--                        <!-- Опис -->--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="content">Опис</label>--}}
{{--                            <textarea id="content" name="content" class="form-control" >{{ old('content') }}</textarea>--}}
{{--                        </div>--}}


                        <div class="row">
                            <!-- Left Column (larger) -->
                            <div class="col-md-8">

{{--                                <!-- Meta-Title -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="meta_title">Meta-Title</label>--}}
{{--                                    <input type="text" id="meta_title" name="meta_title" class="form-control" value="{{ old('meta_title') }}">--}}
{{--                                </div>--}}

{{--                                <!-- Meta-Опис -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="meta_description">Meta-Description</label>--}}
{{--                                    <textarea id="meta_description" name="meta_description" class="form-control" required>{{ old('meta_description') }}</textarea>--}}
{{--                                </div>--}}

{{--                                <!-- Meta-Keywords -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="meta_keywords">Meta-Keywords</label>--}}
{{--                                    <textarea id="meta_keywords" name="meta_keywords" class="form-control" required>{{ old('meta_keywords') }}</textarea>--}}
{{--                                </div>--}}




                                <!-- Image -->
                                <div class="form-group">
                                    <label for="image_path">Image, Розмір: 338Х260 </label>
                                    <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*">
                                    <div id="image-preview" class="mt-2"></div> <!-- Контейнер для миниатюр -->
                                </div>
                            </div>

                            <!-- Right Column (smaller) -->
                            <div class="col-md-4">

{{--                                <!-- Посилання на відео -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="video_link">Посилання на відео</label>--}}
{{--                                    <input type="text" id="video_link" name="video_link" class="form-control" value="{{ old('video_link') }}">--}}
{{--                                </div>--}}


                                <!-- Позиція -->
{{--                                <div class="form-group">--}}
{{--                                    <label for="position">Позиція</label>--}}
{{--                                    <input type="number" id="position" name="position" class="form-control" min="1" value="{{ old('position') }}" required>--}}
{{--                                </div>--}}

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Створити</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const imageInput = document.getElementById("image_path");
        const previewContainer = document.getElementById("image-preview");

        imageInput.addEventListener("change", function(event) {
            previewContainer.innerHTML = ""; // Очистить предыдущие миниатюры

            const files = event.target.files;

            Array.from(files).forEach(file => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imgElement = document.createElement("img");
                    imgElement.src = e.target.result;
                    imgElement.style.width = "100px"; // Размер миниатюры
                    imgElement.style.height = "100px"; // Размер миниатюры
                    imgElement.style.objectFit = "cover"; // Соответствие изображения по размеру
                    imgElement.style.marginRight = "10px"; // Отступ между изображениями

                    previewContainer.appendChild(imgElement);
                };

                reader.readAsDataURL(file);
            });
        });
        // Function to transliterate from Cyrillic to Latin
        function transliterate(text) {
            const cyrillicToLatinMap = {
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh', 'з': 'z', 'и': 'i',
                'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't',
                'у': 'u', 'ф': 'f', 'х': 'kh', 'ц': 'ts', 'ч': 'ch', 'ш': 'sh', 'щ': 'shch', 'ъ': '', 'ы': 'y',
                'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya'
            };

            return text.split('').map(char => cyrillicToLatinMap[char] || char).join('');
        }

        function generateSlug(text) {
            return transliterate(text)
            .toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
        }

        document.getElementById('name').addEventListener('input', function() {
            const nameValue = this.value;
            const slugValue = generateSlug(nameValue);
            document.getElementById('slug').value = slugValue;
        });
    });
</script>
