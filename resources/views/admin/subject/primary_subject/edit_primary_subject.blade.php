

@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Primary and Secondary Subject <small>setting</small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">

                            <h2> <i class="fa fa-sliders" aria-hidden="true"></i>  Edit subject for primary and secondary</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            @include('admin.grade.highschool.grade-form')
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            {{--for edit form--}}
                            <div class="row">
                                <form action="{{ route('subject.primary.update', ['id'=>$subject->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="col-md-8 col-md-offset-2">
                                        <label for="exampleInputEmail1">Subject Name</label>
                                        <input type="text" name="name" value="{{ $subject->name }}" class="form-control" autofocus required>
                                    </div>

                                    <div class="col-md-8 col-md-offset-2">
                                        <label for="exampleInputEmail1">Subject Code</label>
                                        <input type="text" name="subject_code" value="{{ $subject->subject_code }}" class="form-control" autofocus required>
                                    </div>

                                    <div class="col-md-8 col-md-offset-2">
                                        <label for="exampleInputEmail1">Grade</label>
                                        <select name="grade_id" id="" class="form-control" required>
                                            @if(count($secondaryGrade))
                                                @foreach($secondaryGrade as $secondaryGrades)
                                                    <option value="{{ $secondaryGrades->id }}"
                                                            @if($subject->grade_id  == $secondaryGrades->id) selected @endif
                                                    >{{ $secondaryGrades->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-md-8 col-md-offset-2" style="margin-top: 20px">
                                        <input type="submit"  class="btn btn-success" value="update now">
                                    </div>

                                </form>
                            </div>
                        {{--end edit form--}}




                        <!-- start project list -->

                            <!-- end project list -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


@endsection