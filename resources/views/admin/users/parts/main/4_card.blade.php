<div class="card">
    <div class="card-header">
        <h3 class="card-title">Користувачі</h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Ролі</th>
                <th>Логін</th>
                <th>Email</th>
                <th>Останні зміни</th>
                <th>Вхідні данні</th>
                <th>Етап-Крок</th>
                <th>Документы</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio{{ $user->id }}" name="customRadio" value="{{ $user->id }}">
                            <label for="customRadio{{ $user->id }}" class="custom-control-label">{{ $user->id }}</label>
                        </div>
                    </td>
                    <td>
                        @foreach ($user->roles as $role)
                            {{ $role->name }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        @if(!empty($user->userIntroForm))
                            <?php $userData = json_decode($user->userIntroForm, true); ?>
                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#userDataModal{{$user->id}}">
                                View Details
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="userDataModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="userDataModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="userDataModalLabel">User Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Account Type</th>
                                                    <td>{{ $userData['account_type'] ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $userData['email'] ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Страна</th>
                                                    <td>{{ $userData['country'] ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Валюта</th>
                                                    <td>{{ $userData['currency'] ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Ссылка на страницу</th>
                                                    <td>
                                                        {{ $userData['link_page'] ?? 'N/A' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Ссылка на группу</th>
                                                    <td>
                                                        {{ $userData['link_group'] ?? 'N/A' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th> ФИО</th>
                                                    <td>
                                                        {{ $userData['fio'] ?? 'N/A' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>ИНН</th>
                                                    <td>
                                                        {{ $userData['inn'] ?? 'N/A' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Тип юр. лица</th>
                                                    <td>
                                                        {{ $userData['legal_type'] ?? 'N/A' }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span class="badge badge-danger">No Data</span>
                        @endif
                    </td>
                    <td id="status-{{$user->id }}">
                        @if($user->stages->isNotEmpty())
                            @php
                                $activeStage = $user->stages->first(); // Получаем первый активный этап
                            @endphp
                            Этап: {{ $activeStage->name }}
                            <br>
                             Шаг: {{ ( $user->activeStep()?->get() !==null ) ? $user->activeStep?->name : 'Нет шагов' }}
                        @else
                            Активный этап не назначен
                        @endif
                    </td>
                    <td>
                        @if($user->cancels->count())
    <ul class="list-group">
        @foreach($user->cancels as $cancel)
            <li class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="badge {{ !$cancel->is_read ? 'bg-danger' : 'bg-success' }}"
                          title="{{ $cancel->details }}">
                        {{ $cancel->reason }}
                    </span>
                    @if($cancel->file_path)
                        <a href="{{ asset('storage/' . $cancel->file_path) }}"
                           target="_blank" class="ms-2 text-primary" title="Открыть файл">📎</a>
                    @endif
                </div>
                @if(!$cancel->is_read)
                    <button class="btn btn-sm btn-light mark-as-read"
                            data-id="{{ $cancel->id }}" title="Отметить как просмотрено">
                        👁
                    </button>
                @endif
            </li>
        @endforeach
    </ul>
@endif

                        @foreach($user->forms()->where('field_name', 'file')->get() as $key_doc => $document)

                            <a href="#" data-bs-toggle="modal" data-bs-target="#documentModal{{ $key_doc }}">

                                Документ {{ $key_doc + 1 }}

                            </a>

                            <br>
                            <!-- Модальное окно для каждого документа -->
                            <div class="modal fade" id="documentModal{{ $key_doc }}" tabindex="-1" aria-labelledby="documentModalLabel{{ $key_doc }}" aria-hidden="true">

                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title" id="documentModalLabel{{ $key_doc }}">Документ {{ $key_doc + 1 }}</h5>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>

                                        </div>

                                        <div class="modal-body">

                                            <img src="{{ asset("storage/media/user_documents/{$document->field_value}") }}" class="img-fluid" alt="Документ {{ $key_doc + 1 }}">

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach



                    </td>


                </tr>

            @endforeach

            </tbody>

        </table>

    </div><!-- /.card-body -->

</div><!-- /.card -->

<script>
    document.querySelectorAll('.mark-as-read').forEach(button => {
        button.addEventListener('click', function () {
            const cancelId = this.dataset.id;

            fetch(`/cancel/${cancelId}/read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ id: cancelId })
            })
            .then(response => {
                if (!response.ok) throw new Error('Ошибка');
                return response.json();
            })
            .then(() => {
                this.remove(); // Удаляем кнопку после успешного обновления
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert('Не удалось обновить статус');
            });
        });
    });
</script>
