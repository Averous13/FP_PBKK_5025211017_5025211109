<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teams</title>
    <link rel="icon" href="{{ asset("storage/league-logo.png")}}" />
    @vite('resources/css/app.css')
</head>
<body class="w-full h-full flex items-center justify-center flex-col bg-primarybw-light">
    @include('shared.navbarhome')
    
    <div class="min-h-screen">
        <form action="{{ url('/teams') }}" method="GET" class="ml-20">
            @csrf
            <div class="mt-8 w-fit flex gap-4 justify-center items-center font-body px-8 py-4 rounded-xl bg-primarybw-white shadow-lg">
                <label for="season" class="text-base font-semibold text-primary-darkblue">Season:</label>
                <select name="season" id="season">
                    @foreach ($seasons as $season)
                        <option value="{{ $season->id }}" {{ $seasonId == $season->id ? 'selected' : '' }}>
                            {{ $season->season }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Apply Filter</button>
            </div>
        </form>
    
        <div class="w-full h-fit px-20 my-8 grid grid-cols-5 gap-10 justify-items-center">
            @if($seasonId)
                @foreach($teamstats as $teamstat)
                    @php
                        $teamname = $teamstat->team->team_name;
                        $image = $teamstat->team->image;
                    @endphp
                    <a href="/each-team/{{ $teamstat->team->id }}" class="w-56 h-60 px-8 flex items-center justify-center bg-primarybw-white rounded-xl shadow-lg hover:border-4 hover:border-primary-limegreen">
                        <div class="flex flex-col items-center text-center gap-6">
                            <img src="{{ asset("storage/team-logo/$image") }}" class="max-h-24">
                            <h2 class="font-body font-bold text-2xl text-primary-darkblue">{{ $teamname }}</h2>
                        </div>    
                    </a>
                @endforeach
            @endif
        </div>
    </div>

    @include('shared.footer')
</body>
</html>