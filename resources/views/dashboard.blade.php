<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-lg font-semibold">
                        Halo, {{ auth()->user()->name }}
                    </h3>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Pilih halaman yang ingin dibuka.
                    </p>

                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                        <a href="{{ route('products.index') }}"
                           class="rounded-lg bg-indigo-600 p-5 text-white transition hover:bg-indigo-700">
                            <div class="font-semibold">Daftar Produk</div>
                            <div class="mt-1 text-sm text-indigo-100">Lihat semua produk</div>
                        </a>

                        <a href="{{ route('products.create') }}"
                           class="rounded-lg bg-emerald-600 p-5 text-white transition hover:bg-emerald-700">
                            <div class="font-semibold">Tambah Produk</div>
                            <div class="mt-1 text-sm text-emerald-100">Upload gambar produk</div>
                        </a>

                        <a href="{{ route('orders.index') }}"
                           class="rounded-lg bg-amber-500 p-5 text-white transition hover:bg-amber-600">
                            <div class="font-semibold">Pesanan</div>
                            <div class="mt-1 text-sm text-amber-100">Lihat order dan invoice PDF</div>
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="rounded-lg bg-sky-600 p-5 text-white transition hover:bg-sky-700">
                            <div class="font-semibold">Profil</div>
                            <div class="mt-1 text-sm text-sky-100">Ubah data akun</div>
                        </a>

                        @if (! auth()->user()->hasVerifiedEmail())
                            <a href="{{ route('verification.notice') }}"
                               class="rounded-lg bg-violet-600 p-5 text-white transition hover:bg-violet-700">
                                <div class="font-semibold">Verifikasi Email</div>
                                <div class="mt-1 text-sm text-violet-100">Kirim ulang link verifikasi</div>
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full rounded-lg bg-red-600 p-5 text-left text-white transition hover:bg-red-700">
                                <div class="font-semibold">Logout</div>
                                <div class="mt-1 text-sm text-red-100">Keluar dari aplikasi</div>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
