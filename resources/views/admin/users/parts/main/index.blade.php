<!-- Main content -->

<section class="content">

    <div class="container-fluid">

        @include('admin.users.parts.main.1_view')

{{--        @include('admin.users.parts.main.2_card_body')--}}

        @include('admin.users.parts.main.3_card_warning')

        @include('admin.users.parts.main.4_card')

    </div>

    @include('admin.users.parts.main.modals.info')

    @include('admin.users.parts.main.modals.add')

    @include('admin.users.parts.main.modals.delete')

    @include('admin.users.parts.main.modals.deactive')

    @include('admin.users.parts.main.modals.active')

    @include('admin.users.parts.main.modals.undelete')



    @include("admin.users.includes.modals.bannedUsers.banned")

    @include("admin.users.includes.modals.bannedUsers.banned_response")




</section>

