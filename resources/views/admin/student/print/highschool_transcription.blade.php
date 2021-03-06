
@include('admin.student.print.header_style')

<body>

<page size="A4">

	<div class="container">
		<div class="row" >
			<!-- school info -->
				<div class="container" style="margin-top: 20px">
					<div class="row">
						<div class="col-sm-6 col-md-4" style="padding-left: 20px"  >
	                        <img src="{{ asset('uploads/avatar/logo.png')}}" alt="" class="img-rounded img-responsive" width="150" height="150"/>
	                    </div>
						


	                    <div class="col-sm-6 col-md-8 text-right " style="margin-top: 15px; padding-right: 30px" >
	                        <h4>CAMBODIA ADVENTIST SCHOOL</h4>
	                        <h5>TRANSCRIPT OF SECONDARY ACADEMI</h5>
	                        <h6>INTERNATIONAL PROGRAM</h6>
						</div>

					</div>
					<div class="row" style="margin-top: -20px">
						<div class="col-sm-6 col-md-12 text-right" >
							<small><cite title="San Francisco, USA">#419, Rada Road, Phum Pum Nub,<br> Sangkat Phnom Penh Thmey, Khan Sensok,<br> Phnom Penh, Cambodia <i class="glyphicon glyphicon-map-marker">
			                   </i></cite></small>
			                   <p>
			                   	<i class="glyphicon glyphicon-gift"></i>Tel : (855)12 946 041
			                   	<br>
			                       <i class="glyphicon glyphicon-envelope"></i>Email : info@cas.edu.kh
			                       <br />
			                       <i class="glyphicon glyphicon-globe"></i>
			                       <a href="http://cas.edu.kh">website : www.cas.edu.kh
			                       </a>
			                       <br />
			                   </p>

						</div>
					</div>
					
					<div class="row" style="margin-top: -6em;">

						<div class="col-sm-6 col-md-6" style="margin-left: -35px">
							<ul style="list-style: none;">
								<li>Name : <strong>{{ $student->last_name}} 
									{{ $student->first_name}}</strong>
								</li>
								
                                <li>Date of Birth : <strong>{{ $student->date_of_birth }}</strong></li>
                                <li>Admission Date: <strong>{{ $student->created_at->format('M d, Y') }}</strong></li>
                                <li>Completion Date: Jan 16, 2018</li>

							</ul>
						</div>	
          
	                    <!-- Split button -->
	               
                    </div>
					

				</div>
       
                    


			<!-- student info -->

			</div>

			<div class="row">

			<div class="col-md-6 ">

				
			<table class="table">
				<!--Table head-->
				<h6><span class="badge badge-primary badge-pill">1</span> First Semester : 2013 - 2014</h6>
			    <thead>
			        <tr>
			            
			            <th>Subject</th>
			            <th>CRED</th>
			            <th>GRD</th>			            
			            <th>PTS</th>
			        </tr>
			    </thead>
			    <!--Table head-->

			    <!--Table body-->
			    <tbody>

			    	@if(count($semester_1))
				    	@foreach($semester_1 as $score_s1)

					    	@foreach($grade as $grades)

						    	@if($score_s1->grade_id == $grades->id)

							    	
							        <tr>
							            
							            <td>{{$score_s1->subject->name}}</td>
							            <td>{{ $score_s1->subject->credit}}</td>
							            <td> 

							            	{{ $score_s1->gpa_quarter_1 }}
							            

							            </td>
							            <td>
											4.0
											
							            </td>

							        </tr>
							        
									
						        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif

			        

			        
			    </tbody>
			    <!--Table body-->

			</table>
			<!--Table-->



			
		</div>


		<div class="col-md-6 ">

				
			<table class="table">
				<!--Table head-->
				<h6><span class="badge badge-primary badge-pill">2</span> Second Semester : 2013 - 2014</h6>
			    <thead>
			        <tr>
			            
			            <th>Subject</th>
			            <th>CRED</th>
			            <th>GRD</th>			            
			            <th>PTS</th>
			        </tr>
			    </thead>
			    <!--Table head-->

			    <!--Table body-->
			    <tbody>
			        @if(count($semester_2))
				    	@foreach($semester_2 as $score_s2)

					    	@foreach($grade as $grades)

						    	@if($score_s2->grade_id == $grades->id)

							    	
							        <tr>
							            
							            <td>{{$score_s2->subject->name}}</td>
							            <td>{{ $score_s2->subject->credit}}</td>
							            <td> 

							            	{{ $score_s2->gpa_quarter_1 }}
							            

							            </td>
							            <td>
											4.0
											
							            </td>

							        </tr>
							        
									
						        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif
			    </tbody>
			    <!--Table body-->

			</table>
			<!--Table-->



			</div>
		</div>
	</div>
	<!--Table-->



</page>


<!-- <page size="A4" layout="portrait"></page> -->


	
</body>
</html>




