<div class="news">
    <div class="title">
        <div class='title-icon-fa'><i class="fa-solid fa-calendar-days "></i></div>
        <div class="title">
            <h1>Kalender</h1>
            <h3 id="year">i want the year here</h3>

        </div>
    </div>

    <div class="month">
        <ul>
            <li class="prev" onclick="previousMonth()">❮</li>
            <li class="next" onclick="nextMonth()">❯</li>
            <li id="month">
                <br>
                <span></span>
            </li>
        </ul>
    </div>

    <ul class="weekdays">
        <li>MA</li>
        <li>DI</li>
        <li>WO</li>
        <li>DO</li>
        <li>VR</li>
        <li>ZA</li>
        <li>ZO</li>
    </ul>

    <ul id="days" data-agendas="{{ json_encode($agendas) }}" class="days">
    </ul>

</div>
