@extends('layouts.app')

@section('content')

<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

    @forelse($entries as $entry)    
        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

            <!-- Article -->
            <article class="bg-gray-50 overflow-hidden rounded-lg h-full flex flex-col justify-between layered-shadow">

                <p class="p-4 text-justify">
                    {{ strip_tags(Str::limit($entry->body, 320)) }}
                </p>

                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                    <a class="flex items-center no-underline hover:underline text-black" href="#">
                        <p class="ml-2 text-sm">
                            {{ $entry->created_at->format('d M, Y') }}
                        </p>
                    </a>
                    <div>
                    <a href="{{ route('entries.show', $entry) }}"
                        class="bg-green-700 hover:bg-blue-800 text-white text-xs font-bold py-1 px-2 rounded mr-2">
                        Read
                    </a>
                    @if (today()->format('d M, Y') === $entry->created_at->format('d M, Y'))
                    <a href="{{ route('entries.edit', $entry) }}"
                        class="bg-blue-500 hover:bg-blue-800 text-white text-xs font-bold py-1 px-2 rounded mr-2">
                        Update
                    </a>
                    @endif
                    <form action="{{ route('entries.destroy', $entry) }}" method="post" onsubmit="return confirm('Are you sure?')" class="inline">
                        @csrf
                        @method('delete')
                        <button
                            class="bg-red-500 hover:bg-red-800 text-white text-xs font-bold py-1 px-2 rounded">
                            Delete
                        </button>
                    </form>
                    </div>
                </footer>

            </article>
            <!-- END Article -->

        </div>
        <!-- END Column -->
    @empty
    @endforelse

    </div>
</div>

<div class="container pb-24 mx-auto px-4 md:px-12">
    {{ $entries->links() }}
</div>

@endsection
