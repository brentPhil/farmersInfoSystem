@props([
    'name' => '',
    'src' => '',
])

<div class="flex items-center gap-6 rounded-md">
    <div class="avatar avatar-sm">
        <div class="w-24 rounded">
        <img src="{{ $src }}" id="profile-image" alt="Profile Photo" draggable="false">
        </div>
    </div>
    <div>
        <input
            type="file"
            class="file-input file-input-bordered file-input-sm w-full max-w-xs bg-white dark:bg-dark-eval-0"
            id="profileFile"
            name="{{ $name }}"
            accept="image/*"
            onchange="previewImage()"/>
        <br>
        <label for="profileFile" class="text-sm">Image format with max size of 5mb</label>
    </div>
</div>

<script>
    document.getElementById('profileFile').addEventListener('change', function () {
        const file = this.files[0];
        if (file.size > 5 * 1024 * 1024) {
            alert('File size must be less than 5MB.');
            this.value = '';
        } else {
            previewImage();
        }
    });

    function previewImage() {
        const fileInput = document.getElementById('profileFile');
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            const image = document.getElementById('profile-image');
            image.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            document.getElementById('profile-image').src = "{{ $src }}";
        }
    }
</script>
