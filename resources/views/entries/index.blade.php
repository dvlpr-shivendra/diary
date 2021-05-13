@extends('layouts.app')

@section('content')

@foreach($entries as $entry)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{ $entry->created_at->format('d M, Y') }}</p>
                    <div class="my-4 italic text-2xl">{{ strip_tags(Str::limit($entry->body, 100)) }}</div>
                    <a href="{{ route('entries.show', $entry) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Read more
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
