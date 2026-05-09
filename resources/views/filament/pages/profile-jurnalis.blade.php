<x-filament-panels::page>
    @if ($isEditing)
        {{-- MODE EDIT --}}
        <form wire:submit="save">
            {{ $this->form }}

            <div class="mt-6 flex gap-3">
                <x-filament::button type="submit" color="success" icon="heroicon-m-check">
                    Simpan Perubahan
                </x-filament::button>

                {{-- Tombol Batal hanya muncul jika sudah ada data --}}
                @if(auth()->user()->profile)
                    <x-filament::button wire:click="toggleEdit" color="gray" variant="outline">
                        Batal
                    </x-filament::button>
                @endif
            </div>
        </form>
    @else
        {{-- MODE VIEW --}}
        <div>
            {{ $this->profileInfolist }}

            <div class="mt-6">
                <x-filament::button wire:click="toggleEdit" icon="heroicon-m-pencil-square" color="primary">
                    Edit Data Profil
                </x-filament::button>
            </div>
        </div>
    @endif
</x-filament-panels::page>
