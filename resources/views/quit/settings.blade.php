@extends('main.layout')

@section('title', ' - Dashboard')

@section('nav')
    @include('quit.nav')
@stop

@section('content')
<div class="settings">
    <div class="container">
        <form method="POST" action="{{url('quit')}}">
            {!! csrf_field() !!}
            <div class="card">
                <div class="header">
                    <label for="quit_date">When did you quit smoking?</label>
                </div>
                <input type="date" name="quit_date" value="{{ null !== old('quit_date') ? old('quit_date') : Carbon\Carbon::now()->toDateString() }}" id="quit_date" class="settings-field">
            </div>
            <div class="card">
                <div class="header">
                    <label for="packs_per_week">How many packs of cigarettes do you smoke per week?</label>
                </div>
                <input type="number" name="packs_per_week" value="{{ old('packs_per_week') }}" id="packs_per_week" class="settings-field">
            </div>
            <div class="card">
                <div class="header">
                    <label for="cigarettes_per_pack">How many cigarettes are in a typical pack?</label>
                </div>
                <input type="number" name="cigarettes_per_pack" value="{{ old('cigarettes_per_pack') }}" id="cigarettes_per_pack" class="settings-field">
            </div>

            <div class="card">
                <div class="header">
                    <label for="cost_per_pack">How much does a typical pack cost?</label>
                </div>
                <span class="dollar-sign">$</span><input type="text" name="cost_per_pack" value="{{ old('cost_per_pack') }}" id="cost_per_pack" class="settings-field">
            </div>

            <div class="settings-submit">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop