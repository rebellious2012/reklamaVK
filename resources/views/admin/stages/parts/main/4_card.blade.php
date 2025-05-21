<div class="card">
    <div class="card-header">
        <h3 class="card-title">Етапи</h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Позиція</th>
                <th>Назва</th>
                <th>Вартість</th>
                <th>Короткий опис</th>
                <th>Опис</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($stages as $stage)
                <tr>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio{{ $stage->id }}" name="customRadio" value="{{ $stage->id }}" >
                            <label for="customRadio{{ $stage->id }}" class="custom-control-label">{{ $stage->id }}</label>
                        </div>
                    </td>
                    <td >
                        <div  style="background-color: {{ $stage->color  ?? '#fcf003' }}" >{{ $stage->position }}</div>
                    </td>
                    <td>{{ $stage->name }}</td>
                    <td>{{ $stage->price ?? '' }}</td>
                    <td>{{ $stage->short_content }}</td>
                    <td>{{ $stage->description }}</td>
                    <td>{{ $stage->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- /.card-body -->
</div><!-- /.card -->
