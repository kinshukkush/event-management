@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 px-4">
    <h2 class="text-3xl font-semibold mb-8">Create New Event</h2>

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow event-form">
        @csrf

        <div>
            <label class="block mb-2 text-gray-800">Event Title</label>
            <input type="text" name="title" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-900" required>
        </div>

        <div>
            <label class="block mb-2 text-gray-800">Description</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-900" required></textarea>
        </div>

        <div>
            <label class="block mb-2 text-gray-800">Location</label>
            <input type="text" name="location" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-900" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 text-gray-800">Date</label>
                <input type="date" name="date" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-900" required>
            </div>
            <div>
                <label class="block mb-2 text-gray-800">Time</label>
                <input type="time" name="time" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-900" required>
            </div>
        </div>

        <div>
            <label class="block mb-2 text-gray-800">Capacity</label>
            <input type="number" name="capacity" min="1" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-900" required>
        </div>

        <div>
            <label class="block mb-2 text-gray-800">Event Image (optional)</label>
            <input type="file" name="image" id="imageInput" accept="image/*" class="w-full border border-gray-300 rounded px-4 py-2 text-gray-900">
            <p id="imageSizeInfo" class="text-gray-600 text-sm mt-1"></p>
            <p id="imageSizeWarning" class="text-red-600 text-sm mt-1 hidden font-semibold"></p>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded shadow transition">Create Event</button>
            <a href="{{ route('events.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
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

<style>
    
    .bg-$$\#1e293b$$ .max-w-3xl h2 {
        color: white !important;
    }
    
    .event-form {
        background-color: white !important;
    }
    
    .event-form label {
        color: #1f2937 !important;
    }
    
    .event-form input,
    .event-form textarea {
        color: #111827 !important;
        background-color: white !important;
    }
</style>
@endsection