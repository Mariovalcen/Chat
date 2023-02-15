<div class="bg-gray-50 rounded-lg shadow border border-gray-200 overflow-hidden">

    <div class="grid grid-cols-3 divide-x divide-gray-200">



        <div class="col-pan-1">

            <div class="bg-gray-100 h-16 flex items-center px-4">

                <img class="w-10 h-10 object-cover object-center" src="{{ auth()->user()->profile_photo_url }}"
                    alt="{{ auth()->user()->name }}">

            </div>

            <div class="bg-white h-14 flex items-center px-4">
                <x-jet-input type="text" wire:model="search" class="w-full"
                    placeholder="Busque un chat o inicie uno nuevo" />
            </div>

            <div class="h-[calc(100vh-10.5rem)] overflow-auto border-t border-gray-200">

                @if ($this->chats->count() == 0 || $search)


                    <div class="px-4 py-3">
                        <h2 class="text-teal-600 text-lg mb-4">Contactos</h2>

                        <ul class="space-y4">
                            @forelse ($this->contacts as $contact)
                                <li class="p-2 cursor-pointer" wire:click="open_chat_contact({{ $contact }})">
                                    <div class="flex">
                                        <figure class="flex-shrink-0">
                                            <img class="h-12 w-12 object-cover object-center rounded-full "
                                                src="{{ $contact->user->profile_photo_url }}"
                                                alt="{{ $contact->name }}">
                                        </figure>
                                        <div class="flex-1 ml-5 border-b gray-200">
                                            <p class="text-gray-800">
                                                {{ $contact->name }}
                                            </p>
                                            <p class="text-gray-400">
                                                {{ $contact->user->email }}
                                            </p>

                                        </div>
                                    </div>

                                </li>
                            @empty
                            @endforelse

                        </ul>
                    </div>
                @else
                    @foreach ($this->chats as $chatItem)
                        <div wire:key="chats-{{ $chatItem->id }}" wire:click="open_chat({{ $chatItem }})"
                            class="flex items-center justify-between {{ $chat && $chat->id == $chatItem->id ? 'bg-gray-200' : 'bg-white' }} hover:bg-gray-100 cursor-pointer px-3">

                            <figure>
                                <img src="{{ $chatItem->image }}"
                                    class="h-12 w-12 object-cover object-center rounded-full"
                                    alt="{{ $chatItem->name }}">
                            </figure>

                            <div class="w-[calc(100%-4rem)] py-4 border-b border-gray-200">

                                <div class="flex justify-between items-center">
                                    <p>
                                        {{ $chatItem->name }}
                                    </p>

                                    <p class="text-xs">
                                        {{ $chatItem->last_message_at->format('d-m-y h:i A') }}
                                    </p>
                                </div>
                                {{-- Esto va a mostrat el resumen ultimo chat en el div del usuario --}}
                                <p class="text-sm text-gray-700 mt-1 truncate">
                                    {{ $chatItem->messages->last()->body }}
                                </p>

                            </div>
                        </div>
                    @endforeach

                @endif
            </div>

        </div>

        <div class="col-span-2">

            @if ($contactChat || $chat)

                <div class="bg-gray-100 h-16 flex items-center px-3">

                    <figure>

                        @if ($chat)
                            <img class="w-10 h-10 rounded-full object-cover object-center" src="{{ $chat->image }}"
                                alt="{{ $chat->name }}">
                        @else
                            <img class="w-10 h-10 rounded-full object-cover object-center"
                                src="{{ $contactChat->user->profile_photo_url }}" alt="{{ $contactChat->name }}">
                        @endif

                    </figure>

                    <div class="ml-4">
                        <p class="text-gray-800">

                            @if ($chat)
                                {{ $chat->name }}
                            @else
                                {{ $contactChat->name }}
                            @endif

                        </p>
                        <p class="text-green-500 text-xs">
                            Online
                        </p>
                    </div>

                </div>

                <div class="h-[calc(100vh-11rem)] px-3 py-2 overflow-auto">
                    {{-- Contenido del chat --}}
                    @foreach ($this->messages as $message)
                        <div class="flex {{ $message->user_id == auth()->id() ? 'justify-end' : '' }} mb-2">

                            <div
                                class="rounded px-3 py-2 {{ $message->user_id == auth()->id() ? 'bg-green-100' : 'bg-gray-200' }} ">
                                <p class="text-sm">
                                    {{ $message->body }}
                                </p>

                                <p
                                    class="{{ $message->user_id == auth()->id() ? 'text-right' : '' }} text-xs text-gray-600 mt-1">
                                    {{ $message->created_at->format('d-m-y h:i A') }}
                                </p>
                            </div>

                        </div>
                    @endforeach

                    <span id="final"></span>
                </div>

                <form class="bg-gray-100 h-16 flex items-center px-4" wire:submit.prevent="sendMessage()">
                    <x-jet-input wire:model="bodyMessage" type="text" class="flex-1"
                        placeholder="Escriba su mensaje" />

                    <button class="flex-shrink-0 ml-4">
                        Enviar
                    </button>
                </form>
            @else
                <div class="w-full h-full flex justify-center items-center">
                </div>

            @endif
        </div>

        @push('js')
            <script>
                Livewire.on('scrollIntoView', function() {
                    document.getElementById('final').scrollIntoView(true);
                });
            </script>
        @endpush
    </div>

</div>
