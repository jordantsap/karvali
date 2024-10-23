<div>
                  <div class="form-group">
                  <label for="role" class="col-md-4 control-label">{{__('register.requestpackagelabel')}}</label>
                  <div class="col-md-6">
                      <select class="form-control" wire:model="selectedRole" name="role" required>
                          <option value="">{{__('form.pleaseselect')}}</option>
                          @foreach ($roles as $role)
                              <option value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
{{--              <div class="form-group">--}}
{{--                  <label for="membership" class="col-md-4 control-label">{{__('register.membership')}}</label>--}}
{{--                  <div class="col-md-6">--}}
{{--                         <select class="form-control" name="plan_id" id="plan_id" required>--}}
{{--                              <option value="">{{__('form.pleaseselect')}}</option>--}}
{{--                              @foreach($plans as $plan)--}}
{{--                                  <option value="{{ $plan->id }}">{{ $plan->name }} - {{ $plan->price }} - {{'for '.$plan->duration.' days'}}</option>--}}
{{--                              @endforeach--}}
{{--                          </select>--}}

{{--                      </select>--}}

{{--                  </div>--}}
{{--              </div>--}}

</div>
