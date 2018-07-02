@extends('layouts.default')

@section('content')

<div class="row d-flex flex-column mt-5" id="edi-tables">
    @include('admin.seminars.edi-table')
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
@endsection
