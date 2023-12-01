<x-base>
    <div class="admin-panel">

        <div class="admin-row-1">
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

        </div>

        <div class="admin-row-2">

            <h1>Lijnen activeren</h1>

            <div class="inProductie">
                @foreach ($lines as $line)
                    @if ($line->is_producing)
                        <form class="activation" action='/activateLine' method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="activeline" value="{{ $line->id }}">
                            <input type="submit" class="line-active" value="{{ $line->line }}">

                        </form>
                    @else
                        <form class="activation"action='/deactivateLine' method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="deactiveline" value="{{ $line->id }}">
                            <input type="submit" class="line-deactive" value="{{ $line->line }}">
                        </form>
                    @endif
                @endforeach


            </div>






        </div>
</x-base>
