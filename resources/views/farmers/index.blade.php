<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="font-semibold capitalize text-xl leading-tight">
                {{ __('List of main livelihood') }}
            </h2>
            @include('farmers.partials.add-farmer', ['barangays' => $barangays])
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <table id="datatable-buttons" class="table">
                <thead>
                <tr>
                    <th class="text-center"><b>#</b></th>
                    <th class="text-center"><b>PROFILE</b></th>
                    <th class="text-center"><b>FULL NAME</b></th>
                    <th class="text-center"><b>GENDER</b></th>
                    <th class="text-center"><b>ADDRESS</b></th>
                    <th class="text-center"><b>ACTION</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($farmers as $farmer)
                    <tr class="hover">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">
                            <img src="{{ asset('uploads/profile_images/' . ($farmer->profile ?? 'default.png')) }}" id="profile-image" alt="Profile Image" class="rounded-circle" width="50" height="50">
                        </td>
                        <td class="text-center">{{ $farmer->first_name }} {{ $farmer->middle_name }} {{ $farmer->surname }} {{ $farmer->extension_name }}</td>
                        <td class="text-center">{{ $farmer->sex }}</td>
                        <td class="text-center">{{ $farmer->barangay ? $farmer->barangay->name : 'N/A' }}</td>
                        <td class="text-center">
{{--                            <div class="btn-group" role="group" aria-label="Basic example">--}}
{{--                                <a type="button" class="btn btn-dark btn-sm view btn-flat" style="background-color: #114abd; border-color: #114abd;" data-bs-toggle="modal" data-bs-target="#view-farmer-modal-{{ $farmer->id }}">--}}
{{--                                    <i class="mdi mdi-file-eye-outline"></i>--}}
{{--                                </a>--}}
{{--                                <a type="button" class="btn btn-primary btn-sm edit btn-flat" style="background-color: #0e8d30; border-color: #0e8d30;" data-bs-toggle="modal" data-bs-target="#edit-farmer-modal-{{ $farmer->id }}">--}}
{{--                                    <i class="mdi mdi-account-edit-outline"></i>--}}
{{--                                </a>--}}
{{--                                <button type="button" class="btn btn-danger btn-sm delete btn-flat" style="background-color: #7d0404; border-color: #7d0404;" onclick="showArchiveConfirmationModal({{ $farmer->id }})">--}}
{{--                                    <i class="mdi mdi-archive-arrow-down-outline"></i>--}}
{{--                                </button>--}}
{{--                                <form id="archive-form-{{ $farmer->id }}" action="{{ route('farmers.archive', $farmer->id) }}" method="POST" style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                    @method('POST')--}}
{{--                                </form>--}}
{{--                            </div>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</x-app-layout>
