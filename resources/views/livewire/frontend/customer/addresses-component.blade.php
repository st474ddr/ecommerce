<div x-data="{ formShow: @entangle('showForm') }">
    <div class="d-flex">
        <h2 class="h5 text-uppercase mb-4">{{ __('Addresses') }}</h2>
        <div class="ml-auto">
            <button type="button" @click="formShow = true" class="btn btn-primary rounded shadow">
                {{ __('Add an address') }}
            </button>
        </div>
    </div>

    <form wire:submit.prevent="{{ $editMode ? 'update_address' : 'store_address' }}" x-show="formShow"
        @click.away="formShow = false">
        @if ($editMode)
        <input type="hidden" wire:model="address_id" class="form-control">
        @endif

        <div class="row">
            <div class="col-lg-8 form-group">
                <label class="text-small text-uppercase" for="address_title">{{ __('Addresses title') }}</label>
                <input class="form-control" wire:model="address_title" type="text"
                    placeholder="{{ __('Enter your address title') }}">
                @error('address_title')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-4 form-group">
                <label class="text-small text-uppercase">&nbsp;</label>
                <div class="form-check">
                    <input class="form-check-input" id="default_address" wire:model="default_address" type="checkbox">
                    <label class="form-check-label" for="default_address">{{ __('Default address') }}?</label>
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="first_name">{{ __('First Name') }}</label>
                <input class="form-control form-control-lg" wire:model="first_name" type="text"
                    placeholder="{{ __('Enter your first name') }}">
                @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="last_name">{{ __('Last Name') }}</label>
                <input class="form-control form-control-lg" wire:model="last_name" type="text"
                    placeholder="{{ __('Enter your last name') }}">
                @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="email">{{ __('E-mail Address') }}</label>
                <input class="form-control form-control-lg" wire:model="email" type="email"
                    placeholder="e.g. sam@example.com">
                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="mobile">{{ __('Mobile Number') }}</label>
                <input class="form-control form-control-lg" wire:model="mobile" type="tel"
                    placeholder="e.g. 0912345678">
                @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="address">{{ __('Addresses') }}</label>
                <input class="form-control form-control-lg" wire:model="address" type="text"
                    placeholder="{{ __('Enter your address') }}">
                @error('address')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="address2">{{ __('Addresses') }}2</label>
                <input class="form-control form-control-lg" wire:model="address2" type="text"
                    placeholder="{{ __('Enter your address') }}">
                @error('address2')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-4 form-group">
                <label class="text-small text-uppercase" for="country_id">{{ __('Country') }}</label>
                <select class="form-control form-control-lg" wire:model="country_id">
                    <option value="">{{ __('Select Country') }}</option>
                    @forelse($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @empty
                    @endforelse
                </select>
                @error('country_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-4 form-group">
                <label class="text-small text-uppercase" for="state_id">{{ __('State') }}</label>
                <select class="form-control form-control-lg" wire:model="state_id">
                    <option value="">{{ __('Select State') }}</option>
                    @forelse($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @empty
                    @endforelse
                </select>
                @error('state_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-4 form-group">
                <label class="text-small text-uppercase" for="city_id">{{ __('City') }}</label>
                <select class="form-control form-control-lg" wire:model="city_id">
                    <option value="">{{ __('Select City') }}</option>
                    @forelse($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @empty
                    @endforelse
                </select>
                @error('city_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="zip_code">{{ __('ZIP code') }}</label>
                <input class="form-control form-control-lg" wire:model="zip_code" type="text"
                    placeholder="{{ __('Enter your ZIP Code') }}">
                @error('zip_code')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-lg-12 form-group">
                <button class="btn btn-dark" type="submit">
                    {{ $editMode ? __('Update') : __('Create') }}
                </button>
            </div>
        </div>
    </form>

    <div class="my-4">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('Address title') }}</th>
                        <th>{{ __('Default address') }}</th>
                        <th class="col-2">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($addresses as $address)
                    <tr>
                        <td>{{ $address->address_title }}</td>
                        <td>{{ $address->defaultAddress() }}</td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm">
                                <button type="button" wire:click.prevent="edit_address('{{ $address->id }}')"
                                    class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" wire:click.prevent="delete_address('{{ $address->id }}')"
                                    class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">{{ __('No addresses found') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
