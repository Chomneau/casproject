

@extends('admin.admin-layout.main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <form role="form" class="form-group" action="{{ route('admin.storeStaff', ['id'=>Auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                    
                    {{ csrf_field() }}

                    <div class="panel col-md-8 col-md-offset-2">
                        <div class="page-title">
                            <div class="text-center">
                                <h3>Create New Staff</h3>
                            </div>
                        </div>

                        <div class="container" style="margin-top: 1em">

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}" >
                                <label for="name" class="col-md-6 col-md-offset-2 control-label">
                                First Name
                                </label>
                                <div class="col-md-8 col-md-offset-2" style="margin-bottom: 20px">
                                    <input id="name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First name" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>
                                                {{ $errors->first('first_name') }}
                                                </strong>
                                            </span>
                                        @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}" >
                                <label for="name" class="col-md-6 col-md-offset-2 control-label">
                                Last Name
                                </label>
                                <div class="col-md-8 col-md-offset-2" style="margin-bottom: 20px">
                                    <input id="name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>
                                                {{ $errors->first('last_name') }}
                                                </strong>
                                            </span>
                                        @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}" >
                                <label for="name" class="col-md-6 col-md-offset-2 control-label">
                                Gender
                                </label>
                            <div class="col-md-8 col-md-offset-2" style="margin-bottom: 20px">
                                <select name="gender" id="" class="form-control" required>
                                    <option value="">--select gender--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                        
                                </select>
                                </div>
                            </div>

                        {{--Email--}}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                                <label for="email" class="col-md-8 col-md-offset-2 control-label">E-Mail</label>

                                    <div class="col-md-8 col-md-8 col-md-offset-2" style="margin-bottom: 15px">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('email') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>




                                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}" >
                                            <label for="position" class="col-md-8 col-md-offset-2 control-label">Position</label>

                                            <div class="col-md-8 col-md-8 col-md-offset-2" style="margin-bottom: 15px">
                                                <input id="position" type="text" class="form-control" name="position" value="{{ old('position') }}" placeholder="Position" required>

                                                @if ($errors->has('position'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('position') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>




                                        <div class="form-group{{ $errors->has('degree') ? ' has-error' : '' }}" >
                                            <label for="degree" class="col-md-8 col-md-offset-2 control-label">Degree</label>

                                            <div class="col-md-8 col-md-8 col-md-offset-2" style="margin-bottom: 15px">
                                                <input id="degree" type="text" class="form-control" name="degree" value="{{ old('degree') }}" placeholder="Degree" required>

                                                @if ($errors->has('degree'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('degree') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}" >
                                            <label for="degree" class="col-md-8 col-md-offset-2 control-label">Phone</label>

                                            <div class="col-md-8 col-md-8 col-md-offset-2" style="margin-bottom: 15px">
                                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone number" required>

                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}" >
                                            <label for="date_of_birth" class="col-md-8 col-md-offset-2 control-label">Date of Birth</label>

                                            <div class="col-md-8 col-md-8 col-md-offset-2" style="margin-bottom: 15px">
                                                 <input type="date" id="start" name="date_of_birth"
                                                       value="2019-01-01"
                                                       min="1950-01-01" max="2050-12-31" class="form-control"

                                                 value="{{ old('date_of_birth') }}" >


                                                @if ($errors->has('date_of_birth'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-md-8 col-lg-offset-2 {{ $errors->has('address') ? ' has-error' : '' }}" style="margin-bottom: 50px">
                                            <button class="btn btn-success">
                                                <strong><i class="fa fa-user-plus" aria-hidden="true"></i></strong>
                                                Create Now
                                            </button>
                                        </div>

                                    </div>
                            </div>
                </form>
            </div>
            </div>
        </div>

    <!-- /page content -->

@endsection