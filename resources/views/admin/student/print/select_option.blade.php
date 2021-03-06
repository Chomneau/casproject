
@if(Auth::guard('admin')->check())

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Yearly Report For Pre-k
                        </a>
                    </li>

                    <li role="presentation" class="">
                        <a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Yearly Report For Grade K
                        </a>
                    </li>

                    <li role="presentation" class="">
                            <a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Yearly Report For Grade 1 - 8
                            </a>
                    </li>
                    <li role="presentation" class="">
                            <a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Yearly Report For Grade 9 - 12
                            </a>
                    </li>
                    
                </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <div class="col-md-3 col-sm-6 col-xs-12" style="margin-left: 0.5em">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>Pre-K</h2>
                                    <div class="clearfix"></div>
                                  </div>
                                    
                                    <form action="{{ route('prek.printview', ['student_id'=>$students->id]) }}">
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <div class="tab-pane active" id="home">                              
                                                            @if(count($kgrade))
                                                                @foreach($kgrade->slice(3, 3) as $kgrades)
                                                                    
                                                                    <div class="checkbox">
                                                                        <label>
                                                                          <input type="radio" name="kgrade[]" class="flat" 
                                                                          value="{{ $kgrades->id }}"> {{ $kgrades->name }}
                                                                        </label>
                                                                    </div>

                                                                @endforeach
                                                                
                                                            @endif

                                                    </div>

                                            

                                            </div> 


                                                </div>
                                                <div class="col-md-6" style="margin-top: 20px">
                                                    <div class="pull-right">
                                                        
                                                        <input type="submit" value="print view"  class="btn btn-success btn-sm">

                                                    </div>
                                                </div>

                                            </div>

                                            
                      
                                        </div>
                                    </form>    

                                </div>

                            </div>
                        </div>

                        
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="col-md-3 col-sm-6 col-xs-12" style="margin-left: 12.5em">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Grade-K</h2>
                                <div class="clearfix"></div>
                              </div>
                                <form action="{{ route('gradek.printview', ['student_id'=>$students->id]) }}">
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <div class="tab-pane active" id="home">                              
                                                            @if(count($kgrade))
                                                                @foreach($kgrade->slice(0,3) as $kgrades)
                                                                    
                                                                    <div class="checkbox">
                                                                        <label>
                                                                          <input type="radio" name="kgrade[]" class="flat" 
                                                                          value="{{ $kgrades->id }}"> {{ $kgrades->name }}
                                                                        </label>
                                                                    </div>

                                                                @endforeach
                                                                
                                                            @endif

                                                    </div>

                                            

                                            </div> 


                                                </div>
                                                <div class="col-md-6" style="margin-top: 20px">
                                                    <div class="pull-right">
                                                        <input type="submit" value="print view" class="btn btn-success btn-sm">
                                                    </div>
                                                </div>

                                            </div>

                                            
                      
                                        </div>
                                    </form>  

                            </div>
                        </div>
                    </div>


                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <div class="col-md-3 col-sm-6 col-xs-12" style="margin-left: 28.5em">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Primary and Secondary</h2>
                                <div class="clearfix"></div>
                              </div>
                                <form action="{{ route('secondaryschool.printview', ['student_id'=>$students->id]) }}">

                                    <div class="tab-content">

                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                            <div class="tab-pane active" id="home">

                                                @if(count($secondaryGrade))
                                                    @foreach($secondaryGrade as $secondaryGrades)

                                                        
                                                        <div class="checkbox">
                                                            <label>
                                                              <input type="radio" name="secondaryGrade[]" class="flat" 
                                                              value="{{$secondaryGrades->id}}"> {{$secondaryGrades->name}}

                                                            </label>
                                                        </div>
                                                        

                                                    @endforeach
                                                    
                                                @endif

                                            </div>





                                            </div>

                                            <div class="col-md-6" style="margin-top: 10px">
                                                <div class="pull-right">
                                                    <input type="submit" value="print view" class="btn btn-success btn-sm">
                                                </div>
                                            </div>
                                        </div>


                                        

                                    

                                    </div>
                                 <!-- end form -->
                                </form>

                            </div>
                        </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                          <div class="col-md-3 col-sm-6 col-xs-12 pull-right"style="margin-right: 19em">
                        <div class="x_panel">
                              <div class="x_title">
                                <h2>Yearly report for High School</h2>
                                <div class="clearfix"></div>
                              </div>



                            <form action="{{ route('yearlyReport.highSchool', ['student_id'=>$students->id]) }}" method="get">

                                {{csrf_field()}}
                                <div class="tab-content">

                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                            <div class="tab-pane active" id="home">

                                                @if(count($grade))
                                                    @foreach($grade as $grades)

                                                        
                                                        <div class="checkbox">
                                                            <label>
                                                              <input type="radio" name="grade[]" class="flat" value="{{$grades->id}}"> 

                                                              {{ $grades->grade_name }}

                                                            </label>
                                                        </div>
                                                        

                                                    @endforeach
                                                    
                                                @endif

                                            </div>

                                        </div>
                                        <div class="col-md-6" style="margin-top: 10px">
                                            
                                            <div class="pull-right">
                                                <input type="submit" value="print view" class="btn btn-success btn-sm">
                                            </div>
                                        </div>
                                    </div>
                                    

                                    

                                </div> 
                                
                            </from>

                        </div>
                    </div>
                </div>
            </div>
        </div> 
        


