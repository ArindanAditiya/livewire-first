<div class="max-w-2xl mx-auto mt-10">

        <div class="bg-white border border-gray-200 rounded-xl p-5 md:p-6 shadow-sm">

            {{-- HEADER --}}
            <div class="mb-5">
                <h2 class="text-xl font-bold text-gray-800">
                    Hubungi Kami
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Ada pertanyaan? Kirim pesan dan kami akan segera membalas.
                </p>
            </div>

            {{-- FLASH MESSAGE --}}
            @if (session('success'))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    class="flex items-center gap-3 p-3 mb-5 bg-teal-50 border border-teal-200 text-teal-800 rounded-lg text-sm"
                >
                    <p class="flex-1">{{ session('success') }}</p>
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
            <form wire:submit="submitContact" class="space-y-5">
                @csrf

                {{-- EMAIL --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Email
                    </label>
                    <input
                        id="email"
                        type="email"
                        wire:model="form.email"
                        placeholder="nama@email.com"
                        class="w-full border border-gray-300 p-2.5 rounded-lg text-sm focus:outline-none focus:border-teal-600 focus:ring-1 focus:ring-teal-600 transition"
                    >  
                    @error('form.email')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- SUBJECT --}}
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Subject
                    </label>
                    <input
                        id="subject"
                        type="text"
                        wire:model="form.subject"
                        placeholder="Subjek pesan"
                        class="w-full border border-gray-300 p-2.5 rounded-lg text-sm focus:outline-none focus:border-teal-600 focus:ring-1 focus:ring-teal-600 transition"
                    >
                    @error('form.subject')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- MESSAGE --}}
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Message
                    </label>
                    <textarea
                        id="message"
                        wire:model="form.message"
                        rows="5"
                        placeholder="Tulis pesan kamu di sini..."
                        class="w-full border border-gray-300 p-2.5 rounded-lg text-sm focus:outline-none focus:border-teal-600 focus:ring-1 focus:ring-teal-600 transition resize-none"></textarea>
                    @error('form.message')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- SUBMIT --}}
                <button
                    type="submit"
                    class="w-full text-white bg-teal-700 hover:bg-teal-800 px-4 py-2.5 rounded-lg text-sm font-semibold cursor-pointer transition flex gap-2 items-center justify-center"
                >
                 <span
                            wire:loading
                            wire:target="submitContact"
                            class="inline-block size-4 border-l-indigo-500 border-b-indigo-500 border-2 rounded-full animate-spin"
                        ></span>
                    <i class="fa-solid fa-paper-plane"
                            wire:loading.remove
                            wire:target="submitContact"
                    ></i>
                    <span>Kirim Pesan</span>
                </button>

            </form>
        </div>
    </div>