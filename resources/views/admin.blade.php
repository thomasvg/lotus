<x-base>
    <div class="admin-panel">

        <div class="admin-blog">
            <h1>Nieuw bericht</h1>
            <form action="/create-post" method="POST" class="blog">
                @csrf
                <input type="text" name="title" id="title" placeholder="titel..." required>
                <textarea name="content" id="content" placeholder="Inhoud..." required></textarea>
                <input type="submit" value="Verzenden">
            </form>
        </div>
        <div class="admin-blog">
            <h1>Nieuw Kalender bericht</h1>


            <form action="/agenda" method="POST" class="blog">
                @csrf

                <input type="text" name="title" id="title" placeholder="titel..." required>
                <input type="date" name="datefrom" id="datefrom" required>
                <input type="date" name="dateto" id="dateto" required>

                <input type="submit" id="button" value="Verzenden">
            </form>
        </div>


        <div class="inProductie">
            <select name="deegsoort" id="deegsoort">
                @foreach ($deegsoorten as $deegsoort)
                    <option value="{{ $deegsoort->id }}">{{ $deegsoort->deegsoort }}</option>
                @endforeach
            </select>
        </div>




    </div>
</x-base>
