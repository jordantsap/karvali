<div>
    <div class="col-md-3">
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


        @if(!is_null($attributes))
                <div class="col-xs-6">
                    <label class="col-xs-3" for="product_type">Attribute</label>
                    @if ($errors->has('attribute'))
                        <strong class="text-danger">{{ $errors->first('attribute') }}</strong>
                    @endif
                    <div class="col-xs-3">
                        <select wire:model="attr" id="attribute" value="{{ old('attribute') }}" name="attribute" class="form-control">
                            <option value="">Επιλέξτε</option>
                            @foreach($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-danger" wire:click.prevent="add()">Add</button>
                    </div>
                </div>
                @foreach($inputs as $key =>$value)
                    <div class="col-xs-4 form-group">
                        <label for="telephone">{{$attributes->where('id', $attribute_arr[$key])->first()->title}}</label>
                        <input type="text" placeholder="{{$attributes->where('id', $attribute_arr[$key])->first()->title}}"
                               name="telephone" class="form-control"
                               wire:model="attribute_values.{{$value}}">
                    </div>
                @endforeach
        @endif

</div>
