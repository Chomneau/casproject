<div class="x_content">
    {{--
    <h2><i class="fa fa-bars"></i> Dropdowns <small>Multiple dropdown designs</small></h2>--}}
    <ul class="nav nav-pills" role="tablist">

        <li role="presentation" class="dropdown">
            <a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                    <strong>
                        K and Pre-K
                        <span class="caret"></span>
                    </strong>
                </a>
            <ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
                @if(count($kgrade)) 
                    @foreach($kgrade as $kgrades)
                    <li role="presentation" style="margin-top: 5px; margin-bottom: 3px">
                        <a role="menuitem" tabindex="-1" href="{{ route('prekSchool.absentRecord', ['grade_id'=>$kgrades->id, 'student_id'=>$students->id]) }}"
                            style="font-size: 14px">{{ $kgrades->name }}</a>
                    </li>
                    <li role="presentation" class="divider"></li>

                    @endforeach 
                @endif
            </ul>
        </li>


        <li role="presentation" class="dropdown">
            <a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                    <strong>
                        Primary & Secondary <span class="caret"></span>
                    </strong>
                </a>
            <ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
                @if(count($secondaryGrade)) 
                    @foreach($secondaryGrade as $secondaryGrades)
                    <li role="presentation" style="margin-top: 5px; margin-bottom: 3px">


                        <a role="menuitem" tabindex="-1" href="{{ route('secondarySchool.absentRecord', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}"
                            style="font-size: 14px">{{ $secondaryGrades->name }}</a>

                    </li>
                    <li role="presentation" class="divider"></li>
                    @endforeach 
                @endif
            </ul>
        </li>

        <li role="presentation" class="dropdown">
            <a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                    <strong>
                        High School <span class="caret"></span>
                    </strong>
                </a>
            <ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
                @if(count($grade)) 
                    @foreach($grade as $grades)
                    <li role="presentation" style="margin-top: 5px; margin-bottom: 3px">
                        <a role="menuitem" tabindex="-1" href="{{ route('highSchool.absentRecord', ['grade_id'=>$grades->id, 'student_id'=>$students->id]) }}"
                            style="font-size: 14px">{{ $grades->grade_name }}</a>
                    </li>
                    <li role="presentation" class="divider"></li>
                    @endforeach 
                @endif
            </ul>
        </li>



    </ul>
</div>