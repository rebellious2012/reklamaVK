<div class="card">
    <div class="card-header">
        <h3 class="card-title">Кроки</h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Позиція</th>
                <th>Назва</th>
                <th>Поля</th>
                <th>Етапи</th>
                <th>Примітка</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($steps as $step)
                <tr>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio{{ $step->id }}" name="customRadio" value="{{ $step->id }}" >
                            <label for="customRadio{{ $step->id }}" class="custom-control-label">{{ $step->id }}</label>
                        </div>
                    </td>
                    <td >
                        <div  style="" >{{ $step->position }}</div>
                    </td>
                    <td>{{ $step->name }}</td>
                    <td>
                        @if($step->fields !== null)
                            @foreach($step->fields as $field)
                                <a href="{{ route('fields.edit', ['field' =>$field->id]) }}" target="_blank" rel="noopener">{{ $field->label.'; ' ?? '' }}</a>
                                <br>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if($step->stages !== null)
                            @foreach($step->stages as $stage)
                                <a href="{{ route('stages.edit', ['stage' =>$stage->id]) }}" target="_blank" rel="noopener">{{ $stage->name.'; ' ?? '' }}</a>
                                <br>
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $step->note ?? '' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- /.card-body -->
</div><!-- /.card -->
