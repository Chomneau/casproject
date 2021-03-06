
<div class="step1" style="margin-top: -30px">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('firstName') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}" autofocus id="firstname" placeholder="first name">
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('lastName') ? ' has-error' : '' }}">
            <label for="contactPerson">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $student->last_name }}" required autofocus placeholder="last name">
        </div>

    </div>

    <div class="row">
        

        <div class="col-md-6 col-sm-12 col-xs-12  {{ $errors->has('photo') ? ' has-error' : '' }}">
            <label for="logo">Student Photo</label>
            <input type="file" name="photo" class="form-control" value="{{ old('photo') }}" autofocus placeholder="student photo" >
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('type') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Sex</label>
            <select name="gender" id="" class="form-control" required>
                <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>

            </select>
        </div>
    </div>

    <div class="row">
        

        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ $student->date_of_birth }}" required autofocus placeholder="Date of birth" >
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('student_id') ? ' has-error' : '' }}">
            <label for="studentID">Student ID</label>
            <input type="text" name="student_id" class="form-control" value="{{ $student->card_id }}" required autofocus placeholder="student ID" >
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('national') ? ' has-error' : '' }}">
            <label for="email">Nationality</label>
            <input type="text" name="nationality" class="form-control" value="{{ $student->nationality }}" required autofocus placeholder=" Nationality" >
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('progressiveBookId') ? ' has-error' : '' }}">
            <label for="email">Status</label>

            <select name="status" id="" class="form-control" required>
                <option value="{{ $student->status }}">{{ $student->status }}</option>
                <option value="New">New</option>
                <option value="Old">Old</option>
                <option value="Graduated">Graduated</option>
                <option value="Quit">Quit</option>
            </select>
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('start_date') ? ' has-error' : '' }}">
            <label for="start_date">Admission Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ $student->start_date }}" required autofocus placeholder=" start_date" >
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('progressive_book_id') ? ' has-error' : '' }}">
            <label for="progressive_book_id">Progressive Book ID</label>
            <input type="number" name="progressive_book_id" class="form-control" value="{{ $student->progressive_book_id }}" autofocus placeholder=" progressive_book_id" >
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('grade_id') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Grade</label>
            <select name="grade_id" id="" class="form-control" required>
                @if(count($gradeProfile))
                    @foreach($gradeProfile as $grades)
                        <option value="{{ $grades->id }}"
                                @if($student->grade_profile_id  == $grades->id) selected @endif
                        >{{ $grades->name }}</option>
                    @endforeach
                @endif


            </select>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('career') ? ' has-error' : '' }}">
            <label for="occupation">Place of Birth</label>
            <input type="text" name="place_of_birth" class="form-control" value="{{ $student->place_of_birth }}" required autofocus placeholder=" place of birth" >
        </div>

    </div>

    <h4 style="margin-top: 3em; color: #03b5b5">PARENTS INFO</h4>
    <hr style="margin-top: -9px">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('father_name') ? ' has-error' : '' }}">
            <label for="email">Father's name</label>
            <input type="text" name="father_name" class="form-control" value="{{ $student->father_name }}"  autofocus placeholder="Father's name" >
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('career') ? ' has-error' : '' }}">
            <label for="occupation">Father's occupation</label>
            <input type="text" name="father_occupation" class="form-control" value="{{ $student->father_occupation }}"  autofocus placeholder="Father's occupation" >
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('mother_name') ? ' has-error' : '' }}">
            <label for="email">Mother's name</label>
            <input type="text" name="mother_name" class="form-control" value="{{ $student->mother_name }}"  autofocus placeholder="mother name" >
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('mother_occupation') ? ' has-error' : '' }}">
            <label for="occupation">Mother's occupation</label>
            <input type="text" name="mother_occupation" class="form-control" value="{{ $student->mother_occupation }}"  autofocus placeholder="mother's occupation" >
        </div>

    </div>

    <div class="row">
        
        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('father_phone') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Father's mobile number</label>
            <input type="text" name="father_phone" class="form-control" value="{{ $student->father_phone }}"  autofocus placeholder="father phone" >
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('mother_phone') ? ' has-error' : '' }}">
            <label for="mother_phone">Mother's mobile number</label>
            <input type="text" name="mother_phone" class="form-control" value="{{ $student->mother_phone }}"  autofocus placeholder="Mother phone" >
        </div>

    </div>

    <div class="row">

        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('father_email') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Father's email</label>
            <input type="email" name="father_email" class="form-control" value="{{ $student->father_email }}" autofocus placeholder="Father email">
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 {{ $errors->has('mother_email') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Mother's email</label>
            <input type="email" name="mother_email" class="form-control" value="{{ $student->mother_email }}" autofocus placeholder="Mother email">
        </div>

        
    </div>


    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12 {{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $student->address }}"  autofocus placeholder="Current address">
        </div>
    </div>




</div>

