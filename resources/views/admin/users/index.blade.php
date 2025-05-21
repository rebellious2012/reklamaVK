@extends('admin.layouts.app')
@section('title','Settings | Users')
@section('style')
 <!-- DataTables -->
 <link rel="stylesheet" href="{{asset('adminka/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{asset('adminka/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{asset('adminka/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

 <!-- Bootstrap CSS -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">--}}


 <!-- Theme style -->
 @endsection
@section('content')

    @include('admin.users.parts.header.index')

    @include('admin.users.parts.main.index')

@endsection
@section('script')
<!-- DataTables  & Plugins -->
<script src="{{asset('adminka/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminka/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminka/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminka/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminka/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminka/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminka/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('adminka/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('adminka/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('adminka/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('adminka/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('adminka/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Bootstrap JS (перед закрывающим тегом body) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var select_user = '{{__("users.select_user")}}';
</script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
    var radioButtons = document.querySelectorAll('input[type="radio"][name="customRadio"]');

    function updateEditLink() {
        var selectedRadio = document.querySelector('input[type="radio"][name="customRadio"]:checked');
        var editLink = document.querySelector('.edit-link');
        var baseUrl = editLink.getAttribute('data-base-url');

        if (!selectedRadio) {
            editLink.classList.add('disabled');
            editLink.href = "#";
            return;
        }

        editLink.classList.remove('disabled');
        // Добавляем ID пользователя и '/edit' к baseUrl
        editLink.href = `${baseUrl}/${selectedRadio.value}/edit`;
    }

    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', updateEditLink);

    });

    // Вызываем функцию при инициализации, чтобы установить начальное состояние ссылки
    updateEditLink();



    //button-info
    $('.button-info').on('click', function() {
        var id = $('input[type="radio"][name="customRadio"]:checked').val();
        var url = "/admin/users/info/" + id;
        if(id){
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var modal = $('#modal-info');
//                    modal.find('#id').val(response.id);
                    modal.find('#fio').val(response.fio);
                    modal.find('#phone').val(response.phone);
                    //modal.find('#current').val(response.current).trigger('change');
                    modal.find('#email').val(response.email);
                    // modal.find('#payment').val(response.payment).trigger('change');
                    modal.find('#notes').val(response.notes);
                   // modal.find('#status').val(response.Active).trigger('change');

                    // Очищаем контейнер для динамических полей
                    var dynamicFieldsContainer = modal.find('#dynamic-fields-container');
                    dynamicFieldsContainer.empty();

                    // Добавляем динамические поля

                    $.each(response.fields, function(index, field) {
                        var fieldHtml = '';

                        // Проверка если значение field_value = 'on'
                        var displayValue = field.field_value === 'on' ? field.field_label : field.field_value;

                        // Проверяем, если это поле для файла
                        if(field.field_value === 'on'){
                            fieldHtml ='<div class="form-group row">' +
                                '<label for="' + field.field_name + '" class="col-sm-2 col-form-label">Правовая информация:</label>' +
                               '<div class="col-sm-10">' +
                                '<textarea class="form-control" id="' + field.field_name + '" readonly>' + field.field_label + '</textarea>' +
                                '</div>' +
                                '</div>';
                        }
                        else if (field.field_name === 'file') {
                            fieldHtml = '<div class="form-group">' +
                                '<label for="' + field.field_name + '">' + field.field_label + ':</label>' +
                                '<img src="storage/media/user_documents/' + field.field_value + '" alt="Image" class="img-fluid" style="max-width: 100%; height: auto;" />' +
                                '</div>';
                        } else {
                            // Если это обычное текстовое поле

                            fieldHtml = '<div class="form-group row">' +
                                '<label for="' + field.field_name + '" class="col-sm-2 col-form-label">' + field.field_label + ':</label>' +
                                '<div class="col-sm-10">' +
                                '<textarea class="form-control" id="' + field.field_name + '" readonly>' + field.field_value + '</textarea>' +
                                '</div>' +
                                '</div>';
                        }

                        dynamicFieldsContainer.append(fieldHtml);
                    });
                }
            });
        }else{
            alert(select_user);
            return false;
        }
    });
    //button-deactive
    $('.button-deactive').on('click', function() {
        var id = $('input[type="radio"][name="customRadio"]:checked').val();
        if(id){
            $('#deactivate_user_id').val(id);
        }else{
            alert(select_user);
            return false;
        }
    });
    //button-active
    $('.button-active').on('click', function() {
        var id = $('input[type="radio"][name="customRadio"]:checked').val();
        if(id){
            $('#activate_user_id').val(id);
        }else{
            alert(select_user);
            return false;
        }
    });
    //button-delete
    $('.button-delete').on('click', function() {
        var id = $('input[type="radio"][name="customRadio"]:checked').val();
        if(id){
            var modal = $('#modal-delete');
            //add attr action to form
            modal.find('form').attr('action', '/admin/users/' + id + '/destroy');
        }else{
            alert(select_user);
            return false;
        }
    });
    //button-undelete
    $('.button-undelete').on('click', function() {
        var id = $('input[type="radio"][name="customRadio"]:checked').val();
        if(id){
            $('#undelete_user_id').val(id);
        }else{
            alert(select_user);
            return false;
        }
    });
});
    </script>
    <!-- Page specific script -->
<script>
    // $(function () {
        $(document).ready(function() {
        var table = $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('.select2').select2()
        $('.departments').on('select2:select', function(e) {
        var selectedValue = $(this).val();
        var newUrl = new URL(window.location.href);
        newUrl.searchParams.set('department', selectedValue);
        window.location.href = newUrl.href;
        });

         // Подписываемся на изменение мультиселекта
        $('.status_users').on('change', function() {
            var selectedStatuses = $(this).val().map(status => status.toLowerCase());
            console.log(selectedStatuses);

           // var searchStr = selectedStatuses.join('|');

            // Применяем глобальный поиск по таблице
            $('#example1 tbody tr').each(function() {
                var statusText = $(this).find('td:eq(7) .badge').text().trim().toLowerCase();
                var candidate = $(this).find('td:eq(1) .badge').text().trim().toLowerCase();
            // Проверяем, соответствует ли статус строки одному из выбранных в мультиселекте
            if (selectedStatuses.length === 0 || selectedStatuses.includes(statusText) || selectedStatuses.includes(candidate)) {
                $(this).show();
            } else {
                $(this).hide();
            }
            });
        });


      });
      //history
$('.history').click(function() {
    //get user callsign from 3 td in tr
    var callsign = $('input[name="customRadio"]:checked').closest('tr').find('td:eq(2)').text();
    if (callsign) {

        $(this).attr('href', 'call-last?users=' + callsign);
    } else {
        $(this).removeAttr('href');
    }
});
  </script>
<script src="{{ asset('adminka/dist/js/setting_users/actions.js') }}"></script>
@endsection
