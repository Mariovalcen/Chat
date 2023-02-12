<div class="bg-gray-50 rounded-lg shadow border border-gray-200 overflow-hidden">

    <div class="grid grid-cols-3 divide-x divide-gray-200">

       

        <div class="col-pan-1">

            <div class="bg-gray-100 h-16 flex items-center px-4">

                <img class="w-10 h-10 object-cover object-center" src="{{ auth()->user()->profile_photo_url}}" alt="{{ auth()->user()->name}}">

            </div>

            <div class="bg-white h-14 flex items-center px-4">
                <x-jet-input type="text"
                    wire:model="search"
                    class="w-full"
                    placeholder="Busque un chat o inicie uno nuevo"/>
            </div>

            <div class="h-[calc(100vh-10.5rem)] overflow-auto border-t border-gray-200">
                <div class="px-4 py-3">
                    <h2 class="text-teal-600 text-lg mb-4">Contactos</h2>

                <ul class="space-y4">
                    @forelse ($this->contacts as $contact)
                    <li class="cursor-pointer p-2">
                        <div class="flex">
                            <figure class="flex-shrink-0">
                                <img class="h-12 w-12 object-cover object-center rounded-full " src="{{ $contact->user->profile_photo_url}}" alt="{{$contact->name}}">
                            </figure>
                            <div class="flex-1 ml-5 border-b gray-200">
                                <p class="text-gray-800">
                                    {{ $contact->name}}
                                </p>
                                <p class="text-gray-400">
                                    {{ $contact->user->email}}
                                </p>

                            </div>
                        </div>

                    </li>
                    @empty

                    @endforelse

                </ul>
              </div>  
            </div>

        </div>

        <div class="col-span-2">

        </div>

    </div>

</div>
