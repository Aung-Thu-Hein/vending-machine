<x-layouts.auth-layout title="Login">
    <section class="py-3 lg:py-0 h-full flex justify-center items-center px-3 md:px-0">
        <div class="rounded-2xl border py-4 px-5">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-y-1 mb-5">
                    <label for="first_name">First Name</label>
                    <input type="first_name" name="first_name" placeholder="First Name"
                        class="px-4 py-2 border border-gray-500 rounded-md" value="{{ old('first_name') ?? '' }}" />
                    @error('first_name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-1 mb-5">
                    <label for="last_name">Last Name</label>
                    <input type="last_name" name="last_name" placeholder="Last Name"
                        class="px-4 py-2 border border-gray-500 rounded-md" value="{{ old('last_name') ?? '' }}" />
                    @error('last_name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-1 mb-5">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="example@gmail.com"
                        class="px-4 py-2 border border-gray-500 rounded-md" value="{{ old('email') ?? '' }}" />
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-1 mb-5">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter your password"
                        class="px-4 py-2 border border-gray-500 rounded-md" value="{{ old('password') ?? '' }}" />
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div >
                    <button type="submit" class="w-full px-2 py-2 rounded-md bg-adminPrimary text-white flex justify-center">Sign Up</button>
                </div>
            </form>
            @if(session()->has('error'))
                <p class="text-sm text-red-500 mt-1">{{ session()->get('error') }}</p>
            @endif
        </div>
    </section>
</x-layouts.auth-layout>
