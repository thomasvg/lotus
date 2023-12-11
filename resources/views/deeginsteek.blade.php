<x-base>
    <div class="deeginsteek">

        <div class="forms">

            <form action="/linkLine" method="POST">
                @csrf
                @method('PUT')



                <select name="line" id="line">
                    @foreach ($lines as $line)
                        @if ($line->linked && $line->is_producing)
                            <option value="{{ $line->line }} ">{{ $line->line }} linked and producing</option>
                        @elseif (!$line->linked && $line->is_producing)
                            <option value="{{ $line->line }} ">{{ $line->line }} not linked but producing</option>
                        @endif
                    @endforeach
                </select>



                <select name="placedegen" id="placedegen">
                    @foreach ($geregistreerdeDegen as $deeg)
                        <option value="{{ $deeg->place }} {{ $deeg->placenumber }}">{{ $deeg->place }}
                            {{ $deeg->placenumber }}</option>
                    @endforeach

                </select>

                <input type="submit" name="action" class="linklinebtn" id="linklinebtn" value="Link">
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

        </div>
        <!-- Your bak elements -->
        <div class="showBakken">
            @if (isset($results))
                @foreach ($results as $result)
                    <div class="individualBak" onclick="showInModal('{{ $result->bak }}')">
                        <p>{{ $result->bak }}</p>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Your modal -->
        <div class="mdl" id="myModal" style="display: none;">
            <div class="mdl-content">
                <p id="modalBak"></p>
                <p>
                    @if (isset($individualLine))
                        {{ $individualLine }}
                    @endif
                </p>

                <form action="/book" method="POST">
                    @csrf
                    <input type="hidden" id="bakInput" name="bak">
                    <input type="hidden" id="lineNumber"
                        value=@if (isset($individualLine)) {{ $individualLine }} @endif name="lineNumber">

                    <input type="submit" value="Boek">
                </form>
            </div>
        </div>

        @if (Session::has('success'))
            <p>{{ Session::get('success') }}</p>
        @endif




    </div>


</x-base>
