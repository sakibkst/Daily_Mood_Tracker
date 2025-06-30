@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Mood</h3>
    <form action="{{ route('moods.update', $mood->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="mood" class="form-label">Mood</label>
            <select name="mood" class="form-select">
                <option {{ $mood->mood == 'Happy' ? 'selected' : '' }}>Happy</option>
                <option {{ $mood->mood == 'Sad' ? 'selected' : '' }}>Sad</option>
                <option {{ $mood->mood == 'Angry' ? 'selected' : '' }}>Angry</option>
                <option {{ $mood->mood == 'Excited' ? 'selected' : '' }}>Excited</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea name="note" class="form-control">{{ $mood->note }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection

