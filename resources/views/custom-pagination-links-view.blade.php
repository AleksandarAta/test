<div>

    @if ($paginator->hasPages())
       

        <div class="flex flex-row w-full justify-end items-end -m-1.5">
           
    
       

            {{-- prev button --}}
                @if ($paginator->onFirstPage())
            
                    <div class="py-2 px-1.5 mr-2">
                        <a href="#" class="inline-block w-6 h-6 rounded-md text-center text-gray-500 text-bold text-sm leading-5.5 hover:bg-gray-100 transition-all">
                            <svg class="inline-block align-middle" width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.30039 5.99999L6.80039 2.49999C7.20039 2.09999 7.20039 1.49999 6.80039 1.09999C6.40039 0.699988 5.80039 0.699988 5.40039 1.09999L1.20039 5.29999C0.800391 5.69999 0.800391 6.29999 1.20039 6.69999L5.40039 10.9C5.60039 11.1 5.80039 11.2 6.10039 11.2C6.40039 11.2 6.60039 11.1 6.80039 10.9C7.20039 10.5 7.20039 9.89999 6.80039 9.49999L3.30039 5.99999Z" fill="#6B7280"/>
                            </svg>
                        </a>
                    </div>
                @else
                
                    <div class="py-2 px-1.5 mr-2">
                        <button wire:click="previousPage" wire:loading.attr="disabled" class="inline-block w-6 h-6 rounded-md text-center text-gray-500 text-bold text-sm leading-5.5 hover:bg-gray-100 transition-all">
                            <svg class="inline-block align-middle" width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.30039 5.99999L6.80039 2.49999C7.20039 2.09999 7.20039 1.49999 6.80039 1.09999C6.40039 0.699988 5.80039 0.699988 5.40039 1.09999L1.20039 5.29999C0.800391 5.69999 0.800391 6.29999 1.20039 6.69999L5.40039 10.9C5.60039 11.1 5.80039 11.2 6.10039 11.2C6.40039 11.2 6.60039 11.1 6.80039 10.9C7.20039 10.5 7.20039 9.89999 6.80039 9.49999L3.30039 5.99999Z" fill="#6B7280"/>
                            </svg>
                        </button>
                    </div>
                @endif

            {{-- end prev button --}}

            
            {{--pages--}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    
                    <div class="py-2 px-1.5 hidden md:inline-block">
                        <a href="#" class="inline-block w-6 h-6 rounded-md text-center text-gray-500 text-bold text-sm leading-6 hover:bg-gray-100 transition-all">
                            ...
                        </a>
                    </div>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)

                
                    <span >
                        @if ($page == $paginator->currentPage())
                            <div class="py-2 px-1.5">
                                <a href="#" class="inline-block w-6 h-6 rounded-md text-center leading-6 bg-blue-500 text-white text-sm font-bold hover:bg-blue-500 transition-all">{{ $page }}</a>
                            </div>
                       
                        @else
                          

                            <div class="py-2 px-1.5 hidden md:inline-block">
                                <button wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" class="inline-block w-6 h-6 rounded-md text-center text-gray-500 text-bold text-sm leading-6 hover:bg-gray-100 transition-all">
                                    {{ $page }}
                                </a>
                            </div>
                        @endif
                    </span>
                       


                    @endforeach 
                @endif
            @endforeach

           
           
          

             {{--end pages--}}

              {{-- next button --}}
           

            @if ($paginator->hasMorePages())
              

                <div class="py-2 px-1.5 ml-2">
                    <button wire:click="nextPage" wire:loading.attr="disabled" class="inline-block w-6 h-6 rounded-md text-center text-gray-500 text-bold text-sm leading-5.5 hover:bg-gray-100 transition-all">
                        <svg class="inline-block align-middle" width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.69961 6.00001L1.19961 9.50001C0.799609 9.90001 0.799609 10.5 1.19961 10.9C1.59961 11.3 2.19961 11.3 2.59961 10.9L6.79961 6.70001C7.19961 6.30001 7.19961 5.70001 6.79961 5.30001L2.59961 1.10001C2.39961 0.900013 2.19961 0.800011 1.89961 0.800011C1.59961 0.800011 1.39961 0.900012 1.19961 1.10001C0.79961 1.50001 0.79961 2.10001 1.19961 2.50001L4.69961 6.00001Z" fill="#6B7280"/>
                        </svg>
                    </button>
                </div>
            @else
                <div class="py-2 px-1.5 ml-2">
                    <a href="#" class="inline-block w-6 h-6 rounded-md text-center text-gray-500 text-bold text-sm leading-5.5 hover:bg-gray-100 transition-all">
                        <svg class="inline-block align-middle" width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.69961 6.00001L1.19961 9.50001C0.799609 9.90001 0.799609 10.5 1.19961 10.9C1.59961 11.3 2.19961 11.3 2.59961 10.9L6.79961 6.70001C7.19961 6.30001 7.19961 5.70001 6.79961 5.30001L2.59961 1.10001C2.39961 0.900013 2.19961 0.800011 1.89961 0.800011C1.59961 0.800011 1.39961 0.900012 1.19961 1.10001C0.79961 1.50001 0.79961 2.10001 1.19961 2.50001L4.69961 6.00001Z" fill="#6B7280"/>
                        </svg>
                    </a>
                </div>
            @endif

            {{--end next btn --}}
        </div>
    @endif
</div>
