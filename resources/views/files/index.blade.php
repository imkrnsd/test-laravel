<!-- resources/views/files/index.blade.php -->
<h1>Uploaded Files</h1>

@if ($files->count() > 0)
    <ul>
        @foreach ($files as $file)
            <li>{{ $file->name }}</li
