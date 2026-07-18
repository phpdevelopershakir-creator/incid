<?php
if (($questiontitles[3]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>
                4.{{ $questiontitles[3]->title }}
            </h5>
        </div>

        <div class="card-body">
            <table class="custom-table">

                <thead>
                    <tr>

                        <th scope="col">Title of The New Low </th>
                        <th scope="col">Contents of Change/Status </th>
                        <th scope="col">Attach/Upload Pdf</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($case->fourb as $fourb)
                    <tr>
                        <th>
                            {{$fourb->supreme_court_title_two_q4}}
                        </th>
                        <td>
                            @if($fourb->supreme_court_status_two_q4 == 1)
                            Planned
                            @elseif ($fourb->supreme_court_status_two_q4 == 2)
                            On Process of Need Assessment
                            @elseif ($fourb->supreme_court_status_two_q4 == 3)
                            Drafted
                            @elseif ($fourb->supreme_court_status_two_q4 == 4)
                            Under Review of MoLJPA
                            @elseif ($fourb->supreme_court_status_two_q4 == 5)
                            Waiting to be enacted
                            @elseif ($fourb->supreme_court_status_two_q4 == 6)
                            Enforced

                            @endif

                        </td>
                        <td>
                            @if(!empty($fourb->supreme_court_image_two_q4))
                            <a href="{{ asset($fourb->supreme_court_image_two_q4) }}" target="_blank">View</a>
                            @else
                            not Found
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <h6>New Low</h6>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Title of The New Low </th>
                        <th scope="col">Contents of Change/Status </th>
                        <th scope="col">Attach/Upload Pdf</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($case->fourb as $fourb)
                    <tr>
                        <th>
                            {{$fourb->supreme_court_title_two_q4}}
                        </th>
                        <td>
                            @if($fourb->supreme_court_status_two_q4 == 1)
                            Planned
                            @elseif ($fourb->supreme_court_status_two_q4 == 2)
                            On Process of Need Assessment
                            @elseif ($fourb->supreme_court_status_two_q4 == 3)
                            Drafted
                            @elseif ($fourb->supreme_court_status_two_q4 == 4)
                            Under Review of MoLJPA
                            @elseif ($fourb->supreme_court_status_two_q4 == 5)
                            Waiting to be enacted
                            @elseif ($fourb->supreme_court_status_two_q4 == 6)
                            Enforced

                            @endif

                        </td>
                        <td>
                            @if(!empty($fourb->supreme_court_image_two_q4))
                            <a href="{{ asset($fourb->supreme_court_image_two_q4) }}" target="_blank">View</a>
                            @else
                            not Found
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>