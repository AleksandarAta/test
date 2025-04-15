
<div>
    <div class="fixed top-0 left-0 z-[1050] w-screen h-screen bg-black/50 {{ $modal_state }}"></div>
    <section  class="fixed left-0 top-0 z-[1055] h-full w-full overflow-y-auto overflow-x-hidden outline-none {{ $modal_state }}">
        <div class="pointer-events-none relative flex min-h-[calc(100%_-_40px)] w-auto items-center transition-all duration-300 ease-in-out mx-auto my-[20px] sm:my-[50px] sm:min-h-[calc(100%_-_100px)] max-w-[92vw] md:max-w-[550px]">
            <div class="rounded text-white pointer-events-auto relative flex w-full flex-col  border-none bg-white bg-clip-padding text-current shadow-lg outline-none justify-around">
                <button wire:click="newCity()" class="p-2 bg-blue-500 rounded">Add City</button>
                <button wire:click="addCompanies()" class="p-2 bg-blue-500 mt-2 rounded">Add New Companies</button>
            </div>
        </div>
    </section>
</div>
