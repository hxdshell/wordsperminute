<x-layout>
    <x-slot:title>| Account</x-slot:title>
    <x-slot:header>Account</x-slot:header>

    <div class="container" id="account">
        <div class="userinfo">
            <i><h2 class="username">{{$data['user']['username']}}</h2></i>
            @php
            $timestamp = strtotime($data['user']['created_at']);
            $formateddate = date('F j, Y',$timestamp);
            @endphp
            <p class="created_at lighttext">Joined on: {{$formateddate}}</p>
            <p class="tests_completed">Tests completed: {{$data['user']['tests_completed']}}</p>
        </div>
        <div class="borderleft"></div>
        <div class="scoreinfo">
            <h3>Test Scores</h3><hr>
            <div class="high scorecontent">
                <p class="highscore">Highest WPM: {{ $data['user']['highscore'] }}wpm</p>
                <p class="highacc lighttext">Highest Accuracy: {{ $data['user']['high_acc'] }}%</p>
            </div>
            <div class="last scorecontent">
                <p class="lastscore">Last WPM: {{ $data['user']['lastscore'] }}wpm</p>
                <p class="lastacc lighttext">Last Accuracy: {{ $data['user']['last_acc'] }}%</p>
            </div>
            <div class="avg scorecontent">
                <p class="avgscore">Average WPM: {{ $data['user']['avgscore'] }}wpm</p>
            </div>
        </div>
        <div class="history">
            <h3>History</h3><p class="lighttext">(last 10 tests)</p><hr>
            <div class="historytable">
                <table class="table">
                    <tr class="headerrow">
                        <th>WPM</th>
                        <th>Accuracy</th>
                        <th>Time</th>
                    </tr>
                    @foreach($data['tests'] as $test)
                        <tr>
                            <td>{{$test->score}}</td>
                            <td>{{$test->accuracy}}</td>
                            <td>{{$test->time}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-layout>