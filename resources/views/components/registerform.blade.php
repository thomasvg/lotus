<div class="deegkamer">
    <h1>Deegkamer registratie</h1>
    <form action="/deegkamer" method="POST" class="blog">
        @csrf

        @if ($message = Session::get('success'))
            <div class="message">

                <p> <strong>{{ $message }}</strong></p>
            </div>
        @endif

        <div class="deegformpart">

            <select id="place" name="place">
                <option value="y">y</option>
                <option value="z">z</option>

            </select>


            <select id="placenumber" name="placenumber">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
            </select>


        </div>



        <div class="deegformpart">


            <label for="weight">gewicht:</label>

            <input type="number" id="weight" name="weight" min="1" max="800" />

        </div>

        <div class="deegformpart">

            <div class="label">

                <label for="bak">bak nummer:</label>

            </div>

            <input type="number" id="bak" name="bak" />



        </div>



        <input type="submit" id="button" value="Verzenden">
    </form>
</div>
