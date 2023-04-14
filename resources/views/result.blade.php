<x-layout>
    <x-slot:title>| Result</x-slot:title>
    <x-slot:header>Result</x-slot:header>
    <div class="container">
        <div class="result">
            <div class="infobox">
                <p>Result of your previous test</p><hr>
                @if($message == 1)
                    <u>👑New Highscore👑</u>
                @endif
                <h1 id="wordstyped" class="giant"></h1>
                <p id="totalerrors" class="accuracy">Accuracy: </p>
                <p id="actualerrors" class="lighttext">Real Accuracy: </p>
                <a href="/">restart</a>
            </div>
            <div id="incwords" class="incwords">
                <h3>Incorrect words</h3><hr>
            </div>
        </div>
    </div>
    <script src="{{asset('js/result.js?v=').time()}}"></script>
</x-layout>