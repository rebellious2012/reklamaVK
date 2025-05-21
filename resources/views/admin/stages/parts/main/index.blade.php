<!-- Main content -->
<section class="content">
    <div class="container-fluid">
{{--        @include('admin.stages.parts.main.1_view')--}}
{{--        @include('admin.stages.parts.main.2_card_body')--}}
        @include('admin.stages.parts.main.3_card_warning')
        @include('admin.stages.parts.main.4_card')
    </div>
    @include('admin.stages.parts.main.modals.info')
    @include('admin.stages.parts.main.modals.add')
    @include('admin.stages.parts.main.modals.delete')
    @include('admin.stages.parts.main.modals.deactive')
    @include('admin.stages.parts.main.modals.active')
    @include('admin.stages.parts.main.modals.undelete')

    <script>
        $(document).ready(function () {
            $(this).find('input, select').each(function() {
                $(this).val('');
            });
            $('#modal-add1').on('hidden.bs.modal', function () {
                $(this).find('form').trigger('reset');
                $('#inputName').val('');
                $('#inpEmail').val('');
                $('#inputPassword').val('');
                $('#password_confirmation').val('');
                $('#roles').val([]).trigger('change');
            });
        });

    </script>
</section>
