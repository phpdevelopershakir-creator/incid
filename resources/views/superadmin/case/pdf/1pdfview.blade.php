@if(Auth::user()->can('1.question'))
<?php
if (($questiontitles[0]->status ?? null) == 1) {
?>

    
    <div class="card">

        <div class="card-header bg-primary text-white">
            <h5>
                1. {{ $questiontitles[0]->title }}
            </h5>
        </div>

        <div class="card-body">

            <!-- First Table -->
            <table class="custom-table">

                <thead>
                    <tr>
                        <th>Title of The New Law</th>
                        <th>Contents of Change/Status</th>
                        <th>Attach/Upload Pdf</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($case->one as $one)

                    <tr>

                        <td>
                            @if($one->supreme_court_title == 1)
                            PSHT 2012
                            @elseif ($one->supreme_court_title == 2)
                            Rule of PSHTA (2017)
                            @elseif ($one->supreme_court_title == 3)
                            OEMA 2013
                            @elseif ($one->supreme_court_title == 4)
                            Children Act
                            @elseif ($one->supreme_court_title == 5)
                            Labour Act
                            @elseif ($one->supreme_court_title == 6)
                            MLA in Criminal Matter 2012
                            @elseif ($one->supreme_court_title == 7)
                            Human Organ Transfer Rule 1999
                            @else
                            {{$one->supreme_court_title}}
                            @endif
                        </td>

                        <td>
                            @if($one->supreme_court_status == 1)
                            Revised
                            @elseif ($one->supreme_court_status == 2)
                            Abolished
                            @endif
                        </td>

                        <td>
                            @if(!empty($one->supreme_court_image))
                            <a href="{{ asset($one->supreme_court_image) }}"
                                target="_blank"
                                class="view-btn">
                                View
                            </a>
                            @else
                            Not Found
                            @endif
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            <div class="section-title">
                New Law
            </div>

            <!-- Second Table -->
            <table class="custom-table">

                <thead>
                    <tr>
                        <th>Title of The New Law</th>
                        <th>Contents of Change/Status</th>
                        <th>Attach/Upload Pdf</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($case->oneb as $oneb)

                    <tr>

                        <td>
                            {{$oneb->supreme_court_title_two}}
                        </td>

                        <td>

                            @if($oneb->supreme_court_status_two == 1)
                            Planned

                            @elseif ($oneb->supreme_court_status_two == 2)
                            On Process of Need Assessment

                            @elseif ($oneb->supreme_court_status_two == 3)
                            Drafted

                            @elseif ($oneb->supreme_court_status_two == 4)
                            Under Review of MoLJPA

                            @elseif ($oneb->supreme_court_status_two == 5)
                            Waiting to be enacted

                            @elseif ($oneb->supreme_court_status_two == 6)
                            Enforced
                            @endif

                        </td>

                        <td>

                            @if(!empty($oneb->supreme_court_image_two))

                            <a href="{{ asset($oneb->supreme_court_image_two) }}"
                                target="_blank"
                                class="view-btn">
                                View
                            </a>

                            @else
                            Not Found
                            @endif

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

<?php } ?>
@endif