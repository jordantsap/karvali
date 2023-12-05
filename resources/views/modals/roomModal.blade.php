
    <div class="modal" tabindex="-1" role="dialog" id="bookRoom">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Booking of a room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('front.bookings.store',$room->id) }}" method="POST" id="bookingForm">
                        @csrf
                        <input type="hidden" name="room_id" id="room_id" value="{{ old('room_id') }}">
                        <input type="hidden" name="start_time" value="{{ request()->input('start_time') }}">
                        <input type="hidden" name="end_time" value="{{ request()->input('end_time') }}">
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('form.title') }}</label>
                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('form.title') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('form.description') }}</label>
                            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('form.description') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="adults">{{ trans('form.adults') }}</label>
                            <input class="form-control {{ $errors->has('adults') ? 'is-invalid' : '' }}" type="number" name="adults" id="adults" value="{{ old('adults', '') }}" required>
                            @if($errors->has('adults'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('adults') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('form.adults') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="kids">{{ trans('form.kids') }}</label>
                            <input class="form-control {{ $errors->has('kids') ? 'is-invalid' : '' }}" type="number" name="kids" id="kids" value="{{ old('kids', '') }}" required>
                            @if($errors->has('kids'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kids') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('form.kids') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="check_in_date">Checkin date</label>
                            <input class="form-control date {{ $errors->has('check_in_date') ? 'is-invalid' : '' }}" type="date" name="check_in_date" id="check_in_date" value="{{ old('check_in_date') }}">
                            @if($errors->has('check_in_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('check_in_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="check_out_date">Checkout date</label>
                            <input class="form-control date {{ $errors->has('check_out_date') ? 'is-invalid' : '' }}" type="date" name="check_out_date" id="check_out_date" value="{{ old('check_out_date') }}">
                            @if($errors->has('check_out_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('check_out_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="recurring_until">Recurring until</label>
                            <input class="form-control date {{ $errors->has('recurring_until') ? 'is-invalid' : '' }}" type="text" name="recurring_until" id="recurring_until" value="{{ old('recurring_until') }}">
                            @if($errors->has('recurring_until'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('recurring_until') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="submitBooking">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
