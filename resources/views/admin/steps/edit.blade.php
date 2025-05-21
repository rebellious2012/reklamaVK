@extends('admin.layouts.app')
@section('title', 'Редагування Поля')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редагування Кроку</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Головна</a>
                        </li>
                        {{--                        <li class="breadcrumb-item"><a href="{{ route('admin.steps.index') }}">Пользователи</a></li>--}}
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
                    <form action="{{ route('steps.update', $step->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Назва кроку</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $step->name) }}" required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="position">Позиція кроку</label>
                            <input type="number" name="position" id="position" class="form-control" value="{{ old('position', $step->position) }}" required>
                            @error('position')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fields">Виберіть поля для кроку</label>
                            <select name="fields[]" id="fields" class="form-control" multiple>
                                @foreach ($fields as $field)
                                    <option value="{{ $field->id }}" {{ $step->fields->contains($field->id) ? 'selected' : '' }}>
                                        {{ $field->label }} ({{ $field->type }})
                                    </option>
                                @endforeach
                            </select>
                            @error('fields')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
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