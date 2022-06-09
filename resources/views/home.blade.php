@extends('layouts.app')

@section('content')

<div>
    <select class="mdb-select colorful-select dropdown-info md-form" multiple searchable="Search here.." id="select-id">
        <option value="5">Gender</option>
        <option value="6">State of Origin</option>
        <option value="7">LGA</option>
        <option value="8">Tribe</option>
        <option value="9">Geo-Political Zone</option>
        <option value="10">Date of Birth</option>
        <option value="11">Date of Enlistment</option>
        <option value="12">Date of Last Promotion</option>
        <option value="13">Date of Retirement</option>
        <option value="14">Date Transfer to Command</option>
        <option value="15">Command Served Last</option>
        <option value="16">Educational Qualification</option>
        <option value="17">Discipline</option>
        <option value="18">General Duty/Specialist</option>
        <option value="19">Duty Post</option>
        <option value="20">Date Transfer To Division</option>
        <option value="21">Date Reported In Command</option>
        <option value="22">Phone</option>
        <option value="23">Recruited As</option>
        <option value="24">address</option>
        <option value="25">Next of Kin</option>
        <option value="26">Next of Kin Phone</option>
    </select>
    <label class="mdb-main-label text-dark">Remove Column</label>
</div>
<v-data-list link="{{ asset('css/bootstrap4.css') }}"></v-data-list>
@endsection
@section('script')
<script>
    $(document).ready(function() {        
        $('.mdb-select').materialSelect();

    });
</script>
@endsection