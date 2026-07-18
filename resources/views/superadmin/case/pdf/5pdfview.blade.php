<?php
if (($questiontitles[4]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>
                5.{{ $questiontitles[4]->title }}
            </h5>
        </div>

        <div class="card-body">
            <table class="custom-table">

                <thead>
                    <tr>
                        <th scope="col">Title Description </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($case->five as $five)
                    {{$five->involved_directly_trafficking_title_q5}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>