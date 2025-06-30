@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3>Mood History</h3>
        <a href="{{ route('moods.create') }}" class="btn btn-primary">+ Add Today's Mood</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Mood</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($moods as $mood)
            <tr>
                <td>{{ $mood->date }}</td>
                <td>{{ $mood->mood }}</td>
                <td>{{ $mood->note }}</td>
                <td>
                    <a href="{{ route('moods.edit', $mood->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('moods.destroy', $mood->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

