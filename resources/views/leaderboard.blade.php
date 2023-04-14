<x-layout>
    <x-slot:title>| Leaderboard</x-slot:title>
    <x-slot:header>Leaderboard</x-slot:header>
    <div class="container">
        <div class="leaderboard">
            <div class="leaderboardtable">
                <table class="table">
                    <tr>
                        <th>Rank</th>
                        <th>Username</th>
                        <th>WPM</th>
                        <th>Accuracy</th>
                    </tr>
                    @php
                    $rank = 1;
                    @endphp

                    @foreach($data['users'] as $user)
                        @if($user->username == $data['currentuser']->username)
                            @php $currank = $rank @endphp
                        @endif
                    <tr>
                        <td>{{$rank}}</td>
                        <td><a href="/account/{{$user->username}}">{{$user->username}}</a></td>
                        <td>{{$user->highscore}}</td>
                        <td>{{$user->high_acc}}%</td>
                    </tr>
                    @php $rank++; @endphp
                    @endforeach
                    <tr class="currentuserrow">
                        <td>{{$currank}}</td>
                        <td>{{$data['currentuser']->username}}</td>
                        <td>{{$data['currentuser']->highscore}}</td>
                        <td>{{$data['currentuser']->high_acc}}%</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-layout>