<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="bg-white rounded shadow px-8 py-6">
        <form class="space-y-8 divide-y divide-gray-200">
            <x-core::field.form-section :title="__('Create')" :description="__('Add new account.')">
                <x-core::field.form-row title="Name" required>
                    <x-core::field.input type="text" wire:model.defer="name" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Email" required>
                    <x-core::field.input type="text" wire:model.defer="email" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Avatar">
                    <x-core::field.avatar wire:model.defer="photo" :default="$photo?->temporaryUrl()" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Type" required>
                    <x-core::field.select wire:model.defer="type" :placeholder="__('Select type')" multiple>
                        @foreach ($this->userTypeEnumLabels as $key => $label)
                            <x-core::field.select.option value="{{ $key }}" :label="$label" />
                        @endforeach
                    </x-core::field.select>
                </x-core::field.form-row>

                <x-core::field.form-row title="Password" required>
                    <x-core::field.input type="password" wire:model.defer="password" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Password Confirmation" required>
                    <x-core::field.input type="password" wire:model.defer="password_confirmation" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <div class="pt-5">
                <div class="flex justify-end">
                    <x-core::button.secondary href="{{ route('admin.users.index') }}">
                        Cancel
                    </x-core::button.secondary>
                    <x-core::button.primary type="submit" wire:click.prevent="saveAndContinue" class="ml-3">
                        Create & Add New One
                    </x-core::button.primary>
                    <x-core::button.primary type="submit" wire:click.prevent="saveAndShow" class="ml-3">
                        Create & View
                    </x-core::button.primary>
                </div>
            </div>
        </form>
    </div>
</div>
