@extends('layouts.default')

@section('content')
<ul class="list-inline menu-left mb-0">
        <li class="list-inline-item">
            <button type="button" class="button-menu-mobile open-left waves-effect">
                <i class="ion-navicon"></i>
            </button>
        </li>
        <li class="hide-phone list-inline-item app-search">
            <h3 class="page-title">Panel de administracion</h3>
        </li>
    </ul>

    <div class="clearfix"></div>


<div class="row d-flex flex-column mt-5" id="edi-tables">
    @include('admin.seminars.edi-table')
</div>

<div class="row d-flex flex-column mt-5" id="events-table-container">
    @include('admin.events.edi-table')
</div>


@endsection

{{-- JS --}}
@section('js')
    <script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
    <script src="assets/plugins/tiny-editable/numeric-input-example.js"></script>

    {{-- <script>
        $('#table').editableTableWidget().numericInputExample().find('td:first').focus();
    </script> --}}

    <script src="assets/js/ediTable.js"></script>
    <script src="assets/js/citySelectors.js"></script>
@endsection
