@extends('layouts.master')
@section('content')
    <!-- Page-content -->
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Players</h5>
                    <p class="text-slate-500 dark:text-zink-300">Browse the registered player roster.</p>
                </div>
                <div class="shrink-0">
                    <a href="{{ route('players.create') }}" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                        <i data-lucide="plus" class="inline-block size-4"></i> <span class="align-middle">Add Player</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
                <div class="xl:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" border-separate table-custom border-spacing-y-1 datatable">
                                    <thead class="text-left">
                                        <tr class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent">
                                            <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Name</th>
                                            <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Age</th>
                                            <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Batch</th>
                                            <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Status</th>
                                            <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @forelse($players as $player)
                                            <tr class="relative rounded-md after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent">
                                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                    <div class="flex items-center gap-2">
                                                        @if($player->profile_url)
                                                            <img src="{{ asset($player->profile_url) }}" alt="{{ $player->name }}" class="h-10 rounded-full">
                                                        @else
                                                            <div class="flex items-center justify-center w-10 h-10 text-sm font-medium rounded-full bg-slate-200 text-slate-800 dark:bg-zink-600 dark:text-zink-100">
                                                                {{ strtoupper(substr($player->name, 0, 1)) }}
                                                            </div>
                                                        @endif
                                                        <div class="grow">
                                                            <h6 class="mb-1"><a href="{{ route('players.show', $player) }}" class="text-custom-500 hover:text-custom-600">{{ $player->name }}</a></h6>
                                                            <p class="text-slate-500 dark:text-zink-200">{{ $player->date_of_birth ? \Carbon\Carbon::parse($player->date_of_birth)->format('d M, Y') : 'DOB N/A' }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $player->age ?? '—' }}</td>
                                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $player->batch ?? '—' }}</td>
                                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                    <span class="px-2.5 py-0.5 rounded border text-xs font-medium {{ $player->status === 'ACTIVE' ? 'bg-green-100 text-green-500 border-transparent dark:bg-green-500/20 dark:text-green-200' : ($player->status === 'INJURED' ? 'bg-yellow-100 text-yellow-500 border-transparent dark:bg-yellow-500/20 dark:text-yellow-200' : 'bg-slate-100 text-slate-500 border-transparent dark:bg-slate-500/20 dark:text-zink-200') }}">
                                                        {{ $player->status ?? 'Unknown' }}
                                                    </span>
                                                </td>
                                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                    <div class="flex items-center gap-2">
                                                        <a class="flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500" href="pages-account.html">
                                                            <i data-lucide="eye" class="inline-block size-3"></i>
                                                        </a>
                                                        <a class="flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500" href="pages-account.html">
                                                            <i data-lucide="pencil" class="inline-block size-3"></i>
                                                        </a>
                                                        <form action="{{ route('players.destroy', $player) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="text-red-500 hover:text-red-600 flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500" href="pages-account.html">
                                                                <i data-lucide="trash" class="inline-block size-3"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="px-3.5 py-5 text-center text-slate-500 dark:text-zink-300">No players found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                @if($players->isEmpty())
                                    <div class="noresult py-6 text-center">
                                        <i data-lucide="search" class="w-6 h-6 mx-auto text-sky-500 fill-sky-100 dark:fill-sky-500/20"></i>
                                        <h5 class="mt-2">Sorry! No players found</h5>
                                        <p class="mb-0 text-slate-500 dark:text-zink-200">There are no players in the roster yet.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                    </div><!--end card-->
                </div>
                
            </div><!--end grid-->
        </div>
        <!-- container-fluid -->
    </div>
@endsection
