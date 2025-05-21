@extends('admin.layouts.app')
@section('title', 'Створення Етапу')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Створення Етапу</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Главная</a>
                        </li>
                        {{--                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Пользователи</a></li>--}}
                        <li class="breadcrumb-item active">Створення Етапу</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('stages.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Назва -->
                        <div class="form-group">
                            <label for="name">Назва</label>
                            <input type="text" id="name" name="name" class="form-control"  value="{{ old('name') }}" required>
                        </div>
                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>
                        <!-- Позиція -->
                        <div class="form-group">
                            <label for="position">Позиція</label>
                            <input type="number" id="position" name="position" class="form-control" min="1" value="{{ old('position') }}" required>
                        </div>
                        <!-- Назва підгрупи етапу -->
                        <div class="form-group">
                            <label for="group_name">Назва підгрупи етапу</label>
                            <input type="text" id="group_name" name="group_name" class="form-control" value="{{ old('group_name') }}">
                        </div>
                        <!-- Вартість етапу -->
                        <div class="form-group">
                            <label for="price">Вартість</label>
                            <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" >
                        </div>

                        <!-- Короткий опис -->
                        <div class="form-group">
                            <label for="short_content">Короткий опис</label>
                            <textarea id="short_content" name="short_content" class="form-control" required>{{ old('short_content') }}</textarea>
                        </div>

                        <!-- Опис -->
                        <div class="form-group">
                            <label for="description">Опис</label>
                            <textarea id="description" name="description" class="form-control" required>{{ old('description') }}</textarea>
                        </div>

                        <!-- Колір -->
                        <div class="form-group">
                            <label for="color">Колір</label>
                            <input type="text" id="color" name="color" class="form-control" value="{{ old('color') }}">
                        </div>

                        <!-- SVG код -->
                        <div class="form-group">
                            <label for="svg_code">SVG код</label>
                            <textarea id="svg_code" name="svg_code" class="form-control" rows="5">{{ old('svg_code') }}</textarea>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="image_path">Image</label>--}}
{{--                            <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*">--}}
{{--                            <div id="image-preview" class="mt-2"></div> <!-- Контейнер для миниатюр -->--}}
{{--                        </div>--}}

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
    });
</script>
