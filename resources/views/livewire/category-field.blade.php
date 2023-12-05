<div>
    <div class="col-xs-3">
        <div class="form-group{{ $errors->has('product_type') ? ' has-error' : '' }}">
            <label for="product_type">Κατηγορία Προϊόντος</label>
            @if ($errors->has('product_type'))
                <strong class="text-danger">{{ $errors->first('product_type') }}</strong>
            @endif
            <div class="input-group">
                <select wire:model="producttype" id="product_type" value="{{ old('product_type') }}" name="product_type" class="form-control" required>
                    <option value="">Επιλέξτε</option>
                    @foreach($producttypes as $producttype)
                        <option value="{{ $producttype->id }}">{{ $producttype->title }}</option>
                    @endforeach
                </select>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-list"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="">
        @if(!is_null($fields))
            <div class="col-xs-12 text-center"><h2>{{__('Options')}}</h2></div>
            @foreach($fields as $field)
                <div class="col-xs-12">
                    <label>{{ __('Field: ').$field->title }}</label>
                    <input class="form-control" name="field[{{$field->id}}]" value="{{$field->title}}" readonly>
                    <input class="form-control" name="fieldvalue[{{$field->id}}]" required>
                </div>
            @endforeach
        @endif
    </div>
</div>