@elseif(Auth::guard('teacher')->check())
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Yearly Report For Pre-k
            </a>
        </li>

        <li role="presentation" class="">
            <a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Yearly Report For Grade K
            </a>
        </li>

        <li role="presentation" class="">
                <a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Yearly Report For Grade 1 - 8
                </a>
        </li>
        <li role="presentation" class="">
                <a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Yearly Report For Grade 9 - 12
                </a>
        </li>
        
    </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
              <div class="col-md-3 col-sm-6 col-xs-12" style="margin-left: 0.5em">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Pre-K</h2>
                        <div class="clearfix"></div>
                      </div>
                        
                        <form action="{{ route('teacher.prek.printview', ['student_id'=>$students->id]) }}">
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <div class="tab-pane active" id="home">                              
                                                @if(count($kgrade))
                                                    @foreach($kgrade->slice(3, 3) as $kgrades)
                                                        
                                                        <div class="checkbox">
                                                            <label>
                                                              <input type="radio" name="kgrade[]" class="flat" 
                                                              value="{{ $kgrades->id }}"> {{ $kgrades->name }}
                                                            </label>
                                                        </div>

                                                    @endforeach
                                                    
                                                @endif

                                        </div>

                                

                                </div> 


                                    </div>
                                    <div class="col-md-6" style="margin-top: 20px">
                                        <div class="pull-right">
                                            
                                            <input type="submit" value="print view"  class="btn btn-success btn-sm">

                                        </div>
                                    </div>

                                </div>

                                
          
                            </div>
                        </form>    

                    </div>

                </div>
            </div>

            
            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
              <div class="col-md-3 col-sm-6 col-xs-12" style="margin-left: 12.5em">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Grade-K</h2>
                    <div class="clearfix"></div>
                  </div>
                    <form action="{{ route('teacher.gradek.printview', ['student_id'=>$students->id]) }}">
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <div class="tab-pane active" id="home">                              
                                                @if(count($kgrade))
                                                    @foreach($kgrade->slice(0,3) as $kgrades)
                                                        
                                                        <div class="checkbox">
                                                            <label>
                                                              <input type="radio" name="kgrade[]" class="flat" 
                                                              value="{{ $kgrades->id }}"> {{ $kgrades->name }}
                                                            </label>
                                                        </div>

                                                    @endforeach
                                                    
                                                @endif

                                        </div>

                                

                                </div> 


                                    </div>
                                    <div class="col-md-6" style="margin-top: 20px">
                                        <div class="pull-right">
                                            <input type="submit" value="print view" class="btn btn-success btn-sm">
                                        </div>
                                    </div>

                                </div>

                                
          
                            </div>
                        </form>  

                </div>
            </div>
        </div>



            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
              <div class="col-md-3 col-sm-6 col-xs-12" style="margin-left: 28.5em">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Primary and Secondary</h2>
                    <div class="clearfix"></div>
                  </div>
                    <form action="{{ route('teacher.secondaryschool.printview', ['student_id'=>$students->id]) }}">

                        <div class="tab-content">

                            <div class="row">
                                <div class="col-md-6">
                                    
                                <div class="tab-pane active" id="home">

                                    @if(count($secondaryGrade))
                                        @foreach($secondaryGrade as $secondaryGrades)

                                            
                                            <div class="checkbox">
                                                <label>
                                                  <input type="radio" name="secondaryGrade[]" class="flat" 
                                                  value="{{$secondaryGrades->id}}"> {{$secondaryGrades->name}}

                                                </label>
                                            </div>
                                            

                                        @endforeach
                                        
                                    @endif

                                </div>





                                </div>

                                <div class="col-md-6" style="margin-top: 10px">
                                    <div class="pull-right">
                                        <input type="submit" value="print view" class="btn btn-success btn-sm">
                                    </div>
                                </div>
                            </div>


                            

                        

                        </div>
                     <!-- end form -->
                    </form>

                </div>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
              <div class="col-md-3 col-sm-6 col-xs-12 pull-right"style="margin-right: 19em">
            <div class="x_panel">
                  <div class="x_title">
                    <h2>Yearly report for High School</h2>
                    <div class="clearfix"></div>
                  </div>



                <form action="{{ route('teacher.yearlyReport.highSchool', ['student_id'=>$students->id]) }}" method="get">

                    {{csrf_field()}}
                    <div class="tab-content">

                        <div class="row">
                            <div class="col-md-6">
                                
                                <div class="tab-pane active" id="home">

                                    @if(count($grade))
                                        @foreach($grade as $grades)

                                            
                                            <div class="checkbox">
                                                <label>
                                                  <input type="radio" name="grade[]" class="flat" value="{{$grades->id}}"> 

                                                  {{ $grades->grade_name }}

                                                </label>
                                            </div>
                                            

                                        @endforeach
                                        
                                    @endif

                                </div>

                            </div>
                            <div class="col-md-6" style="margin-top: 10px">
                                
                                <div class="pull-right">
                                    <input type="submit" value="print view" class="btn btn-success btn-sm">
                                </div>
                            </div>
                        </div>
                        

                        

                    </div> 
                    
                </from>

                </div>
            </div>
        </div>
    </div>
</div>      
@endif

                    
