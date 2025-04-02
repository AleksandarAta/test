<div class="w-fill block p-2" x-data="{ title_focused: $wire.entangle('title_focused').live}">
    <form wire:submit.prevent="submit">

        <div class="flex flex-row flex-wrap -mx-4 items-stretch">
            <div class="w-full px-4">
                @if (session()->has('message'))
                    <div class="text-green-500 font-bold text-lg md:text-2xl">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="w-full px-4" wire:loading wire:target="image">Uploading...</div>

            <div class="w-full px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="title">Title</label>
                <input type="text" id="title" wire:model.live="title" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300" @focus="title_focused = true" @click.away="title_focused = false">
                @error('title') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 py-2 wire:ignore">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="published">Published</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="published" class="sr-only peer" wire:model="published">
                    <div class="w-11 h-6 bg-red-500 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                </label>
                @error('published') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 py-2 wire:ignore">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="use_global">Use global keywords and description</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="use_global" class="sr-only peer" wire:model="use_global">
                    <div class="w-11 h-6 bg-red-500 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                </label>
                @error('use_global') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="slug">Slug</label>
                <input type="text" id="slug" wire:model.live="slug" disabled class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('slug') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="keywords">Keywords</label>
                <textarea type="text" id="keywords" wire:model="keywords" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300"></textarea>
                @error('keywords') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="description">Description</label>
                <textarea type="text" id="description" wire:model="description" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300"></textarea>
                @error('description') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="image">Image</label>
                <input type="file" id="image" wire:model="image" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('image') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                @if ($image)                
                    Image Preview:
                    <img src="{{ $image->temporaryUrl() }}" class="mx-auto">                
                @endif
            </div>

            <div wire:ignore class="w-full px-4 py-2" >
                <label class="block text-neutral-800 font-medium text-base mb-1" for="body">Blog content:</label>
                <textarea id="body" wire:model='body' name="body" class="h-28"
                x-data="{
                    useDarkMode: window.matchMedia('(prefers-color-scheme: dark)').matches,
                    isSmallScreen: window.matchMedia('(max-width: 1023.5px)').matches
                }"
                x-init="
                tinymce.init({
                    selector: 'textarea#body',
                    plugins: 'preview importcss searchreplace autolink directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
                    editimage_cors_hosts: ['picsum.photos'],
                    menubar: 'file edit view insert format tools table help',
                    toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview print | insertfile image media template link anchor codesample | ltr rtl',
                    toolbar_sticky: true,
                    toolbar_sticky_offset: isSmallScreen ? 102 : 108,
                    image_advtab: true,
                    //height: 400,
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
                        // editor.on('init change', function () {
                        //     editor.save();
                        // });
                        editor.on('change', function (e) {
                            @this.set('body', editor.getContent());
                        });
                    }
                });
                ">
                </textarea>
            </div>

            

            <div class="w-full px-4 py-2">
                <div class="flex flex-row justify-between items-center w-full pt-2">
                    <div>
                        <button type="submit" class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 text-white bg-blue-500 text-base font-medium leading-tight hover:bg-blue-400 hover:border-blue-400 transition ease-in-out duration-200">Save Blog</button>
                    </div>

                    <div>
                        <a href="{{ route('blogs.index') }}" class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 text-blue-500 bg-white text-base font-medium leading-tight hover:bg-blue-400 hover:border-blue-400 hover:text-white transition ease-in-out duration-200">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


@push('scripts')
    <script src="{{ asset("/tinymce/tinymce.min.js") }}" referrerpolicy="origin"></script>
@endpush
