<section>
    <div x-data="data()" class="shadow border overflow-hidden ms-lg-5 me-lg-5  d-lg-none" id="color-gray_50">
            <div class="container-fluid m-0 p-0">
                    <div class="row m-0 w-100">
                        @if ($contactChat || $chat)
                            <div class="py-2 ps-0 border-right pe-0 d-flex align-items-center border-bottom"
                                id="main-chat_container">
                                <figure>
            
                                    @if ($chat)
                                        @if ($chat->imageChat == null)
                                            <img class="rounded-circle ms-2" id="img-user_chat"
                                                src="{{ asset('images/user-profile.png') }}" alt="{{ $chat->name }}" />
                                        @else
                                            <img class="rounded-circle ms-2" id="img-user_chat"
                                                src="../storage/images_users/{{ $chat->imageChat }}" alt="{{ $chat->name }}">
                                        @endif
                                    @else
                                        @if ($contactChat->user->image)
                                            <img src="../storage/images_users/{{ $contactChat->user->image }}"
                                                alt="{{ $contactChat->name }}" class="rounded-circle ms-2" id="img-user_chat">
                                        @else
                                            <img class="rounded-circle ms-2" id="img-user_chat"
                                                src="{{ asset('images/user-profile.png') }}" alt="{{ $contactChat->name }}" />
                                        @endif
                                    @endif
            
                                </figure>
            
                                <div class="ms-2">
                                    <p class="fs-6 fw-bold m-0">
                                        @if ($chat)
                                            {{ $chat->name }}
                                        @else
                                            {{ $contactChat->name }}
                                        @endif
                                    </p>
                                    <p class="text-secondary fw-bold fs-6 m-0" x-show="chat_id == typingChatId">
                                        Escribiendo ...
                                    </p>
            
                                    <p class="text-success fw-bold fs-6 m-0" x-show="chat_id != typingChatId">
                                        online
                                    </p>
                                </div>
                            </div>
                            <div class="overflow-auto" id="message-container_mobile">
                                @foreach ($this->messages as $message)
                                    <div
                                        class="d-flex {{ $message->user_id == auth()->id() ? 'justify-content-end' : '' }} mb-1 mt-1">
                                        @if ($message->user_id == auth()->id())
                                            <div class="rounded px-3 py-2 me-2 text-break" style="max-width: 50%;" id="color-send">
                                                <p class="m-0 ">
                                                    {{ $message->body }}
                                                </p>
                                                <p class="m-0 text-muted text-end mt-1">
                                                    {{ $message->created_at->format('h:i A') }}
                                                </p>
                                            </div>
                                        @else
                                            <div class="rounded px-1 py-1 ms-1 text-break" style="max-width: 50%;"
                                                id="color-received">
                                                <p class="m-0 ">
                                                    {{ $message->body }}
                                                </p>
                                                <p class=" mt-1">
                                                    {{ $message->created_at->format('h:i A') }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                                <span id="final"></span>
                            </div>
                            <form class="d-flex align-items-center" id="color-gray_mobile" wire:submit.prevent="sendMessage()">
            
                                <input type="text" class="form-control pt-1" wire:model="bodyMessage"
                                    placeholder="Escribe un mensaje">
            
                                <button class="btn ms-1">
                                    <img src="{{ asset('images/enviar-mensaje.png') }}" alt="">
                                </button>
            
                            </form>
                        @else
                            <div class="py-2 ps-0 border-right pe-0 " id="main-chat_container">
                                <div class="d-flex align-items-center justify-content-between px-4 pb-2" class="color-gray_100">
                                    @if (Auth::user()->image)
                                        <img src="../storage/images_users/{{ Auth::user()->image }}" class="rounded-circle"
                                            id="img-user_chat">
                                    @else
                                        <img class="rounded-circle" id="img-user_chat"
                                            src="{{ asset('images/user-profile.png') }}" />
                                    @endif
                                    <a class="btn btn-outline-primary " href="{{ route('contacts.index') }}">Contactos</a>
                                </div>
                                <div class="bg-white d-flex align-items-center p-3 border-top ">
                                    <input class="form-control rounded" type="text" wire:model="search"
                                        placeholder="Busque un chat o inicie uno nuevo">
                                </div>
                                <div id="chats-container_mobile" class="border-top overflow-auto">
            
                                    @if ($this->chats->count() == 0 || $search)
                                        <div class="px-2 py-1">
                                            <h2 class="text-primary mb-2 fs-5">Contactos</h2>
                                        </div>
            
                                        <ul class="list-group">
                                            @forelse ($this->contacts as $contact)
                                                <li class="list-group-item list-group-item-action pe-1 ps-1"
                                                    wire:click="open_chat_contact({{ $contact }})">
                                                    <div class="d-flex">
                                                        <figure>
                                                            @if ($contact->user->image)
                                                                <img src="../storage/images_users/{{ $contact->user->image }}"
                                                                    class="rounded-circle" id="img-user_chat"
                                                                    alt="{{ $contact->name }}" />
                                                            @else
                                                                <img class="rounded-circle" id="img-user_chat"
                                                                    src="{{ asset('images/user-profile.png') }}"
                                                                    alt="{{ $contact->name }}" />
                                                            @endif
                                                        </figure>
                                                        <div class="ms-3">
                                                            <p class="fs-6 fw-bold m-0">
                                                                {{ $contact->name }}
                                                            </p>
                                                            <p class="fs-6 text-muted m-0">
                                                                {{ $contact->user->email }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    @else
                                        @foreach ($this->chats as $chatItem)
                                            <ul class="list-group">
                                                <li class="pe-auto list-group-item list-group-item-action pe-1 ps-1"
                                                    wire:click="open_chat({{ $chatItem }})"
                                                    wire:key="chats-{{ $chatItem->id }}">
                                                    <div class="d-flex align-items-center ">
                                                        <figure>
                                                            @if ($chatItem->imageChat)
                                                                <img src="../storage/images_users/{{ $chatItem->imageChat }}"
                                                                    class="rounded-circle me-2" id="img-user_chat"
                                                                    alt="{{ $chatItem->name }}" />
                                                            @else
                                                                <img class="rounded-circle me-2" id="img-user_chat"
                                                                    src="{{ asset('images/user-profile.png') }}"
                                                                    alt="{{ $chatItem->name }}" />
                                                            @endif
                                                        </figure>
            
                                                        <div class="">
                                                            <div class="d-flex align-items-center">
                                                                <p class="fs-6 fw-bold m-0">
                                                                    {{ $chatItem->name }}
                                                                </p>
                                                                <p class="fs-6 text-muted m-0">
                                                                    {{ $chatItem->last_message_at->format('h:i A') }}
                                                                </p>
                                                            </div>
            
                                                            <p class="fs-4 text-truncate">
                                                                {{ $chatItem->messages->last()->body }}
                                                            </p>
            
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
    </div>
    <div x-data="data()" class="shadow border overflow-hidden ms-lg-5 me-lg-5 d-none d-lg-block" id="color-gray_50">
            <div class="container-fluid m-0 p-0">
                <div class="row m-0 w-100">
                    <div class="col-4 py-2 ps-0 border-right pe-0 " id="main-chat_container">
                        <div class="d-flex align-items-center justify-content-between px-4 pb-2" class="color-gray_100">
                            @if (Auth::user()->image)
                                <img src="../storage/images_users/{{ Auth::user()->image }}" class="rounded-circle"
                                    id="img-user_chat">
                            @else
                                <img class="rounded-circle" id="img-user_chat"
                                    src="{{ asset('images/user-profile.png') }}" />
                            @endif
                            <a class="btn btn-outline-primary fs-4" href="{{ route('contacts.index') }}">Contactos</a>
                        </div>
                        <div class="bg-white d-flex align-items-center p-3 border-top ">
                            <input class="form-control fs-3 rounded" type="text" wire:model="search"
                                placeholder="Busque un chat o inicie uno nuevo">
                        </div>
                        <div id="chats-container" class="border-top overflow-auto">
    
                            @if ($this->chats->count() == 0 || $search)
                                <div class="px-4 py-3">
                                    <h2 class="text-primary mb-2 fs-2">Contactos</h2>
                                </div>
    
                                <ul class="list-group">
                                    @forelse ($this->contacts as $contact)
                                        <li class="pe-auto list-group-item list-group-item-action"
                                            wire:click="open_chat_contact({{ $contact }})">
                                            <div class="d-flex">
                                                <figure>
                                                    @if ($contact->user->image)
                                                        <img src="../storage/images_users/{{ $contact->user->image }}"
                                                            class="rounded-circle" id="img-user_chat"
                                                            alt="{{ $contact->name }}" />
                                                    @else
                                                        <img class="rounded-circle" id="img-user_chat"
                                                            src="{{ asset('images/user-profile.png') }}"
                                                            alt="{{ $contact->name }}" />
                                                    @endif
                                                </figure>
                                                <div class="ms-3">
                                                    <p class="fs-4 fw-bold m-0">
                                                        {{ $contact->name }}
                                                    </p>
                                                    <p class="fs-5 text-muted m-0">
                                                        {{ $contact->user->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            @else
                                @foreach ($this->chats as $chatItem)
                                    <ul class="list-group">
                                        <li class="pe-auto list-group-item list-group-item-action"
                                            wire:key="chats-{{ $chatItem->id }}"
                                            wire:click="open_chat({{ $chatItem }})">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <figure>
                                                    @if ($chatItem->imageChat)
                                                        <img src="../storage/images_users/{{ $chatItem->imageChat }}"
                                                            class="rounded-circle" id="img-user_chat"
                                                            alt="{{ $chatItem->name }}" />
                                                    @else
                                                        <img class="rounded-circle" id="img-user_chat"
                                                            src="{{ asset('images/user-profile.png') }}"
                                                            alt="{{ $chatItem->name }}" />
                                                    @endif
                                                </figure>
    
                                                <div class="" id="flex-1">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                       <div>
                                                        <p class="fs-4 fw-bold m-0">
                                                            {{ $chatItem->name }}
                                                        </p>
                                                        <p class="fs-4 text-truncate">
                                                            {{ $chatItem->messages->last()->body }}
                                                        </p>
                                                       </div>
                                                        <div class="text-end fs-5">
                                                            <p class="text-muted m-0">
                                                                {{ $chatItem->last_message_at->format('h:i A') }}
                                                            </p>
                                                            @if ( $chatItem->unread_messages)
                                                                <span class="badge bg-primary rounded-pill">{{ $chatItem->unread_messages }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
    
                                                    
    
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
    
                        </div>
                    </div>
                    <div class="col-8 p-0">
    
                        @if ($contactChat || $chat)
    
                            <div class="d-flex align-items-center px-2 py-2" id="top-chat_container">
                                <figure>
    
                                    @if ($chat)
                                        @if ($chat->imageChat == null)
                                            <img class="rounded-circle" id="img-user_chat"
                                                src="{{ asset('images/user-profile.png') }}"
                                                alt="{{ $chat->name }}" />
                                        @else
                                            <img class="rounded-circle" id="img-user_chat"
                                                src="../storage/images_users/{{ $chat->imageChat }}"
                                                alt="{{ $chat->name }}">
                                        @endif
                                    @else
                                        @if ($contactChat->user->image)
                                            <img src="../storage/images_users/{{ $contactChat->user->image }}"
                                                alt="{{ $contactChat->name }}" class="rounded-circle" id="img-user_chat">
                                        @else
                                            <img class="rounded-circle" id="img-user_chat"
                                                src="{{ asset('images/user-profile.png') }}"
                                                alt="{{ $contactChat->name }}" />
                                        @endif
                                    @endif
    
                                </figure>
                                <div class="ms-2">
                                    <p class="fs-3 fw-bold m-0">
                                        @if ($chat)
                                            {{ $chat->name }}
                                        @else
                                            {{ $contactChat->name }}
                                        @endif
                                    </p>
                                    @if ($this->active)
                                    <p class="fw-bold fs-5 m-0" x-show="chat_id != typingChatId" id="online">
                                        En línea
                                    </p>
                                    @else
                                    <p class="fw-bold fs-5 m-0" x-show="chat_id != typingChatId" id="offline">
                                        Desconectado
                                    </p>
                                    @endif
                                    <p class="text-secondary fw-bold fs-5 m-0" x-show="chat_id == typingChatId">
                                        Escribiendo ...
                                    </p>
                                </div>
                            </div>
    
                            <div class="overflow-auto" id="message-container">
                                @foreach ($this->messages as $message)
                                    <div class="d-flex {{ $message->user_id == auth()->id() ? 'justify-content-end' : '' }} mb-2 mt-2">
                                        @if ($message->user_id == auth()->id())
                                            <div class="rounded px-3 py-2 me-5 text-break" style="max-width: 50%;"
                                                id="color-send">
                                                <p class="m-0 fs-4 ">
                                                    {{ $message->body }}
                                                </p>
                                                <p class="text-muted fs-5 text-end mt-1">
                                                    {{ $message->created_at->format('h:i A') }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all {{ $message->is_read ? 'text-primary' : 'text-secondary' }}" viewBox="0 0 16 16">
                                                        <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                                      </svg>
                                                </p>
                                            </div>
                                        @else
                                            <div class="rounded px-3 py-2 ms-3 text-break" style="max-width: 50%;"
                                                id="color-received">
                                                <p class="m-0 fs-4 ">
                                                    {{ $message->body }}
                                                </p>
                                                <p class="fs-5 mt-1">
                                                    {{ $message->created_at->format('h:i A') }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                                <span id="final_1"></span>
                            </div>
                            <form class="d-flex align-items-center" id="color-gray_100_2"
                                wire:submit.prevent="sendMessage()">
    
                                <input type="text" class="form-control fs-3 pt-2" wire:model="bodyMessage"
                                    placeholder="Escribe un mensaje">
    
                                <button class="btn ms-1">
                                    <img src="{{ asset('images/enviar-mensaje.png') }}" alt="">
                                </button>
    
                            </form>
                        @else
                            <div class="d-flex justify-content-center align-items-center ms-5" id="img-default">
                                <div class="">
                                    <img src="{{ asset('images/messages-icon.png') }}" alt="">
                                    <h1 class="text-center text-muted mt-5">MENSAJES CRAL101</h1>
                                </div>
                            </div>
    
                        @endif
                    </div>
                </div>
            </div>
    </div>
</section>
    

    @push('js')
        <script>
            function data() {
                return {
                    chat_id: @entangle('chat_id'),
                    typingChatId: null,

                    init() {
                        Echo.private('App.Models.User.' + {{ auth()->id() }})
                            .notification((notification) => {
                                if (notification.type == 'App\\Notifications\\UserTyping') {
                                    this.typingChatId = notification.chat_id;
                                    setTimeout(() => {
                                        this.typingChatId = null;
                                    }, 3000);
                                }
                            });

                    }
                }
            }

            Livewire.on('scrollIntoView', function() {
                document.getElementById('final').scrollIntoView(true);
            });
            Livewire.on('scrollIntoView', function() {
            document.getElementById('final_1').scrollIntoView(true);
        });
        </script>
    @endpush
