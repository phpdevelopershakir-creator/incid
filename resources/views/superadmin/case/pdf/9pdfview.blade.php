<?php
if (($questiontitles[8]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>
                9.{{ $questiontitles[8]->title }}
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
                    @foreach($case->nine as $nine)
                    <tr>
                        <td>

                            {{$nine->court_title_q9}}
                        </td>
                        <td>
                            {{ $nine->court_type_q9 == 1 ? 'Yes' : 'No' }}
                        </td>
                        @if($nine->court_type_q9 == 1)
                        <td>

                            {{ $nine->court_description_q9 }}

                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
<?php } ?>