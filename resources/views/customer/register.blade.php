@extends('layouts.dashboard')
@section('section')

@section('title')

	{{ $title }}

@endsection
<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form method="get" action="{{ url('customer/create') }}" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group{{ $errors->has('hotkey') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hotkey">Hotkey <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('hotkey') ?: '' }}" id="hotkey" name="hotkey" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('hotkey'))
									<span class="help-block">{{ $errors->first('hotkey') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('subhotkey') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subhotkey">SubHotkey <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('subhotkey') ?: '' }}" id="subhotkey" name="subhotkey" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('subhotkey'))
									<span class="help-block">{{ $errors->first('subhotkey') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
								<label for="dob" class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth</label> 
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="dob" type="date" name="dob" value="" required="required" class="form-control">

								</div>
							</div>

							<div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Profession<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('profession') ?: '' }}" id="profession" name="profession" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('profession'))
									<span class="help-block">{{ $errors->first('profession') }}</span>
									@endif
								</div>
							</div>


							<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Location<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('location') ?: '' }}" id="location" name="location" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('location'))
									<span class="help-block">{{ $errors->first('location') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone No.<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('phone') ?: '' }}" id="phone" name="phone" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('phone'))
									<span class="help-block">{{ $errors->first('phone') }}</span>
									@endif
								</div>
							</div>

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<input type="hidden" name="_token" value="{{ Session::token() }}">
									<button type="submit" class="btn btn-success">Sign up!</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
						