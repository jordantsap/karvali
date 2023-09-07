@extends('layouts.app')

@section('content')
    <h2>Company Open Hours</h2>

    <form method="POST" action="{{ route('save_open_hours') }}">
        @csrf

        <table class="table">
            <thead>
            <tr>
                <th>Weekday</th>
                <th>Day Period</th>
                <th>Open Time</th>
                <th>Close Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($weekdays as $weekday)
                <tr>
                    <td>
                        <input type="checkbox" name="{{ $weekday->name }}" id="">
                        <label for="">{{ $weekday->name }}</label>
                    </td>
                    <td>
                        <select name="day_period[{{ $weekday->id }}]" class="form-control">
                            @foreach ($dayPeriods as $dayPeriod)
                                <option value="{{ $dayPeriod->id }}">{{ $dayPeriod->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="open_time[{{ $weekday->id }}]" class="form-control">
                            @foreach ($hours as $hour)
                                <option value="{{ $hour }}">{{ $hour }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="close_time[{{ $weekday->id }}]" class="form-control">
                            @foreach ($hours as $hour)
                                <option value="{{ $hour }}">{{ $hour }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
