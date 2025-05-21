<div class="card">
    <div class="card-header">
        <h3 class="card-title">Новини</h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
{{--                <th>Позиція</th>--}}
                <th>Картинка</th>
                <th>Назва</th>
{{--                <th>Короткий опис</th>--}}
{{--                <th>Опис</th>--}}
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio{{ $blog->id }}" name="customRadio" value="{{ $blog->id }}" >
                            <label for="customRadio{{ $blog->id }}" class="custom-control-label">{{ $blog->id }}</label>
                        </div>
                    </td>
{{--                    <td >--}}
{{--                        <div  >{{ $blog->position }}</div>--}}
{{--                    </td>--}}
                    <td>
                        <img src="{{ asset('storage/media/blog/' . $blog->image_path) }}" alt="blog Image" style="width:100px;">
                    </td>
                    <td>{{ $blog->name }}</td>
{{--                    <td>{{ $blog->short_content }}</td>--}}
{{--                    <td>{{ $blog->content }}</td>--}}
                    <td>{{ $blog->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- /.card-body -->
</div><!-- /.card -->
