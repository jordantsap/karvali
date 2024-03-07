<div>
    <div class="col-xs-3">
        <div class="form-group{{ $errors->has('product_type') ? ' has-error' : '' }}">
            <label for="product_type">Κατηγορία Προϊόντος</label>
            @if ($errors->has('product_type'))
                <strong class="text-danger">{{ $errors->first('product_type') }}</strong>
            @endif
            <div class="input-group">
                <select wire:model="productType" id="product_type" value="{{ old('product_type') }}" name="product_type" class="form-control" required>
                    <option value="">Επιλέξτε</option>
                    @foreach($productTypes as $productType)
                        <option value="{{ $productType->id }}">{{ $productType->title }}</option>
                    @endforeach
                </select>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-list"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="">
        @if(!is_null($attributes))
            <div class="col-xs-12 text-center"><h2>{{__('Options')}}</h2></div>
            @foreach($attributes as $attribute)
                <div class="col-xs-12">
                    <label>{{ __('Attribute: ').$attribute->title }}</label>
                    <input class="form-control" name="attribute[{{$attribute->id}}]" value="{{$attribute->title}}" readonly>
                    <input class="form-control" type="{{$attribute->attributeType->type}}" name="attributevalue[{{$attribute->id}}]" required>
                </div>
            @endforeach
        @endif
    </div>
</div>
