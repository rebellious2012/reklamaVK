<div class="card">
    <div class="card-header">
        <h3 class="card-title">Поля</h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Тип Поля</th>
                <th>Назва</th>
                <th>Текст-підказка</th>
                <th>Позиція</th>
                <th>Кроки</th>
                <th>Етапи</th>
                <th>Примітка</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($fields as $field)
                <tr>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio{{ $field->id }}" name="customRadio" value="{{ $field->id }}">
                            <label for="customRadio{{ $field->id }}" class="custom-control-label">{{ $field->id }}</label>
                        </div>
                    </td>
                    <td>{{ $field->type ?? '' }}</td>
                    <td>{{ $field->label ?? '' }}</td>
                    <td>{{ $field->placeholder ?? '' }}</td>
                    <td>
                        <div style="">{{ $field->position ?? '' }}</div>
                    </td>
                    <td>
                        @if($field->steps !== null)
                            @foreach($field->steps as $step)
                                <a href="{{ route('steps.edit', ['step' =>$step->id]) }}" target="_blank" rel="noopener">{{ $step->name.'; ' ?? '' }}</a>
                                <br>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if($field->steps !== null)
                            @foreach($field->steps->pluck('stages')->flatten()->unique('id') as $stage)
                                <a href="{{ route('stages.edit', ['stage' =>$stage->id]) }}" target="_blank" rel="noopener">{{ $stage->name.'; ' ?? '' }}</a>
                                <br>
                            @endforeach
                        @endif
                    </td>

                    <td>{{ $field->note ?? '' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- /.card-body -->
</div><!-- /.card -->
