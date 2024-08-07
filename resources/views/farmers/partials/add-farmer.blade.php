<section class="space-y-6">
    <x-button
        class="items-center gap-2"
        variant="primary"
        size="sm"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'add-farmer-details')"
    >
        <x-icons.plus-icon class="w-4 h-4" /> {{ __('New Farmer') }}
    </x-button>

    <x-modal
        name="add-farmer-details"
        focusable
        maxWidth="6xl"
    >
        <form
            method="post"
            action="{{ route('farmers.store') }}"
            class="p-6"
            enctype="multipart/form-data"
        >
            @csrf
            <div>
                <header class="border-b border-gray-400 dark:border-b-gray-600 py-4">
                    <h2 class="text-lg font-bold">
                        {{ __('PERSONAL INFORMATION') }}
                    </h2>
                </header>

                <x-form.form-separator label="Photo" label_desc="profile pic">
                    <x-form.profile-upload name="profile" src="{{ asset('images/profile-default.jpg') }}" />
                </x-form.form-separator>

                {{--    Radio Buttons    --}}
                <x-form.form-separator label="Enrollment">

                    <?php
                    $enrollmentOptions = [
                        ['value' => 'New', 'label' => 'New'],
                        ['value' => 'Existing', 'label' => 'Existing'],
                    ];
                    ?>

                    <x-buttons.radio-group
                        name="enrollment"
                        :options="$enrollmentOptions"
                        selected="Existing"
                        :required="true"
                    />
                </x-form.form-separator>

                {{--    REFERENCE/CONTROL NO    --}}
                <x-form.form-separator label="Reference/Control No">
                    <x-form.input label_out type="text" name="reference" required />
                </x-form.form-separator>

                {{--    Fullname    --}}
                <x-form.form-separator label="Full Name">
                    <div class="grid md:grid-cols-2 gap-4">
                        <x-form.input label_out type="text" name="surname" placeholder="Surname" required />
                        <x-form.input label_out type="text" name="first_name" placeholder="First" required />
                        <x-form.input label_out type="text" name="middle_name" placeholder="Middle" />
                        <x-form.input label_out type="text" name="extension_name" placeholder="Extension" />
                    </div>
                </x-form.form-separator>

                <?php
                $gender = [
                    ['id' => 1, 'name' => 'Male'],
                    ['id' => 2, 'name' => 'Female'],
                ];
                ?>

                <x-form.form-separator label="Gender">
                    <x-form.select label_out type="text" name="sex" :options="$gender" placeholder="Select gender" required />
                </x-form.form-separator>

                <x-form.form-separator label="Contact">
                    <x-form.input label_out type="text" name="contact_number" placeholder="Phone" required />
                </x-form.form-separator>

                <x-form.form-separator label="Birth">
                    <x-form.input label_out type="date" name="date_birth" placeholder="Date Of Birth" required />
                    <x-form.input label_out type="text" name="place_birth" placeholder="Place Of Birth" required />
                </x-form.form-separator>

                <?php
                $Status = [
                    ['value' => 'single', 'label' => 'Single'],
                    ['value' => 'married', 'label' => 'Married'],
                    ['value' => 'widowed', 'label' => 'Widowed'],
                    ['value' => 'separated', 'label' => 'Separated']
                ];
                ?>

                <x-form.form-separator label="Civil Status">
                    <x-form.civil-status />
                </x-form.form-separator>

                <x-form.form-separator label="Address">
                    <x-form.input label_out type="text" name="building_no" placeholder="House/Lot/Bldg. No" required />
                    <x-form.input label_out type="text" name="street" placeholder="Street/Sitio/Subdv" required />
                    <x-form.select label_out type="text" name="barangays_id" placeholder="Select Barangay" :options="$barangays" required />
                    <x-form.input label_out type="text" name="municipality" placeholder="Municipality" required />
                    <x-form.input label_out type="text" name="province" placeholder="Province" required />
                    <x-form.input label_out type="text" name="region" placeholder="Region" required />
                </x-form.form-separator>

            </div>

            <div class="mt-6 flex justify-end">
                <x-button
                    type="button"
                    variant="secondary"
                    x-on:click="$dispatch('close')"
                >
                    {{ __('Cancel') }}
                </x-button>

                <x-button
                    variant="primary"
                    class="ml-3"
                    type="submit"
                >
                    {{ __('Add Farmer') }}
                </x-button>
            </div>
        </form>
    </x-modal>
</section>



