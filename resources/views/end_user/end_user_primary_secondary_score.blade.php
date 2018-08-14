<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Student Score Record</h4>
                        {{--
                        <p>Using the most basic table markup, here’s how </p> --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Subjects</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Quarter 1</th>
                                    <th scope="col">Quarter 2</th>
                                    <th scope="col">Semester 1</th>
                                    <th scope="col">Quarter 3</th>
                                    <th scope="col">Quarter 4</th>
                                    <th scope="col">Semester 2</th>
                                    <th scope="col">Yearly</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($secondaryScore)) @foreach( $secondaryScore as $secondaryScores)

                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $secondaryScores->PrimarySubject->name }}</td>
                                    <td>{{ $secondaryScores->SecondaryLevel->name }}</td>
                                    <td>{{ $secondaryScores->quarter_1 }}</td>
                                    <td>{{ $secondaryScores->quarter_2 }}</td>
                                    <td>{{ $secondaryScores->semester_1 }}</td>
                                    <td>{{ $secondaryScores->quarter_3 }}</td>
                                    <td>{{ $secondaryScores->quarter_4 }}</td>
                                    <td>{{ $secondaryScores->semester_1 }}</td>
                                    <td>{{ $secondaryScores->yearly }}</td>

                                </tr>
                                @endforeach @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>