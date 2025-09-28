<p>Hello {{ $user->name }},</p>
<p>Thank you for participating in the previously concluded Exams.</p>
<p>Your results are as follows:</p>
<table>
    <thead>
        <thead>
            <th>Unit</th>
            <th>Score</th>
        </thead>
    </thead>
    <tbody>
        <tr>
            <td>Church Heritage</td>
            <td>{{ $content->church_heritage }}</td>
        </tr>
        <tr>
            <td>Bible Truth</td>
            <td>{{$content->bible_truth}}</td>
        </tr>
        <tr>
            <td>General Knowledge</td>
            <td>{{$content->general_knowledge}}</td>
        </tr>
        <tr>
            <td>Average</td>
            <td>{{ceil((($content->church_heritage) +($content->bible_truth)+($content->general_knowledge))/3)}}</td>
        </tr>
        <tr>
            <td>Comment</td>
            <td></td>
        </tr>
    </tbody>
</table>