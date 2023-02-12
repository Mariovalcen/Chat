<div class="bg-gray-50 rounded-lg shadow border border-gray-200 overflow-hidden">

    <div class="grid grid-cols-3 divide-x divide-gray-200">

       

        <div class="col-pan-1">

            <div class="bg-gray-100 h-16 flex items-center px-4">

                <img class="w-10 h-10 object-cover object-center" src="{{ auth()->user()->profile_photo_url}}" alt="{{ auth()->user()->name}}">

            </div>

            <div class="bg-white h-14 flex items-center px-4">
                <x-jet-input type="text"
                    class="w-full"
                    placeholder="Busque un chat o inicie uno nuevo"/>
            </div>

            <div class="h-[calc(100vh-10.5rem)] overflow-auto border-t border-gray-200">
                
            </div>

        </div>

        <div class="col-span-2">

        </div>

    </div>

</div>
