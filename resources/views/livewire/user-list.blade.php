<div wire:poll.keep-alive class="bg-white border border-gray-200 rounded-xl p-5 md:p-6 shadow-sm w-full lg:w-1/2">

            {{-- HEADER --}}
            <div>
                <h2 class="text-xl font-bold text-gray-800">
                    User List
                </h2>   
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
                {{-- SEARCH --}}
                <form wire:submit="searchUser" class="flex gap-2 w-full sm:w-80">
                    <input
                        wire:model.live.debounce.225ms="query"
                        type="search"
                        placeholder="Cari user..."
                        class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:border-teal-600 focus:ring-1 focus:ring-teal-600 transition-colors"
                    >
                    <button type="submit" class="shrink-0 text-white bg-teal-600 hover:bg-teal-700 px-4 py-2 rounded-lg text-sm font-medium cursor-pointer transition-colors flex gap-2 items-center justify-center">
                        <span
                            wire:loading
                            wire:target="query"
                            class="size-4 border-2 border-white/30 border-t-white rounded-full animate-spin"
                        ></span>
                        <i wire:loading.remove wire:target="query" class="fa-solid fa-magnifying-glass"></i>
                        <span class="hidden md:inline-block">Cari</span>
                    </button>
                </form>
            </div>

            {{-- USER LIST --}}
            {{ $this->users->links() }}
            <div class="space-y-3 my-3">

                @forelse ($this->users as $user)

                    <div
                        wire:key="user-{{ $user->id }}"
                        class="flex items-center gap-3 p-3 border border-gray-100 rounded-lg hover:border-teal-200 hover:bg-gray-50 transition"
                    >

                        {{-- AVATAR --}}
                        <img
                            src="{{ $user->avatar ?? asset('img/default-avatar.jpg') }}"
                            alt="{{ $user->name }}"
                            class="w-11 h-11 rounded-full object-cover border-2 border-teal-500 shrink-0"
                        >

                        {{-- DATA --}}
                        <div class="flex-1 min-w-0">

                            <p class="font-semibold text-gray-800 truncate">
                                {{ $user->name }}
                            </p>

                            <p class="text-sm text-gray-500 truncate">
                                {{ $user->email }}
                            </p>

                        </div>

                        {{-- DELETE --}}
                        <button
                            wire:click="deleteUser({{ $user->id }})"
                            type="button"
                            class="shrink-0 text-white bg-red-700 hover:bg-red-800 px-3 py-2 rounded-lg text-xs font-semibold cursor-pointer transition flex gap-1 items-center justify-center"
                        >
                            <span
                                wire:loading
                                wire:target="deleteUser({{ $user->id }})"
                                class="inline-block size-3 border-l-white border-b-white border-2 rounded-full animate-spin"
                            ></span>

                            <span class="hidden sm:block">
                                Hapus
                            </span>

                            <i class="fa-solid fa-trash sm:hidden"></i>
                        </button>

                    </div>

                @empty

                    <div class="text-center py-10 text-gray-400">
                        <i class="fa-solid fa-users text-3xl mb-3"></i>

                        <p class="text-sm">
                            User tidak ditemukan.
                        </p>
                    </div>

                @endforelse

            </div>
            {{ $this->users->links() }}
        </div>