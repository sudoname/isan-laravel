@extends('admin.layouts.admin')

@section('title', 'Media Library')
@section('page-title', 'Media Library')

@section('content')
<div class="space-y-6">
    <!-- Header and Upload -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <p class="text-gray-600">Manage your media files and images</p>
            </div>
            <button onclick="document.getElementById('file-upload').click()"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-upload mr-2"></i> Upload Files
            </button>
        </div>

        <!-- Hidden File Upload Form -->
        <form id="upload-form" action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data" class="hidden">
            @csrf
            <input type="file"
                   id="file-upload"
                   name="files[]"
                   multiple
                   accept="image/*"
                   onchange="this.form.submit()">
        </form>

        <!-- Folder Navigation -->
        @if($folder)
            <div class="mb-4">
                <nav class="flex items-center text-sm text-gray-600">
                    <a href="{{ route('admin.media.index') }}" class="hover:text-blue-600">
                        <i class="fas fa-home mr-1"></i> Root
                    </a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-900">{{ $folder }}</span>
                </nav>
            </div>
        @endif

        <!-- Directories -->
        @if(count($directories) > 0)
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Folders</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @foreach($directories as $directory)
                        <a href="{{ route('admin.media.index', ['folder' => $directory]) }}"
                           class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 hover:border-blue-300 transition">
                            <i class="fas fa-folder text-4xl text-yellow-500 mb-2"></i>
                            <span class="text-xs text-gray-700 text-center truncate w-full">
                                {{ basename($directory) }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Media Grid -->
    <div class="bg-white rounded-lg shadow p-6">
        @if(count($mediaFiles) > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach($mediaFiles as $file)
                    <div class="relative group border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                        <!-- Image -->
                        <div class="aspect-square bg-gray-100">
                            <img src="{{ $file['url'] }}"
                                 alt="{{ $file['name'] }}"
                                 class="w-full h-full object-cover"
                                 loading="lazy">
                        </div>

                        <!-- Info Overlay -->
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-200 flex items-center justify-center opacity-0 group-hover:opacity-100">
                            <div class="flex space-x-2">
                                <!-- Copy URL -->
                                <button onclick="copyToClipboard('{{ $file['url'] }}')"
                                        class="px-3 py-2 bg-white text-gray-700 rounded hover:bg-gray-100 transition text-sm"
                                        title="Copy URL">
                                    <i class="fas fa-copy"></i>
                                </button>

                                <!-- View -->
                                <a href="{{ $file['url'] }}"
                                   target="_blank"
                                   class="px-3 py-2 bg-white text-gray-700 rounded hover:bg-gray-100 transition text-sm"
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Delete -->
                                <button onclick="deleteMedia('{{ $file['path'] }}')"
                                        class="px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm"
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <!-- File Info -->
                        <div class="p-2 bg-white border-t border-gray-200">
                            <p class="text-xs text-gray-700 truncate" title="{{ $file['name'] }}">
                                {{ $file['name'] }}
                            </p>
                            <p class="text-xs text-gray-500">
                                {{ number_format($file['size'] / 1024, 1) }} KB
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                <p class="text-lg font-medium text-gray-500">No media files yet</p>
                <p class="text-sm text-gray-400 mb-6">Upload your first image to get started</p>
                <button onclick="document.getElementById('file-upload').click()"
                        class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-upload mr-2"></i> Upload Files
                </button>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    // Copy URL to clipboard
    function copyToClipboard(url) {
        navigator.clipboard.writeText(url).then(function() {
            // Show success message
            const message = document.createElement('div');
            message.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            message.innerHTML = '<i class="fas fa-check mr-2"></i> URL copied to clipboard!';
            document.body.appendChild(message);

            setTimeout(function() {
                message.remove();
            }, 3000);
        }, function() {
            alert('Failed to copy URL');
        });
    }

    // Delete media file
    function deleteMedia(path) {
        if (!confirm('Are you sure you want to delete this file? This action cannot be undone.')) {
            return;
        }

        fetch('{{ route('admin.media.destroy') }}', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ path: path })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            } else {
                alert('Failed to delete file: ' + data.message);
            }
        })
        .catch(error => {
            alert('Error deleting file');
            console.error('Error:', error);
        });
    }

    // Show loading indicator during upload
    document.getElementById('file-upload').addEventListener('change', function() {
        if (this.files.length > 0) {
            const loading = document.createElement('div');
            loading.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
            loading.innerHTML = '<div class="bg-white rounded-lg p-6"><i class="fas fa-spinner fa-spin text-4xl text-blue-500 mb-4"></i><p class="text-gray-700">Uploading files...</p></div>';
            document.body.appendChild(loading);
        }
    });
</script>
@endpush
@endsection
