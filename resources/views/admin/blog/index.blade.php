@extends('admin.layouts.app')
@section('title','Settings | Users')
@section('style')
 <!-- DataTables -->
 <link rel="stylesheet" href="{{asset('adminka/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{asset('adminka/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{asset('adminka/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
 <!-- Theme style -->
 @endsection
@section('content')

    @include('admin.blog.parts.header.index')

    @include('admin.blog.parts.main.index')

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
                    modal.find('#id').val(response.id);
                    modal.find('#fio').val(response.fio);
                    modal.find('#phone').val(response.phone);
                    //modal.find('#current').val(response.current).trigger('change');
                    modal.find('#email').val(response.email);
                    // modal.find('#payment').val(response.payment).trigger('change');
                    modal.find('#notes').val(response.notes);
                   // modal.find('#status').val(response.Active).trigger('change');
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
            modal.find('form').attr('action', '/admin/blogs/' + id );
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
