@extends('layouts.app')

@section('content')

@push('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"
        integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg=="
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
        integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
        crossorigin="anonymous" />

    <style>
        trix-editor {
            min-height: 50vh !important;
        }

        .trix-button-group--file-tools {
            display: none !important;
        }

    </style>

    <script>
        document.addEventListener('trix-file-accept', event => event.preventDefault())

    </script>
@endpush


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('entries.store') }}" method="post">
                    @csrf
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="body">Today's entry</label>
                    <input type="hidden" name="body" id="body">
                    <trix-editor input="body"></trix-editor>

                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-3">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
