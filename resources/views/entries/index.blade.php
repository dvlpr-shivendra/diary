@extends('layouts.app')

@section('content')

@foreach($entries as $entry)
    <div class="pt-12 @if($loop->last) {{ 'pb-12' }} @endif">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{ $entry->created_at->format('d M, Y') }}</p>
                    <div class="mt-4 mb-10 italic text-2xl">{{ strip_tags(Str::limit($entry->body, 320)) }}
                    </div>
                    <div class="flex justify-between">
                        <a href="{{ route('entries.show', $entry) }}"
                            class="bg-green-700 hover:bg-blue-800 text-white text-xs font-bold py-2 px-4 rounded mr-2">
                            Read more
                        </a>
                        <div>
                            @if (today()->format('d M, Y') === $entry->created_at->format('d M, Y'))
                            <a href="{{ route('entries.edit', $entry) }}"
                                class="bg-blue-500 hover:bg-blue-800 text-white text-xs font-bold py-2 px-4 rounded mr-2">
                                Update
                            </a>
                            @endif

                            <form action="{{ route('entries.destroy', $entry) }}" method="post" onsubmit="return confirm('Are you sure?')" class="inline">
                            @csrf
                            @method('delete')
                            <button
                                class="bg-red-500 hover:bg-red-800 text-white text-xs font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
