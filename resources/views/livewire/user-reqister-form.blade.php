<div class="bg-white border border-gray-200 rounded-xl p-5 md:p-6 shadow-sm w-full lg:w-1/2 h-fit">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
                <h2 class="text-xl font-bold text-gray-800">
                    Tambah User
                </h2>

                <div class="flex flex-wrap gap-2">

                    {{-- RANDOM USER --}}
                    <button
                        wire:click="createRandomUser"
                        type="button"
                        class="text-white bg-teal-800 hover:bg-teal-900 py-2 px-3 rounded text-sm font-bold cursor-pointer transition flex gap-2 items-center justify-center"
                    >
                        <span
                            wire:loading
                            wire:target="createRandomUser"
                            class="inline-block size-4 border-l-indigo-500 border-b-indigo-500 border-2 rounded-full animate-spin"
                        ></span>

                        <span>Random</span>
                    </button>

                    {{-- CLEAR --}}
                    <button
                        wire:click="clearUser"
                        type="button"
                        class="text-white bg-red-800 hover:bg-red-900 py-2 px-3 rounded text-sm font-bold cursor-pointer transition flex gap-2 items-center justify-center"
                    >
                        <span
                            wire:loading
                            wire:target="clearUser"
                            class="inline-block size-4 border-l-indigo-500 border-b-indigo-500 border-2 rounded-full animate-spin"
                        ></span>

                        <span>Bersihin</span>
                    </button>

                </div>
            </div>

            {{-- FLASH MESSAGE --}}
           @if (session('success'))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    wire:key="success-{{ now()->timestamp }}"
                    class="flex items-center gap-3 p-3 mb-5 bg-teal-50 border border-teal-200 text-teal-800 rounded-lg text-sm"
                >
                    <p class="flex-1">
                        {{ session('success') }}
                    </p>

                    <button
                        @click="show = false"
                        type="button"
                        class="text-teal-600 hover:text-teal-800 cursor-pointer transition"
                    >
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif

            {{-- FORM --}}
            <form wire:submit="addNewUser" class="space-y-5">
                
                {{-- AVATAR --}}
                <div class="flex items-center gap-4">
                    <label for="avatar" class="cursor-pointer group shrink-0 relative">
                        @if ($avatar)
                            <button
                                wire:click="resetPreviewAvatar"
                                type="button"
                                class="text-white bg-red-400 hover:bg-red-600 size-5 rounded-full text-xs cursor-pointer transition absolute right-0 top-0"
                                >
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        @endif

                        <div class="w-24 h-24 md:w-28 md:h-28 rounded-full border-2 border-dashed border-gray-300 group-hover:border-teal-600 flex items-center justify-center overflow-hidden bg-gray-50 transition">

                            @if ($avatar)
                                <img
                                    class="h-full w-full object-cover"
                                    src="{{ $avatar->temporaryUrl() }}"
                                    alt="Preview avatar"
                                >
                            @else
                                <svg
                                    class="w-7 h-7 text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2"
                                    />
                                </svg>
                            @endif

                        </div>

                        <input
                            id="avatar"
                            type="file"
                            wire:model="avatar"
                            accept="image/png, image/jpeg, image/jpg"
                            class="hidden"
                        >
                    </label>

                    <div class="text-sm">
                        <p class="font-medium text-gray-700">
                            Foto Avatar
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            PNG, JPG (Maks. 5MB)
                        </p>

                        @error('avatar')
                            <span class="text-red-500 text-xs">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                </div>

                {{-- NAME --}}
                <div>
                    <input
                        wire:model="name"
                        type="text"
                        placeholder="Nama"
                        class="w-full border border-gray-300 p-2.5 rounded-lg text-sm focus:outline-none focus:border-teal-600 focus:ring-1 focus:ring-teal-600"
                    >

                    @error('name')
                        <span class="text-red-500 text-xs">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div>
                    <input
                        wire:model="email"
                        type="email"
                        placeholder="Email"
                        class="w-full border border-gray-300 p-2.5 rounded-lg text-sm focus:outline-none focus:border-teal-600 focus:ring-1 focus:ring-teal-600"
                    >

                    @error('email')
                        <span class="text-red-500 text-xs">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div x-data="{ show: false }">

                    <div class="relative">

                        <input
                            wire:model="password"
                            x-bind:type="show ? 'text' : 'password'"
                            placeholder="Password"
                            class="w-full border border-gray-300 p-2.5 pr-11 rounded-lg text-sm focus:outline-none focus:border-teal-600 focus:ring-1 focus:ring-teal-600"
                        >

                        <button
                            type="button"
                            @click="show = !show"
                            class="absolute inset-y-0 right-0 px-3 text-gray-500 hover:text-gray-700 cursor-pointer"
                        >
                            <i :class="show ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
                        </button>

                    </div>

                    @error('password')
                        <span class="text-red-500 text-xs">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                {{-- SUBMIT --}}
                <button
                    type="submit"
                    class="w-full text-white bg-teal-700 hover:bg-teal-800 px-4 py-2.5 rounded-lg text-sm font-semibold cursor-pointer transition flex gap-2 items-center justify-center"
                >
                    <span
                        wire:loading
                        wire:target="addNewUser"
                        class="inline-block size-4 border-l-white border-b-white border-2 rounded-full animate-spin"
                    ></span>

                    <span>Tambah User</span>
                </button>

            </form>

        </div>