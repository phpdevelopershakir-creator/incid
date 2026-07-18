<?php
if (($questiontitles[9]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>
                10.{{ $questiontitles[9]->title }}
            </h5>
        </div>

        <div class="card-body">
            <table class="custom-table">

                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($case->ten as $ten)
                    <tr>
                        <td>

                            {{$ten->court_title_q10}}
                        </td>
                        <td>
                            {{ $ten->court_type_q10 == 1 ? 'Yes' : 'No' }}
                        </td>
                        @if($ten->court_type_q10 == 1)
                        <td>

                            {{ $ten->court_description_q10 }}

                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
<?php } ?>