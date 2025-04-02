<div x-data="{ title_focused: $wire.entangle('title_focused').live }">
    <form wire:submit.prevent="submit">
        <div class='w-full'>
            @if (session()->has('message'))
            <div class="text-green-500 font-bold text-lg">
                {{ session('message') }}
            </div>
            @endif
        </div>
        <div wire:loading wire:target='image' class="w-full px-4">
            Uploading..
        </div>
        <div class="w-full px-4 py-2">
            <x-label for="title">Title</x-label>
            <x-input name="title" wire:model.live='title' id="title" type="text" @focus="title_focused = true"
                @click.away="title_focused = false" />
            <x-input-error for=" title" />
        </div>
        <div class="text-sm mt-2">
        </div>
        <div class="flex">
            <div class="w-full px-4 py-2 wire:ignore">
                <x-label for="published">Published</x-label>
                <x-label for="published">
                    <x-input name="published" wire:model='published' id="published" type="checkbox"
                        class="cursor_pointer" />
                    <div></div>
                </x-label>
                <x-input-error for="published" />
            </div>
            <div class="w-full px-4 py-2 wire:ignore">
                <x-label for="use_global">Use Global</x-label>
                <x-label for="use_global">
                    <x-input name="use_global" wire:model='use_global' id="use_global" type="checkbox"
                        class="cursor_pointer" />
                    <div></div>
                </x-label>
                <x-input-error for="use_global" />
            </div>
        </div>
        <div class="w-full px-4 py-2">
            <x-label for="slug">slug</x-label>
            <x-input name="slug" wire:model.live.debounce.200ms='slug' id="slug" type="text" disabled />
            <x-input-error for="slug" />
        </div>
        <div class="w-full px-4 py-2">
            <x-label for="discription">Discription</x-label>
            <x-input name="discription" wire:model='discription' id="discription" type="text" />
            <x-input-error for="discription" />
        </div>
        <div class="w-full px-4 py-2">
            <x-label for="image">image</x-label>
            <x-input name="image" wire:model='image' id="image" type="file" />
            <x-input-error for="image" />
        </div>
        <div>
            @if ($image)
            Image Preview:
            <img src="{{ $image->temporaryUrl() }}" alt="some img" class="mx-auto">
            @endif
        </div>
        <div class="w-full px-4 py-2" wire:ignore>
            <x-label for="body">Body</x-label>
            <textarea name="body" id="body" cols="30" rows="10" wire:model='body'></textarea>
        </div>
    </form>
</div>
@push('scripts')
<script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;
    tinymce.init({
        selector: 'textarea#body',
        plugins: 'preview importcss searchreplace autolink directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons paste',
        editimage_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        toolbar_sticky_offset: isSmallScreen ? 102 : 108,
        image_advtab: true,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image table',
        skin: useDarkMode ? 'oxide-dark' : 'oxide',
        content_css: useDarkMode ? 'dark' : 'default',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
        promotion: false,
        images_upload_url: '/upload',
        file_picker_types: 'image',
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        file_picker_callback: function (cb, value, meta){
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function(){
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(){
                    var id = 'blobid'+(new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {title:file.name});
                };
            };
            input.click();
        },
        setup: function (editor) {
            editor.on('change', function (e) {
                @this.set('body', editor.getContent());
            });
        }
    });
</script>
@endpush