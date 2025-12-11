@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 px-4">
    <h2 class="text-3xl font-semibold mb-8 text-white">✏️ Create New Event</h2>

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-xl border border-gray-700">
        @csrf

        <div>
            <label class="block mb-2 text-gray-200 font-medium">Event Title</label>
            <input type="text" name="title" class="w-full border border-gray-600 bg-gray-700 text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>

        <div>
            <label class="block mb-2 text-gray-200 font-medium">Description</label>
            <textarea name="description" rows="4" class="w-full border border-gray-600 bg-gray-700 text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required></textarea>
        </div>

        <div>
            <label class="block mb-2 text-gray-200 font-medium">Location</label>
            <input type="text" name="location" class="w-full border border-gray-600 bg-gray-700 text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 text-gray-200 font-medium">Date</label>
                <input type="date" name="date" class="w-full border border-gray-600 bg-gray-700 text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
            </div>
            <div>
                <label class="block mb-2 text-gray-200 font-medium">Time</label>
                <input type="time" name="time" class="w-full border border-gray-600 bg-gray-700 text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
            </div>
        </div>

        <div>
            <label class="block mb-2 text-gray-200 font-medium">Capacity</label>
            <input type="number" name="capacity" min="1" class="w-full border border-gray-600 bg-gray-700 text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>

        <div>
            <label class="block mb-2 text-gray-200 font-medium">Event Image (optional)</label>
            <input type="file" name="image" id="imageInput" accept="image/*" class="w-full border border-gray-600 bg-gray-700 text-white rounded px-4 py-2">
            <p id="imageSizeInfo" class="text-gray-400 text-sm mt-1"></p>
            <p id="imageSizeWarning" class="text-red-400 text-sm mt-1 hidden font-semibold"></p>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">Create Event</button>
            <a href="{{ route('events.index') }}" class="text-gray-300 hover:text-white">Cancel</a>
        </div>
    </form>
</div>

<script>
    const imageInput = document.getElementById('imageInput');
    const sizeInfo = document.getElementById('imageSizeInfo');
    const warning = document.getElementById('imageSizeWarning');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const fileSizeMB = (file.size / (1024 * 1024)).toFixed(2);
            sizeInfo.textContent = `Your file is of ${fileSizeMB} MB. Try less than 2MB.`;

            if (file.size > 2 * 1024 * 1024) {
                warning.textContent = '⚠️ The uploaded file is more than 2MB.';
                warning.classList.remove('hidden');
            } else {
                warning.classList.add('hidden');
            }
        } else {
            sizeInfo.textContent = '';
            warning.classList.add('hidden');
        }
    });
</script>

@endsection