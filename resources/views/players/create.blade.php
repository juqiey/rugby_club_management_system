@extends('layouts.master')
@section('content')
    <!-- Page-content -->
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">New Player</h5>
                    <p class="text-slate-500 dark:text-zink-300">Register new player to the team.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
                <div class="xl:col-span-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('players.store') }}" method="POST">
                                @csrf

                                <!-- ========================= -->
                                <!-- Player Information -->
                                <!-- ========================= -->
                                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-8">

                                <!-- ============================= -->
                                <!-- Player Information -->
                                <!-- ============================= -->
                                <div class="lg:col-span-8">

                                    <div class="card h-full">
                                        <div class="card-body">

                                            <h5 class="mb-1 text-lg font-semibold">
                                                Player Information
                                            </h5>

                                            <p class="mb-6 text-slate-500">
                                                Enter the player's personal information.
                                            </p>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                                <!-- Name -->
                                                <div>
                                                    <label class="form-label">Player Name</label>

                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-input"
                                                        oninput="this.value = this.value.toUpperCase();"
                                                        required>
                                                </div>

                                                <!-- Batch -->
                                                <div>
                                                    <label class="form-label">Batch</label>

                                                    <input
                                                        type="text"
                                                        name="batch"
                                                        class="form-input">
                                                </div>

                                                <!-- DOB -->
                                                <div>
                                                    <label class="form-label">
                                                        Date of Birth
                                                    </label>

                                                    <input
                                                        type="date"
                                                        id="date_of_birth"
                                                        name="date_of_birth"
                                                        class="form-input">
                                                </div>

                                                <!-- Age -->
                                                <div>
                                                    <label class="form-label">
                                                        Age
                                                    </label>

                                                    <input
                                                        type="number"
                                                        id="age"
                                                        class="form-input bg-slate-100"
                                                        readonly>
                                                </div>

                                                <!-- Weight -->
                                                <div>
                                                    <label class="form-label">
                                                        Weight (kg)
                                                    </label>

                                                    <input
                                                        type="number"
                                                        step="0.1"
                                                        name="weight"
                                                        class="form-input">
                                                </div>

                                                <!-- Height -->
                                                <div>
                                                    <label class="form-label">
                                                        Height (cm)
                                                    </label>

                                                    <input
                                                        type="number"
                                                        step="0.1"
                                                        name="height"
                                                        class="form-input">
                                                </div>

                                                <!-- Status -->
                                                <div class="md:col-span-2">
                                                    <label class="form-label">
                                                        Status
                                                    </label>

                                                    <select
                                                        name="status"
                                                        class="form-select">

                                                        <option value="">Select Status</option>
                                                        <option value="ACTIVE">Active</option>
                                                        <option value="INACTIVE">Inactive</option>
                                                        <option value="INJURED">Injured</option>
                                                        <option value="SUSPENDED">Suspended</option>

                                                    </select>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                                    <!-- ============================= -->
                                    <!-- Profile Image -->
                                    <!-- ============================= -->
                                    <div class="lg:col-span-4">

                                        <div class="card h-full">
                                            <div class="card-body">

                                                <h5 class="mb-1 text-lg font-semibold">
                                                    Profile Image
                                                </h5>

                                                <p class="mb-6 text-slate-500">
                                                    Upload the player's profile picture.
                                                </p>

                                                <div class="text-center">

                                                    <img
                                                        id="imagePreview"
                                                        src="https://placehold.co/220x220?text=No+Image"
                                                        class="mx-auto h-52 w-52 rounded-lg border object-cover shadow-sm">

                                                    <input
                                                        type="file"
                                                        id="profile_image"
                                                        name="profile_image"
                                                        accept="image/*"
                                                        class="hidden">

                                                    <button
                                                        type="button"
                                                        class="btn mt-5 bg-custom-500 text-white"
                                                        onclick="document.getElementById('profile_image').click();">

                                                        Choose Image

                                                    </button>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <hr class="my-8">

                                <!-- ========================= -->
                                <!-- Playing Positions -->
                                <!-- ========================= -->

                                @foreach($positions as $format => $categories)

                                    <div class="mb-8">

                                        <h5 class="mb-4 text-xl font-bold text-custom-600">
                                            {{ $format }} Rugby
                                        </h5>


                                        @foreach($categories as $category => $items)

                                            <div class="mb-6">

                                                <h6 class="mb-3 text-base font-semibold">
                                                    {{ ucfirst(strtolower($category)) }}
                                                </h6>


                                                <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">

                                                    @foreach($items as $position)

                                                        <div class="position-card">

                                                            <input
                                                                type="checkbox"
                                                                class="hidden position-checkbox"
                                                                name="positions[]"
                                                                value="{{ $position->id }}"
                                                            >

                                                            <div class="position-content">

                                                                <i data-lucide="check-circle"
                                                                class="position-check hidden size-5 text-custom-500 mb-2">
                                                                </i>

                                                                <span>
                                                                    {{ $position->name }}
                                                                </span>

                                                            </div>

                                                        </div>

                                                    @endforeach

                                                </div>

                                            </div>

                                        @endforeach

                                    </div>

                                @endforeach

                                <!-- Buttons -->

                                <div class="mt-8 flex justify-end gap-3">

                                    <a href="{{ route('players.index') }}"
                                        class="btn bg-slate-100 text-slate-600">
                                        Cancel
                                    </a>

                                    <button
                                        type="submit"
                                        class="btn bg-custom-500 text-white">
                                        Save Player
                                    </button>

                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script src="{{ URL::to('assets/js/player_form.js') }}"></script>
    @endsection
@endsection