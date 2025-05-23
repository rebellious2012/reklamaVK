@extends('admin.layouts.app')
@section('title', 'Створення Поля')

@section("style")
    <style>
        .radio-img-container {
            margin-bottom : 10px;
        }

        .radio-img-container label {
            cursor : pointer;
        }

        .radio-img-container img {
            transition : border 0.2s ease;
        }

        .radio-img-container input:checked + label img {
            border : 3px solid #007bff;
        }
    </style>
@stop

@section('content_header')
    <h1>Select Field Type</h1>
@stop

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Створення Поля</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Главная</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('fields.index') }}">Поля</a>
                        </li>
                        <li class="breadcrumb-item active">Створення Поля</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('fields.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Label for the field -->
                        <div class="form-group">
                            <label for="label">Field Label</label>
                            <input type="text" class="form-control @error('label') is-invalid @enderror" id="label" name="label" placeholder="Enter field label" value="{{ old('label') }}">
                            @error('label')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Placeholder input -->
                        <div class="form-group">
                            <label for="placeholder">Placeholder Text</label>
                            <input type="text" class="form-control @error('placeholder') is-invalid @enderror" id="placeholder" name="placeholder" placeholder="Enter placeholder text" value="{{ old('placeholder') }}">
                            @error('placeholder')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Position input -->
                        <div class="form-group">
                            <label for="position">Field Position</label>
                            <input type="number" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="Enter position" value="{{ old('position') }}">
                            @error('position')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Select for steps -->
                        <div class="form-group">
                            <label for="steps">Assign to Steps (optional)</label>
                            <select class="form-control select2 @error('steps') is-invalid @enderror" id="steps" name="steps[]">
                                <option value="">-- No step selected --</option> <!-- Добавьте пустой вариант -->
                                @foreach($steps as $step)
                                    <option value="{{ $step->id }}" {{ (collect(old('steps'))->contains($step->id)) ? 'selected' : '' }}>
                                        {{ $step->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('steps')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Textarea for note -->
                        <div class="form-group">
                            <label for="note">Примітка для адміна про це поле</label>
                            <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="3" placeholder="Enter note">{{ old('note') }}</textarea>
                            @error('note')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Radio buttons for field types with images in a vertical layout -->
                        <div class="form-group">
                            <label for="type">Select Field Type</label>
                            <div class="d-flex flex-column">

                                <!-- Profile field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_profile" name="type" value="profile" class="d-none" {{ old('type') == 'profile' ? 'checked' : '' }}>
                                    <label for="type_profile" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/profile.png') }}" class="img-thumbnail" alt="Profile" style="width: 400px; margin-right: 10px;">
                                        <span>Profile</span>
                                    </label>
                                </div>

                                <!-- Input field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_input" name="type" value="input" class="d-none" {{ old('type') == 'input' ? 'checked' : '' }}>
                                    <label for="type_input" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/input.png') }}" class="img-thumbnail" alt="Input" style="width: 400px; margin-right: 10px;">
                                        <span>Input</span>
                                    </label>
                                </div>

                                <!-- Info Simple field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_info_simple" name="type" value="info_simple" class="d-none" {{ old('type') == 'info_simple' ? 'checked' : '' }}>
                                    <label for="type_info_simple" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_simple.png') }}" class="img-thumbnail" alt="Info Simple" style="width: 400px; margin-right: 10px;">
                                        <span>Info Simple</span>
                                    </label>
                                </div>
                                <!-- Select Input type-->
                                <div class="form-group">
                                    <label for="field_input">Выбрать текстовое поле для отображения из списка:</label>
                                    <select name="field_input" id="field_input" class="form-control">
                                        <option value="">Выберите поле</option>
                                        @foreach($fields->where('type', 'input') as $field)
                                            <option value="{{ $field->id }}">{{ $field->label .' - '. $field->placeholder }}
                                                |&nbsp;(Шаги:
                                                @foreach($field->steps as $step)
                                                    {{ $step->name }}
                                                (Этапы:
                                                    @foreach($step->stages as $stage)
                                                        {{ $stage->name }}
                                                    @endforeach
                                                    );&nbsp;
                                                @endforeach
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Отображение шагов и этапов для выбранного поля -->
                                <div id="field_steps_stages">
                                    @foreach($fields->where('type', 'input') as $field)
                                        <div class="field-info" id="field-{{ $field->id }}" style="display:none;">
                                            <strong>Поле:&nbsp;<a href="{{ route('fields.edit', ['field' =>$field]) }}" target="_blank" rel="noopener">{{ $field->label }}</a>
                                            </strong>
                                            <br>
                                            Шаги:
                                            @foreach($field->steps as $step)
                                                <a href="{{ route('steps.edit', ['step' => $step]) }}" target="_blank" rel="noopener">{{ $step->name }}</a>
                                            (Этапы:
                                                @foreach($step->stages as $stage)
                                                    <a href="{{ route('stages.edit', ['stage' => $stage]) }}" target="_blank" rel="noopener">{{ $stage->name }}</a>;&nbsp;
                                                @endforeach
                                                )
                                                <br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <br>
                                </div>

                                <!-- Phone field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_phone" name="type" value="phone" class="d-none" {{ old('type') == 'phone' ? 'checked' : '' }}>
                                    <label for="type_phone" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/phone.png') }}" class="img-thumbnail" alt="Phone" style="width: 400px; margin-right: 10px;">
                                        <span>Phone</span>
                                    </label>
                                </div>

                                <!-- Info Phone field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_info_phone" name="type" value="info_phone" class="d-none" {{ old('type') == 'info_phone' ? 'checked' : '' }}>
                                    <label for="type_info_phone" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_phone.png') }}" class="img-thumbnail" alt="Info Phone" style="width: 400px; margin-right: 10px;">
                                        <span>Info Phone</span>
                                    </label>
                                </div>

                                <!-- Select Phone type-->
                                <div class="form-group">
                                    <label for="field_phone">Выбрать поле Телефон для отображения из списка:</label>
                                    <select name="field_phone" id="field_phone" class="form-control">
                                        <option value="">Выберите поле</option>
                                        @foreach($fields->where('type', 'phone') as $field)
                                            <option value="{{ $field->id }}">{{ $field->label .' - '. $field->placeholder }}
                                                |&nbsp;(Шаги:
                                                @foreach($field->steps as $step)
                                                    {{ $step->name }}
                                                (Этапы:
                                                    @foreach($step->stages as $stage)
                                                        {{ $stage->name }}
                                                    @endforeach
                                                    );&nbsp;
                                                @endforeach
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Отображение шагов и этапов для выбранного поля -->
                                <div id="field_steps_stages">
                                    @foreach($fields->where('type', 'phone') as $field)
                                        <div class="field-info" id="field-{{ $field->id }}" style="display:none;">
                                            <strong>Поле:&nbsp;<a href="{{ route('fields.edit', ['field' =>$field]) }}" target="_blank" rel="noopener">{{ $field->label }}</a>
                                            </strong>
                                            <br>
                                            Шаги:
                                            @foreach($field->steps as $step)
                                                <a href="{{ route('steps.edit', ['step' => $step]) }}" target="_blank" rel="noopener">{{ $step->name }}</a>
                                            (Этапы:
                                                @foreach($step->stages as $stage)
                                                    <a href="{{ route('stages.edit', ['stage' => $stage]) }}" target="_blank" rel="noopener">{{ $stage->name }}</a>;&nbsp;
                                                @endforeach
                                                )
                                                <br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <br>
                                </div>

                                <!-- Link Input field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_link" name="type" value="link" class="d-none" {{ old('type') == 'link' ? 'checked' : '' }}>
                                    <label for="type_link" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/link_input.png') }}" class="img-thumbnail" alt="Link Input" style="width: 400px; margin-right: 10px;">
                                        <span>Link</span>
                                    </label>
                                </div>


                                <!-- Info Link field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_info_link" name="type" value="info_link" class="d-none" {{ old('type') == 'info_link' ? 'checked' : '' }}>
                                    <label for="type_info_link" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_link.png') }}" class="img-thumbnail" alt="Info Link" style="width: 400px; margin-right: 10px;">
                                        <span>Info Link</span>
                                    </label>
                                </div>

                                <!-- Select Info Link type-->
                                <div class="form-group">
                                    <label for="field_link">Выбрать поле Ссылка для отображения из списка:</label>
                                    <select name="field_link" id="field_link" class="form-control">
                                        <option value="">Выберите поле</option>
                                        @foreach($fields->where('type', 'link') as $field)
                                            <option value="{{ $field->id }}">{{ $field->label .' - '. $field->placeholder }}
                                                |&nbsp;(Шаги:
                                                @foreach($field->steps as $step)
                                                    {{ $step->name }}
                                                (Этапы:
                                                    @foreach($step->stages as $stage)
                                                        {{ $stage->name }}
                                                    @endforeach
                                                    );&nbsp;
                                                @endforeach
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Отображение шагов и этапов для выбранного поля -->
                                <div id="field_steps_stages">
                                    @foreach($fields->where('type', 'link') as $field)
                                        <div class="field-info" id="field-{{ $field->id }}" style="display:none;">
                                            <strong>Поле:&nbsp;<a href="{{ route('fields.edit', ['field' =>$field]) }}" target="_blank" rel="noopener">{{ $field->label }}</a>
                                            </strong>
                                            <br>
                                            Шаги:
                                            @foreach($field->steps as $step)
                                                <a href="{{ route('steps.edit', ['step' => $step]) }}" target="_blank" rel="noopener">{{ $step->name }}</a>
                                            (Этапы:
                                                @foreach($step->stages as $stage)
                                                    <a href="{{ route('stages.edit', ['stage' => $stage]) }}" target="_blank" rel="noopener">{{ $stage->name }}</a>;&nbsp;
                                                @endforeach
                                                )
                                                <br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <br>
                                </div>

                                <!-- Select field type -->
                                <div class="radio-img-container mt-3">
                                    <input type="radio" id="type_select" name="type" value="select" class="d-none" {{ old('type') == 'select' ? 'checked' : '' }}>
                                    <label for="type_select" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/select.png') }}" class="img-thumbnail" alt="Select" style="width: 400px; margin-right: 10px;">
                                        <span>Select</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="options">Опції для Select ( Option 1; Option 2; Option 3; через крапку з комою =>; )</label>
                                    <textarea name="options" id="options" class="form-control">{{ old('options') }}</textarea>
                                    @error('options')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Info Select field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_info_select" name="type" value="info_select" class="d-none" {{ old('type') == 'info_select' ? 'checked' : '' }}>
                                    <label for="type_info_select" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_select.png') }}" class="img-thumbnail" alt="Info select" style="width: 400px; margin-right: 10px;">
                                        <span>Info Select</span>
                                    </label>
                                </div>

                                <!-- Select Info Select type-->
                                <div class="form-group">
                                    <label for="field_select">Выбрать поле Select для отображения из списка:</label>
                                    <select name="field_select" id="field_select" class="form-control">
                                        <option value="">Выберите поле</option>
                                        @foreach($fields->where('type', 'select') as $field)
                                            <option value="{{ $field->id }}">{{ $field->label .' - '. $field->placeholder }}
                                                |&nbsp;(Шаги:
                                                @foreach($field->steps as $step)
                                                    {{ $step->name }}
                                                (Этапы:
                                                    @foreach($step->stages as $stage)
                                                        {{ $stage->name }}
                                                    @endforeach
                                                    );&nbsp;
                                                @endforeach
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Отображение шагов и этапов для выбранного поля -->
                                <div id="field_steps_stages">
                                    @foreach($fields->where('type', 'select') as $field)
                                        <div class="field-info" id="field-{{ $field->id }}" style="display:none;">
                                            <strong>Поле:&nbsp;<a href="{{ route('fields.edit', ['field' =>$field]) }}" target="_blank" rel="noopener">{{ $field->label }}</a>
                                            </strong>
                                            <br>
                                            Шаги:
                                            @foreach($field->steps as $step)
                                                <a href="{{ route('steps.edit', ['step' => $step]) }}" target="_blank" rel="noopener">{{ $step->name }}</a>
                                            (Этапы:
                                                @foreach($step->stages as $stage)
                                                    <a href="{{ route('stages.edit', ['stage' => $stage]) }}" target="_blank" rel="noopener">{{ $stage->name }}</a>;&nbsp;
                                                @endforeach
                                                )
                                                <br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <br>
                                </div>

                                <!-- Card field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_card" name="type" value="card" class="d-none" {{ old('type') == 'card' ? 'checked' : '' }}>
                                    <label for="type_card" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/card.png') }}" class="img-thumbnail" alt="Card" style="width: 400px; margin-right: 10px;">
                                        <span>Card Input</span>
                                    </label>
                                </div>

                                <!-- Card Info field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_info_card" name="type" value="info_card" class="d-none" {{ old('type') == 'info_card' ? 'checked' : '' }}>
                                    <label for="type_info_card" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_card.png') }}" class="img-thumbnail" alt="Info Card" style="width: 400px; margin-right: 10px;">
                                        <span>Info Card</span>
                                    </label>
                                </div>

                                <!-- Card Info Link type-->
                                <div class="form-group">
                                    <label for="field_card">Выбрать поле Банковская Карта для отображения из списка:</label>
                                    <select name="field_card" id="field_card" class="form-control">
                                        <option value="">Выберите поле</option>
                                        @foreach($fields->where('type', 'card') as $field)
                                            <option value="{{ $field->id }}">{{ $field->label .' - '. $field->placeholder }}
                                                |&nbsp;(Шаги:
                                                @foreach($field->steps as $step)
                                                    {{ $step->name }}
                                                (Этапы:
                                                    @foreach($step->stages as $stage)
                                                        {{ $stage->name }}
                                                    @endforeach
                                                    );&nbsp;
                                                @endforeach
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Отображение шагов и этапов для выбранного поля -->
                                <div id="field_steps_stages">
                                    @foreach($fields->where('type', 'card') as $field)
                                        <div class="field-info" id="field-{{ $field->id }}" style="display:none;">
                                            <strong>Поле:&nbsp;<a href="{{ route('fields.edit', ['field' =>$field]) }}" target="_blank" rel="noopener">{{ $field->label }}</a>
                                            </strong>
                                            <br>
                                            Шаги:
                                            @foreach($field->steps as $step)
                                                <a href="{{ route('steps.edit', ['step' => $step]) }}" target="_blank" rel="noopener">{{ $step->name }}</a>
                                            (Этапы:
                                                @foreach($step->stages as $stage)
                                                    <a href="{{ route('stages.edit', ['stage' => $stage]) }}" target="_blank" rel="noopener">{{ $stage->name }}</a>;&nbsp;
                                                @endforeach
                                                )
                                                <br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <br>
                                </div>

                                <!-- Select field type -->
                                <div class="radio-img-container mt-3">
                                    <input type="radio" id="type_select_bank" name="type" value="select_bank" class="d-none" {{ old('type') == 'select_bank' ? 'checked' : '' }}>
                                    <label for="type_select_bank" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/select_bank.png') }}" class="img-thumbnail" alt="Select Bank" style="width: 400px; margin-right: 10px;">
                                        <span>Select Bank</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="options_select_bank">Опції для Select Bank ( Банк 1; Банк 2; Банк 3; через крапку з комою =>; )</label>
                                    <textarea name="options_select_bank" id="options_select_bank" class="form-control">{{ old('options_select_bank') }}</textarea>
                                    @error('options_select_bank')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Info Select field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_info_select_bank" name="type" value="info_select_bank" class="d-none" {{ old('type') == 'info_select_bank' ? 'checked' : '' }}>
                                    <label for="type_info_select_bank" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_select_bank.png') }}" class="img-thumbnail" alt="Info Select Bank" style="width: 400px; margin-right: 10px;">
                                        <span>Info Select Bank</span>
                                    </label>
                                </div>

                                <!-- Select Info Select Bank type-->
                                <div class="form-group">
                                    <label for="field_select_bank">Выбрать поле Select Bank для отображения из списка:</label>
                                    <select name="field_select_bank" id="field_select_bank" class="form-control">
                                        <option value="">Выберите поле</option>
                                        @foreach($fields->where('type', 'select_bank') as $field)
                                            <option value="{{ $field->id }}">{{ $field->label .' - '. $field->placeholder }}
                                                |&nbsp;(Шаги:
                                                @foreach($field->steps as $step)
                                                    {{ $step->name }}
                                                (Этапы:
                                                    @foreach($step->stages as $stage)
                                                        {{ $stage->name }}
                                                    @endforeach
                                                    );&nbsp;
                                                @endforeach
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Отображение шагов и этапов для выбранного поля -->
                                <div id="field_steps_stages">
                                    @foreach($fields->where('type', 'select_bank') as $field)
                                        <div class="field-info" id="field-{{ $field->id }}" style="display:none;">
                                            <strong>Поле:&nbsp;<a href="{{ route('fields.edit', ['field' =>$field]) }}" target="_blank" rel="noopener">{{ $field->label }}</a>
                                            </strong>
                                            <br>
                                            Шаги:
                                            @foreach($field->steps as $step)
                                                <a href="{{ route('steps.edit', ['step' => $step]) }}" target="_blank" rel="noopener">{{ $step->name }}</a>
                                            (Этапы:
                                                @foreach($step->stages as $stage)
                                                    <a href="{{ route('stages.edit', ['stage' => $stage]) }}" target="_blank" rel="noopener">{{ $stage->name }}</a>;&nbsp;
                                                @endforeach
                                                )
                                                <br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <br>
                                </div>

                                <!-- Input Sum field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_input_sum" name="type" value="input_sum" class="d-none" {{ old('type') == 'input_sum' ? 'checked' : '' }}>
                                    <label for="type_input_sum" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/input_sum.png') }}" class="img-thumbnail" alt="Input Sum" style="width: 400px; margin-right: 10px;">
                                        <span>Input Sum</span>
                                    </label>
                                </div>

                                <!-- Info Input Sum field type -->
                                {{-- <div class="radio-img-container">
                                    <input type="radio" id="type_info_input_sum" name="type" value="info_input_sum" class="d-none" {{ old('type') == 'info_input_sum' ? 'checked' : '' }}>
                                    <label for="type_info_input_sum" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_input_sum.png') }}" class="img-thumbnail" alt="Info Input Sum" style="width: 400px; margin-right: 10px;">
                                        <span>Info Input Sum</span>
                                    </label>
                                </div> --}}

                                <!--  Info Input Sum Link type єто тут не нужно-->
                                {{-- <div class="form-group">
                                    <label for="field_info_input_sum">Выбрать поле Сумма для отображения из списка:</label>
                                    <select name="field_info_input_sum" id="field_info_input_sum" class="form-control">
                                        <option value="">Выберите поле</option>
                                        @foreach($fields->where('type', 'input_sum') as $field)
                                            <option value="{{ $field->id }}">{{ $field->label .' - '. $field->placeholder }}
                                                |&nbsp;(Шаги:
                                                @foreach($field->steps as $step)
                                                    {{ $step->name }}
                                                (Этапы:
                                                    @foreach($step->stages as $stage)
                                                        {{ $stage->name }}
                                                    @endforeach
                                                    );&nbsp;
                                                @endforeach
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <!-- Отображение шагов и этапов для выбранного поля -->
                                {{-- <div id="field_steps_stages">
                                    @foreach($fields->where('type', 'input_sum') as $field)
                                        <div class="field-info" id="field-{{ $field->id }}" style="display:none;">
                                            <strong>Поле:&nbsp;<a href="{{ route('fields.edit', ['field' =>$field]) }}" target="_blank" rel="noopener">{{ $field->label }}</a>
                                            </strong>
                                            <br>
                                            Шаги:
                                            @foreach($field->steps as $step)
                                                <a href="{{ route('steps.edit', ['step' => $step]) }}" target="_blank" rel="noopener">{{ $step->name }}</a>
                                            (Этапы:
                                                @foreach($step->stages as $stage)
                                                    <a href="{{ route('stages.edit', ['stage' => $stage]) }}" target="_blank" rel="noopener">{{ $stage->name }}</a>;&nbsp;
                                                @endforeach
                                                )
                                                <br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <br>
                                </div> --}}


                                <!-- Input Order field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_input_order" name="type" value="input_order" class="d-none" {{ old('type') == 'input_order' ? 'checked' : '' }}>
                                    <label for="type_input_order" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/input_order.png') }}" class="img-thumbnail" alt="Input Order" style="width: 400px; margin-right: 10px;">
                                        <span>Input Order</span>
                                    </label>
                                </div>

                                <!-- Info Input Order field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_info_input_order" name="type" value="info_input_order" class="d-none" {{ old('type') == 'info_input_order' ? 'checked' : '' }}>
                                    <label for="type_info_input_order" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_input_order.png') }}" class="img-thumbnail" alt="Info Input Order" style="width: 400px; margin-right: 10px;">
                                        <span>Info Input Order (поле для назначения платежа, значение задаётся в меню пользователя)</span>
                                    </label>
                                </div>

                                <!--  Info Input Order Link type-->
                                {{-- <div class="form-group">
                                    <label for="field_info_input_order">Выбрать поле Назначение Платежа для отображения из списка:</label>
                                    <select name="field_info_input_order" id="field_info_input_order" class="form-control">
                                        <option value="">Выберите поле</option>
                                        @foreach($fields->where('type', 'input_order') as $field)
                                            <option value="{{ $field->id }}">{{ $field->label .' - '. $field->placeholder }}
                                                |&nbsp;(Шаги:
                                                @foreach($field->steps as $step)
                                                    {{ $step->name }}
                                                (Этапы:
                                                    @foreach($step->stages as $stage)
                                                        {{ $stage->name }}
                                                    @endforeach
                                                    );&nbsp;
                                                @endforeach
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <!-- Отображение шагов и этапов для выбранного поля -->
                                <div id="field_steps_stages">
                                    @foreach($fields->where('type', 'input_order') as $field)
                                        <div class="field-info" id="field-{{ $field->id }}" style="display:none;">
                                            <strong>Поле:&nbsp;<a href="{{ route('fields.edit', ['field' =>$field]) }}" target="_blank" rel="noopener">{{ $field->label }}</a>
                                            </strong>
                                            <br>
                                            Шаги:
                                            @foreach($field->steps as $step)
                                                <a href="{{ route('steps.edit', ['step' => $step]) }}" target="_blank" rel="noopener">{{ $step->name }}</a>
                                            (Этапы:
                                                @foreach($step->stages as $stage)
                                                    <a href="{{ route('stages.edit', ['stage' => $stage]) }}" target="_blank" rel="noopener">{{ $stage->name }}</a>;&nbsp;
                                                @endforeach
                                                )
                                                <br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <br>
                                </div>

                                <!-- Input Date field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_input_date" name="type" value="input_date" class="d-none" {{ old('type') == 'input_date' ? 'checked' : '' }}>
                                    <label for="type_input_date" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/input_date.png') }}" class="img-thumbnail" alt="Input Date" style="width: 400px; margin-right: 10px;">
                                        <span>Input Date</span>
                                    </label>
                                </div>

                                <!-- Info Input Date field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_info_input_date" name="type" value="info_input_date" class="d-none" {{ old('type') == 'info_input_date' ? 'checked' : '' }}>
                                    <label for="type_info_input_date" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_input_date.png') }}" class="img-thumbnail" alt="Info Input Date" style="width: 400px; margin-right: 10px;">
                                        <span>Info Input Date</span>
                                    </label>
                                </div>

                                <!--  Info Input Date Link type-->
                                <div class="form-group">
                                    <label for="field_info_input_date">Выбрать поле Дата для отображения из списка:</label>
                                    <select name="field_info_input_date" id="field_info_input_date" class="form-control">
                                        <option value="">Выберите поле</option>
                                        @foreach($fields->where('type', 'input_date') as $field)
                                            <option value="{{ $field->id }}">{{ $field->label .' - '. $field->placeholder }}
                                                |&nbsp;(Шаги:
                                                @foreach($field->steps as $step)
                                                    {{ $step->name }}
                                                (Этапы:
                                                    @foreach($step->stages as $stage)
                                                        {{ $stage->name }}
                                                    @endforeach
                                                    );&nbsp;
                                                @endforeach
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Отображение шагов и этапов для выбранного поля -->
                                <div id="field_steps_stages">
                                    @foreach($fields->where('type', 'input_date') as $field)
                                        <div class="field-info" id="field-{{ $field->id }}" style="display:none;">
                                            <strong>Поле:&nbsp;<a href="{{ route('fields.edit', ['field' =>$field]) }}" target="_blank" rel="noopener">{{ $field->label }}</a>
                                            </strong>
                                            <br>
                                            Шаги:
                                            @foreach($field->steps as $step)
                                                <a href="{{ route('steps.edit', ['step' => $step]) }}" target="_blank" rel="noopener">{{ $step->name }}</a>
                                            (Этапы:
                                                @foreach($step->stages as $stage)
                                                    <a href="{{ route('stages.edit', ['stage' => $stage]) }}" target="_blank" rel="noopener">{{ $stage->name }}</a>;&nbsp;
                                                @endforeach
                                                )
                                                <br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <br>
                                </div>

                                <!-- Confirmation List field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_confirmation_list" name="type" value="confirmation_list" class="d-none" {{ old('type') == 'confirmation_list' ? 'checked' : '' }}>
                                    <label for="type_confirmation_list" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/confirmation_list.png') }}" class="img-thumbnail" alt="Confirmation List" style="width: 400px; margin-right: 10px;">
                                        <span>Confirmation List</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="options_confirmation_list">Пункти для Confirmation List ( Задание содержит материалы 18+; Я подтверждаю, что задание не содержит запрещенных материалов; через крапку з комою =>; )</label>
                                    <textarea name="options_confirmation_list" id="options_confirmation_list" class="form-control">{{ old('options_confirmation_list') }}</textarea>
                                    @error('options_confirmation_list')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Info Checkbox field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_info_checkbox" name="type" value="info_checkbox" class="d-none" {{ old('type') == 'info_checkbox' ? 'checked' : '' }}>
                                    <label for="type_info_checkbox" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_checkbox.png') }}" class="img-thumbnail" alt="Info Checkbox" style="width: 400px; margin-right: 10px;">
                                        <span>Info Checkbox</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="options_checkbox_info">Пункти для Info Checkbox ( На оплату будет 10 минут; Есть две бесплатные заявки на оплату, третья заявка будет с комиссией; через крапку з комою =>; )</label>
                                    <textarea name="options_checkbox_info" id="options_checkbox_info" class="form-control">{{ old('options_checkbox_info') }}</textarea>
                                    @error('options_checkbox_info')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Radio Checkbox field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_radio_checkbox" name="type" value="radio_checkbox" class="d-none" {{ old('type') == 'radio_checkbox' ? 'checked' : '' }}>
                                    <label for="type_radio_checkbox" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/radio_checkbox.png') }}" class="img-thumbnail" alt="Radio Checkbox" style="width: 400px; margin-right: 10px;">
                                        <span>Radio Checkbox</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="options_checkbox_radio">Пункти для Radio Checkbox ( Оплата по номеру карты без комисии; Оплата по номеру счета компании с налогом 20% от суммы; через крапку з комою =>; )</label>
                                    <textarea name="options_checkbox_radio" id="options_checkbox_radio" class="form-control">{{ old('options_checkbox_radio') }}</textarea>
                                    @error('options_checkbox_radio')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Radio Simple field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_radio_simple" name="type" value="radio_simple" class="d-none" {{ old('type') == 'radio_simple' ? 'checked' : '' }}>
                                    <label for="type_radio_simple" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/radio_simple.png') }}" class="img-thumbnail" alt="Radio Simple" style="width: 400px; margin-right: 10px;">
                                        <span>Radio Simple</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="options_radio_simple">Пункти для Radio Simple ( Проблемы с оплатой (прикрепите скриншот); Проблемы с банком; через крапку з комою =>; )</label>
                                    <textarea name="options_radio_simple" id="options_radio_simple" class="form-control">{{ old('options_radio_simple') }}</textarea>
                                    @error('options_radio_simple')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Checkbox field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_checkbox_required" name="type" value="checkbox_required" class="d-none" {{ old('type') == 'checkbox_required' ? 'checked' : '' }}>
                                    <label for="type_checkbox_required" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/checkbox_required.png') }}" class="img-thumbnail" alt="Info Checkbox Required" style="width: 400px; margin-right: 10px;">
                                        <span>Checkbox Required</span>
                                    </label>
                                </div>

                                <!-- Info Point field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_info_point" name="type" value="info_point" class="d-none" {{ old('type') == 'info_point' ? 'checked' : '' }}>
                                    <label for="type_info_point" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_point.png') }}" class="img-thumbnail" alt="Info Point" style="width: 400px; margin-right: 10px;">
                                        <span>Info Point</span>
                                    </label>
                                </div>

                                {{--                                <!-- Textarea field type -->--}}
                                {{--                                <div class="radio-img-container mt-3">--}}
                                {{--                                    <input type="radio" id="type_textarea" name="type" value="textarea" class="d-none" {{ old('type') == 'textarea' ? 'checked' : '' }}>--}}
                                {{--                                    <label for="type_textarea" class="d-flex align-items-center">--}}
                                {{--                                        <img src="/images/textarea_type.png" class="img-thumbnail" alt="Textarea" style="width: 100px; margin-right: 10px;">--}}
                                {{--                                        <span>Textarea</span>--}}
                                {{--                                    </label>--}}
                                {{--                                </div>--}}

                                <!-- File field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="file" name="type" value="file" class="d-none" {{ old('type') == 'file' ? 'checked' : '' }}>
                                    <label for="file" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/file.png') }}" class="img-thumbnail" alt="File" style="width: 400px; margin-right: 10px;">
                                        <span>File</span>
                                    </label>
                                </div>

                                <!-- Select input_sum for File type-->
                                <div class="form-group">
                                    <label for="field_input_sum_file">Выбрать поле Sum для отображения из списка:</label>
                                    <select name="field_input_sum_file" id="field_input_sum_file" class="form-control">
                                        <option value="">Выберите поле</option>
                                        @foreach($fields->where('type', 'input_sum') as $field)
                                            <option value="{{ $field->id }}">{{ $field->label .' - '. $field->placeholder }}
                                                |&nbsp;(Шаги:
                                                @foreach($field->steps as $step)
                                                    {{ $step->name }}
                                                (Этапы:
                                                    @foreach($step->stages as $stage)
                                                        {{ $stage->name }}
                                                    @endforeach
                                                    );&nbsp;
                                                @endforeach
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Отображение шагов и этапов для выбранного поля -->
                                <div id="field_steps_stages">
                                    @foreach($fields->where('type', 'input_sum') as $field)
                                        <div class="field-info" id="field-{{ $field->id }}" style="display:none;">
                                            <strong>Поле:&nbsp;<a href="{{ route('fields.edit', ['field' =>$field]) }}" target="_blank" rel="noopener">{{ $field->label }}</a>
                                            </strong>
                                            <br>
                                            Шаги:
                                            @foreach($field->steps as $step)
                                                <a href="{{ route('steps.edit', ['step' => $step]) }}" target="_blank" rel="noopener">{{ $step->name }}</a>
                                            (Этапы:
                                                @foreach($step->stages as $stage)
                                                    <a href="{{ route('stages.edit', ['stage' => $stage]) }}" target="_blank" rel="noopener">{{ $stage->name }}</a>;&nbsp;
                                                @endforeach
                                                )
                                                <br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <br>
                                </div>

                                <!-- Info File field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="info_file" name="type" value="info_file" class="d-none" {{ old('type') == 'info_file' ? 'checked' : '' }}>
                                    <label for="info_file" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/info_file.png') }}" class="img-thumbnail" alt="Info File" style="width: 400px; margin-right: 10px;">
                                        <span>Info File</span>
                                    </label>
                                </div>

                                <!-- Select Info File type-->
                                <div class="form-group">
                                    <label for="field_file">Выбрать поле File для отображения из списка:</label>
                                    <select name="field_file" id="field_file" class="form-control">
                                        <option value="">Выберите поле</option>
                                        @foreach($fields->where('type', 'file') as $field)
                                            <option value="{{ $field->id }}">{{ $field->label .' - '. $field->placeholder }}
                                                |&nbsp;(Шаги:
                                                @foreach($field->steps as $step)
                                                    {{ $step->name }}
                                                (Этапы:
                                                    @foreach($step->stages as $stage)
                                                        {{ $stage->name }}
                                                    @endforeach
                                                    );&nbsp;
                                                @endforeach
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Отображение шагов и этапов для выбранного поля -->
                                <div id="field_steps_stages">
                                    @foreach($fields->where('type', 'file') as $field)
                                        <div class="field-info" id="field-{{ $field->id }}" style="display:none;">
                                            <strong>Поле:&nbsp;<a href="{{ route('fields.edit', ['field' =>$field]) }}" target="_blank" rel="noopener">{{ $field->label }}</a>
                                            </strong>
                                            <br>
                                            Шаги:
                                            @foreach($field->steps as $step)
                                                <a href="{{ route('steps.edit', ['step' => $step]) }}" target="_blank" rel="noopener">{{ $step->name }}</a>
                                            (Этапы:
                                                @foreach($step->stages as $stage)
                                                    <a href="{{ route('stages.edit', ['stage' => $stage]) }}" target="_blank" rel="noopener">{{ $stage->name }}</a>;&nbsp;
                                                @endforeach
                                                )
                                                <br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <br>
                                </div>

                                <!-- Keywords Min field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_keywords_min" name="type" value="keywords_min" class="d-none" {{ old('type') == 'keywords_min' ? 'checked' : '' }}>
                                    <label for="type_keywords_min" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/keywords_min.png') }}" class="img-thumbnail" alt="Keywords Min" style="width: 400px; margin-right: 10px;">
                                        <span>Keywords Min</span>
                                    </label>
                                </div>

                                <!-- Auditoria field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_auditoria" name="type" value="auditoria" class="d-none" {{ old('type') == 'auditoria' ? 'checked' : '' }}>
                                    <label for="type_auditoria" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/auditoria.png') }}" class="img-thumbnail" alt="Auditoria" style="width: 400px; margin-right: 10px;">
                                        <span>Аудитория, чел.</span>
                                    </label>
                                </div>

                                <!-- Button Big field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_button_big" name="type" value="button_big" class="d-none" {{ old('type') == 'button_big' ? 'checked' : '' }}>
                                    <label for="type_button_big" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/button_big.png') }}" class="img-thumbnail" alt="Button Big" style="width: 400px; margin-right: 10px;">
                                        <span>Button Big</span>
                                    </label>
                                </div>

                                <!-- Button Simple field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_button_simple" name="type" value="button_simple" class="d-none" {{ old('type') == 'button_simple' ? 'checked' : '' }}>
                                    <label for="type_button_simple" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/button_simple.png') }}" class="img-thumbnail" alt="Button Simple" style="width: 400px; margin-right: 10px;">
                                        <span>Button Simple</span>
                                    </label>
                                </div>

                                <!-- Button Plus field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_button_plus" name="type" value="button_plus" class="d-none" {{ old('type') == 'button_plus' ? 'checked' : '' }}>
                                    <label for="type_button_plus" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/button_plus.png') }}" class="img-thumbnail" alt="Button Plus" style="width: 400px; margin-right: 10px;">
                                        <span>Button Plus +</span>
                                    </label>
                                </div>

                                <!-- Buttons Red Blue field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_buttons_red_blue" name="type" value="buttons_red_blue" class="d-none" {{ old('type') == 'buttons_red_blue' ? 'checked' : '' }}>
                                    <label for="type_buttons_red_blue" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/buttons_red_blue.png') }}" class="img-thumbnail" alt="Buttons Red Blue" style="width: 400px; margin-right: 10px;">
                                        <span>Button Red Blue</span>
                                    </label>
                                </div>

                                <!-- Wait Simple field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_wait_simple" name="type" value="wait_simple" class="d-none" {{ old('type') == 'wait_simple' ? 'checked' : '' }}>
                                    <label for="type_wait_simple" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/wait_simple.png') }}" class="img-thumbnail" alt="Wait Simple" style="width: 400px; margin-right: 10px;">
                                        <span>Wait Simple</span>
                                    </label>
                                </div>
                                <!-- Wait Timer field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_wait_timer" name="type" value="wait_timer" class="d-none" {{ old('type') == 'wait_timer' ? 'checked' : '' }}>
                                    <label for="type_wait_timer" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/wait_timer.png') }}" class="img-thumbnail" alt="Wait Timer" style="width: 400px; margin-right: 10px;">
                                        <span>Wait Timer</span>
                                    </label>
                                </div>

                                <!-- Wait for Payment field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_wait_for_payment" name="type" value="wait_for_payment" class="d-none" {{ old('type') == 'wait_for_payment' ? 'checked' : '' }}>
                                    <label for="type_wait_for_payment" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/wait_for_payment.png') }}" class="img-thumbnail" alt="Wait For Payment" style="width: 400px; margin-right: 10px;">
                                        <span>Wait For Payment</span>
                                    </label>
                                </div>

                                <!-- Wait for Payment Success field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_wait_for_payment_success" name="type" value="wait_for_payment_success" class="d-none" {{ old('type') == 'wait_for_payment_success' ? 'checked' : '' }}>
                                    <label for="type_wait_for_payment_success" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/wait_for_payment_success.png') }}" class="img-thumbnail" alt="Wait For Payment Success" style="width: 400px; margin-right: 10px;">
                                        <span>Wait For Payment Success</span>
                                    </label>
                                </div>

                                <!-- Wait Stage Completed field type -->
                                <div class="radio-img-container">
                                    <input type="radio" id="type_wait_stage_completed" name="type" value="wait_stage_completed" class="d-none" {{ old('type') == 'wait_stage_completed' ? 'checked' : '' }}>
                                    <label for="type_wait_stage_completed" class="d-flex align-items-center">
                                        <img src="{{ asset('/adminka/dist/img/constructor/wait_stage_completed.png') }}" class="img-thumbnail" alt="Wait Stage Completed" style="width: 400px; margin-right: 10px;">
                                        <span>Wait Stage Completed</span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-success">Create Field</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    // select 2 activate


    // Получаем доступ к кнопке создания поля
  // Получаем доступ к кнопке создания поля
    document.addEventListener("DOMContentLoaded", function() {
        $(".select2").select2();
        // Добавляем отображение информации о шагах и этапах при выборе поля
        document.getElementById("field_input").addEventListener("change", function() {

            let selectedFieldId = this.value;

            // Скрываем все блоки с шагами и этапами
            document.querySelectorAll(".field-info").forEach(function(info) {
                info.style.display = "none";
            });

            // Показываем только тот блок, который соответствует выбранному полю
            if (selectedFieldId) {
                document.getElementById("field-" + selectedFieldId).style.display = "block";
            }
        });

        document.getElementById("field_phone").addEventListener("change", function() {

            let selectedFieldIdPhone = this.value;

            // Скрываем все блоки с шагами и этапами
            document.querySelectorAll(".field-info").forEach(function(info) {
                info.style.display = "none";
            });

            // Показываем только тот блок, который соответствует выбранному полю
            if (selectedFieldIdPhone) {
                document.getElementById("field-" + selectedFieldIdPhone).style.display = "block";
            }
        });

        document.getElementById("field_link").addEventListener("change", function() {

            let selectedFieldIdLink = this.value;

            // Скрываем все блоки с шагами и этапами
            document.querySelectorAll(".field-info").forEach(function(info) {
                info.style.display = "none";
            });

            // Показываем только тот блок, который соответствует выбранному полю
            if (selectedFieldIdLink) {
                document.getElementById("field-" + selectedFieldIdLink).style.display = "block";
            }
        });

        document.getElementById("field_card").addEventListener("change", function() {

            let selectedFieldIdCard = this.value;

            // Скрываем все блоки с шагами и этапами
            document.querySelectorAll(".field-info").forEach(function(info) {
                info.style.display = "none";
            });

            // Показываем только тот блок, который соответствует выбранному полю
            if (selectedFieldIdCard) {
                document.getElementById("field-" + selectedFieldIdCard).style.display = "block";
            }
        });

        document.getElementById("field_select").addEventListener("change", function() {

            let selectedFieldIdSelect = this.value;

            // Скрываем все блоки с шагами и этапами
            document.querySelectorAll(".field-info").forEach(function(info) {
                info.style.display = "none";
            });

            // Показываем только тот блок, который соответствует выбранному полю
            if (selectedFieldIdSelect) {
                document.getElementById("field-" + selectedFieldIdSelect).style.display = "block";
            }
        });
        document.getElementById("field_select_bank").addEventListener("change", function() {

            let selectedFieldIdSelectBank = this.value;

            // Скрываем все блоки с шагами и этапами
            document.querySelectorAll(".field-info").forEach(function(info) {
                info.style.display = "none";
            });

            // Показываем только тот блок, который соответствует выбранному полю
            if (selectedFieldIdSelectBank) {
                document.getElementById("field-" + selectedFieldIdSelectBank).style.display = "block";
            }
        });
        document.getElementById("field_file").addEventListener("change", function() {

            let selectedFieldIdFile = this.value;

            // Скрываем все блоки с шагами и этапами
            document.querySelectorAll(".field-info").forEach(function(info) {
                info.style.display = "none";
            });

            // Показываем только тот блок, который соответствует выбранному полю
            if (selectedFieldIdFile) {
                document.getElementById("field-" + selectedFieldIdFile).style.display = "block";
            }
        });
        document.getElementById("field_input_sum_file").addEventListener("change", function() {

            let selectedFieldIdInputSumFile = this.value;

            // Скрываем все блоки с шагами и этапами
            document.querySelectorAll(".field-info").forEach(function(info) {
                info.style.display = "none";
            });

            // Показываем только тот блок, который соответствует выбранному полю
            if (selectedFieldIdInputSumFile) {
                document.getElementById("field-" + selectedFieldIdInputSumFile).style.display = "block";
            }
        });
        document.getElementById("field_info_input_sum").addEventListener("change", function() {

            let selectedFieldIdInfoInputSum = this.value;

            // Скрываем все блоки с шагами и этапами
            document.querySelectorAll(".field-info").forEach(function(info) {
                info.style.display = "none";
            });

            // Показываем только тот блок, который соответствует выбранному полю
            if (selectedFieldIdInfoInputSum) {
                document.getElementById("field-" + selectedFieldIdInfoInputSum).style.display = "block";
            }
        });

        document.getElementById("field_info_input_order").addEventListener("change", function() {

            let selectedFieldIdInfoInputOrder = this.value;

            // Скрываем все блоки с шагами и этапами
            document.querySelectorAll(".field-info").forEach(function(info) {
                info.style.display = "none";
            });

            // Показываем только тот блок, который соответствует выбранному полю
            if (selectedFieldIdInfoInputOrder) {
                document.getElementById("field-" + selectedFieldIdInfoInputOrder).style.display = "block";
            }
        });
        document.getElementById("field_info_input_date").addEventListener("change", function() {

            let selectedFieldIdInfoInputDate = this.value;

            // Скрываем все блоки с шагами и этапами
            document.querySelectorAll(".field-info").forEach(function(info) {
                info.style.display = "none";
            });

            // Показываем только тот блок, который соответствует выбранному полю
            if (selectedFieldIdInfoInputDate) {
                document.getElementById("field-" + selectedFieldIdInfoInputDate).style.display = "block";
            }
        });
    });
</script>


