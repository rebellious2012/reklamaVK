@extends('admin.layouts.app')

@section('title', 'Редагування Поля')

@section('content')

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Редагування Поля</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">

                            <a href="{{ route('admin.home') }}">Головна</a>

                        </li>

                        {{--                        <li class="breadcrumb-item"><a href="{{ route('admin.fields.index') }}">Пользователи</a></li>--}}

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

                    <form action="{{ route('fields.update', $field->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        @method('PUT')



                        @if( ($fieldType = $field?->type) && $fieldType )

                            <div class="radio-img-container">

                                <label for="" class="d-flex align-items-center">

                                    <img src='{{ asset("/adminka/dist/img/constructor/". $fieldType .".png") }}' class="img-thumbnail" alt="{{ $fieldType }}" style="width: 400px; margin-right: 10px;">

                                    <span>{{ $fieldType }}</span>

                                </label>

                            </div>

                        @endif

                        @if ($field?->type == 'select' || $field?->type == 'info_checkbox' || $field?->type == 'radio')
                        <div class="form-group">
                            <label for="options">Опції для Select (Option 1; Option 2; Option 3; через крапку з комою => ;)</label>
                            <textarea name="options" id="options" class="form-control">
                                @if($field->options)
                                    {{ implode('; ', json_decode($field->options, true)) }};
                                @endif
                            </textarea>
                            @error('options')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif




                        <div class="form-group">

                            <label for="label">Название</label>

                            <input type="text" name="label" id="label" class="form-control" value="{{ old('label', $field->label) }}">

                            @error('label')

                            <div class="text-danger">{{ $message }}</div>

                            @enderror

                        </div>



                        <!-- Placeholder input -->

                        <div class="form-group">

                            <label for="placeholder">Placeholder Text</label>

                            <input type="text" class="form-control @error('placeholder') is-invalid @enderror" id="placeholder" name="placeholder" placeholder="Enter placeholder text" value="{{ old('placeholder', $field->placeholder) }}">

                            @error('placeholder')

                            <span class="invalid-feedback">{{ $message }}</span>

                            @enderror

                        </div>



                        <div class="form-group">

                            <label for="type">Тип поля</label>

                            <select name="type" id="type" class="form-control">

                                @foreach($fields as $field_type)

                                    <option value="{{ $field_type->type }}" {{ $field->type == $field_type->type?'selected=selected' : '' }}>{{ $field_type->type }}</option>

                                @endforeach

                            </select>

                            @error('type')

                            <div class="text-danger">{{ $message }}</div>

                            @enderror

                        </div>



                        <div class="form-group">

                            <label for="position">Позиция</label>

                            <input type="number" name="position" id="position" class="form-control" value="{{ old('position', $field->position) }}">

                            @error('position')

                            <div class="text-danger">{{ $message }}</div>

                            @enderror

                        </div>



                        <!-- Select for steps -->

                        <div class="form-group">

                            <label for="steps">Assign to Steps (optional)</label>

                            <select class="form-control @error('steps') is-invalid @enderror" id="steps" name="steps[]" multiple>

                                <option value="">-- No step selected --</option> <!-- Добавьте пустой вариант -->

                                @foreach($steps as $step)

                                    <option value="{{ $step->id }}" {{ (collect(old('steps'))->contains($step->id)) ? 'selected=selected' : '' }}>

                                        {{ $step->name }}

                                    </option>

                                @endforeach

                            </select>

                            @error('steps')

                            <span class="invalid-feedback">{{ $message }}</span>

                            @enderror

                        </div>




                        <div class="form-group">

                            <label for="note">Примітка для адміна про це поле</label>

                            <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="3" placeholder="Enter note">{{ old('note', $field->note) }}</textarea>

                            @error('note')

                            <span class="invalid-feedback">{{ $message }}</span>

                            @enderror

                        </div>



                        {!! $relation_view ?? '' !!}



                        @if( ($parentType = $field->parent?->type) && $parentType )

                            <div class="radio-img-container">

                                <label for="type_input" class="d-flex align-items-center">

                                    <img src='{{ asset("/adminka/dist/img/constructor/". $parentType .".png") }}' class="img-thumbnail" alt="{{ $parentType }}" style="width: 400px; margin-right: 10px;">

                                    <span>{{ $parentType }}</span>

                                </label>

                            </div>

                        @elseif( ($children = $field->children()->get()) && $children->count() )

                            @foreach($children as $child)

                                @if( ( $childrenType = $child->type) && $childrenType )

                                    <div class="radio-img-container">

                                        <label for="" class="d-flex align-items-center">

                                            <img src='{{ asset("/adminka/dist/img/constructor/". $childrenType .".png") }}' class="img-thumbnail" alt="{{ $childrenType }}" style="width: 400px; margin-right: 10px;">

                                            <span>{{ $childrenType }}</span>

                                        </label>

                                    </div>

                                @endif

                            @endforeach

                        @endif



                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection
