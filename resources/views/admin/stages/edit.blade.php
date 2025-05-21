@extends('admin.layouts.app')
@section('title', 'Редагування Етапа')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редагування Етапа</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Головна</a>
                        </li>
                        {{--                        <li class="breadcrumb-item"><a href="{{ route('admin.stages.index') }}">Пользователи</a></li>--}}
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
                    <form action="{{ route('stages.update', $stage->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Назва -->
                        <div class="form-group">
                            <label for="name">Назва</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $stage->name ?? old('name') ?? '' }}" required>
                        </div>
                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="draft" {{ (old('status') ?? $stage->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ (old('status') ?? $stage->status) == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>
                        <!-- Позиція -->
                        <div class="form-group">
                            <label for="position">Позиція</label>
                            <input type="number" id="position" name="position" class="form-control" min="1" value="{{ $stage->position ?? old('position') }}" required>
                        </div>
                        <!-- Назва підгрупи етапу -->
                        <div class="form-group">
                            <label for="group_name">Назва підгрупи етапу</label>
                            <input type="text" id="group_name" name="group_name" class="form-control" value="{{ $stage->group_name ?? old('group_name') }}">
                        </div>
                        <!-- Вартість етапу -->
                        <div class="form-group">
                            <label for="price">Вартість</label>
                            <input type="number" id="price" name="price" class="form-control" value="{{ $stage->price ?? old('price') }}" >
                        </div>

                        <!-- Короткий опис -->
                        <div class="form-group">
                            <label for="short_content">Короткий опис</label>
                            <textarea id="short_content" name="short_content" class="form-control" required>{{ $stage->short_content ?? old('short_content') }}</textarea>
                        </div>

                        <!-- Опис -->
                        <div class="form-group">
                            <label for="description">Опис</label>
                            <textarea id="description" name="description" class="form-control" required>{{ $stage->description ?? old('description') }}</textarea>
                        </div>

                        <!-- Колір -->
                        <div class="form-group">
                            <label for="color">Колір</label>
                            <div style="display: flex; align-items: center;">
                                <!-- Квадрат для отображения цвета -->
                                <div id="colorPreview" style="width: calc(2.25rem + 2px); height: calc(2.25rem + 2px); border: 1px solid #ccc; margin-right: 10px; background-color: {{ $stage->color ?? '#fff' }};"></div>

                                <!-- Поле ввода -->
                                <input type="text" id="color" name="color" class="form-control" value="{{ $stage->color ?? old('color') }}" style="flex: 1;">
                            </div>
                        </div>

                        <!-- SVG код -->
                        <div class="form-group">
                            <label for="svg_code">SVG код</label>
                            <textarea id="svg_code" name="svg_code" class="form-control" rows="5">{{ $stage->svg_code ?? old('svg_code') }}</textarea>
                        </div>
                        <!-- Поле для загрузки изображения -->
{{--                        <div class="form-group">--}}
{{--                            <label for="image_path">Image</label>--}}
{{--                            <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*">--}}

{{--                            <!-- Показать текущую миниатюру, если есть -->--}}
{{--                            @if($stage->image_path)--}}
{{--                                <img src="{{ Storage::disk('stages')->url($stage->image_path) }}" id="current-image" class="img-fluid mt-2" alt="Current Image">--}}
{{--                            @endif--}}

{{--                            <div id="image-preview" class="mt-2"></div> <!-- Контейнер для миниатюры -->--}}
{{--                        </div>--}}

                        <!-- Add existing steps -->
                        <div class="form-group">
                            <label for="steps">Шаги:</label>
                            <select name="steps[]" id="steps" class="form-control" multiple>
                                @foreach($stage->steps as $step)
                                    <option value="{{ $step->id }}"
                                             selected >
                                        {{ $step->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Add new step -->
                        <div class="form-group">
                            <label for="new_step">Добавить шаг:</label>
                            <select name="new_step_id" id="new_step" class="form-control">
                                <option value="">Выберите шаг</option>
                                @foreach($availableSteps as $availableStep)
                                    <option value="{{ $availableStep->id }}">{{ $availableStep->name }}</option>
                                @endforeach
                            </select>
                            <input type="number" name="new_step_position" class="form-control mt-2" placeholder="Позиция шага" style="width: 100px;">
                        </div>

                        <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
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