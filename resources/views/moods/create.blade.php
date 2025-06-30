@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Log Today's Mood</h3>
    <form action="{{ route('moods.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="mood" class="form-label">Mood</label>
            <select name="mood" class="form-select">
                <option>Happy</option>
                <option>Sad</option>
                <option>Angry</option>
                <option>Excited</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note (optional)</label>
            <textarea name="note" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

