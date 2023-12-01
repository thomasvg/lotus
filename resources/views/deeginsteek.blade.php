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

            <input type="submit" name="action" class="linklinebtn" id="linklinebtn" value="Update">
            <input type="submit" name="action" value="unlink">
        </form>

        <form action="/findBakken" method="GET">
            <div class="linkedlines">
                @foreach ($lines as $line)
                    @if ($line->linked)
                        <button type="submit" class="individualLinkedLines" name="individualbtn"
                            value="{{ $line->line }}">{{ $line->line }}</button>
                    @endif
                @endforeach
            </div>
        </form>

        <div class="showBakken">
            @if (isset($results))
                @foreach ($results as $result)
                    <p>{{ $result->bak }}</p>
                @endforeach
            @endif
        </div>
    </div>


</x-base>
