<div class="w-1/2 m-auto my-10">
    <h1 class="text-3xl font-bold">{{ $title }}</h1>
    <h1 class="text-xl">Jumlah user sejumlah : {{ count($users) }}</h1>

    <button wire:click="createRandomUser" type="button"
        class="text-white bg-teal-800 hover:bg-teal-900 p-2 font-bold cursor-pointer mb-3">
        Tambahin User Random
    </button>
    <button wire:click="clearUser" type="button"
        class="text-white bg-red-800 hover:bg-red-900 p-2 font-bold cursor-pointer mb-3">
        Bersihin
    </button>

    <div>
        {{-- Form tambah user dalam satu row --}}
        <form wire:submit="addNewUser" class="flex flex-row gap-2 items-start mb-4">

            {{-- NAME --}}
            <div class="flex-1">
                <input
                    wire:model="name"
                    type="text"
                    placeholder="Name"
                    class="w-full border p-2 rounded"
                >
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- EMAIL --}}
            <div class="flex-1">
                <input
                    wire:model="email"
                    type="email"
                    placeholder="Email"
                    class="w-full border p-2 rounded"
                >
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- PASSWORD --}}
            <div class="flex-1">
                <div class="relative" x-data="{ show: false }">
                    <input
                        wire:model="password"
                        :type="show ? 'text' : 'password'"
                        placeholder="Password"
                        class="w-full border p-2 pr-10 rounded"
                    >
                    <button
                        type="button"
                        @click="show = !show"
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 hover:text-gray-900 cursor-pointer"
                    >
                        <i :class="show ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
                    </button>
                </div>
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button
                type="submit"
                class="text-white bg-teal-700 hover:bg-teal-800 p-2 font-bold cursor-pointer"
            >
                Tambah
            </button>
        </form>
    </div>

    <hr>

    <h1 class="text-xl font-bold">User List</h1>
    <ul class="list-disc">
        @foreach ($users as $user)
            <li class="mb-1">
                <button wire:click="deleteUser({{ $user->id }})"
                    class="p-0.1 border cursor-pointer">
                    hapus
                </button>
                <b>{{ $user->name }}</b> {{ $user->email }}
            </li>
        @endforeach
    </ul>
</div>