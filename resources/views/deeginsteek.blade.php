<x-base>


    <div class="deeginsteek">



        <form action="/linkLine" method="POST">
            @csrf
            @method('PUT')


            <select name="line" id="line">
                @foreach ($lines as $line)
                    @if ($line->linked)
                        <option value="{{ $line->line }} ">{{ $line->line }} linked</option>
                    @else
                        <option value="{{ $line->line }} ">{{ $line->line }} not linked</option>
                    @endif
                @endforeach
            </select>



            <select name="placedegen" id="placedegen">
                @foreach ($geregistreerdeDegen as $deeg)
                    <option value="{{ $deeg->place }} {{ $deeg->placenumber }}">{{ $deeg->place }}
                        {{ $deeg->placenumber }}</option>
                @endforeach

            </select>

            <input type="submit" class="linklinebtn" id="linklinebtn" value="Update">
        </form>




    </div>


</x-base>
