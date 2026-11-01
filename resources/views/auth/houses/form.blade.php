<div class="box-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($companies->isEmpty())
        <div class="alert alert-warning">
            Create a company with the Rentals type before you list a house.
            <a href="{{ route('owner.companies.create') }}">Create rental company</a>
        </div>
    @endif

    <div class="row">
        <div class="col-xs-4 form-group">
            <label for="company_id">Rental company</label>
            <select name="company_id" id="company_id" class="form-control" required>
                <option value="">Choose a company</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" @selected(old('company_id', $house?->company_id) == $company->id)>
                        {{ $company->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-4 form-group">
            <label for="listing_type">Offer</label>
            <select name="listing_type" id="listing_type" class="form-control" required>
                <option value="rent" @selected(old('listing_type', $house?->listing_type ?? 'rent') === 'rent')>Rent</option>
                <option value="sale" @selected(old('listing_type', $house?->listing_type ?? '') === 'sale')>Sale</option>
            </select>
        </div>

        <div class="col-xs-2 form-group">
            <label for="active">Published</label>
            <div>
                <input type="checkbox" name="active" id="active" value="1" @checked(old('active', $house?->active ?? true))>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3 form-group">
            <label for="price">Price (€)</label>
            <input type="number" step="0.01" min="0" name="price" id="price" class="form-control" required
                   value="{{ old('price', $house?->price) }}">
        </div>
        <div class="col-xs-3 form-group">
            <label for="price_period">Rent period</label>
            <select name="price_period" id="price_period" class="form-control">
                <option value="night" @selected(old('price_period', $house?->price_period ?? 'night') === 'night')>Per night</option>
                <option value="month" @selected(old('price_period', $house?->price_period ?? '') === 'month')>Per month</option>
            </select>
            <p class="help-block">Used for rentals. Sale listings keep a single price.</p>
        </div>
        <div class="col-xs-2 form-group">
            <label for="bedrooms">Bedrooms</label>
            <input type="number" min="0" name="bedrooms" id="bedrooms" class="form-control" required
                   value="{{ old('bedrooms', $house?->bedrooms ?? 1) }}">
        </div>
        <div class="col-xs-2 form-group">
            <label for="bathrooms">Bathrooms</label>
            <input type="number" min="0" name="bathrooms" id="bathrooms" class="form-control" required
                   value="{{ old('bathrooms', $house?->bathrooms ?? 1) }}">
        </div>
        <div class="col-xs-2 form-group">
            <label for="area_sqm">Area (m²)</label>
            <input type="number" step="0.01" min="0" name="area_sqm" id="area_sqm" class="form-control"
                   value="{{ old('area_sqm', $house?->area_sqm) }}">
        </div>
    </div>

    <div class="row">
        <div class="col-xs-8 form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" required
                   value="{{ old('address', $house?->address) }}">
        </div>
        <div class="col-xs-4 form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" required
                   value="{{ old('city', $house?->city) }}">
        </div>
    </div>

    @foreach (config('translatable.locales') as $locale => $language)
        @php $translation = isset($house) ? $house->translate($locale) : null; @endphp
        <fieldset>
            <legend>{{ $language }}</legend>
            <div class="form-group">
                <label for="{{ $locale }}-title">Title @if($locale === 'en')<span class="text-danger">*</span>@endif</label>
                <input type="text" name="{{ $locale }}[title]" id="{{ $locale }}-title" class="form-control"
                       value="{{ old($locale.'.title', $translation->title ?? '') }}" {{ $locale === 'en' ? 'required' : '' }}>
            </div>
            <div class="form-group">
                <label for="{{ $locale }}-description">Description</label>
                <textarea name="{{ $locale }}[description]" id="{{ $locale }}-description" class="form-control" rows="4">{{ old($locale.'.description', $translation->description ?? '') }}</textarea>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    <label for="{{ $locale }}-meta-description">Meta description</label>
                    <input type="text" name="{{ $locale }}[meta_description]" id="{{ $locale }}-meta-description" class="form-control"
                           value="{{ old($locale.'.meta_description', $translation->meta_description ?? '') }}">
                </div>
                <div class="col-xs-6 form-group">
                    <label for="{{ $locale }}-meta-keywords">Meta keywords</label>
                    <input type="text" name="{{ $locale }}[meta_keywords]" id="{{ $locale }}-meta-keywords" class="form-control"
                           value="{{ old($locale.'.meta_keywords', $translation->meta_keywords ?? '') }}">
                </div>
            </div>
        </fieldset>
    @endforeach

    <div class="row">
        @foreach (['header' => 'Cover', 'image1' => 'Photo 1', 'image2' => 'Photo 2', 'image3' => 'Photo 3'] as $field => $label)
            <div class="col-xs-3 form-group">
                <label for="{{ $field }}">{{ $label }}</label>
                <input type="file" name="{{ $field }}" id="{{ $field }}" class="form-control" accept="image/*">
                @if (!empty($house->{$field}))
                    <img src="{{ asset($house->{$field}) }}" alt="" width="120" class="img-thumbnail">
                @endif
            </div>
        @endforeach
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-primary">Save house</button>
    <a href="{{ route('owner.houses.index') }}" class="btn btn-default">Cancel</a>
</div>
