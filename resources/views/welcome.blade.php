<x-layout>
    <x-slot:title></x-slot>
        <x-slot:header>
            <h1>wordsperminute</h1>
        </x-slot:header>
        <div class="mainstuff">
            <p class="timer" id="timer">60</p>
            <div class="paragraph">
                @php
                $pointer = 0;
                @endphp
                @foreach($dictionary as $word)
                <span id="{{$pointer}}">{{$word}}</span>
                @php $pointer++; @endphp
                @endforeach
            </div>
            <div class="type-here">
                <input type="text" name="typingfield" class="form-control" autofocus id="typingfield" autocomplete="off">
            </div>
        </div>
        <script>
            let dictionary = <?php echo json_encode($dictionary); ?>;
        </script>
        <script src="{{asset('js/main.js?v=').time()}}"></script>
</x-layout>