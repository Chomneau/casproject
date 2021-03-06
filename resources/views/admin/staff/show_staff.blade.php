@extends('admin.admin-layout.main')

@section('content')

@if(Auth::guard('admin')->check())

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>STAFF <small></small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-right top_search">
                        <form action="{{ route('staff.search')  }}" method='get'>
                            {{csrf_field()}}
                            <div class="input-group">
                                <input type="text" class="form-control" name="query" placeholder="Enter first name,last name, Phone, or email to seach" required >
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Search</button>
                                </span>                       
                            </div>
                        </form>

                    </div>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2></h2>
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
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">



                            <!-- start project list -->
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 12%">Staff Name</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>updated_at</th>
                                    
                                    <th style="width: 25%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($staff))
                                    @foreach($staff as $staffs)
                                        <tr>
                                            <?php $no = 1 ?>
                                            <td>#</td>
                                            <td>
                                                <a> {{ $staffs->last_name }}, {{ $staffs->first_name }}</a>
                                                <br />
                                                <small>Created {{ $staffs->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td>
                                                {{ $staffs->email }}
                                            </td>
                                            <td>
                                                {{ $staffs->position }}
                                            </td>
                                            <td>
                                                {{ $staffs->phone }}
                                            </td>
                                            <td class="project_progress">
                                                {{ date_format($staffs->updated_at,'M d, Y') }}
                                            </td>
                                            
                                            <td>
                                                 
                                                <a href="{{ route('admin.staffDetail', ['id'=>$staffs->id] ) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View profile </a>
                                                
                                                <a href="{{ route('admin.staff.edit', ['id'=>$staffs->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                
                                                <a href="{{ route('admin.staff.delete', ['id'=>$staffs->id]) }}" class="btn btn-danger btn-xs" Onclick="return ConfirmDelete()"><i class="fa fa-trash-o"  ></i> Delete </a>

                                                
                                            </td>
                                        </tr>
                                        <script>
                                            function ConfirmDelete() 
                                                {
                                                    return confirm("Are you sure you want to delete?");
                                                }
                                        </script>

                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <!-- end project list -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@elseif(Auth::guard('teacher')->check())


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>STAFF <small></small></h3>
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
                            <h2></h2>
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
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">



                            <!-- start project list -->
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 20%">Staff Name</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>updated_at</th>
                                    
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($staff))
                                    @foreach($staff as $staffs)
                                        <tr>
                                            <td>#</td>
                                            <td>
                                                <a> {{ $staffs->last_name }}, {{ $staffs->first_name }}</a>
                                                <br />
                                                <small>Created {{ $staffs->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td>
                                                {{ $staffs->email }}
                                            </td>
                                            <td>
                                                {{ $staffs->position }}
                                            </td>
                                            <td>
                                                {{ $staffs->phone }}
                                            </td>
                                            <td class="project_progress">
                                                {{ $staffs->updated_at }}
                                            </td>
                                            
                                            <td>
                                                 
                                                <a href="{{ route('teacher.staffDetail', ['teacher_id'=>$teacher->id, 'staff_id'=>$staffs->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View profile </a>
                                                
                                                

                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <!-- end project list -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


@endif


@endsection