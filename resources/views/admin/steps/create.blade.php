@extends('admin.layouts.app')
@section('title', 'Створення Кроку')

@section("style")
    <style>
        .radio-img-container {
            margin-bottom: 10px;
        }

        .radio-img-container label {
            cursor: pointer;
        }

        .radio-img-container img {
            transition: border 0.2s ease;
        }

        .radio-img-container input:checked + label img {
            border: 3px solid #007bff;
        }
    </style>
@stop

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Створення Кроку</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Главная</a>
                        </li>
                                                <li class="breadcrumb-item"><a href="{{ route('steps.index') }}">Крок</a></li>
                        <li class="breadcrumb-item active">Створення Кроку</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                        <form action="{{ route('steps.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Назва кроку</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="position">Позиція кроку</label>
                                <input type="number" name="position" id="position" class="form-control" value="{{ old('position') }}">
                                @error('position')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="fields">Виберіть поля для кроку</label>
                                <select name="fields[]" id="fields" class="form-control" multiple>
                                    @foreach ($fields as $field)
                                        <option value="{{ $field->id }}">{{ $field->label }} ({{ $field->type }})</option>
                                    @endforeach
                                </select>
                                @error('fields')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Textarea for note -->
                            <div class="form-group">
                                <label for="note">Примітка для адміна про цей Крок</label>
                                <textarea name="note" id="note" class="form-control" rows="3" placeholder="Додайте примітку">{{ old('note') }}</textarea>
                                @error('note')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Створити крок</button>
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
